

require('./bootstrap');
window.Vue = require('vue');

// import './bootstrap'
// import Vue from 'vue'
// import ArticleLike from './components/ArticleLike'



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-like', require('./components/ArticleLike.vue').default);
// Vue.component('app-component', require('./components/AppComponent.vue').default);


const app = new Vue({
   el: '#app',
  //  components: {
  //    ArticleLike,
  //  }
 });
