<!--<h2>Page Title</h2>-->
<!-- 子components -->
<template>
    <h2>{{title}}</h2>
</template>
<script>
export default {
    props:{
        title:{
            type: String,
            default: "ページです。"//説明ー親componentからデータをもらえなかったときdafault値を使う
        }
    }
}
</script>