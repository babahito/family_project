import Router from 'vue-router'
import NotFound from './components/NotFound.vue'
import Home from './components/Home.vue'
// import Top from './components/shop/Top.vue'
import About from './components/shop/About.vue'
import User from './components/shop/User.vue'
import UserDetail from './components/shop/UserDetail.vue'
import UserEdit from './components/shop/UserEdit.vue'
import UserCreate from './components/shop/UserCreate.vue'

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
      {
        path:'*',
        component:NotFound
      },
      {
        path: '/shop/home',
        name: 'shop/home',
        component: Home
      },
      // {
      //   path: '/shop/top',
      //   name: 'shop/top',
      //   component: Top
      // },
      {
        path: '/shop/about',
        name: 'shop/about',
        component: About
      },
      {
        path: '/shop/user/create',
        name: 'user_create',
        component: UserCreate
      },
      {
        path: '/shop/user',
        name: 'user',
        component: User
      },
      {
        path: '/shop/user/:id',
        name: 'user_detail',
        component: UserDetail
      },
      {
        path: '/shop/user/:id/edit',
        name: 'user_edit',
        component: UserEdit
      },

    ]
  });
