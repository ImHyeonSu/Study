import 'dart:async';

// Streamをreturnする関数はasync*に宣言
Stream<String> calculate(int number) async* {
  for (int i = 0; i < 5; i++) {
    // StreamControllerのadd()みたいにyieldを通じて値返還
    yield 'i = $i';
    await Future.delayed(Duration(seconds: 1));
  }
}

void playStream() {
  // StreamControllerと同じようにlisten()関数をcallback関数入力
  calculate(1).listen((val) {
    print(val);
  });
}

void main() {
  playStream();
}
