<template>
  <section class="scan-modal-component scan-buy-modal-form-component">
    <div class="scan-modal">
      <header class="scan-modal-head">
        <span class="scan-modal-close" @click.prevent="$parent.close()"></span>
        <p class="scan-modal-title">{{trans('basic.buy').toUpperCase()}}</p>
      </header>
      <section class="scan-modal-body">
        <a :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" class="button is-medium is-dark is-inset is-fullwidth m-b-15" target="_blank">
          <span class="button-img"><img src="/images/partners/logos/pancakeswap-background.svg" alt="PancakeSwap logo Scan DeFi"></span>
          <span class="button-text">{{trans('navbar.buy_pancake')}}</span>
        </a>
        <a class="button is-medium is-dark is-inset is-fullwidth" @click.prevent="marketplace">
          <span class="button-img is-0-commission"><i class="fas fa-gift"></i></span>
          <span class="button-text">{{trans('navbar.no_commission')}}</span>
        </a>
      </section>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    computed: {},

    methods: {
      marketplace() {
        this.$parent.close();
        if(this.$route.name !== 'marketplace') this.$router.push({ name: 'marketplace' });
        else this.$parent.close();
      },
    },

    mounted() {}
  }
</script>
