import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import mixins from './mixins'

//createApp(App).use(router).mount('#app')//説明ーView,Data,Codeのset
const app = createApp(App)
app.use(router)
app.mixin(mixins);
app.mount('#app')