class Car{
  final String name;
  final int carsCount;
  //コンストラクタ
  Car(String name, int carsCount)
    :this.name = name,
     this.carsCount = carsCount;
  //ネームドコンストラクタ
  Car.fromMap(Map<String, dynamic> map)
    :this.name = map['name'],
     this.carsCount = map['carsCount'];

  void sayName(){

    print("これは　${this.name}です。${this.name}は${this.carsCount}台です。");

  }
}

void main(){
  Car benc = Car('benc', 4);
  benc.sayName();
  Car foxy = Car.fromMap({'name' : 'foxy', 'carsCount' : 8,});
  foxy.sayName();
}