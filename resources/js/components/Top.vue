<template>
  <header class="header main-header page-header" v-bind:class="hClass">
    <div class="wrapper ">
      <div class="header__wrapper">
        <router-link to="/" class="header__logo">
          <img src="/img/logo.png" alt="Logo">
        </router-link>
        <button class="open">Open</button>
        <div class="header__block">
          <ul class="header__tels">
            <li class="header__tels-item"><a href="#" class="header__tels-link">(067) 580 60 60</a></li>
            <li class="header__tels-item"><a href="#" class="header__tels-link">(063) 580 60 60</a></li>
            <li class="header__tels-item"><a href="#" class="header__tels-link">(050) 580 60 60</a></li>
            <a href="#callFrom" class="navigation__hidden button">Заказать звонок</a>
          </ul>
          <nav class="header__navigation">
            <router-link to="/" exact class="navigation__item" active-class="navigation__item--active">Главная</router-link>
            <router-link to="/avtopark-gruzovoe-taksi" class="navigation__item" active-class="navigation__item--active">Автопарк</router-link>
            <router-link to="/about-us" class="navigation__item" active-class="navigation__item--active">О нас</router-link>
            <router-link to="/otzyvy-gruzoperevozka-kiev" class="navigation__item" active-class="navigation__item--active">Отзывы</router-link>
            <router-link to="/sovety-po-gruzoperevozkam" class="navigation__item" active-class="navigation__item--active">Советы</router-link>
            <a href="#callFrom" class="navigation__call button button-white">Заказать звонок</a>
          </nav>
        </div>
      </div>

      <ul class="main__nav">
        <li class="main__nav-item"><a href="#" class="main__nav-link main__nav--active only-mobile">Грузоперевозки</a></li>
        <div class="mobile_wrap">
          <li class="main__nav-item nav-link"><router-link to="/" exact class="main__nav-link close-main-menu" active-class="main__nav--active">Грузоперевозки</router-link></li>
          <li v-for="item in pages" class="main__nav-item nav-link">
            <router-link :to="'/'+item.slug" exact class="main__nav-link close-main-menu" active-class="main__nav--active">{{item.title}}</router-link>
          </li>
        </div>
      </ul>

    </div>
  </header>
</template>

<script>

  export default {
    name: 'Top',
    props: ['menuPages', 'headerClass'],
    data() {
      return {
        pages: this.menuPages,
        hClass: this.headerClass
      }
    },
    watch: {
      menuPages: function (newVal) {
        this.pages = newVal
      },
      headerClass: function (newVal) {
        this.hClass = newVal
      }
    }
  }
</script>

<style scoped lang=scss>
  @media(min-width: 1151px){
    .only-mobile {display: none;}
  }
</style>