class Car{
  //_をつけるのでprivate変数になる。
  String _name = 'foxy';

  //Car(this._name); コンストラクタ使う場合
  String get name{
    return this._name;
  }
  set name(String name){
    this._name = name;
  }
  }


void main(){
  //Car benc = Car('test');　コンストラクタ使う場合
  Car benc = Car();
  benc.name = 'benc';
  print(benc.name);

}