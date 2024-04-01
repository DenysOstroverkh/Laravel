<template>
  <section ref="card" class="scan-staking-card-component" :class="[typeclass, openedclass]">
    <section v-if="type === 'card'" class="scan-staking-card-container">
      <header class="stc-head">
        <div class="stc-title">{{icon.capitalize()}}</div>
        <div class="stc-explain">{{trans('staking.staking_explain', {token:token.symbol})}}</div>
      </header>
      <div class="stc-content">
        <div class="stc-icon-container">
          <img :src="`/images/icons/staking/${icon}.svg`" class="stc-icon" />
        </div>
        <div class="stc-apr">
          <div class="stc-apr-badge">APR 5.63%</div>
        </div>
        <div class="stc-stats">
          <div class="stc-stats-container">
            <div class="stcs-stat">
              <span class="stcs-stat-text">{{trans('staking.my_stake')}}:</span>
              <span class="stcs-stat-text stcs-stat-data">160.00 {{token.symbol}}</span>
            </div>
            <div class="stcs-stat">
              <span class="stcs-stat-text">APR:</span>
              <span class="stcs-stat-text stcs-stat-data">5.63%</span>
            </div>
          </div>
        </div>
        <div class="stc-rewards">
          <div class="stc-rewards-container">
            <div class="stc-reward-data">
              <span class="stcr-text">{{trans('staking.my_rewards')}}</span>
              <span class="stcr-reward">0 {{token.symbol}}</span>
            </div>
            <div class="stc-reward-button">
              <button class="button is-gray is-muted">{{trans('staking.harvest')}}</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="stc-foot">
        <div class="stc-foot-container">
          <button v-if="!$root.walletConnected" class="button is-primary is-fullwidth" @click.prevent="$root.connectWallet()">{{trans('basic.connect_wallet')}}</button>
          <template v-else>
            <button v-if="approved" class="button is-primary is-fullwidth" @click="stake">{{trans('staking.stake_now')}}</button>
            <button v-else class="button is-primary is-fullwidth" @click="goApprove">{{trans('staking.approve')}}</button>
          </template>
        </div>
      </footer>
    </section>
    <section v-if="type === 'list'" class="scan-staking-card-container">
      <header class="stc-head">
        <div class="stc-head-section stc-head-section-title">
          <img :src="`/images/icons/staking/${icon}.svg`" class="stc-icon" />
          <div class="stc-title">{{icon.capitalize()}}</div>
        </div>
        <div class="stc-head-section stc-head-section-info">
          <div class="stci-title">{{trans('staking.my_stake')}}</div>
          <div class="stci-text" :class="{'is-blurred':loading.vaults}">{{myStakeText}}</div>
        </div>
        <div class="stc-head-section stc-head-section-info">
          <div class="stci-title">{{trans('staking.my_rewards')}}</div>
          <div class="stci-text" :class="{'is-blurred':blurredRewards}">{{myRewardsText}}</div>
        </div>
        <div class="stc-head-section stc-head-section-info">
          <div class="stci-title">APR <small>{{trans('staking.up_to')}}</small></div>
          <div class="stci-text is-apy" :class="{'is-blurred':loading.highestAPR}">{{(staking.highestAPR/100).toFixed(2)}}%</div>
        </div>
        <div class="stc-head-section stc-head-section-info">
          <div class="stci-title">{{trans('staking.total_staked')}}</div>
          <div class="stci-text" :class="{'is-blurred':loading.totalstaked}">{{totalStakedText}}</div>
        </div>
        <div class="stc-head-section stc-head-section-info">
          <div class="stci-title">{{trans('staking.duration')}}</div>
          <div class="stci-text is-locktime">{{choice('staking.days', duration, {days:duration})}}</div>
        </div>
        <div class="stc-head-section stc-head-section-action">
          <div class="stca-trigger" @click.stop="toggle">{{trans('staking.details')}}</div>
        </div>
      </header>
      <div class="stc-content">
        <div class="stc-stakes">
          <scan-staking-vault 
            v-for="vault in staking.vaults"
            :key="vault[0]"
            :vault="vault"
            :token="token"
            :staking="staking"
            :card-loading="loading.stake"
            :duration="duration"
            @restaked="restaked"
            @withdrawed="withdrawed"
            @exited="exited">
          </scan-staking-vault>
        </div>
        
        <footer class="stc-foot">
          <div class="stc-foot-container">
            <div class="stcf-info">
              <!-- <div class="stcfi-text">{{trans('staking.staking_text', {symbol:token.symbol, symbol2:token.symbol, percentage:(staking.highestAPR/100).toFixed(2)})}}</div> -->
              <div class="stcfi-text">{{trans('staking.early_unstake_alert')}}</div>
            </div>
            <div class="stcf-actions">
              <div class="stcfa-amount" :class="{'is-muted':!$root.web3.account}">
                <span class="balance">{{trans('staking.balance', {balance:balanceText})}}</span>
                <input ref="maxInput" v-model="staking.amount" type="number" class="input max-input" min="0" step="0.01" placeholder="Amount to stake">
                <button class="button is-primary max-button p-x-10" :class="{'is-loading':loading.balance}" @click.prevent="max">{{trans('basic.max')}}</button>
              </div>
              <button v-if="!$root.walletConnected" class="button is-primary stake-button" :class="{'is-loading':loading.authuser || $root.web3.loading}" @click.prevent="$root.connectWallet()">{{trans('basic.connect_wallet')}}</button>
              <template v-else>
                <button v-if="approved" class="button is-primary stake-button" :class="{'is-loading':loading.stake}" @click="stake">{{trans('staking.stake_now')}}</button>
                <button v-else class="button is-primary stake-button" :class="{'is-loading':loading.allowance}" @click="goApprove">{{trans('staking.approve')}}</button>
              </template>
            </div>
          </div>
        </footer>
      </div>
    </section>
  </section>
