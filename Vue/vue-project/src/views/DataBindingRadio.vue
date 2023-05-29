<template>
<div>
  <label><input type="radio" v-bind:value="radioValue1" v-model="picked"> 東京</label>
  <label><input type="radio" v-bind:value="radioValue2" v-model="picked"> 大阪</label>
  <label><input type="radio" v-bind:value="radioValue3" v-model="picked"> 沖縄</label>
  <br>
  <span>選択した地域: {{ picked }}</span>
</div>
</template>
<script>
export default {
data() {
  return {
    picked: '',
    radioValue1: '東京',
    radioValue2: '大阪',
    radioValue3: '沖縄',
  };
}
}
</script>