<template>
  <div id="app">

    <top-home v-if="home"></top-home>
    <top v-else></top>

    <router-view></router-view>

    <bottom/>
    <bottom-menu/>
    
  </div>
</template>

<script>

import TopHome from '@/components/TopHome'
import Top from '@/components/Top'
import Bottom from '@/components/Bottom'
import BottomMenu from '@/components/BottomMenu'

export default {
  name: 'App',
  components: {
    TopHome,
    Top,
    Bottom,
    BottomMenu
  },
  data() {
    return {
        home: false
    }
  }
}
</script>
