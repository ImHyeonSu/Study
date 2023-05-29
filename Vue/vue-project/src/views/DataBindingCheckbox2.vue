<template>
    <div>
        <label><input type="checkbox" v-model="checked" value="東京">東京</label>
        <label><input type="checkbox" v-model="checked" value="大阪">大阪</label>
        <label><input type="checkbox" v-model="checked" value="沖縄">沖縄</label>
        <br>
        <span>checkした地域:{{checked}}</span>
    </div>
</template>
<script>
export default{ 
    data(){
        return{
            checked: []
        };
    }
}
</script>