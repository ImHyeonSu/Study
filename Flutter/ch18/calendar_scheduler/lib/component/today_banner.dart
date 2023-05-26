
import 'package:calendar_scheduler/const/colors.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class TodayBanner extends StatelessWidget{
  final DateTime selectedDate;
  final int count;

  const TodayBanner({
    required this.selectedDate,
    required this.count,
    Key? key,
}) : super(key: key);
  @override
  Widget build(BuildContext context){
    final textStyle = TextStyle(
        fontWeight: FontWeight.w600,
        color: Colors.white,
    );

    return Container(
      color: PRIMARY_COLOR,
      child: Padding(
        padding: EdgeInsets.symmetric(horizontal: 16.0, vertical: 8.0),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            Text(
              '${selectedDate.year}年 ${selectedDate.month}月 ${selectedDate.day}日',
              style: textStyle,
            ),
            Text(
              '$count個',
              style: textStyle,
            ),
          ],
        ),
      ),
    );
  }
}