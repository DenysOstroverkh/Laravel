<template>
  <article class="scan-how-presale-option" :class="[type]">
    <img class="img-top" src="/images/bnb.svg" srcset="/images/bnb.svg 1x, /images/bnb.svg 2x" :alt="`${coin} coin`">
    <img class="img-center" src="/images/arrows.svg" srcset="/images/arrows.svg 1x, /images/arrows.svg 2x" alt="Kill arrows">
    <img class="img-bottom is-hidden-mobile" src="/images/killmoneyleft.png" srcset="/images/killmoneyleft.png 1x, /images/killmoneyleft@2x.png 2x" alt="Scan DeFi money">
    <img class="img-bottom is-hidden-tablet" src="/images/killmoneyv.png" srcset="/images/killmoneyv.png 1x, /images/killmoneyv@2x.png 2x" alt="Scan DeFi money">
    <div class="scan-presale-left">
      <div class="scan-presale-coin">{{coin}}</div>
      <div class="scan-presale-price">{{coinqty}}</div>
    </div>
    <div class="scan-presale-right">
      <div class="scan-presale-coin">{{trans('basic.kill')}}</div>
      <div class="scan-presale-price">{{killqty}}</div>
    </div>
  </article>
</template>

<script>
  export default {
    props: ['type', 'coin', 'coinqty', 'killqty'],

    data() {
      return {};
    },

    computed: {},

    methods: {}
};
</script>
