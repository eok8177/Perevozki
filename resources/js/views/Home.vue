<template>
  <div>
    <info/>
    <advantages/>
    <reviews/>
  </div>
</template>

<script>

import Top from '@/components/TopHome'
import Info from '@/components/home/Info'
import Advantages from '@/components/home/Advantages'
import Reviews from '@/components/home/Reviews'

export default {
  name: 'Home',
  components: {
    Top,
    Info,
    Advantages,
    Reviews
  },
  created() {this.$parent.home = true;},
  mounted() {this.$parent.home = true},
  destroyed() {this.$parent.home = false}
}
</script>