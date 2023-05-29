<template>
    <button type = "button" @click="callFromParent" ref="btn">click</button>
</template>
<script>
    export default{
        methods: {
            callFromParent(){
                console.log('親componentからのイベント2');
            }
        }
    }
</script>