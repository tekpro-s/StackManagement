import './bootstrap'
import Vue from 'vue'
import router from './router' // 追加 1.
import App from './App.vue'
import store from './store/index'
import HeaderAuth from './components/HeaderAuth'
import Login from './view/Login'
import SignUp from './view/SignUp'

const app = new Vue({
  el: '#app',
  router, // 追加 3.
  store, // 追加 3.
  components: {
    App
  }, // 追加 4.
  template: '<App />' // 追加 5.
  // router, // 追加 3.
  // components: {
  //   App,
  //   HeaderAuth,
  //   Login,
  //   SignUp
  // },
  // template: '<h1>Hello world</h1>'
  // template: '<App />' // 追加 5.
})