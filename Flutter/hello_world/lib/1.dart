import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

//説明ー Embedder - nativefaltformとの通信, Engine - Flutterframeworkとの中心機能提供、
// Framwork－widget,animation昨日提供
void main(){
  runApp(
    MaterialApp(//MaterialApp基盤のwidgetを使えるようにするコード
      home: Scaffold(//仮面全体のための機能を使えるコード
        body: Text(
          'Hello Code',
        ),
      ),
    ),
  );
}
