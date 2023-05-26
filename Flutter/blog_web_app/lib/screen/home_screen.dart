import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';


class HomeScreen extends StatelessWidget{
  WebViewController? controller; //null`が入られる。
  //const HomeScreen({Key? key}) : super(key: key);
  //constを使えない理由は変数がconst,finalタイプじゃなければ使えない。
  HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context){
    return Scaffold(
      // body: Text('Home Screen'),
      appBar: AppBar(
        backgroundColor: Colors.blue,
        title: Text('Code Factory'),
        centerTitle: true,

        actions: [
          IconButton(
              onPressed: (){
                if(controller != null){
                  controller!.loadUrl('https://blog.codefactory.ai');
                }
              }, icon: Icon(
            Icons.home,
            ),
          ),
        ],
      ),
      body: WebView(
        onWebViewCreated: (WebViewController controller){
          this.controller = controller;
        },
        initialUrl: 'https://blog.codefactory.ai',
        javascriptMode: JavascriptMode.unrestricted,
      ),
    );
  }
}