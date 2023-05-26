import 'dart:async';

void main() {
  final controller = StreamController();

  // 何回もlistenができる Broadcaste Stream 客体
  final stream = controller.stream.asBroadcastStream();

  // listen 1
  final streamListener1 = stream.listen((val) {
    print('listening 1');
    print(val);
  });

  // listen 2
  final streamListener2 = stream.listen((val) {
    print('listening 2');
    print(val);
  });

  // add()実行時listen()するすべてのcallback関数に値が入れる。
  controller.sink.add(1);
  controller.sink.add(2);
  controller.sink.add(3);

}
