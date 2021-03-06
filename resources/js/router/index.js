import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Home from '@/views/Home'
import Avtopark from '@/views/Avtopark'
import About from '@/views/About'
import Reviews from '@/views/Reviews'
import Tips from '@/views/Tips'
import Tip from '@/views/Tip'
import Bus from '@/views/Bus'
import Page from '@/views/Page'
import ErrorPage from '@/views/ErrorPage'

const routes = [

  {path: '/', name: 'Home', component: Home},
  {path: '/404', name: '404', component: ErrorPage},
  {path: '/avtopark-gruzovoe-taksi', name: 'Avtopark', component: Avtopark},
  {path: '/kompaniya-gruzoperevozki-kiev', name: 'About', component: About},
  {path: '/otzyvy-gruzoperevozka-kiev', name: 'Reviews', component: Reviews},
  {path: '/sovety-po-gruzoperevozkam/:slug', name: 'Tip', component: Tip, props: true},
  {path: '/sovety-po-gruzoperevozkam', name: 'Tips', component: Tips},
  {path: '/avtopark-gruzovoe-taksi/:slug', name: 'Bus', component: Bus, props: true},
  {path: '/:slug', name: 'Page', component: Page, props: true},

  { path: '*', redirect: '/404', hidden: true }
]

export default new Router({
  mode: 'history',
  routes: routes,
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  }
})


