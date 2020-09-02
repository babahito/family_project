
import './bootstrap'
import Vue from 'vue'
//いいねボタン
import ArticleLike from './components/ArticleLike'
// フォローボタン
import FollowButton from './components/FollowButton'
//フォーム
import MyInput from './components/MyInput'

import ExampleComponent from './components/ExampleComponent'


const app = new Vue({
  el: '#app',
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
