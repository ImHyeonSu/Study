
void main(){
  print('hello world');

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


}