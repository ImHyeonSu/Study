<!-- 説明ー121ページ参考 -->
<template>
    <h1>Full Name : {{fullName}}</h1>
</template>
<script>
export default {
    data() {
        return{
            firstName : 'Hyeonsu',
            lastName : 'Im'
        };
    },
    computed: {
        fullName(){
            return this.firstName + ' ' + this.lastName;
        }
    }
}
</script>