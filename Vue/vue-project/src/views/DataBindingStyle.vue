<!--<div v-bind:style="styleObject">インラインスタイル</div> 
    styleObject:{
        color:'red',
        fontSize:'13px'
    }-->
<template>
    <div v-bind:style="[baseStyle, addStyle]">インラインスタイル</div>
</template>
<script>
export default {
data() {
  return {
    baseStyle:'background-color:yellow;width:100%;height:200px;',
    addStyle: 'color:redl;font-weight:bold;'
  };
}
}
</script>