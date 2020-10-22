
import './bootstrap'
import Vue from 'vue'

//いいねボタン
import ArticleLike from './components/ArticleLike'
// 家族参加ボタン
import KazokuLike from './components/KazokuLike'
// フォローボタン
import FollowButton from './components/FollowButton'
//フォーム
import MyInput from './components/MyInput'
// sample
import ExampleComponent from './components/ExampleComponent'



const app = new Vue({
  el: '#app',
  components: {
    ExampleComponent,
    ArticleLike,
    KazokuLike,
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
