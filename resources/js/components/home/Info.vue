<template>
  <div class="info">
    <div class="wrapper info__wrapper" v-html="page.description"></div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Info',
  data() {
    return {
        page: {
          j_data: {
            price: []
          }
        }
    }
  },
  metaInfo() {
    return {
      title: this.page.meta_title,
      meta: [
        { vmid: 'keywords', name: 'keywords', content: this.page.meta_keywords},
        { vmid: 'description', name: 'description', content: this.page.meta_description},
        { vmid: 'og:title', property: 'og:title', content: this.page.og_title},
        { vmid: 'og:description', property: 'og:description', content: this.page.og_description}
      ]
    }
  },
  created() {
    axios.get('/api/page/home')
    .then(
      (response) => {
        this.page = response.data;
        this.$parent.$parent.titleService = this.page.title;
        this.$parent.$parent.priceService = this.page.j_data.price.value;
      }
    )
    .catch(
      (error) => console.log(error)
    );
  }
}
</script>


