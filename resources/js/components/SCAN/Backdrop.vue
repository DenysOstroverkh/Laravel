<template>
  <aside class="scan-backdrop-component" :style="{zIndex:zIndex}"></aside>
</template>

<script>
  export default {
    props: {
      zIndex: {
        type: Number,
        required: false,
        default: 9,
      } 
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

<style scoped>
  .scan-backdrop-component{
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    backdrop-filter: blur(2px);
    background: rgba(0,0,0,0.4);
  }
</style>