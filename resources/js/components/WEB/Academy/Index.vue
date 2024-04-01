<template>
  <section class="scan-academy-index-component">
    <section class="web-courses-index-banner">
      <web-academy-navbar></web-academy-navbar>
      
      <div class="banner-container">
        <div class="banner-text">{{trans('academy.banner_text')}}</div>
      </div>

      <web-academy-whitepapers></web-academy-whitepapers>
    </section>

    <web-courses-index></web-courses-index>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    watch: {},

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
