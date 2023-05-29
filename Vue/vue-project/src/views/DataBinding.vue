<!--説明ー modelからデータ定義後Viewと連結した後、model or viewが変更があったらほかのところにも変更が適用される -->
<!--<templeate><h1>Hello, {{title}}</h1><templeate> return  //title: 'World'-->
<template>
    <div>
        <div>{{htmlString}}</div><!-- その通り出力 -->
        <div v-html="htmlString"></div><!-- This is a red Stringが出力 -->
    </div>
</template>
<script>
export default{ 
    data(){
        return{
            htmlString: '<p style="color:red;">This is a red String.</p>'
        };
    }
}
</script>