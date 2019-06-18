<template>
  <div id="app">

    <top-home v-if="home" :menuPages="menuPages" :titleService="titleService" :priceService="priceService"></top-home>
    <top v-else :menuPages="menuPages" :headerClass="headerClass"></top>

    <router-view></router-view>

    <bottom :menuPages="menuPages"></bottom>
    <bottom-menu :menuPages="menuPages"></bottom-menu>
    
  </div>
</template>

<script>
import axios from 'axios';
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
      home: false,
      headerClass: false,
      menuPages: [],
      titleService: false,
      priceService: false,
    }
  },
  created: function() {
    axios.get('/api/services')
      .then(
        (response) => {
          this.menuPages = response.data;
        }
      )
      .catch(
        (error) => console.log(error)
      );
  },
}
</script>
