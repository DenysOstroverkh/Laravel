<template>
  <article class="coin-card">
    <div class="coin-card-image">
      <img src="/images/logos/logo.svg" alt="Scan DeFi coin" class="scan-image-money">
    </div>
    <div class="coin-card-info">
      <div v-if="change24h" class="coin-card-info-top" :class="change24hStatus">{{change24h}} %</div>
      <!-- <div v-if="price" class="coin-card-info-top has-text-primary">$ {{price}}</div> -->
      <div v-else class="coin-card-info-top has-text-grey is-blurred">0.00%</div>

      <div v-if="token.loading || price === null" class="is-placeholder-loading is-semidark is-blurred" style="width:65px;height:8px;margin:3px 0;border-radius:999px;"></div>
      <div v-else class="coin-card-info-center">$ {{price}}</div>

      <div class="coin-card-info-bottom">{{token.symbol || 'SCAN'}}</div>
    </div>
  </article>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        request: 'coingecko',
        token: {
          price: 0,
          price_BNB: null,
          name: null,
          symbol: null,
          updated_at: null,
          history: [],
          change24h: null,
          change24hStatus: 'has-text-white',
          loading: false,
        },
      };
    },

    watch: {
      'token.history': {
        inmediate: true,
        handler(history) {
          if(history || history.length) localStorage.setItem('scan.history', JSON.stringify(history));
          else localStorage.setItem('scan.history', '');
        },
      }
    },

    computed: {
      price() {
        if(this.request === 'coingecko'){
          return this.token.price;
        }else if(this.request === 'pancake'){
          if(!this.token.history.length) return null;
          let currentprice = this.token.history[this.token.history.length-1].rate;
          return this.$root.formatPrice(currentprice);
        }
      },
      change24h() {
        if(this.request === 'coingecko'){
          return this.token.change24h;
        }else if(this.request === 'pancake'){
          if(!this.token.history.length) return null;
          let firstprice = this.token.history[0].rate;
          let currentprice = this.token.history[this.token.history.length-1].rate;
          let decrease = Math.abs(currentprice - firstprice);
          return parseFloat((decrease / firstprice) * 100).toFixed(2);
        }
      },
      change24hStatus() {
        if(this.request === 'coingecko'){
          return this.token.change24hStatus;
        }else if(this.request === 'pancake'){
          if(!this.token.history.length) return 'has-text-success';
          let firstprice = this.token.history[0].rate;
          let currentprice = this.token.history[this.token.history.length-1].rate;
          if(firstprice > currentprice) return 'has-text-danger';
          else return 'has-text-success';
        }
      },
    },

    methods: {
      init() {
        if(this.request === 'coingecko') this.getTokenInfoCoingecko();
        else if(this.request === 'pancake') this.getTokenInfo();

        // clearInterval();
        // this.getHistoryPrice();
        // this.setStoredHistory();
        // setInterval(this.getHistoryPrice, 1000 * 30); // every 30 seconds
      },
      setStoredHistory() {
        if(localStorage.getItem('scan.history')) this.token.history = JSON.parse(localStorage.getItem('scan.history'));
      },
      getTokenInfo(){
        this.token.loading = true;
        this.$root.pancakeTokenInfo().then(response => {
          this.token.price = this.$root.formatPrice(response.data.price);
          this.token.price_BNB = this.$root.formatPrice(response.data.price_BNB);
          this.token.symbol = response.data.symbol;
          this.token.name = response.data.name;
          this.token.updated_at = response.data.updated_at;
          this.token.loading = false;
        });
      },
      getTokenInfoCoingecko() {
        this.$root.coingeckoTokenInfo().then(response => {
          this.token.price = this.$root.formatPrice(response.market_data.current_price.usd);
          this.token.price_BNB = this.$root.formatPrice(response.market_data.current_price.bnb);
          this.token.symbol = response.symbol.toUpperCase();
          this.token.name = response.name;
          this.token.updated_at = response.market_data.last_updated;
          this.token.change24h = Math.abs(response.market_data.price_change_percentage_24h).toFixed(2);
          this.token.change24hStatus = parseFloat(response.market_data.price_change_percentage_24h) >= 0 ? 'has-text-success' : 'has-text-danger';
          this.token.loading = false;
        });
      },
      getHistoryPrice(token = 'SCAN') {
        this.$root.tokenHistoryPrice('SCAN').then(response => {
          this.token.history = response.data;
          this.token.price = response.data[response.data.length-1].rate;
        });
      },
    },

    mounted() {
      this.init();
      
    }
};
</script>
