<template>
<select v-model="selectedValue" @change="changeSelect">
   <option value="東京">東京</option>
   <option value="大阪">大阪</option>
   <option value="沖縄">沖縄</option>
 </select>
</template>
<script>
export default {
 data() {
   return {
     selectedValue: ''
   };
  },
  methods: {
    changeSelect(){
      alert(this.selectedValue);
    }
  }
}
</script>