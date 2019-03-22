<template>
  <main class="main tip">
    <div class="tip__wrapper wrapper">
      <div class="tip__content">
        <div class="tip__content-head">
          <a href="#" @click="goBack" class="tip__content-btn">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
              d="M16 7H3.8L9.4 1.4L8 0L0 8L8 16L9.4 14.6L3.8 9H16V7Z" fill="black"/>
            </svg>
          </a>
          <h1 class="tip__title">{{tip.title}}</h1>
        </div>
        <div class="tip__img">
          <img :src="tip.img" :alt="tip.title">
        </div>
        <div class="tip__text"><span v-html="tip.text"></span></div>

      </div>
      <aside class="tip__sidebar">
        <div class="tip__sidebar-block">
          <h3 class="tip__sidebar-title">Советы</h3>
          <a href="#" class="tip__sidebar-link">Все советы</a>
          <a href="#" class="tip__sidebar-link">Квартирный переезд без проблем</a>
          <a href="#" class="tip__sidebar-link">Как подобрать автомобиль для переезда</a>
          <a href="#" class="tip__sidebar-link">Стоимость услуг</a>
          <a href="#" class="tip__sidebar-link">Квартирный переезд без проблем</a>
          <a href="#" class="tip__sidebar-link">Как подобрать автомобиль для переезда</a>
          <a href="#" class="tip__sidebar-link">Как подобрать автомобиль для переезда</a>
        </div>
        <div class="tip__sidebar-block">
          <h3 class="tip__sidebar-title">Архив</h3>
          <a href="#" class="tip__sidebar-link">2018</a>
          <a href="#" class="tip__sidebar-link">2017</a>
        </div>
      </aside>
    </div>
    <div class="tip__bottom wrapper">
      <h3 class="tip__bottom-title">Вам будет интересно</h3>
      <div class="tip__bottom-articles">
        <div class="tip__bottom-item tip__bottom--1">
          <h3 class="bottom-item__title">Стоимость услуг</h3>
          <p class="bottom-item__text">Стоимость услуг по перевозке – один из важнейших параметров для наших
            клиентов,
          и в этом нам нет равных.</p>
          <router-link :to="{ name: 'Tip', params: { id: 0 }}" class="button">Читать</router-link>
        </div>
        <div class="tip__bottom-item tip__bottom--2">
          <h3 class="bottom-item__title">Стоимость услуг</h3>
          <p class="bottom-item__text">Стоимость услуг по перевозке – один из важнейших параметров для наших
            клиентов,
          и в этом нам нет равных.</p>
          <router-link :to="{ name: 'Tip', params: { id: 1 }}" class="button">Читать</router-link>
        </div>
      </div>

    </div>
  </main>
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'Tip',
    data() {
      return {
        tip: []
      }
    },
    methods: {
      goBack () {
        window.history.length > 1
        ? this.$router.go(-1)
        : this.$router.push('/tips')
      },
      getContent (id) {
        axios.get('/api/tip/'+id)
        .then(
          (response) => {
            this.tip = response.data;
          }
        )
        .catch(
          (error) => console.log(error)
        );
      }
    },
    created: function() {
      this.getContent(this.$route.params.id);
    },

    beforeRouteUpdate (to, from, next) {
      this.getContent(to.params.id);
      next();
    }
  }
</script>