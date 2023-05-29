<template>
  <modal-layout>
    <template v-slot:header>
      <h1>タイトル</h1>
    </template>
    <template v-slot:default>
      <p>コンテンツ 1</p>
      <p>コンテンツ 2</p>
    </template>
    <template v-slot:footer>
      <button type=“button”>閉める</button>
    </template>
    </modal-layout>
</template>