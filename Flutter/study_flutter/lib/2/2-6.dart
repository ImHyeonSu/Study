class Counter{
  static int i= 0;
  Counter(){
    i++;
    print(i++);
  }
}

void main() {
  Counter count1 = Counter(); //1
  Counter count2 = Counter(); //2
  Counter count3 = Counter(); //3
}
