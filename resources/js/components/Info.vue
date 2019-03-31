<template>
  <div class="info">
    <div class="wrapper info__wrapper">
      <div class="info__col">
        <h2 class="info__title">{{page.title}}</h2>
        <div v-html="page.text"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Info',
  props: ['pageVal'],
  data() {
    return {
      page: this.pageVal
    }
  },
  watch: {
    pageVal: function (newVal) {
      this.page = newVal
    }
  }
}
</script>