<template>
    <button type = "button" @click="childFunc" ref="btn">click</button>
</template>
<script>
    export default{
        methods: {
            childFunc(){
                console.log('親componentからのイベント');
            }
        }
    }
</script>