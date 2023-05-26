void main() {
  addNumbers(1, 1);
}

// async配下のように書く
Future<void> addNumbers(int number1, int number2) async {
  print('$number1 + $number2 解散始める');

  // await待機しようとしてる所につける。
  await Future.delayed(Duration(seconds: 3), (){
    print('$number1 + $number2 = ${number1 + number2}');
  });

  print('$number1 + $number2 コード終わり');
}
//説明ー3.dartでは１，３，２順で結果が出たけど、asyncと