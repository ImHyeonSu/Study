import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


void main(){
  runApp(
    MaterialApp(//MaterialApp基盤のwidgetを使えるようにするコード
      home: Scaffold(//仮面全体のための機能を使えるコード
        body: Center(
          child: Text(//childの場合は下にwidgetを一個しか追加できない。
            'Hello Code',
          ),
        ),
      ),
    ),
  );
}
