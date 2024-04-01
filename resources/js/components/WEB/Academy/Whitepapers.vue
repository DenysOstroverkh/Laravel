<template>
  <nav class="web-academy-navbar-component web-academy-whitepapers-component">
    <div class="wan-container">
      <a class="wan-item" href="/downloads/academy/whitepapers/academy-whitepaper-es.docx" download>Whitepaper ES</a>
      <a class="wan-item" href="/downloads/academy/whitepapers/academy-whitepaper-en.docx" download>Whitepaper EN</a>
      <a class="wan-item" href="/downloads/academy/whitepapers/academy-whitepaper-pl.docx" download>Whitepaper PL</a>
      <a class="wan-item" href="/downloads/academy/whitepapers/academy-whitepaper-cn.docx" download>Whitepaper CN</a>
    </div>
  </nav>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    watch: {
      data: {
        immediate: true,
        deep: true,
        handler(val, oldVal) {
          //do something
        }
      },
    },

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
