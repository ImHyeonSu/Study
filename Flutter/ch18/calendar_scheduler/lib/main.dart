import 'package:calendar_scheduler/database/drift_database.dart';
import 'package:calendar_scheduler/provider/schedule_provider.dart';
import 'package:calendar_scheduler/repository/schedule_repository.dart';
import 'package:calendar_scheduler/screen/home_screen.dart';
import 'package:flutter/material.dart';
import 'package:get_it/get_it.dart';
import 'package:intl/date_symbol_data_local.dart';
import 'package:provider/provider.dart';

void main() async {

  WidgetsFlutterBinding.ensureInitialized(); // flutter frameworkが準備んされる前まで待機
  //intl パッケージ呼び出す(多国語)
  await initializeDateFormatting();

  final database = LocalDatabase();

  GetIt.I.registerSingleton<LocalDatabase>(database);//このインスタンスをいろんなところで使える。

  final repository = ScheduleRepository();
  final scheduleProvider = ScheduleProvider(repository: repository);//secheduleProvider-getscheduleを通じてじょうほうをもらう。

  runApp(
    ChangeNotifierProvider(
        create:(_) => scheduleProvider,
        child: MaterialApp(
          home: HomeScreen(),
        ),
    ),
  );
}

