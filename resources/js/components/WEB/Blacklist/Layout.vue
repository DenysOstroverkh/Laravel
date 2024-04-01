<template>
  <section class="blacklist-component">
    <section class="blacklist-header">
      <scan-general-info @selected="selected"></scan-general-info>

      <div class="blacklist-info m-t-30">
        <div class="blacklist-info-text p-r-30">
          <p class="is-size-5">{{trans('basic.scan')}} {{trans('basic.blacklist')}}</p>
          <p>{{trans('blacklist.description')}}<!--  <a href="#" class="has-caret">More insights</a> --></p>
          <a class="button is-primary m-t-10" @click.prevent="report()">{{trans('blacklist.go_to_report')}}</a>
        </div>
        <div class="blacklist-info-carousel">
          <b-carousel
            :arrow="false"
            :repeat="true"
            :arrow-hover="false"
            :indicator="false"
            :pause-info="false"
            :icon-pack="'mdi'"
            :icon-prev="'chevron-left'"
            :icon-next="'chevron-right'"
            :icon-size="'is-small'">
            <!-- <b-carousel-item>
              <a :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/buy-scan-defi-token.png" srcset="/images/partners/banners/buy-scan-defi-token.png 1x, /images/partners/banners/buy-scan-defi-token@2x.png 2x" alt="Buy Scan DeFi token">
              </a>
            </b-carousel-item> -->
            <b-carousel-item>
              <a :href="`https://www.coingecko.com/es/monedas/scan-defi`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/coingecko.png" alt="Coingecko Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://coinmarketcap.com/currencies/scan-defi/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/coinmarketcap.png" alt="CoinMarketCap Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtu.be/qlBlPRFtxfs?t=491`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/healthy-pockets.png" alt="Healthy Pockets Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtu.be/lVj9lT44EHQ?t=496`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/buenos-dias-cripto.png" alt="Buenos días cripto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/watch?v=ZAe4RuCzDHU`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/levs.png" alt="Levs Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://linktr.ee/armycripto`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/army-cripto.png" alt="Army cripto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://trifasickotrading.com`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/trifasickos.png" alt="Trifasickos Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/cryptosmartglobal`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/ctypto-smart-global.png" alt="Crypto smart global Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://linktr.ee/whitetrader`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/white-trader.png" alt="White Trader Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://ultrasafe.finance`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/ultrasafe.png" alt="Ultrasafe Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/watch?v=EIWIxmWWMCI`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-alterno.png" alt="Crypto Alterno Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/c/DineroTonto/featured`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/dinero-tonto.png" alt="Dinero Tonto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://linktr.ee/Tradingcryptovzla`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/trading-crypto-vzla.png" alt="Trading Crypto Vzla Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtu.be/4BgJCyBaBhs`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/beorus.png" alt="Beorus Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://t.me/SilverStonksEN`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/silver-stonks.png" alt="Silver Stonks Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.d-reit.finance`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/d-reit.png" alt="D-Reit Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/cripto.allstar`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/cripto-allstar.png" alt="Cripto Allstar Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/junglacrypto`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/jungla-crypto.png" alt="Jungla Crypto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://twitter.com/LeviathanCrypto`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-leviathan.png" alt="Crypto Leviathan Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtube.com/channel/UC31HbSgRAyzsiteQwzMEXiA`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/gamers-crypto.png" alt="Gamer$ Crypto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtube.com/c/LaOlaCripto`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/la-ola-cripto.png" alt="La Ola Cripto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://beasties.online/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/magic-beasties.png" alt="Magic Beasties Scan DeFi partner">
              </a>
            </b-carousel-item>
            <!-- <b-carousel-item>
              <a :href="`#`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-flow.png" alt="Crypto Flow Scan DeFi partner">
              </a>
            </b-carousel-item> -->
            <b-carousel-item>
              <a :href="`https://instagram.com/cryptoholics_`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-holycs.png" alt="Crypto Holycs Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtube.com/channel/UCb7Sa2YwGVAPP9jcsci4Bsw`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/vivir-invirtiendo.png" alt="Vivir Invirtiendo Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://instagram.com/miami_token`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/miami-token.png" alt="Miami Token Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://youtube.com/c/ComunidadCRIPTO`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/comunidad-cripto.png" alt="Comunidad Cripto Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/watch?v=STcGoQJS9Co`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/criptoniano.png" alt="Criptoniano Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/crypto_aprendiz/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-aprendiz.png" alt="Crypto-aprendiz Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://criptops.com/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/criptops.png" alt="Criptops Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/watch?v=Sb0ulKovMS8`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/cryptorell.png" alt="Cryptorell Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/watch?v=rGl4GVCGwd8`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/drop-coin.png" alt="Drop-coin Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/exeterstudentinvestmentfund/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/exsif.png" alt="Exsif Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://intereconomia.com/directo/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/intereconomia.png" alt="Intereconomia Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://lemonnetwork.sale/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/lemon-network.png" alt="Lemon Network Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/channel/UCMlWujx6OI-M_Y01OP7BgSg/videos`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-costa.png" alt="Crypto Costa Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/c/EntrepreneurInspiration/videos`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-inspiration.png" alt="Crypto Inspiration Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://dfsocial.com/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/dfsocial.png" alt="DFSocial Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/c/QuieroGanarOficial/videos`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/quiero-ganar.png" alt="Quiero Ganar Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/c/CryptoBoyOfficial`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/crypto-boy.png" alt="Crypto Boy Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.youtube.com/c/SatoshiFactory/videos`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/satoshy-factory.png" alt="Satoshi Factory Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/uonbes/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/bes.png" alt="Uonbes Scan DeFi partner">
              </a>
            </b-carousel-item>
            <b-carousel-item>
              <a :href="`https://www.instagram.com/btradingmedia/`" class="is-flex" target="_blank">
                <img class="scan-slide" src="/images/partners/banners/btrading.png" alt="BTrading Scan DeFi partner">
              </a>
            </b-carousel-item>
          </b-carousel>
        </div>
      </div>
    </section>

    <section class="blacklist-content m-t-40">
      <slot></slot>
    </section>
  </section>
</template>

<script>
  export default {
    props: {
      model: {
        type: String,
        required: false,
        default: null,
      },
    },

    data() {
      return {}
    },

    watch: {},

    computed: {},

    methods: {
      selected(data) {
        if(data.type === 'token') this.$root.scanToken(data.item);
        if(data.type === 'wallet') this.$root.scanWallet(data.item);
      },
      report() {
        if(this.model === 'token') this.$root.reportToken();
        if(this.model === 'wallet') this.$root.reportWallet();
      },
    },

    mounted() {}
  }
</script>