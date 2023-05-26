//mixinは特定なクラスにほしい機能参れること

class Car{
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
mixin CarMixin on Car{
  void carsing(){
    print('${this.name}はうたってます、');
  }
}

class Carxx extends Car with CarMixin{
  Carxx(
      super.name,
      super.carsCount,
      );
  void sayCarxx(){
    print('printCarxx');
  }
}

void main(){
  Carxx carxx = Carxx('Carxx', 5);
  carxx.carsing();
}