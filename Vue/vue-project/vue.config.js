const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
})
//説明ー、本78ページーLazy loadでいうウェブに接続したとき必要な時ウェブの情報を受け入れる機能だけど
//Lazy load - prefetchの場合はダウンロードして間違えて使うようになる時もある、
//それを削除するための以下のコードを使う
module.exports = {
  chainWebpack: config =>{
    config.plugins.delete('prefetch');//prefetch削除、
  }
}
// const target = 'http:127.0.0.1:3000';
// module.exports = {
//   devServer: {
//     port: 8000,
//     proxy: {
//       '^/api': {
//         target,
//         changeOrigin: true
//       }
//     }
//   }
// }