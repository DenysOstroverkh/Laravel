<template>
  <section class="scan-language-component">
    <img class="scan-language-image" :src="`/images/flags/${language.flag}_1x1.svg`" :alt="`${language.name} SCAN DeFi`">
    <span class="scan-language-name">{{language.name}}</span>
  </section>
</template>

<script>
  export default {
    props: {
      language: {
        type: Object,
        required: true,
        default: null,
      },
    },

    data() {
      return {}
    },

    watch: {},

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
