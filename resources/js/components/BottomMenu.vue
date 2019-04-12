<template>
  <div class="under-footer">
    <div class="under-footer__wrapper wrapper">
      <router-link to="/" class="under-footer__logo">Crown Cars</router-link>
      <nav class="under-footer__nav">
        <router-link to="/" exact class="under-footer__link">Грузоперевозки</router-link>
        <template v-for="item in pages">
          <router-link :to="'/'+item.slug" exact class="under-footer__link">{{item.title}}</router-link>
        </template>
        <div class="footer__hidden">
          <router-link to="/" class="footer__hidden-link" active-class="footer__hidden--active">Главная</router-link>

          <router-link to="/" exact class="footer__hidden-link" active-class="footer__hidden--active">Грузоперевозки</router-link>
          <template v-for="item in pages">
            <router-link :to="'/'+item.slug" exact class="footer__hidden-link" active-class="footer__hidden--active">{{item.title}}</router-link>
          </template>

          <router-link to="/avtopark" class="footer__hidden-link" active-class="footer__hidden--active">Автопарк</router-link>
          <router-link to="/about-us" class="footer__hidden-link" active-class="footer__hidden--active">О нас</router-link>
          <router-link to="/reviews" class="footer__hidden-link" active-class="footer__hidden--active">Отзывы</router-link>
          <router-link to="/tips" class="footer__hidden-link" active-class="footer__hidden--active">Советы</router-link>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'BottomMenu',
    props: ['menuPages'],
    data() {
      return {
        pages: this.menuPages
      }
    },
    watch: {
      menuPages: function (newVal) {
        this.pages = newVal
      }
    }
  }
</script>