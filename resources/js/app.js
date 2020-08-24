
import './bootstrap'
import Vue from 'vue'
import ArticleLike from './components/ArticleLike'
// いいねボタン
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    FollowButton,
  }
})





// require('./bootstrap');

// window.Vue = require('vue');


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('follow-button', require('./components/FollowButton.vue').default);

// const app = new Vue({
//     el: '#app',
// });
