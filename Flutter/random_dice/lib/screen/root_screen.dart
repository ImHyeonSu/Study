import 'dart:math';

import 'package:flutter/material.dart';
import 'package:random_dice/screen/home_screen.dart';
import 'package:random_dice/screen/settings_screen.dart';
import 'package:shake/shake.dart';

class RootScreen extends StatefulWidget {
  const RootScreen({Key? key}) : super(key: key);

  @override
  State<RootScreen> createState() => _RootScreenState();
}

class _RootScreenState extends State<RootScreen> with TickerProviderStateMixin {
  TabController? controller;
  double threshold = 2.7;
  int number = 1;
  ShakeDetector? shakeDetector;

  @override
  void initState() {
    super.initState();
    //tabcontrollerを使うためにはtinkerProviderStateMinxinが必要。
    controller = TabController(length: 2, vsync: this);

    controller!.addListener(tabListener); //controllerの属性が変わるとき特定な関数が実行されるように
    //する。
    //ゆするときをcheckする関数
    shakeDetector = ShakeDetector.autoStart(
      shakeSlopTimeMS: 100,
      shakeThresholdGravity: threshold,
      onPhoneShake: onPhoneShake,
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: TabBarView(
        controller: controller,
        children: renderChildren(),
      ),
      bottomNavigationBar: renderBottomNavigation(),
    );
  }

  void onPhoneShake(){
    final rand = new Random();

    setState(() {
      number = rand.nextInt(5) + 1;
    });
  }

  tabListener(){
    setState(() {});
  }

  @override
  dispose(){ //addListenerを使った後widgetが削除されるときlistenerも削除しないといけない。
    controller!.removeListener(tabListener);
    shakeDetector!.stopListening();
    super.dispose();
  }

  List<Widget> renderChildren() {
    return [
      HomeScreen(number: 1),
      SettingsScreen(
          threshold: threshold,
          onThresholdChange: onThresholdChange,
      ),
    ];
  }

  void onThresholdChange(double val){
    setState(() {
      threshold = val;
    });
  }

  BottomNavigationBar renderBottomNavigation() {
    return BottomNavigationBar(
      currentIndex: controller!.index,
      onTap: (int index){
        setState(() {
          controller!.animateTo(index);
        });
      },
      items: [
        BottomNavigationBarItem(
          icon: Icon(
            Icons.edgesensor_high_outlined,
          ),
          label: 'dice',
        ),
        BottomNavigationBarItem(
          icon: Icon(
            Icons.settings,
          ),
          label: '設定',
        )
      ],
    );
  }
}
