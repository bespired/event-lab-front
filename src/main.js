import { createApp } from 'vue'
import App   from './App.vue'
import store from './stores/store.js'

// import './vite.scss'
import './style.scss'

createApp(App)
	.use(store)
	.mount('#app')
