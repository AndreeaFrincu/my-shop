import Vue from "vue"
import VueMaterial from 'vue-material'
import App from './App.vue';
import router from './router'
import store from './store'
import axios from "axios";
import lodash from 'lodash'
import VueLodash from 'vue-lodash'
import { Model } from "vue-api-query";

Model.$http = axios;

window.Vue = require('vue');

Vue.use(VueMaterial)
Vue.use(VueLodash, lodash)

const app = new Vue({
    el: '#app',
    store,
    router,
    components: {App},
    render: h => h(App)
});
