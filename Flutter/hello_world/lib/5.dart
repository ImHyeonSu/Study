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
            child:

          GestureDetector(//133ページ参考
            onTap: (){
              print('ontap');
            },
            onDoubleTap: (){
              print('on double tap');
            },
            onLongPress: (){
              print('on long press');
            },
            child: Container(
              decoration: BoxDecoration(
                color: Colors.cyan,
              ),
              width: 100.0,
              height: 100.0,
            ),
          )

          // IconButton( //iconホームボタン
          //   onPressed: (){},
          //   icon: Icon(
          //     Icons.home,
          //   ),
          // )

          // ElevatedButton(
          //   onPressed: (){},
          //   style: ElevatedButton.styleFrom(
          //     backgroundColor: Colors.red,
          //   ),
          //   child: Text('ElevatedButton'),
          // )

          // TextButton(
          //   onPressed: (){},
          //   style: TextButton.styleFrom(
          //     foregroundColor: Colors.red,
          //   ),
          //   child: Text('text button'),
          // ),

          // OutlinedButton(
          //   onPressed: (){},
          //   style: OutlinedButton.styleFrom(
          //     foregroundColor: Colors.red,
          //   ),
          //   child: Text('outline button'),
          // )

        ),
      ),
    );
  }
}