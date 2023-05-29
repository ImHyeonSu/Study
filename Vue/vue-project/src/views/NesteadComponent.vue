<!-- 親components、156~159ページ参考！！必須 -->
<template>
    <div>
        <PageTitle title="渡すデータ"/> <!-- 説明ーcomponent tag 作り -->
    </div>
</template>
<script>
import PageTitle from '../components/PageTitle';//component import
export default {
  components: {PageTitle} //component 登録
}
</script>