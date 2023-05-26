void main() async {
  final result = await addNumbers(1, 1);
  print(result);
  final result2 = await addNumbers(1, 1);
  print(result2);
}

Future<int> addNumbers(int number1, int number2) async {
  print('$number1 + $number2 解散始める');

  await Future.delayed(Duration(seconds: 3), (){
    print('$number1 + $number2 = ${number1 + number2}');
  });

  print('$number1 + $number2 コード終わり');

  return number1 + number2;
}
