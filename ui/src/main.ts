import './assets/main.css'

import "reflect-metadata";
import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './core/router'
import { DataModule } from './data/data.module'

const app = createApp(App)

app.use(createPinia())
app.use(router)

DataModule()

app.mount('#app')
