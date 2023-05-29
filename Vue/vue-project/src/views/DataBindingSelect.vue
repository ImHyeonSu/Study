<template>
    <div>
        <select v-model = "city">
            <option value="02">東京</option>
            <option value="03">大阪</option>
            <option value="04">沖縄</option>
        </select>
    </div>
</template>
<script>
export default{ 
    data(){
        return{
            city: "02"
        };
    }
}
</script>