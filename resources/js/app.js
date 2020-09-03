
import './bootstrap'
import Vue from 'vue'
//==== ビューティファイ関連
// import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css';
// Vue.use(Vuetify);


//いいねボタン
import ArticleLike from './components/ArticleLike'
// フォローボタン
import FollowButton from './components/FollowButton'
//フォーム
import MyInput from './components/MyInput'
// sample
import ExampleComponent from './components/ExampleComponent'


const app = new Vue({
  el: '#app',
  // ビューティファイ用
  // vuetify: new Vuetify(),
  components: {
    ExampleComponent,
    ArticleLike,
    FollowButton,
    MyInput
  }
})






// require('./bootstrap');

// window.Vue = require('vue');


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// const app = new Vue({
//     el: '#app',
// });
