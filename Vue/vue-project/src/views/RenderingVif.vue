<!--説明ー <h1 v-show="bShow">bshow ==true > 現在のブロックが見える</h1> 
vshow,vifの差は一応vshowはblockが作られる、しかしvifの場合は条件を見てblcokが作れられる。１１５ページ参考-->
<template>
    <div>
        <h1 v-if="type=='A'">A</h1>
        <h1 v-else-if="type=='B'">B</h1>
        <h1 v-else>C</h1>
    </div>
</template>
<script>
export default {
data() {
  return {
    type:'A'
  };
}
}
</script>