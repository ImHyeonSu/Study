<!-- 説明ー変更があれば見える-->
<template>
    <h1>Full Name : {{fullName}}</h1>
    <button type="button" @click="changeName">変更</button>
</template>
<script>
export default {
    data() {
        return{
            firstName: 'HyeonSu',
            lastName: 'Im',
            fullName: ''
        };
    },
    watch: {
        firstName(){
            this.fullName = this.firstName + ' ' + this.lastName;
        },
        lastName(){
            this.fullName = this.firstName + ' ' + this.lastName;
        }
    },
    methods: {
        changeName(){
            this.firstName = 'ヒョンス';
        }
    }
}
</script>