<template>
  <section class="scan-swap-token" @click.prevent="select">
    <span class="sssb-logo">
      <!-- <img :src="token.logo"> -->
      <img v-show="logoerror === false" class="searched-token-card-logo" :src="token.logo" @error="logoerror = true" @load="logoerror = false">
      <span v-show="logoerror === true" class="searched-token-image-missing">?</span>
    </span>
    <span class="sssb-symbol">{{token.symbol}}</span>
    <span class="sssb-verified"></span>
  </section>
</template>

<script>
  export default {
    props: {
      token: {
        type: Object,
        required: true,
      }
    },

    data() {
      return {
        logoerror: null,
      }
    },

    computed: {},

    methods: {
      select() {
        this.$emit('selected', this.token);
      },
    },

    mounted() {}
  }
</script>
