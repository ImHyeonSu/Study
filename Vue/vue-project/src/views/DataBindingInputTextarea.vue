<template>
    <div>
        <textarea v-model = "message" />
    </div>
</template>
<script>
export default{ 
    data(){
        return{
            valueModel: "textarea"
        };
    }
}
</script>