import 'package:calendar_scheduler/model/schedule_model.dart';
import 'package:calendar_scheduler/repository/schedule_repository.dart';
import 'package:flutter/material.dart';
import 'package:uuid/uuid.dart';

class ScheduleProvider extends ChangeNotifier {
  final ScheduleRepository repository;  // API要請を持ってるクラス

  DateTime selectedDate = DateTime.utc(
    DateTime.now().year,
    DateTime.now().month,
    DateTime.now().day,
  );
  Map<DateTime, List<ScheduleModel>> cache = {};  // ➌ 日程情報を持ってる変数

  ScheduleProvider({
    required this.repository,
  }) : super() {
    getSchedules(date: selectedDate);
  }

  void getSchedules({
    required DateTime date,
  }) async {
    final resp = await repository.getSchedules(date: date);  // GETmethodに送る

    cache.update(date, (value) => resp, ifAbsent: () => resp);

    notifyListeners();  // Listeningのwidget update
  }

  void createSchedule({
    required ScheduleModel schedule,
  }) async {
    final targetDate = schedule.date;
    final uuid = Uuid();

    final tempId = uuid.v4();  //唯一のid作り
    final newSchedule = schedule.copyWith(
      id: tempId,  // 臨時id作り　ー＞このあとサーバとの通信に成功すれば臨時idをサーバからもらったidと切り替え
    );

    cache.update(  //事前からデータを準備する。
      targetDate,
          (value) => [
        ...value,
        newSchedule,
      ]..sort(
            (a, b) => a.startTime.compareTo(
          b.startTime,
        ),
      ),
      ifAbsent: () => [newSchedule], //日付に同じvalueがなかったら新しいリストに新しい日程一個追加
    );

    notifyListeners();  // 事前に反映　ーー＞homescreenのbuildがはじまる。

    try {//そのあとサーバとの連携してアップデート
      final savedSchedule = await repository.createSchedule(schedule: schedule);

      cache.update(
        targetDate,
            (value) => value
            .map((e) => e.id == tempId
            ? e.copyWith(
          id: savedSchedule,
        )
            : e)
            .toList(),
      );
    } catch (e) {
      cache.update(
        targetDate,
            (value) => value.where((e) => e.id != tempId).toList(),
      );
    }
    notifyListeners();
  }

  void deleteSchedule({
    required DateTime date,
    required String id,
  }) async {
    final targetSchedule = cache[date]!.firstWhere(
          (e) => e.id == id,
    );  //

    cache.update(
      date,
          (value) => value.where((e) => e.id != id).toList(),
      ifAbsent: () => [],
    ); //

    notifyListeners();  //

    try {
      await repository.deleteSchedule(id: id); //
    } catch (e) {
      cache.update(
        //
        date,
            (value) => [...value, targetSchedule]..sort(
              (a, b) => a.startTime.compareTo(
            b.startTime,
          ),
        ),
      );
    }

    notifyListeners();
  }

  void changeSelectedDate({
    required DateTime date,
  }) {
    selectedDate = date;  //
    notifyListeners();
  }
}
