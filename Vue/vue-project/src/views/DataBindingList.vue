<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th>品名</th>
                    <th>値段</th>
                    <th>カテゴリー</th>
                    <th>送品料</th>
                </tr>
            </thead>
            <tbody>
                <tr :key="i" v-for="(product,i) in productList">
                    <td>{{product.product_name}}</td>
                    <td>{{product.price}}</td>
                    <td>{{product.category}}</td>
                    <td>{{product.delivery_price}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
data() {
  return {
    productList:[
        {"product_name":"キーボード","price":2500,"category":"ノートパソコン/タブレット","delivery_price":500},
        {"product_name":"マウス","price":1200,"category":"ノートパソコン/タブレット","delivery_price":500},
        {"product_name":"アイパッド","price":72500,"category":"ノートパソコン/タブレット","delivery_price":500},
        {"product_name":"タブレットだい","price":3200,"category":"ノートパソコン/タブレット","delivery_price":500},
        {"product_name":"無線チャージ","price":4200,"category":"ノートパソコン/タブレット","delivery_price":500}
    ]
  };
}
}
</script>
<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>