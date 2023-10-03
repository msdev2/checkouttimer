require('./bootstrap.js')
import { createApp, defineAsyncComponent } from 'vue';
import router from "./route"
import store from './store'
import App from '../views/App.vue'
import helper from './helper'

window.apps = createApp(App);
const Layout = defineAsyncComponent(() => import('../views/components/Layout'))

// apps.config.globalProperties.globals = JSON.parse(atob(window.GLOBAL))
apps.use(store)
.use(router)
.component("Layout", Layout)
.mixin(helper)

// console.log(apps.config)
// console.log = console.warn= function () {};
// await router.isReady()

apps.mount('#app')