//Generic T = 変数, E = Listの値のタイプ, K = mapのkey V = mapのvalue
class Cache<T>{
  final T data;
  Cache({
    required this.data,
});
}

void main(){
  final cache = Cache<List<int>>(
    data: [1,2,3],
  );
  print(cache.data.reduce((value, element) => value + element)); //6
}