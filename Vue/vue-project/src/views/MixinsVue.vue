<template>
  <div></div>
</template>

<script>
import ApiMixin from '../api.js';
export default {
  mixins: [ApiMixin], //使うmixinファイルを配列登録
  data() {
    return {
      productList: []
    };
  },
  async mounted() {
    this.productList = await this.$callAPI("https://b7e6da73-b857-48c2-9488-9ae98eb12089.mock.pstmn.io/list","get");
    console.log(this.productList);
  }
}
</script>