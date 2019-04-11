<template>
  <div>
    <info/>
    <advantages/>
    <reviews v-bind:homeReviews="reviews"></reviews>
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
  created() {this.$parent.home = true},
  mounted() {this.$parent.home = true},
  destroyed() {this.$parent.home = false},
  data() {
    return {
        reviews: [
          {name:'Джон Сноу',img:'img/review1.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
          {name:'Ванесса Парадиз',img:'img/review2.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
          {name:'Фокс Малдер',img:'img/review3.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
        ]
    }
  },
  metaInfo() {
    return {
      title: 'Korona',
      meta: [
        { vmid: 'keywords', name: 'keywords', content: 'Korona'},
        { vmid: 'description', name: 'description', content: 'Korona'},
        { vmid: 'og:title', property: 'og:title', content: 'Korona'},
        { vmid: 'og:description', property: 'og:description', content: 'Korona'}
      ]
    }
  },
}
</script>