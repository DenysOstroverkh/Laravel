<template>
  <section class="scan-swap-component">
    <div class="scan-swap-container">
      <div class="scan-swap-content">
        <div class="scan-swap-section scan-swap-from">
          <div class="sss-left">
            <div class="sss-amount" :data-value="fromDataValue">
              <input ref="from" v-model="tokens.from.amount" type="text" class="sssa-input" inputmode="decimal" min="0" step="0.01" size="3" placeholder="0.00" />
              <span class="sssa-max" @click="max">{{trans('basic.max').toUpperCase()}}</span>
            </div>
            <div class="sss-balance">{{trans('swap.balance', {balance:tokens.from.balance === '0.00' ? '0.00' : $root.formatTokenBalance(tokens.from.balance, tokens.from.token.decimals, 6)})}}</div>
          </div>
          <div class="sss-right">
            <button v-if="tokens.from.token" class="sss-button button is-gray is-token" @click.prevent="selectToken('from')">
              <span class="sssb-logo"><img :src="tokens.from.token.logo"></span>
              <span class="sssb-symbol">{{tokens.from.token.symbol}}</span>
              <span class="sssb-verified"></span>
            </button>
            <button v-else class="button is-primary" @click.prevent="selectToken('from')">{{trans('swap.select_token')}}</button>
            <div v-if="showFromTax" class="sss-balance is-tax">{{trans('swap.sell_tax', {tax:tokens.from.honeypot ? tokens.from.honeypot.SellTax : 0})}}</div>
          </div>
        </div>
        <div class="scan-swap-switch">
          <div class="sssw-container" @click="switchTokens">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 275" width="320" height="275" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;"><defs><clipPath id="__lottie_element_164"><rect width="320" height="275" x="0" y="0"></rect></clipPath></defs><g clip-path="url(#__lottie_element_164)"><g transform="matrix(6.659999847412109,0,0,6.659999847412109,160,137.5)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path stroke-linecap="round" stroke-linejoin="round" fill-opacity="0" stroke="rgb(255,255,255)" stroke-opacity="1" stroke-width="2.716" d=" M-0.9169999957084656,6.150000095367432 C-0.9169999957084656,6.150000095367432 -5.23799991607666,10.472000122070312 -5.23799991607666,10.472000122070312 M-5.23799991607666,10.472000122070312 C-5.23799991607666,10.472000122070312 -9.5600004196167,6.150000095367432 -9.5600004196167,6.150000095367432 M-5.23799991607666,10.472000122070312 C-5.23799991607666,10.472000122070312 -5.23799991607666,-1.0520000457763672 -5.23799991607666,-1.0520000457763672"></path></g></g><g transform="matrix(6.659999847412109,0,0,6.659999847412109,160,137.5)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path stroke-linecap="round" stroke-linejoin="round" fill-opacity="0" stroke="rgb(255,255,255)" stroke-opacity="1" stroke-width="2.716" d=" M0.9169999957084656,-5.9079999923706055 C0.9169999957084656,-5.9079999923706055 5.23799991607666,-10.229999542236328 5.23799991607666,-10.229999542236328 M5.23799991607666,-10.229999542236328 C5.23799991607666,-10.229999542236328 9.559000015258789,-5.9079999923706055 9.559000015258789,-5.9079999923706055 M5.23799991607666,-10.229999542236328 C5.23799991607666,-10.229999542236328 5.23799991607666,1.2940000295639038 5.23799991607666,1.2940000295639038"></path></g></g></g></svg>
          </div>
        </div>
        <div class="scan-swap-section scan-swap-to">
          <div class="sss-left pointer-events-none">
            <div class="sss-amount">
              <!-- <input ref="to" v-model="tokens.to.amount" type="number" class="sssa-input" inputmode="decimal" min="0" step="0.01" size="3" placeholder="0.00"> -->
              <span class="sssa-input" :class="{'has-text-secondary':!tokens.to.amount}">{{tokens.to.amount || '0.00'}}</span>
              <!-- <span class="sssa-max">MAX</span> -->
            </div>
            <div class="sss-balance">{{trans('swap.balance', {balance:tokens.to.balance === '0.00' ? '0.00' : $root.formatTokenBalance(tokens.to.balance, tokens.to.token.decimals, 6)})}}</div>
          </div>
          <div class="sss-right">
            <button v-if="tokens.to.token" class="sss-button button is-gray is-token" @click.prevent="selectToken('to')">
              <span class="sssb-logo"><img :src="tokens.to.token.logo"></span>
              <span class="sssb-symbol">{{tokens.to.token.symbol}}</span>
              <span class="sssb-verified"></span>
            </button>
            <button v-else class="button is-primary" @click.prevent="selectToken('to')">{{trans('swap.select_token')}}</button>
            <div v-if="showToTax" class="sss-balance is-tax">{{trans('swap.buy_tax', {tax:tokens.to.honeypot ? tokens.to.honeypot.BuyTax : 0})}}</div>
          </div>
        </div>
      </div>
      <div class="scan-swap-footer">
        <div class="slippage-container pointer-events-none"><!--  :class="{'is-muted':anythingLoading}" -->
          {{trans('swap.slippage')}} <b-slider :value="autoSlippage" indicator :tooltip="false" :min="1" :max="49" format="raw" type="is-primary" size="is-small" :custom-formatter="formatSlippage"></b-slider>
        </div>
          <button v-if="!$root.walletConnected" class="button is-primary is-medium is-fullwidth" :class="{'is-loading':loading.connect}" @click.prevent="$root.connectWallet()">{{trans('basic.connect_wallet')}}</button>
          <template v-else>
            <template v-if="approved">
              <button v-if="insufficientBalance" class="button is-primary is-medium is-fullwidth is-muted">{{trans('swap.insufficient_balance', {symbol:tokens.from.token.symbol})}}</button>
              <button v-else class="button is-primary is-medium is-fullwidth" :class="{'is-loading':loading.swap, 'is-muted':swapDisabled}" @click="checkSwap">{{trans('swap.swap')}}</button>
            </template>
            <template v-else>
              <button v-if="tokens.from.token" class="button is-primary is-medium is-fullwidth" :class="{'is-loading':loading.allowance}" @click="approve">{{trans('swap.approve')}}</button>
              <button v-else class="button is-primary is-medium is-fullwidth is-muted">{{trans('swap.swap')}}</button>
            </template>
          </template>
      </div>
    </div>
  </section>
