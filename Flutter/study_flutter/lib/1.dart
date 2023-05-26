import 'dart:js_util';

enum Status {
  approved, pending, rejected,
}

//ネームドパラメータでいう、普通にJAVA形式値を入れるのはポジションパラメータ
int addTwoNumbers({
  required int a,
  required int b,
}){
  return a+b;
}

int addTwoNumbers2(int a, [int b =2]){
  return a+b;
}

int addTwoNumbers3({
  required int a,
  int b = 2,
}){
  return a+b;
}

int addTwoNumbers4(
    int a,{
      required int b,
      int c = 4,
    }){
  return a + b + c;
}

typedef Operation = void Function(int x, int y);

void add(int x, int y){
  print('結果 : ${x + y}');
}

void subtract(int x, int y){
  print('結果 : ${x - y}');
}

void calculate(int x, int y, Operation oper){
  oper(x, y);
}

void main(){
  print('hello world');
//---------------------------------
  //説明ーvarタイプは入力した値を予想してタイプを指定して、タイプが固定される。
  var name = 'test変数';
  print(name);

  //値のタイプが固定されない、値を変更しても大丈夫
  dynamic name2 = 'test変数2';
  name2 = 2;

  //runtimeのfinal、宣言後値を変えようとしたら変更不可
  final String name3 = 'test変数3';
  // name3 = "変更" エラーが出る

  //buildtimeのconst、ビルド前に値をわかる必要がある、宣言後値を変えようとしたら変更不可
  const String name4 = 'test変数4';
  //name4 = 'test変数5';

  //build前にわかるんだったらconst、buildしながら値をもらえるんだったらfinal
  //DateTimeの場合はbuildしながらねがわかるのでfinalでしか使えない、const不可
  final DateTime now = DateTime.now();
//---------------------------------
  List<String> name5 = ['1','2','3'];
  name5.add(' ');
  //nameは매개변수(パラメーター)
  final newList = name5.where((name) => name == '1'|| name == 'value');
  //Listのすべての値に前に追加でいう単語つける。
  final newList2 = name5.map((name) => '追加 $name',);
  print(newList2.toList());
  //valueは最初の値を[0]の値をそのあとのelementは[1]からの値が入る、reduce()、
  final newList3 = name5.reduce((value, element) => value + ',' + element);
  print(newList3);//結果１，２，３，
  //reduceとの差はパラメータのタイプが違っても大丈夫
  final newList4 = name5.fold<int>(0, (value, element) => value + element.length);
  print(newList4); //結果４
//---------------------------------
  Map<String, String> name6 = {
    'あ' : 'い',
    'う' : 'え',
    'お' : 'か',
  };
  print(name6['あ']);
  print(name6.keys);
  print(name6.values);
//---------------------------------
  //重複ができないset
  Set<String> name7 = {'1','2','3','4'};
  print(name7.contains('1'));
  print(name7.toList());
  //List -> set
  print(Set.from(name5));
//---------------------------------
  Status status = Status.approved;
  print(status);
//---------------------------------
  double? number = 1;
  //dobule number = null;？を付けないと エアー発生　
  double? number3;
  print(number3); //nullがでる
  //number3 ??= 3; // nullになった値をかえようとしたら??を付けないといけない
  //number3 ??= 4; //値は3そのまま、nullの時しか変えられない。
//---------------------------------
  print(number is int); // true
  print(number is String); // false
  print(number is! int); // false
  print(number is! String); // ture
//---------------------------------
  bool result = 12> 10 && 1 > 0; // true
  bool result2 = 12 > 10 &&  0> 1; // false
  bool result3 = 12 > 10 || 1>0 ; // true
  bool result4 = 12> 10 || 0>1; // true
  bool result5 = 12 < 10 || 0>1; // false
//---------------------------------
  List<int> numberList = [3, 6, 9];
  for (int number in numberList){
    print(number);
  }
//---------------------------------
  int total = 0;
  do {
    total += 1;
  } while(total < 10);
  // total = 10;
//---------------------------------
  print(addTwoNumbers(a: 1, b: 2));
  print(addTwoNumbers2(1));
  print(addTwoNumbers3(a: 1));
  print(addTwoNumbers4(1, b: 3, c: 7));
//---------------------------------
  List<int> numbers = [1,2,3,4,5];

  final allMembers = numbers.reduce((value, element) {
    return value + element;
  }); //15
  final allMembers2 = numbers.reduce((value, element) => value + element); // 15
//---------------------------------
  Operation oper = add;
  oper(1,2); // 3

  oper = subtract;
  oper(1,2); // -1

  calculate(1, 2, add);
//---------------------------------
  try{
    final String name = 'codefactory';
    //意図的なエラーのthrow
    throw Exception('名が間違えております。');
    print(name);
  }catch(e){
    print(e);
  }
//---------------------------------
//instance - classをつくってそれを客体を宣言したらその客体をinstanceていう
}