import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


void main(){
  runApp(
    MaterialApp(//MaterialApp基盤のwidgetを使えるようにするコード
      debugShowCheckedModeBanner: false,
      home: Scaffold(//仮面全体のための機能を使えるコード
        body: SizedBox(
          width: double.infinity,
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text('code'),
              Text('factory'),
            ],
          ),
        ),
      ),
    ),
  );
}
