
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 // Router
 var VueRouter = require('vue-router');
 Vue.use(VueRouter);

 // Vuex
 import store from './store/index'


 import Sidebar from './components/Sidebar.vue';
 import Navbar from './components/Navbar.vue';
 import Home from './components/Home.vue';
 import Profile from './components/Profile.vue';
 import MainCalculator from './components/MainCalculator.vue';


const routes = [
{ path: '/', components: {
  default: Home,
  sidebar: Sidebar,
  navbar: Navbar,
} },

{ path: '/calculator', components: {
  default: MainCalculator,
  sidebar: Sidebar,
  navbar: Navbar,
} },

{ path: '/profile', components: {
  default: Profile,
  sidebar: Sidebar,
  navbar: Navbar,
} }
]

const router = new VueRouter({
  routes // short for routes: routes
})

const app = new Vue({
  router,
  store
}).$mount('#app')

