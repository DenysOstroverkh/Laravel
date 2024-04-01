<template>
  <section class="scanner-token-component">
    <div class="scan-general-info-component-container">
      <scan-general-info @selected="selected" showSCAN></scan-general-info>
    </div>
    <section v-if="wallet" class="token-scanner-report-section">
      <div>
        <section class="scanner-token-info-container">
          <searched-wallet-card :wallet="wallet" :selectable="false" size="is-large" type="is-inline" :showReports="false" />
          <p class="scanner-token-address cur-p" @click.prevent="$root.clipboard(wallet.address, trans('basic.address_copied'))">
            {{wallet.address}}
            <i class="far fa-copy cur-p m-l-7"></i>
          </p>

          <div class="web-report-wallet-complaints-container">
            <b-tooltip multilined label="The wallet sold a large number of tokens in a single movement, drawing a lot of liquidity" type="is-black" size="is-large" position="is-top"><i class="fas fa-fish is-size-3 m-x-10" :class="wallet.types.includes('whale') ? 'has-text-primary' : 'is-muted-dark'"></i></b-tooltip>
            <b-tooltip multilined label="The wallet bought and sold the token many times, creating volatility" type="is-black" size="is-large" position="is-top"><i class="fas fa-sync is-size-3 m-x-10" :class="wallet.types.includes('trader') ? 'has-text-warning' : 'is-muted-dark'"></i></b-tooltip>
            <b-tooltip multilined label="The wallet participated directly or indirectly in a scam on the blockchain" type="is-black" size="is-large" position="is-top"><i class="fas fa-skull is-size-3 m-x-10" :class="wallet.types.includes('scammer') ? 'has-text-danger' : 'is-muted-dark'"></i></b-tooltip>
          </div>

          <div v-if="wallet.address !== $root.scan.contract" class="token-actions">
            <a class="button is-primary m-t-10" @click.prevent="report(wallet)">{{trans('blacklist.go_to_report')}}</a>
            <a href="https://t.me/scandefigroup" target="_blank" class="button is-primary m-t-10">{{trans('scanner.quit_wallet')}}</a>
          </div>
        </section>
        
        <section class="scanner-token-wallet-balances-container">
          <p class="is-size-5 m-b-30">{{trans('scanner.balances')}}</p>
          <article v-for="token in filteredWalletBalances" class="scanner-token-report" :key="token.contract_address">
            <searched-token-card :token="token" :show-reports="false" scan cov :balance="token.balance" />
          </article>
        </section>
      </div>

      <section v-if="!$root.adminwallets.includes(wallet.address) && wallet.reports && wallet.reports.length" class="scanner-token-reports-container">
        <article v-for="report in reverseReports" class="scanner-token-report" :key="report.id">
          <div class="scanner-token-report-head">
            <div v-if="report.meta.user.wallet" class="wallet-logo" style="width:27px;height:27px;overflow:hidden;"><img :src="`https://avatars.dicebear.com/api/identicon/${report.meta.user.wallet}.svg?colorLevel=300`" alt="Wallet avatar"></div>
            <div v-else class="wallet-logo" :style="{color: $root.$randomColor({ luminosity: 'light' })}">{{report.meta.user.wallet.slice(-2)}}</div>
            <div class="scanner-token-reporter">{{$root.shortenAddress(report.meta.user.wallet, 9)}}</div>
            <div class="m-l-20 scanner-token-report-wallet-types">
              <b-tooltip multilined label="The wallet sold a large number of tokens in a single movement, drawing a lot of liquidity" type="is-black" size="is-large" position="is-top"><i class="fas fa-fish m-x-2" :class="report.complaints.includes('whale') ? 'has-text-primary' : 'is-muted-dark'"></i></b-tooltip>
              <b-tooltip multilined label="The wallet bought and sold the token many times, creating volatility" type="is-black" size="is-large" position="is-top"><i class="fas fa-sync m-x-2" :class="report.complaints.includes('trader') ? 'has-text-warning' : 'is-muted-dark'"></i></b-tooltip>
              <b-tooltip multilined label="The wallet participated directly or indirectly in a scam on the blockchain" type="is-black" size="is-large" position="is-top"><i class="fas fa-skull m-x-2" :class="report.complaints.includes('scammer') ? 'has-text-danger' : 'is-muted-dark'"></i></b-tooltip>
            </div>
            <div class="scanner-token-report-date has-text-grey">{{$root.formatDate(report.created_at)}}</div>
          </div>
          <div v-if="report.token_id" class="scanner-token-report-token">
            <searched-token-card :token="report.token" type="is-inline-centered" :show-reports="false" scan />
          </div>
          <div v-if="report.description" class="scanner-token-report-description">
            {{report.description}}
          </div>
          <div class="scanner-token-report-actions">
            <b-tooltip label="Comiing soon" type="is-black" size="is-small"><span><i class="fas fa-gavel"></i> {{trans('basic.controversy')}}</span></b-tooltip>
            <b-tooltip label="Comiing soon" type="is-black" size="is-small"><span><i class="far fa-thumbs-up"></i></span></b-tooltip>
            <b-tooltip label="Comiing soon" type="is-black" size="is-small"><span><i class="far fa-thumbs-down"></i></span></b-tooltip>
          </div>
        </article>
      </section>
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        wallet: null,
        loading: false,
        walletBalances: [],
      }
    },

    watch: {
      $route: {
        immediate: true,
        handler(val) {
          this.init();
        }
      },
    },

    computed: {
      reverseReports() {
        return this.wallet.reports.reverse();
      },
      filteredWalletBalances() {
        if(!this.walletBalances || !this.walletBalances.length) return null;
        return this.walletBalances.filter(o => parseFloat(o.balance) && o.contract_ticker_symbol !== 'Cake-LP');
      },
    },

    methods: {
      init() {
        this.getScannerWallet();
      },
      setStoredWalletBalances(address) {
        console.info('setStoredWalletBalances');
        if(!address) return;
        if(localStorage.getItem(`wallets.${address}.balances`)) this.walletBalances = JSON.parse(localStorage.getItem(`wallets.${address}.balances`));
      },
      getScannerWallet(address = null) {
        this.loading = true;
        this.loading = true;
        address = address ? address : this.$route.params.address;
        this.setStoredWalletBalances(address);

        axios.get(`/api/wallets/${address}/scanner`).then(response => {
          this.loading = false;
          this.wallet = response.data.wallet;
          this.getWalletBalances(address);
        });
      },
      getWalletBalances(address){
        console.info('getWalletBalances');
        this.loading = true;
        this.$root.walletBalances(address).then(response => {
          this.walletBalances = response.data.items;
          localStorage.setItem(`wallets.${address}.balances`, JSON.stringify(this.walletBalances));
          this.loading = false;
        });
      },
      selected(data) {
        if(data.item.address === this.wallet.address) return;
        
        if(data.type === 'token'){
          this.$router.push({ name: 'scanner.token', params: { address: data.item.address } });
        }
        if(data.type === 'wallet'){
          this.getScannerWallet(data.item.address);
          this.$router.push({ name: 'scanner.wallet', params: { address: data.item.address } });
        }
      },
      report(wallet) {
        this.$root.reportWallet(wallet);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
