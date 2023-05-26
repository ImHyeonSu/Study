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
          child: Container(
            child: SafeArea(//どのスマホにも対応できるようにしてくれる
              top: true,
              bottom: true,
              left: true,
              right: true,
              child: Container(
                color: Colors.blue,
                height: 300.0,
                width: 300.0,
              ),
            ),
          ),
        ),
      ),
    );
  }
}
