<template>
  <footer ref="footer" class="scan-footer">
    <div class="scan-footer-content">
      <div class="scan-footer-content-text">
        <div class="scan-footer-image">
          <img src="/images/index/png/logoscan@2x.png" srcset="/images/index/png/logoscan@2x.png 1x, /images/index/png/logoscan@2x.png 2x" alt="Kill Gates logo" />
        </div>
        <p class="has-text-white">{{trans('basic.motto')}}</p>
      </div>
      <div class="scan-footer-content-areas">
        <div class="scan-footer-content-areas-items">
          <router-link class="has-text-white" to="/scanner">{{trans('basic.scanner')}}</router-link>
          <router-link class="has-text-white" to="/">{{trans('basic.blacklist')}}</router-link>
          <router-link class="has-text-white" to="/battle">{{trans('basic.battle')}}</router-link>
        </div>
        <div class="scan-footer-content-areas-items">
          <router-link class="has-text-white" to="/swap">{{trans('basic.swap')}}</router-link>
          <router-link class="has-text-white" to="/staking">{{trans('basic.staking')}}</router-link>
          <router-link class="has-text-white" to="/farming">{{trans('basic.farming')}}</router-link>
        </div>
        <div class="scan-footer-content-areas-items">
          <router-link class="has-text-white" to="/accademy">{{trans('basic.academy')}}</router-link>
          <router-link class="has-text-white" to="/rewards">{{choice('basic.reward', 2)}}</router-link>
          <router-link class="has-text-white" to="/voting-zone">{{trans('basic.voting_zone')}}</router-link>
          <router-link class="has-text-white" to="/alerts">{{choice('basic.alert', 2)}}</router-link>
        </div>
        <div class="scan-footer-content-areas-items">
          <router-link class="has-text-white" to="/games">{{choice('basic.game', 2)}}</router-link>
          <router-link class="has-text-white" to="/nft">{{trans('basic.nft')}}</router-link>
          <router-link class="has-text-white" to="/marketplace">{{trans('basic.marketplace')}}</router-link>
        </div>
        <div class="scan-footer-content-areas-items">
          <router-link class="has-text-white" to="/scan-defi">{{trans('basic.scan_token')}}</router-link>
          <a class="has-text-white" target="_blank" href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0">{{trans('basic.community')}}</a>
          <router-link class="has-text-white" to="/partners">{{choice('basic.partner', 2)}}</router-link>
        </div>
      </div>
      <div class="scan-footer-content-rrss">
        <div class="scan-footer-rrss-icon">
          <a href="https://www.coingecko.com/es/monedas/scan-defi" target="_blank">
            <img class="scan-image-rrss" src="/images/partners/logos/coingecko.png" alt="Scan DeFi Coingecko">
          </a>
        </div>
        <div class="scan-footer-rrss-icon">
          <a href="https://coinmarketcap.com/currencies/scan-defi/" target="_blank">
            <img class="scan-image-rrss" src="/images/partners/logos/coinmarketcap-round.png" alt="Scan DeFi CMC">
          </a>
        </div>
        <div class="scan-footer-rrss-icon">
          <a href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0" target="_blank">
            <img class="scan-image-rrss" src="/images/telegram.svg" srcset="/images/telegram.svg 1x, /images/telegram.svg 2x" alt="Scan DeFi Telegram">
          </a>
        </div>
        <div class="scan-footer-rrss-icon">
          <a href="https://twitter.com/ScanDefi" target="_blank">
            <img class="scan-image-rrss" src="/images/twitter.svg" srcset="/images/twitter.svg 1x, /images/twitter.svg 2x" alt="Scan DeFi Twitter">
          </a>
        </div>
        <div class="scan-footer-rrss-icon">
          <a href="https://www.instagram.com/scan_defi/" target="_blank">
            <img class="scan-image-rrss" src="/images/instagram.svg" srcset="/images/instagram.svg 1x, /images/instagram.svg 2x" alt="Scan DeFi Instagram">
          </a>
        </div>
      </div>
    </div>
    <div class="scan-footer-end">
      <p class="has-text-white">{{trans('basic.copyright', {year:new Date().getFullYear()})}}</p>
    </div>
  </footer>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    watch: {
      data: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          //do something
        }
      },
    },

    computed: {},

    methods: {
      resize() {
        let height = this.$refs.footer.clientHeight + 80; // footer margin-top
        document.querySelector('#app > .main-container').style.minHeight = `calc(100vh - ${height}px)`;
      },
    },

    mounted() {
      window.addEventListener('resize', this.resize());
      this.resize();
    }
  }
</script>
