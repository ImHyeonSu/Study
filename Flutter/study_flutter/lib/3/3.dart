//Futereは未来の値をもらうために使う
//Future<String> name;
//Future<int> number;
//Future<bool> isOpened;

void main() {
  addNumbers(1, 1);
}

void addNumbers(int number1, int number2){
  print('$number1 + $number2 解散始める。');

  // ➊ Future.delayed()を使えばある時間後callback関数を実行できる。
  Future.delayed(Duration(seconds: 3), (){
    print('$number1 + $number2 = ${number1 + number2}');
  });

  print('$number1 + $number2 コード終わり');
}
