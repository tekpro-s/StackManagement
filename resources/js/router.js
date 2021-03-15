// 1.
import Vue from 'vue'
import VueRouter from 'vue-router'
 
// 2.
import Example from './pages/Example.vue'
import Example2 from './pages/Example2.vue'

import Login from './view/Login.vue'
import SignUp from './view/SignUp.vue'
import Home from './view/Home.vue'
import store from "./store/index";
 
// 3.
Vue.use(VueRouter)
 
// 4.
const routes = [
  // {
  //   path: '/',
  //   component: Example
  // },
  // {
  //   path: '/example2',
  //   component: Example2
  // }
  {
  path: '/',
  name: 'login',
  component: Login
  },
  {
  path: '/signup',
  name: 'signup',
  component: SignUp
  },
  {
    path: "/home",
    name: "Home",
    component: Home,
    meta: {
      requiresAuth: true,
    },
  }
]
 
// 5.
const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  if (
    to.matched.some((record) => record.meta.requiresAuth) &&
    !store.state.auth
  ) {
    next({
      path: "/",
      query: {
        redirect: to.fullPath,
      },
    });
  } else {
    next();
  }
});
 
// 6.
export default router