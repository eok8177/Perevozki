import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Home from '@/views/Home'
import Avtopark from '@/views/Avtopark'
import About from '@/views/About'
import Reviews from '@/views/Reviews'
import Tips from '@/views/Tips'
import Tip from '@/views/Tip'

const routes = [

  {path: '/', name: 'Home', component: Home},
  {path: '/avtopark', name: 'Avtopark', component: Avtopark},
  {path: '/about-us', name: 'About', component: About},
  {path: '/reviews', name: 'Reviews', component: Reviews},
  {path: '/tips', name: 'Tips', component: Tips},
  {path: '/tip', name: 'Tip', component: Tip},

  { path: '*', redirect: '/404', hidden: true }
]

export default new Router({
  mode: 'history',
  routes: routes
})

