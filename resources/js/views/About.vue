<template>
  <main class="main about">
      <div class="about__block">
          <div class="wrapper about__wrapper" v-html="page.j_data.value"></div>
      </div>
      <div class="wrapper about__wrapper about__info about__mobile" v-html="page.description"></div>

  </main>
</template>

<script>
import axios from 'axios';
export default {
  name: 'About',
  data() {
    return {
      page: {
        description: null,
        j_data: {
          value: null
        }
      }
    }
  },
  created: function() {
    axios.get('/api/page/o-nas')
      .then(
        (response) => {
          this.page = response.data;
        }
      )
      .catch(
        (error) => console.log(error)
      );
  },
}
</script>