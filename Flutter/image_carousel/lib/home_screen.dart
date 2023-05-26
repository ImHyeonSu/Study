import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'dart:async';

class HomeScreen extends StatefulWidget{ //StatelessWidget
  const HomeScreen({Key? key}) : super(key: key);
  //後で追加された
  @override
  State<HomeScreen> createState() => _HomeScreenState();
}
class _HomeScreenState extends State<HomeScreen>{//この項も後で追加された
  final PageController pageController = PageController();

  @override
  void initState(){
    super.initState();

    Timer.periodic(
        Duration(seconds: 3),
            (timer){
          int? nextPage = pageController.page?.toInt();
          //pageController.pageはgetterそれを利用して現在のページを図氏としてもらうけど
          // ページが変わりながら総数になるからそれをtoIntでかえる。

          if (nextPage ==null){
            return;
          }

          if (nextPage == 4){
            nextPage = 0;
          } else{
            nextPage++;
          }
          pageController.animateToPage(
              nextPage,
              duration: Duration(microseconds: 500),//変わるときの時間
              curve: Curves.ease,
          );
    },
    );
  }

  @override
  Widget build(BuildContext context){
    SystemChrome.setSystemUIOverlayStyle(SystemUiOverlayStyle.dark);
    return Scaffold(
      // body: Text('Home Screen'),
      body: PageView(
        controller: pageController,
        children: [1, 2, 3, 4, 5]
            .map(
            (number) => Image.asset(
                'asset/img/$number.jpg',
                fit: BoxFit.cover,
            ),
        )
            .toList(),
      ),
    );
  }
}