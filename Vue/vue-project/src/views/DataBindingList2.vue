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
    productList: []
  };
},
created(){
    this.getList();
},
methods:{
    async getList(){
        this.productList = await this.$api("https://b7e6da73-b857-48c2-9488-9ae98eb12089.mock.pstmn.io/list","get");
    }
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