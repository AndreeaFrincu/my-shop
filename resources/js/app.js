import Vue from "vue"
import VueMaterial from 'vue-material'
import App from './App.vue';
import router from './router'
import store from './store'

window.Vue = require('vue');

Vue.use(VueMaterial)

const app = new Vue({
    el: '#app',
    store,
    router,
    components: {App},
    render: h => h(App)
});
