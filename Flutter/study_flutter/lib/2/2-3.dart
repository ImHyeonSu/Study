class Car{
  //_をつけるのでprivate変数になる。
  //説明ーextendsはすべての関数を親クラスからもらう、implementsは親クラスの関数を再整理しないといけない
  final String name;
  final int carsCount;
  Car(this.name, this.carsCount);

  void sayName(){
    print("これは　${this.name}です。");
  }
  void sayCounts(){
    print("${this.name}は${this.carsCount}台です。");
  }

}

class RedCar extends Car{
  RedCar(
      String name,
      int carsCount,
      ) : super( //superは親クラスを指定
    name, carsCount,
  );

  void sayAnother(){
    print("これは全く違うんです。");
  }
}

class BlueCar extends Car {
  BlueCar(
      super.name,
      super.carsCount,
      );
  @override
  void sayName(){
    print("これはblue${this.name}です、");
  }
}

void main(){
  RedCar gg = RedCar('Redcar', 8);
  gg.sayName();
  gg.sayCounts();
  gg.sayAnother();
  BlueCar blue = BlueCar('foxy', 9);
  blue.sayName();
  blue.sayCounts();
}