import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


void main(){
  runApp(MyApp());
}

class MyApp extends StatelessWidget{
  @override
  Widget build(BuildContext context){
    return MaterialApp(
      home: Scaffold(
        floatingActionButton: FloatingActionButton(
          onPressed: (){},
          child: Text('click'),
        ),

        // body: Container(
        // decoration: BoxDecoration( //style
        //   color: Colors.amber, //背景色
        //   border: Border.all( //周り線
        //     width: 16.0,
        //     color: Colors.black,
        //   ),
        //   borderRadius: BorderRadius.circular(//周り線丸方にする。
        //       16.0,
        //   ),
        // ),
        // height: 200.0,
        // width: 100.0,
        // ),
      ),
    );
  }
}