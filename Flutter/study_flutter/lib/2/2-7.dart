class Car {
  final String name;
  final int membersCount;

  Car(this.name, this.membersCount);

  void sayName() {
    print('私は ${this.name}です。');
  }

  void sayMembersCount() {
    print('${this.name} メンバーは ${this.membersCount}名です。');
  }
}

void main() {
  //..を通じて連続で関数を使える。
  Car car= Car('Car', 4)
    ..sayName()
    ..sayMembersCount();
}
