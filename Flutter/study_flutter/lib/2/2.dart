class Car{
  String name = "ベンツ";
  //コンストラクタのための変数はfinalで設定
  final String name2;
  //コンストラクタ宣言
  Car(String name2) : this.name2 = name2; // or Car(this.name2);
  //method
  void sayName(){

    print("これは　${this.name}です。");
    //thisを一回同じ関数で使ったら次からはthisをつけなくてもいい。
    print("$nameです。");

    print("新しい車${this.name2}です、");
  }
}

void main(){
  Car foxy = Car("foxy");
  foxy.sayName();

}