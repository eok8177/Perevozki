<template>
  <div>
    <info :pageVal="pageVal"></info>
    <advantages></advantages>
    <reviews :homeReviews="reviews"></reviews>
  </div>
</template>

<script>
import axios from 'axios';
import Top from '@/components/TopHome'
import Info from '@/components/Info'
import Advantages from '@/components/home/Advantages'
import Reviews from '@/components/home/Reviews'

export default {
  name: 'Page',
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
        pageVal: [],
        reviews: [
          {name:'Джон Сноу',img:'img/review1.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
          {name:'Ванесса Парадиз',img:'img/review2.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
          {name:'Фокс Малдер',img:'img/review3.png',text:'Якщо, Вам потрібно перевезти великий обсяг вантажу і серед предметів є високі і довгі елементи, то цей тариф буде найоптимальнішим.'},
        ]
    }
  },
  methods: {
    getContent (slug) {
      axios.get('/api/page/'+slug)
      .then(
        (response) => {
          this.pageVal = response.data;
        }
      )
      .catch(
        (error) => console.log(error)
      );
    }
  },
  created: function() {
    this.getContent(this.$route.params.slug);
  },

  beforeRouteUpdate (to, from, next) {
    this.getContent(to.params.slug);
    next();
  }
}
</script>