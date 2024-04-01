<template>
  <article class="web-marketplace-card-component">
    <div class="marketplace-option-head">
      <p class="marketplace-option-title">{{title}}</p>
      <!-- <scan-icon icon="staking/whale" size="8rem" /> -->
    </div>
    <div class="marketplace-option-content">
      <div class="marketplace-option-offer-container">
        <p v-if="change" class="marketplace-option-offer">{{change}} SCAN</p>
        <p v-else class="marketplace-option-offer is-blurred">{{trans('basic.loading')}}</p>
        <div class="marketplace-option-offer-tokens">
          <img class="marketplace-token-image is-scan" src="/images/logos/logo.svg" alt="Scan DeFi token logo">
          <img class="marketplace-token-image" src="/images/tokens/bnb.svg" alt="Binance Coin token logo">
        </div>
        <div class="marketplace-option-bid-container">
          <p class="marketplace-option-bid">{{amountText}} BNB</p>
        </div>
      </div>

      <p class="is-size-7 m-t-4"><i class="fas fa-exclamation-circle m-r-3"></i> {{trans('index.price_update')}}</p>

      <div class="marketplace-option-info-container">
        <div class="marketplace-option-info-line">
          <div class="option-info-left">{{trans('index.ends_in')}}:</div>
          <div class="option-info-right">
            <span v-if="loading.countdown" class="text">{{trans('basic.loading')}}</span>
            <template v-else>
              <span v-if="ended" class="text">{{countdown.text}}</span>
              <template v-else>
                <span class="time" style="font-family:monospace">{{countdown.days}}</span>
                <span class="text" style="font-family:monospace">{{trans('basic.char_days')}}</span>
                <span class="time" style="font-family:monospace">{{countdown.hours}}</span>
                <span class="text" style="font-family:monospace">{{trans('basic.char_hours')}}</span>
                <span class="time" style="font-family:monospace">{{countdown.minutes}}</span>
                <span class="text" style="font-family:monospace">{{trans('basic.char_minutes')}}</span>
                <span class="time" style="font-family:monospace">{{countdown.seconds}}</span>
                <span class="text" style="font-family:monospace">{{trans('basic.char_seconds')}}</span>
              </template>
            </template>
          </div>
        </div>
        <div class="marketplace-option-info-line">
          <div class="option-info-left">{{trans('index.tokens_offered')}}:</div>
          <div class="option-info-right">{{totalTokensText}}</div>
        </div>
        <div class="marketplace-option-info-line">
          <div class="option-info-left">{{trans('index.participants')}}:</div>
          <div class="option-info-right">{{participantsText}}</div>
        </div>
        <div class="marketplace-option-info-line">
          <div class="option-info-left">{{trans('index.tokens_available')}}:</div>
          <div class="option-info-right">{{availableTokensText}}</div>
        </div>
      </div>

      <div class="marketplace-option-foot">
        <button v-if="loading.countdown" class="button is-fullwidth is-primary is-medium is-gray is-muted m-t-25">{{trans('basic.loading')}}</button>
        <template v-else>
          <button v-if="ended" class="button is-fullwidth is-primary is-medium is-gray is-muted m-t-25">{{trans('index.ended')}}</button>
          <template v-else>
            <button v-if="$root.walletConnected" class="button is-fullwidth is-primary is-medium m-t-25" :class="{'is-muted is-loading':buyDisabled}" @click.prevent="buy">{{trans('basic.buy').toUpperCase()}}</button>
            <button v-else class="button is-fullwidth is-primary is-medium m-t-25" @click.prevent="$root.connectWallet()">{{trans('basic.connect_wallet')}}</button>
          </template>
        </template>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    props: {
      name: {
        type: String,
        required: true,
      },
      // amount: {
      //   type: Number,
      //   required: true,
      // },
      id: {
        type: Number,
        required: true,
      },
      swap: {
        type: Object,
        required: true,
      },
    },

    data() {
      return {
        pack: {},
        countdown: {
          months: 0,
          days: 0,
          hours: 0,
          minutes: 0,
          seconds: 0,
          text: '----',
        },
        loading: {
          pack: true,
          countdown: true,
          buy: false,
        },
        ended: false,
      }
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

    computed: {
      title() {
        return this.name.capitalize();
      },
      amountText() {
        if(this.loading.pack) return 0;
        return this.$root.formatTokenBalance(this.pack.maxAmount, 18);
      },
      change() {
        if(this.loading.pack || !this.pack.maxAmount || !this.$root.scan.price.tokens_per_bnb) return 0;
        return this.$root.formatNumber((this.$root.scan.price.tokens_per_bnb * this.$root.formatTokenBalance(this.pack.maxAmount)).toFixed(3), false);
      },
      buyDisabled() {
        return this.loading.buy || !this.pack || !this.pack.maxAmount;
      },
      totalTokensText() {
        return this.pack.promotionAmount ? `${this.$root.formatTokenBalanceText(this.pack.promotionAmount, 9)} SCAN` : '----';
      },
      participantsText() {
        return this.pack.participants ? this.pack.participants : '----';
      },
      availableTokensText() {
        return this.pack.promotionAmount ? `${this.$root.formatTokenBalanceText(this.pack.promotionAmount - this.pack.usedAmount, 9)} SCAN` : '----';
      },
    },

    methods: {
      init() {
        this.getPack();
      },
      async getPack() {
        this.loading.pack = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const SWAP_CONTRACT = new web3.eth.Contract(this.swap.abi, this.swap.address);
        const result = await SWAP_CONTRACT.methods._packs(this.id).call().then(result =>{
          this.pack = result;
          this.setCountdown();
        }).catch(error => console.info(error));
        this.loading.pack = false;
      },
      async buy() {
        this.loading.buy = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const SWAP_CONTRACT = new web3.eth.Contract(this.swap.abi, this.swap.address);
        const result = await SWAP_CONTRACT.methods.buyPackWithBNB(this.id).send({ from:this.$root.web3.account, value: this.pack.maxAmount}).then(result =>{
          console.info(result);
          this.getPack();
        }).catch(error => console.info(error));
        this.loading.buy = false;
      },
      setCountdown() {
        let vue = this;
        let interval = 1000;
        let countdownInterval = setInterval(function() {
          vue.loading.countdown = false;
          // let diff = moment.unix(vue.pack.endTime).diff(moment());
          let diff = vue.pack.endTime - moment().unix();
          let duration = moment.duration(diff*1000, 'milliseconds');
      
          if(diff <= 0){
            console.info('entra');
            clearInterval(countdownInterval);
            // If the count down is finished, write some text 
            vue.countdown.text = this.trans('index.ended');
            vue.ended =true
          }else{
            duration = moment.duration(duration - interval, 'milliseconds');
            vue.countdown.days = moment.unix(vue.pack.endTime).diff(moment(), 'days');
            vue.countdown.hours = duration.hours();
            vue.countdown.minutes = duration.minutes();
            vue.countdown.seconds = duration.seconds();
            // let duration = moment.duration(moment.unix(vue.pack.endTime).diff(moment()))
            // let prefix = duration.get('days') ? `${duration.get('days')}d ` : '';
            // vue.countdown.line = `${prefix}${moment.utc(diff).format("HH[h] mm[m] ss[s]")}`;
            // vue.countdown.days = duration.get('days');
            // vue.countdown.hours = moment.utc(diff).format("HH");
            // vue.countdown.minutes = moment.utc(diff).format("mm");
            // vue.countdown.seconds = moment.utc(diff).format("ss");
          }

        }, interval);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
