require('./bootstrap');

import Vue from 'vue';
// vuetyfy用
import Vuetify from 'vuetify';
import '@mdi/font/css/materialdesignicons.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import 'vuetify/dist/vuetify.min.css';
// vue-rooter用
import VueRouter from 'vue-router';
import router from './router'


window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuetify);

// バリテーション
Vue.use(window.vuelidate.default);
const {required, email} = window.validators;

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify()
});;

