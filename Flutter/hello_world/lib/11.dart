import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


void main(){
  runApp(MyApp());
}

class MyApp extends StatelessWidget{
  @override
  Widget build(BuildContext context){
    return MaterialApp(//rowはーーー
      home: Scaffold(
        body: SizedBox(
          height: double.infinity,
          child: Row(
            //142ページ参考
            mainAxisAlignment: MainAxisAlignment.start,
            //
            crossAxisAlignment: CrossAxisAlignment.center,
            // widget入力
            children: [
              Container(
                height: 50.0,
                width: 50.0,
                color: Colors.red,
              ),
              // SizedBoxは空白に使う
              const SizedBox(width: 12.0),
              Container(
                height: 50.0,
                width: 50.0,
                color: Colors.green,
              ),
              const SizedBox(width: 12.0),
              Container(
                height: 50.0,
                width: 50.0,
                color: Colors.blue,
              ),
            ],
          ),
        ),
      ),
    );
  }
}
