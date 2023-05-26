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
            color: Colors.black,
            child: Container(
              color: Colors.blue,
              margin: EdgeInsets.all(16.0),//外部に適用されるmargin,138ページ参考
              child: Padding(
                padding: EdgeInsets.all(16.0),//内部に適用されるpadding
                child: Container(
                  color: Colors.red,
                  width: 50,
                  height: 50,
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
