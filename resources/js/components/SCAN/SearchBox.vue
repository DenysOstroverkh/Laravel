<template>
  <article ref="searchbox" class="search-box-component" v-click-outside="close">
    <div class="search-box-input-container control has-icons-left">
      <input ref="input" v-model="filters.search" class="search-box-input input is-small" :placeholder="searchPlaceholder" @focus="filters.showcontent = true"/>
      <span class="icon is-small is-left">
        <i class="fa fa-search has-text-white"></i>
      </span>
    </div>
    <div class="search-box-found-container" :class="{'has-results':hasResults}">
      <div v-if="filters.showcontent" class="search-box-found-items">
        <template v-if="filters.loading">
          <article class="search-box-found-item">
            <searched-token-card v-if="filters.searchtype === 'token'" :token="null" :show-reports="false" placeholder />
            <searched-wallet-card v-if="filters.searchtype === 'wallet'" :wallet="null" :show-reports="false" placeholder :shorten="parseInt(shorten)" />
          </article>
        </template>
        <template v-else>
          <template v-if="items.length">
            <article v-for="item in items" :key="item.id" class="search-box-found-item">
              <searched-token-card v-if="filters.searchtype === 'token'" :token="item" :address="isAddress" :show-reports="false" @selected="selected" @cancel="cancel" />
              <searched-wallet-card v-if="filters.searchtype === 'wallet'" :wallet="item" :address="isAddress" :show-reports="false" @selected="selected" @cancel="cancel" :shorten="parseInt(shorten)" />
            </article>
          </template>
          <template v-else>
            <p v-if="filters.search.length > 1" class="is-size-small m-b-10">{{trans('basic.no_results')}}</p>
          </template>
        </template>
      </div>
      <footer class="search-box-footer">
        <div class="search-box-filters" v-if="showFilters">
          <b-radio v-model="filters.type" :native-value="null" size="is-small">{{trans('basic.all')}}</b-radio>
          <b-radio v-model="filters.type" native-value="token" size="is-small">{{trans('basic.token')}}</b-radio>
          <b-radio v-model="filters.type" native-value="wallet" size="is-small">{{trans('basic.wallet')}}</b-radio>
        </div>
      </footer>
    </div>
  </article>
</template>