</template>

<script>
  import SwapTokensModal from './Modal.vue';
  import MINTOKENSABI from '/abi/tokens/min.json';

  export default {
    props: {},

    data() {
      return {
        tokens: {
          from: {
            token: {
              address: this.$root.bnbAddress,
              logo: '/images/tokens/bnb.svg',
              symbol: 'BNB',
              decimals: 18,
            },
            balance: '0.00',
            amount: '',
            allowance: 0,
            honeypot: null,
          },
          to: {
            token: null,
            balance: '0.00',
            amount: '',
            allowance: 0,
            honeypot: null,
          },
        },
        slippage: 1,
        loading: {
          connect: false,
          allowance: false,
          swap: false,
          honeypot: false,
        },
        swappable_tokens: [],
      }
    },

    watch: {
      slippage: {
        inmediate: true,
        handler(val) {
          localStorage.setItem('slippage', val);
        }
      },
      '$root.wallet.bnb_balance': {
        inmediate: true,
        handler(val) {
          this.init();
        }
      },
      'tokens.from.amount': {
        deep: true,
        inmediate: true,
        handler(val, old) {
          val = val.replace(",", "."); // In case of iPhone, there is no ".", but only ","
          let valid = (/^[0-9]*\.?[0-9]*$/).test(val);
          if(!valid){
            this.tokens.from.amount = old;
            return;
          }

          let maxlength = 18;
          let validlength = (/^[0-9]*\.?[0-9]{0,maxlength}$/).test(val);
          if(!validlength){
            let length = val.toString().split('.')[0].length + maxlength + 1;
            this.tokens.from.amount = val.toString().substr(0, length);
          }

          if(val && parseFloat(val) > 0) this.getAmountsOut();
          else this.tokens.to.amount = '';
        }
      },
      'tokens.from.balance': {
        inmediate: true,
        handler(val) {
          if(this.tokens.from.token.symbol === 'SCAN') this.$root.getWalletScanBalance(this.$root.web3.account);
        }
      },
      'tokens.to.balance': {
        inmediate: true,
        handler(val) {
          if(this.tokens.to.token.symbol === 'SCAN') this.$root.getWalletScanBalance(this.$root.web3.account);
        }
      },
    },

    computed: {
      approved() {
        return this.tokens.from.allowance > 0;
      },
      slippagedAmountsOut() {
        if(!this.tokens.to.token || !this.tokens.to.amount) return '0.00';
        return parseFloat(this.tokens.to.amount * (100 - this.autoSlippage) / 100).toFixed(9);
      },
      slippagedAmountsOutWithDecimals() {
        if(!this.tokens.to.token || !this.tokens.to.amount || !this.tokens.to.token.decimals) return 0;
        return new BigNumber(this.slippagedAmountsOut).mul(new BigNumber(10).pow(this.tokens.to.token.decimals)).toString(10);
      },
      swapDisabled() {
        return !this.tokens.from.token || !this.tokens.to.token || !this.tokens.from.amount || !this.tokens.to.amount;
      },
      insufficientBalance() {
        return parseFloat(this.tokens.from.amount) > parseFloat(this.$root.formatTokenBalance(this.tokens.from.balance, this.tokens.from.token.decimals, 9));
      },
      fromDataValue() {
        return this.tokens.from.amount ? this.tokens.from.amount : '0.00';
      },
      anythingLoading() {
        return Object.values(this.loading).find(o => o === true);
      },
      autoSlippage() {
        let fromSlippage = this.tokens.from.honeypot ? this.tokens.from.honeypot.SellTax : 0;
        let toSlippage = this.tokens.to.honeypot ? this.tokens.to.honeypot.BuyTax : 0;
        let autoSlippage = fromSlippage + toSlippage;
        return autoSlippage + 1;
      },
      showFromTax() {
        return this.tokens.from.token && this.tokens.from.token.symbol !== 'BNB' && this.tokens.from.honeypot && this.tokens.from.honeypot.SellTax > 0;
      },
      showToTax() {
        return this.tokens.to.token && this.tokens.to.token.symbol !== 'BNB' && this.tokens.to.honeypot && this.tokens.to.honeypot.BuyTax > 0;
      },
    },

    methods: {
      async init() {
        if(!this.tokens.from.honeypot) this.getTokenFees('from');

        // this.setStoredSlippage();
        await this.$root.getETHBalance();

        if(this.$root.web3.account){
          if(this.tokens.from && this.tokens.from.token){
            if(this.tokens.from.token.symbol === 'BNB' && this.$root.wallet.bnb_balance) this.tokens.from.balance = this.$root.wallet.bnb_balance;
            else this.$root.balanceOf(this.tokens.from.token.address).then(balance => this.tokens.from.balance = balance == 0 ? '0.00' : balance);
          }
          if(this.tokens.to && this.tokens.to.token){
            if(this.tokens.to.token.symbol === 'BNB' && this.$root.wallet.bnb_balance) this.tokens.to.balance = this.$root.wallet.bnb_balance;
            else this.$root.balanceOf(this.tokens.to.token.address).then(balance => this.tokens.to.balance = balance == 0 ? '0.00' : balance);
          }

          if(this.tokens.from.token){
            this.getAmountsOut();
            this.getAllowance();
          }
        }else{
          this.walletDisconnected();
        }
      },
      async getTokenFees(position) {
        this.loading.honeypot = true;
        await this.$root.getSlippage(this.tokens[position].token.address).then(response => {
          this.tokens[position].honeypot = response.data;
        });
        this.loading.honeypot = false;
      },
      switchTokens() {
        let newTo = _.clone(this.tokens.from);
        this.tokens.from = this.tokens.to;
        this.tokens.to = newTo;
        this.tokens.from.amount = '';
        this.init();
      },
      max() {
        if(parseFloat(this.tokens.from.balance) <= 0) return;
        let amount = new BigNumber(this.tokens.from.balance).div(new BigNumber(10).pow(this.tokens.from.token.decimals));
        if(parseFloat(this.tokens.from.balance) > 0 && this.tokens.from.token.symbol === 'BNB') amount = amount - 0.01
        if(amount < 0) amount = '';
        this.tokens.from.amount = amount.toString(10);
      },
      selectToken(position) {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: SwapTokensModal,
          canCancel: true,
          props: { default: vue.swappable_tokens },
          events: {
            selected: token => {
              let other = position === 'from' ? 'to' : 'from';
              if(vue.tokens[other].token && token.symbol == vue.tokens[other].token.symbol){
                vue.switchTokens();
              }else{
                vue.tokens[position].token = token;
                this.getTokenFees(position);
              }
              vue.init();
            }
          },
          onCancel: () => {}
        });
      },
      async getAmountsOut() {
        if(!this.tokens.from.amount || !this.tokens.from.token || !this.tokens.to.token) return;

        let amount = this.tokens.from.amount;
        let tokenIn = ['BNB', 'SCAN'].includes(this.tokens.from.token.symbol) ? this.tokens.from.token.symbol : this.tokens.from.token.address;
        let tokenOut = ['BNB', 'SCAN'].includes(this.tokens.to.token.symbol) ? this.tokens.to.token.symbol : this.tokens.to.token.address;
        let tokenInDecimals = this.tokens.from.token.decimals;
        let tokenOutDecimals = this.tokens.to.token.decimals;
        
        await this.$root.amountsOutToken(amount, tokenIn, tokenOut, tokenInDecimals, tokenOutDecimals).then(response => {
          this.tokens.to.amount = response[response.length-1] / 10**tokenOutDecimals;
        });
      },
      async getAllowance() {
        if(this.tokens.from.token && this.tokens.from.token.symbol === 'BNB'){
          this.tokens.from.allowance = '10000000000000000000000000000';
          return;
        }

        this.loading.allowance = true;
        await this.$root.getAllowance(this.tokens.from.token.address, this.$root.pancakeswap.v2.router.address).then(response => {
          this.tokens.from.allowance = response;
        });

        this.loading.allowance = false;
      },
      formatSlippage(value) {
        return `${value}%`;
      },
      async approve() {
        this.loading.allowance = true;
        // await this.$root.approve(, ).then(response => {
        //   this.getAllowance();
        // });
        const AMOUNT = '100000000000000000000000000000000';
        let web3 = new Web3(this.$root.web3.provider);
        let contract = new web3.eth.Contract(MINTOKENSABI, this.tokens.from.token.address);
        const result = await contract.methods.approve(this.$root.pancakeswap.v2.router.address, AMOUNT).send({ from: this.$root.web3.account }).then(response => {
          this.getAllowance();
          this.$root.showToast(this.trans('swap.transaction_confirmed'));
        }).catch(error => {
          this.loading.allowance = false;
          this.$root.showToast(error.message, 'is-danger')
        });
      },
      checkSwap() {
        if(this.swapDisabled) return;
        if(this.tokens.from.token && this.tokens.from.token.symbol === 'BNB') this.swapETHForTokens();
        else if(this.tokens.to.token && this.tokens.to.token.symbol === 'BNB') this.swapTokensForETH();
        else this.swapTokensForTokens();
      },
      async swapETHForTokens() {
        this.loading.swap = true;

        let web3 = new Web3(this.$root.web3.provider);
        let timeout = moment().add(15, 'minutes').unix();
        let amountsIn = web3.utils.toHex(this.tokens.from.amount * 10 ** this.tokens.from.token.decimals);
        let amountsOut = web3.utils.toHex(this.slippagedAmountsOutWithDecimals);
        let path = [this.tokens.from.token.address, this.tokens.to.token.address];

        let contract = new web3.eth.Contract(this.$root.pancakeswap.v2.router.abi, this.$root.pancakeswap.v2.router.address);
        let result = await contract.methods.swapExactETHForTokensSupportingFeeOnTransferTokens(
        // let result = await contract.methods.swapExactETHForTokens(
          amountsOut,
          path,
          this.$root.web3.account,
          timeout,
        ).send({ value: amountsIn, from: this.$root.web3.account }).then(response => {
          this.init();
          this.emptyAmounts();
          this.$root.showToast(this.trans('swap.transaction_confirmed'));
        }).catch(error => this.$root.showToast(error.message, 'is-danger'));
        
        this.loading.swap = false;

        return result;
      },
      async swapTokensForETH() {
        this.loading.swap = true;

        let web3 = new Web3(this.$root.web3.provider);
        let timeout = moment().add(15, 'minutes').unix();
        let amountsIn = web3.utils.toHex(this.tokens.from.amount * 10 ** this.tokens.from.token.decimals);
        let amountsOut = web3.utils.toHex(this.slippagedAmountsOutWithDecimals);
        let path = [this.tokens.from.token.address, this.tokens.to.token.address];

        let contract = new web3.eth.Contract(this.$root.pancakeswap.v2.router.abi, this.$root.pancakeswap.v2.router.address);
        let result = await contract.methods.swapExactTokensForETHSupportingFeeOnTransferTokens(
        // let result = await contract.methods.swapExactTokensForETH(
          amountsIn,
          amountsOut,
          path,
          this.$root.wallet.address,
          timeout,
        ).send({ from: this.$root.wallet.address }).then(response => {
          this.init();
          this.emptyAmounts();
          this.$root.showToast(this.trans('swap.transaction_confirmed'));
        }).catch(error => this.$root.showToast(error.message, 'is-danger'));
        
        this.loading.swap = false;

        return result;
      },
      async swapTokensForTokens() {
        this.loading.swap = true;

        let web3 = new Web3(this.$root.web3.provider);
        let timeout = moment().add(15, 'minutes').unix();
        let ain = new BigNumber(this.tokens.from.amount.toString()).mul(new BigNumber(10).pow(this.tokens.from.token.decimals)).toString(10);
        let aout = this.slippagedAmountsOutWithDecimals;
        let amountsIn = web3.utils.toHex(ain);
        let amountsOut = web3.utils.toHex(aout);
        let path = [this.tokens.from.token.address, '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c', this.tokens.to.token.address];

        let contract = new web3.eth.Contract(this.$root.pancakeswap.v2.router.abi, this.$root.pancakeswap.v2.router.address);
        let result = await contract.methods.swapExactTokensForTokensSupportingFeeOnTransferTokens(
        // let result = await contract.methods.swapExactTokensForTokens(
          amountsIn,
          amountsOut,
          path,
          this.$root.web3.account,
          timeout,
        ).send({ from: this.$root.web3.account }).then(response => {
          this.init();
          this.emptyAmounts();
          this.$root.showToast(this.trans('swap.transaction_confirmed'));
        }).catch(error => this.$root.showToast(error.message, 'is-danger'));
        
        this.loading.swap = false;

        return result;
      },
      walletDisconnected() {
        this.tokens.from.allowance = 0;
        this.tokens.from.balance = 0;
        this.tokens.from.amount = '';
        for(let i in this.loading){
          this.loading[i] = false;
        }
      },
      setStoredSlippage() {
        if(localStorage.getItem('slippage')) this.slippage = parseInt(localStorage.getItem('slippage'));
      },
      emptyAmounts() {
        this.tokens.from.amount = '';
        this.tokens.to.amount = '';
      },
      getSwappables() {
        axios.get(`/api/tokens/swappables`).then(response => this.swappable_tokens = response.data.tokens);
      },
    },

    mounted() {
      this.init();
      this.getSwappables();
    }
  }
</script>