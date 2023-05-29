<template>
    <h1>{{msg}}</h1>
</template>
<script>
    export default{
        data() {
            return {
                msg: '子componentから送るメッセージ'
            };
        },
        mounted(){
            this.$emit('send-message', this.msg)
        }
    }
</script>