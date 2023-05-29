<template>
    <button type="button" @click="childFunc" ref="btn">子componentデータ変更</button>
</template>
<script>
    export default{
        data() {
            return {
                msg: 'メッセージ'
            };
        },
        methods:{
            childFunc(){
                this.msg = "変更されたメッセージ";
            }
        }
    }
</script>