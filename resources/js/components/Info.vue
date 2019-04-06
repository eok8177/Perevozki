<template>
  <div class="info">
    <div class="wrapper info__wrapper" v-html="page.description">
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