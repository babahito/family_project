

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

  data: {
   todos: [] //←TODO を格納するための配列を用意
 },
 methods: {
   fetchTodos: function(){ //←axios.get で TODO リストを取得しています
     axios.get('/api/get').then((res)=>{
       this.todos = res.data //← 取得した TODO リストを todos に格納
     })
   }
 },
 created() { //← インスタンス生成時に fetchTodos()を実行したいので、created フックに登録します。
   this.fetchTodos()
 },
 });
