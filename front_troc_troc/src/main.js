import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import apiService from './service/api.js'

loadFonts()

const app = createApp(App)

app.use(router)
    .use(vuetify)
app.config.globalProperties.$api = apiService
app.mount('#app')
