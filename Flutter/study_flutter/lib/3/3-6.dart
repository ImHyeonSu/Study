import 'dart:async';　//stream使用のため
//Futureは非同期処理でreturnは一回、しかしstreamは続けてreturnができる。
void main() {
  final controller = StreamController();
  final stream = controller.stream;

  final streamListener1 = stream.listen((val) {
    print(val);
  });

  controller.sink.add(1);
  controller.sink.add(2);
  controller.sink.add(3);
  controller.sink.add(4);
}
