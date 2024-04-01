<template>
  <aside class="raised-bnb" :class="{'has-raised':raised}">
    <img class="raised-bnb-image" src="/images/raised-kill.png" srcset="/images/raised-kill.png 1x, /images/raised-kill.png 2x" alt="Scan DeFi Raised coin">
    <p class="raised-bnb-text">{{raised}} BNB</p>
  </aside>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        raised: null,
      };
    },

    computed: {},

    methods: {
      init() {
        this.getRaisedBnb();
      },
      getRaisedBnb() {
        axios.get(`/api/bsc/balance-bnb/${this.$root.scan.addresses.marketing}`).then(response => {
          this.raised = this.$root.formatDecimals(response.data.result, 18);
        });
      }
    },

    mounted() {
      this.init();
    }
};
</script>