<script>
  export default {
    props: {
      placeholder: {
        type: String,
        required: false,
        default: 'Search',
      },
      showSCAN: {
        type: Boolean,
        required: false,
        default: false,
      },
      showFilters: {
        type: Boolean,
        required: false,
        default: true,
      },
      type: {
        type: String,
        required: false,
        default: null,
      },
      action: {
        type: String,
        required: false,
        default: 'scan',
      },
      shorten: {
        type: [String, Number],
        required: false,
        default: 12,
      },
    },

    data() {
      return {
        filters:{
          search: '',
          searchtype: 'token',
          type: null,
          showcontent: false,
          loading: false,
          timeout: null,
        },
        results: [],
      };
    },

    watch: {
      'filters.search': {
        inmediate: true,
        handler(val) {
          let vue = this;
          vue.filters.loading = val ? true : false;
          clearTimeout(vue.filters.timeout);

          vue.filters.timeout = setTimeout(function () {
            if(val && val.length > 1) vue.search();
            else vue.results = [];
          }, 200);
        }
      },
      'filters.type': {
        inmediate: true,
        handler(val) {
          this.results = [];
          if(val) this.filters.searchtype = val;
          if(this.filters.search && this.filters.search.length > 1) this.search();
        }
      },
    },

    computed: {
      searchPlaceholder() {
        return this.filters.type === 'wallet' ? this.trans('basic.search_by_address') : this.trans('basic.search_by_address_or_name');
      },
      // scan() {
      //   return { name: 'Scan DeFi V2', symbol: 'SCAN', decimals: 9, network: 'BSC', address: this.$root.scan.contract, checksum: this.$root.scan.checksum, logo: '/images/logos/logo.svg' };
      // },
      items() {
        if(this.filters.search.length < 2 || !this.results || !this.results instanceof Array) return [];

        let vue = this;
        return this.results.filter(o => {
          let show = false;

          let search = vue.filters.search.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
          let name = o.name ? o.name.normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';
          let symbol = o.symbol ? o.symbol.normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';
          let addr = o.addr ? o.addr.normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';
          if(vue.isAddress) addr = o.contract_address ? o.contract_address.normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';

          if(name.toLowerCase().includes(search.toLowerCase())) show = true;
          if(symbol.toLowerCase().includes(search.toLowerCase())) show = true;
          if(addr.toLowerCase().includes(search.toLowerCase())) show = true;

          if(!this.showSCAN && (o.address === this.$root.scan.contract || o.address === this.$root.scan.checksum)) show = false;

          return show;
        });
      },
      hasResults() {
        return this.filters.loading || (this.items.length && this.filters.showcontent);
      },
      isAddress() {
        return this.filters.search.startsWith('0x') && this.filters.search.length === 42;
      },
    },

    methods: {
      init() {
        this.filters.type = this.type;
      },
      close() {
        this.filters.search = '';
        this.filters.showcontent = false;
      },
      selected(item) {
        this.filters.search = '';
        if(this.action === 'select'){
          this.$emit('selected', {item:item, type:this.filters.searchtype});
        }
        if(this.action === 'scan'){
          if(this.filters.type === 'token' || this.filters.searchtype === 'token') this.$root.scanToken(item);
          if(this.filters.type === 'wallet' || this.filters.searchtype === 'wallet') this.$root.scanWallet(item);
        }
      },
      cancel(item) {
        this.$emit('cancel', {item:item, type:this.filters.searchtype});
      },
      async search() {
        this.filters.loading = true;
        this.filters.searchtype = 'token';

        if(this.isAddress){
          await this.tokenByAddress();
        }else{
          if(this.filters.type === null || this.filters.type === 'token'){
            this.searchByName();
          }else if(this.filters.type === 'wallet'){
            this.results = [];
            this.filters.loading = false;
          }
        }
      },
      searchByName() {
        axios.get(`/api/tokens/search/${this.filters.search}`).then(response => {
          this.results = response.data instanceof Array ? response.data : [];
          // if(this.isAddress && !this.results.find(o => o.contract_address === this.$root.scan.address)){
          //   if(this.filters.search.toLowerCase().indexOf('sc') === 0) this.results.unshift(this.scan);
          //   else if(this.filters.search.toLowerCase().includes('defi')) this.results.unshift(this.scan);
          // }
          // if(!this.isAddress && !this.results.find(o => o.address === this.$root.scan.address)){
          //   if(this.filters.search.toLowerCase().indexOf('sc') === 0) this.results.unshift(this.scan);
          //   else if(this.filters.search.toLowerCase().includes('defi')) this.results.unshift(this.scan);
          // }
          this.filters.loading = false;
        }).catch(error => {
          this.results = [];
        });
      },
      tokenByAddress() {
        this.filters.searchtype = 'token';

        axios.get(`/api/cov/tokens/search-by-address/${this.filters.search}`).then(response => {
          if(response.data.error && this.filters.type === null){
            this.walletByAddress();
          }else{
            if(this.filters.type === 'token'){
              this.results = response.data.data;
              this.filters.loading = false;
            }else if(this.filters.type === 'wallet'){
              if(response.data.data && response.data.data.length){
                this.results = [];
                this.filters.loading = false;
              }else{
                this.walletByAddress();
              }
            }else{
              this.results = response.data.data;
              this.filters.loading = false;
            }
          }
        });
      },
      walletByAddress() {
        this.filters.searchtype = 'wallet';
        
        axios.get(`/api/cov/wallets/search-by-address/${this.filters.search}`).then(response => {
          this.results = [{address: response.data.wallet, name: response.data.wallet, symbol: response.data.wallet}];
          this.filters.loading = false;
        });
      },
      focusinput() {
        this.$refs.input.focus();
      },
    },

    mounted() {
      this.init();
    },
};
</script>
