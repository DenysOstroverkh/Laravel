<template>
  <section class="scan-staking-vault-component">
    <section class="scan-staking-vault-container" :class="classtype">
      <div class="ssv-info">
        <div class="ssvi-title">{{trans('staking.my_stake')}}</div>
        <div class="ssvi-text">{{vaultAmountText}}</div>
      </div>
      <div class="ssv-info">
        <div class="ssvi-title">{{trans('staking.my_rewards')}}</div>
        <div class="ssvi-text" :class="{'is-blurred':loading.rewards}">{{rewardsAmountText}}</div>
      </div>
      <div class="ssv-info">
        <div class="ssvi-title">APR</div>
        <div class="ssvi-text is-apy" :class="{'is-blurred':loading.apy}">{{(this.apr/100).toFixed(2)}}%</div>
      </div>
      <div class="ssv-info">
        <div class="ssvi-title">{{trans('staking.unlock_time')}}</div>
        <div class="ssvi-text" :class="{'is-blurred':loading.countdown}">
          <template v-if="loading.countdown || ended">
            {{countdown.line}}
          </template>
          <template v-else>
            <span v-if="countdown.days">{{countdown.days}}{{trans('basic.char_days')}}</span>
            <span v-if="countdown.hours">{{countdown.hours}}{{trans('basic.char_hours')}}</span>
            <span v-if="countdown.minutes">{{countdown.minutes}}{{trans('basic.char_minutes')}}</span>
            <span v-if="countdown.seconds">{{countdown.seconds}}{{trans('basic.char_seconds')}}</span>
          </template>
        </div>
      </div>
      <div class="ssv-info ssv-buttons">
        <button class="button is-gray" :class="{'is-loading':loading.exit, 'is-muted':earlyUnstakeButtonDisabled}" :disabled="earlyUnstakeButtonDisabled && !loading.exit" @click.prevent="exit">{{trans('staking.early_unstake')}}</button>
        <button class="button" :class="[loading.restake ? 'is-loading is-primary' : (restakeButtonsDisabled ? 'is-gray is-muted' : 'is-primary')]" :disabled="restakeButtonsDisabled && !loading.restake" @click.prevent="restake">{{trans('staking.re_stake')}}</button>
        <button class="button is-gray" :class="[loading.withdraw ? 'is-loading' : (withdrawButtonsDisabled ? 'is-muted' : '')]" :disabled="withdrawButtonsDisabled && !loading.withdraw" @click.prevent="withdraw">{{trans('staking.withdraw')}}</button>
      </div>
    </section>
  </section>
</template>

