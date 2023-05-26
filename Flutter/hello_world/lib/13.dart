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
        body: Center(
          child: Column(
            children: [
              Flexible(
                // flexは残り空間を美率を意味
                // flexは基本的に１に設定されている
                flex: 1,

                //  Container
                child: Container(
                  color: Colors.blue,
                ),
              ),
              Flexible(
                flex: 1,

                //  Container
                child: Container(
                  color: Colors.red,
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