</template>

<script>
  export default {
    props: {
      tokenAddress: {
        type: String,
        required: true,
      },
      tokenSymbol: {
        type: String,
        required: true,
      },
      tokenDecimals: {
        type: Number,
        required: true,
      },
      tokenAbi: {
        type: Array,
        required: true,
      },
      stakingAddress: {
        type: String,
        required: true,
      },
      stakingAbi: {
        type: Array,
        required: true,
      },
      duration: {
        type: Number,
        required: true,
      },
      type: {
        type: String,
        required: false,
        default: 'list',
      },
      icon: {
        type: String,
        required: false,
        default: 'scan',
      },
    },

    data() {
      return {
        token: {
          address: this.tokenAddress,
          abi: this.tokenAbi,
          symbol: this.tokenSymbol,
          decimals: this.tokenDecimals,
          allowance: 0,
          balance: 0,
        },
        staking: {
          address: this.stakingAddress,
          abi: this.stakingAbi,
          amount: null,
          vaults: [],
          totalstaked: 0,
          highestAPR: 0,
        },
        opened: false,
        loading: {
          stake: true,
          balance: true,
          allowance: true,
          vaults: true,
          rewards: true,
          totalstaked: true,
          highestAPR: false,
        },
      }
    },

    watch: {
      '$root.web3.account': {
        immediate: true,
        handler(val) {
          this.init();
        }
      }
    },

    computed: {
      approved() {
        return this.token.allowance > 0;
      },
      typeclass() {
        return `is-${this.type}`;
      },
      openedclass() {
        return this.opened ? 'is-opened' : null;
      },
      amountToStake() {
        if(!this.staking.amount) return 0;
        return "0x"+(parseFloat(this.staking.amount) * 10**this.token.decimals).toString(16);
      },
      balanceText() {
        if(!this.$root.web3.account) return this.trans('basic.connect_wallet');
        return this.loading.balance ? 'Loading' : `${this.$root.formatTokenBalanceText(this.token.balance, this.token.decimals, 4).toString()} ${this.token.symbol}`;
      },
      myStake() {
        return this.staking.vaults.reduce((acc, o) => Number(acc) + Number(o[2]), 0);
      },
      myStakeText() {
        if(!this.$root.web3.account) return this.trans('basic.connect_wallet');
        return `${this.$root.formatTokenBalanceText(this.myStake, this.token.decimals, 2).toString()} ${this.token.symbol}`;
      },
      myRewards() {
        return this.staking.vaults.reduce((acc, o) => Number(acc) + Number(o[3] || 0), 0);
      },
      myRewardsText() {
        if(!this.$root.web3.account) return this.trans('basic.connect_wallet');
        return `${this.$root.formatTokenBalanceText(this.myRewards, this.token.decimals, 2).toString()} ${this.token.symbol}`;
      },
      totalStakedText() {
        return `${this.$root.formatTokenBalanceText(this.staking.totalstaked, this.token.decimals, 2).toString()} ${this.token.symbol}`;
      },
      blurredRewards() {
        return this.loading.rewards || (this.staking.vaults.length && !this.myRewards);
      },
      highestAPY() {
        return this.$root.formatNumber(this.$root.calculateBlockedAPY(this.staking.highestAPR/100, this.duration));
      },
    },

    methods: {
      init() {
        if(this.$root.web3.account){
          this.getAllVaultsByHolder();
          this.getTokenBalance();
          this.getTotalStaked();
          this.goGetAllowance();
          // this.getLockTime();
          this.getHighestAPR();
        }else{
          this.walletDisconnected();
        }
      },
      goApprove() {
        this.approve();
      },
      async goGetAllowance() {
        this.loading.stake = true;
        this.loading.allowance = true;
        await this.getAllowance(); 
        this.loading.stake = false;
        this.loading.allowance = false;
      },
      async getAllowance() {
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const TOKEN_CONTRACT = new web3.eth.Contract(this.token.abi, this.token.address);
        const result = await TOKEN_CONTRACT.methods.allowance(this.$root.web3.account, this.staking.address).call().then(result =>{
          this.token.allowance = result;
        }).catch(error => console.info(error));

        this.loading.allowance = false;
      },
      async approve() {
        const AMOUNT = '1000000000000000000';
        this.loading.allowance = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const TOKEN_CONTRACT = new web3.eth.Contract(this.token.abi, this.token.address);
        const result = await TOKEN_CONTRACT.methods.approve(this.staking.address, AMOUNT).send({ from: this.$root.web3.account }).then(result =>{
          this.goGetAllowance();
        }).catch(error => {
          this.loading.allowance = false;
        });
      },
      async getTokenBalance() {
        this.loading.balance = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const TOKEN_CONTRACT = new web3.eth.Contract(this.token.abi, this.token.address);
        const result = await TOKEN_CONTRACT.methods.balanceOf(this.$root.web3.account).call().then(result => {
          this.token.balance = result;
          // this.max();
        }).catch(error => console.info(error));

        this.loading.balance = false;
      },
      async stake() {
        if(this.loading.stake) return;
        if(!this.amountToStake){
          this.$root.showToast(this.trans('staking.insert_valid_amount'), 'is-danger');
          this.$refs.maxInput.focus();
          return;
        }

        let vue = this;

        // vue.$buefy.dialog.confirm({
        //   title: vue.trans('basic.attention'),
        //   message: vue.trans('staking.early_unstake_alert'),
        //   confirmText: vue.trans('basic.accept'),
        //   cancelText: vue.trans('basic.cancel'),
        //   type: 'is-danger',
        //   hasIcon: false,
        //   animation: 'none',
        //   async onConfirm() {
            let stakingabi = this.staking.abi;
            let stakingaddress = this.staking.address;

            this.loading.stake = true;
            // const web3 = new Web3(Web3.givenProvider);
            const web3 = new Web3(this.$root.web3.provider);
            const STAKING_CONTRACT = new web3.eth.Contract(stakingabi, stakingaddress);
            const result = await STAKING_CONTRACT.methods.stake(this.amountToStake).send({ from: this.$root.web3.account }).then(result => {
              this.getTokenBalance();
              this.getTotalStaked();
              this.staking.amount = null;
              this.loading.stake = false;
              this.getAllVaultsByHolder();
            }).catch(error => {
              console.info(error)
              this.loading.stake = false;
            });
        //   }
        // });
      },
      async getAllVaultsByHolder() {
        this.loading.vaults = true;
        this.loading.rewards = true;
        let stakingabi = this.staking.abi;
        let stakingaddress = this.staking.address;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(stakingabi, stakingaddress);
        const result = await STAKING_CONTRACT.methods.getAllVaultsByHolder(this.$root.web3.account).call().then(result =>{
          let vaults = Object.values(result);
          vaults = [vaults[0], vaults[1], vaults[2]].reduce((a, b) => a.map((e,i) => [e,b[i]].flat()));
          this.staking.vaults = vaults;
          this.getCardRewards();
        }).catch(error => console.info(error));

        this.loading.vaults = false;
        this.loading.rewards = false;
      },
      async getTotalStaked() {
        this.loading.totalstaked = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        await STAKING_CONTRACT.methods.totalStaked().call().then(result => this.staking.totalstaked = result);
        this.loading.totalstaked = false;
      },
      async getCardRewards() {
        this.loading.rewards = true;
        for(let i in this.staking.vaults){
          await this.getAmountRewards(this.staking.vaults[i][2]).then(rewards => {
            this.staking.vaults[i].push(rewards)
            if(i === this.staking.vaults.length-1) this.loading.rewards = false;
          });
        }
      },
      async getAmountRewards(amount) {
        if(!amount) return;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.calculateRewards(amount).call();
        return result;
      },
      async getHighestAPR() {
        this.loading.highestAPR = true;
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.$root.web3.provider);
        const STAKING_CONTRACT = new web3.eth.Contract(this.staking.abi, this.staking.address);
        const result = await STAKING_CONTRACT.methods.getAPR('1000000000000000000').call().then(result =>{
          this.staking.highestAPR = result;
        }).catch(error => console.info(error));

        this.loading.highestAPR = false;
      },
      restaked() {
        this.getAllVaultsByHolder();
        this.getTotalStaked();
      },
      withdrawed() {
        this.getAllVaultsByHolder();
        this.getTokenBalance();
        this.getTotalStaked();
      },
      exited() {
        this.getAllVaultsByHolder();
        this.getTokenBalance();
        this.getTotalStaked();
      },
      max() {
        if(this.loading.balance) return;
        this.staking.amount = parseFloat(this.token.balance/10**this.token.decimals);
      },
      toggle() {
        $(this.$refs.card).find('.stc-content').slideToggle();
        this.opened = !this.opened;
      },
      walletDisconnected() {
        this.token.allowance = 0;
        this.token.balance = 0;
        this.staking.amount = null;
        this.staking.vaults = [];
        for(let i in this.loading){
          this.loading[i] = false;
        }
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