<script>
  export default {
    props: {
      vault: {
        type: Array,
        required: true,
      },
      token: {
        type: Object,
        required: true,
      },
      staking: {
        type: Object,
        required: true,
      },
      cardLoading: {
        type: Boolean,
        required: false,
        default: false,
      },
      duration: {
        type: Number,
        required: true,
      },
    },

    data() {
      return {
        countdown: {
          text: 'Loading',
          days: 0,
          hours: 0,
          minutes: 0,
          seconds: 0,
        },
        ended: false,
        rewards: 0,
        apr: 0,
        loading: {
          countdown: true,
          rewards: true,
          apy: true,
          restake: false,
          withdraw: false,
          exit: false,
          actions: false,
        }
      }
    },

    watch: {
      vault: {
        inmediate: true,
        handler(val) {
          this.getVaultAPR();
          this.getVaultRewards();
        },
      },
    },

    computed: {
      vaultObject() {
        if(!this.vault) return;
        return { id:this.vault[0], time:this.vault[1], amount:this.vault[2] };
      },
      vaultAmountText() {
        if(!this.vault) return;
        return this.$root.formatTokenBalanceText(this.vaultObject.amount, this.token.decimals, 5, this.token.symbol);
      },
      rewardsAmountText() {
        if(!this.vault) return;
        return this.$root.formatTokenBalanceText(this.rewards, this.token.decimals, 5, this.token.symbol);
      },
      classtype() {
        if(!this.type) return;
        return `${this.type}`;
      },
      earlyUnstakeButtonDisabled() {
        return this.cardLoading || this.ended || this.loading.countdown;
      },
      restakeButtonsDisabled() {
        return this.cardLoading || !this.ended || this.loading.countdown || this.loading.withdraw;
      },
      withdrawButtonsDisabled() {
        return this.cardLoading || !this.ended || this.loading.countdown || this.loading.restake;
      },
      vaultAPY() {
        return this.$root.formatNumber(this.$root.calculateBlockedAPY(this.apr/100, this.duration));
      },
    },

    methods: {
      init() {
        this.setUnlockTimeCountdown();
        this.getVaultRewards();
        this.getVaultAPR();
      },
      async getVaultRewards() {
        if(!this.vaultObject.amount) return;

        this.loading.rewards = true;
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.calculateRewards(this.vaultObject.amount).call().then(result =>{
          this.rewards = result;
        }).catch(error => console.info(error));

        this.loading.rewards = false;
      },
      async getVaultAPR() {
        if(!this.vaultObject.amount) return;

        this.loading.apy = true;
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.getAPR(this.vaultObject.amount).call().then(result =>{
          this.apr = result;
        }).catch(error => console.info(error));

        this.loading.apy = false;
      },
      async restake() {
        if(this.endedStakeButtonsDisabled) return;
        if(!this.vaultObject || !this.vaultObject.id) return;

        this.loading.restake = true;
        this.loading.actions = true;
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.reStake([this.vaultObject.id]).send({ from: this.$root.web3.account }).then(result => {
          this.$emit('restaked', this.vaultObject);
        }).catch(error => {
          console.info(error)
          this.loading.restake = false;
          this.loading.actions = false;
        });
        
      },
      async withdraw() {
        if(this.restakeButtonsDisabled) return;
        if(!this.vaultObject || !this.vaultObject.id) return;

        this.loading.withdraw = true;
        this.loading.actions = true;
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.harvest([this.vaultObject.id]).send({ from: this.$root.web3.account }).then(result => {
          this.$emit('withdrawed', this.vaultObject);
        }).catch(error => {
          console.info(error)
          this.loading.withdraw = false;
          this.loading.actions = false;
        });
        
      },
      async exit() {
        if(this.earlyUnstakeButtonsDisabled) return;
        if(!this.vaultObject || !this.vaultObject.id) return;

        let vue = this;

        vue.$buefy.dialog.confirm({
          title: vue.trans('basic.attention'),
          message: vue.trans('staking.early_unstake_alert'),
          confirmText: vue.trans('basic.accept'),
          cancelText: vue.trans('basic.cancel'),
          type: 'is-danger',
          hasIcon: false,
          animation: 'none',
          async onConfirm() {
            vue.loading.exit = true;
            vue.loading.actions = true;
            const web3 = new Web3(vue.$root.web3.provider);
            const STAKING_CONTRACT = new web3.eth.Contract(vue.staking.abi, vue.staking.address);
            const result = await STAKING_CONTRACT.methods.exit([vue.vaultObject.id]).send({ from: vue.$root.web3.account }).then(result => {
              vue.$emit('exited', vue.vaultObject);
            }).catch(error => {
              console.info(error)
              vue.loading.exit = false;
              vue.loading.actions = false;
            });
          }
        });
      },
      setUnlockTimeCountdown() {
        let vue = this;
        let interval = 1000;
        let unlockTime = setInterval(function() {
          vue.loading.countdown = false;
          let diff = vue.vaultObject.time - moment().unix();
          let duration = moment.duration(diff*1000, 'milliseconds');
      
          if(diff <= 0){
            clearInterval(unlockTime);
            vue.countdown.text = 'Ended';
            vue.ended =true
          }else{
            duration = moment.duration(duration - interval, 'milliseconds');
            vue.countdown.days = moment.unix(vue.vaultObject.time).diff(moment(), 'days');
            vue.countdown.hours = duration.hours();
            vue.countdown.minutes = duration.minutes();
            vue.countdown.seconds = duration.seconds();
          }

        }, 1000);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
