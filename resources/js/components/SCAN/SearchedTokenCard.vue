<template>
  <article class="searched-token-card-component" :class="[type ? `${type}-card` : null, size, {'is-muted':loading, 'is-placeholder':placeholder, 'is-address':(address || cov), 'cur-p':scan}]" @click="setSelected">
    <div class="searched-token-card-logo-container">
      <template v-if="!placeholder">
        <img v-show="logoerror === false" class="searched-token-card-logo" :src="tokenlogo" :alt="form.name" @error="logoerror = true" @load="logoerror = false">
        <span v-show="logoerror === true" class="searched-token-image-missing">?</span>
      </template>
    </div>
    <div class="searched-token-card-info-container">
      <div class="searched-token-card-static-info">
        <div class="searched-token-card-info-data">
          <div class="searched-token-card-info-name">{{ placeholder ? null : form.name }}</div>
          <div class="searched-token-card-info-symbol">{{ placeholder ? null : form.symbol }}</div>
        </div>
        <div v-if="!placeholder" class="searched-token-card-info-extra">
          <div v-if="canCancel" class="searched-token-card-cancel" @click.prevent="cancel"></div>
          <div v-if="selected && showReports" class="searched-token-card-info-reports">
            <span class="has-text-centered is-block" v-if="selected.reports_count">{{selected.reports_count}} {{trans('basic.reports')}}</span>
            <span class="has-text-centered is-block" v-else>{{trans('basic.no_reports')}}</span>
          </div>
        </div>
      </div>
      <div v-if="otherinfo" class="searched-token-card-other-info">
        <div v-if="balance">
          <span class="other-info-balance">{{formattedBalance}}</span>
          <span class="other-info-balance-symbol">{{form.symbol}}</span>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    props: {
      token: {
        type: Object,
        required: false,
        default: null,
      },
      dummy: {
        type: Boolean,
        required: false,
        default: false,
      },
      canCancel: {
        type: Boolean,
        required: false,
        default: false,
      },
      showReports: {
        type: Boolean,
        required: false,
        default: true,
      },
      placeholder: {
        type: Boolean,
        required: false,
        default: false,
      },
      address: {
        type: Boolean,
        required: false,
        default: false,
      },
      cov: {
        type: Boolean,
        required: false,
        default: false,
      },
      type: {
        type: String,
        required: false,
        default: null,
      },
      size: {
        type: String,
        required: false,
        default: null,
      },
      scan: {
        type: Boolean,
        required: false,
        default: false,
      },
      balance: {
        type: [String, Number],
        required: false,
        default: null,
      },
    },

    data() {
      return {
        logoerror: null,
        form: {
          name: null,
          symbol: null,
          network: null,
          address: null,
          checksum: null,
          logo: null,
        },
        checksum: null,
        selected: null,
        loading: false,
      }
    },

    watch: {
      token: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          this.setChecksum();
          this.setFormData();
        }
      },
      checksum: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          this.setFormData();
        }
      },
    },

    computed: {
      tokenlogo() {
        if(this.checksum && this.checksum === this.$root.checksumaddress(this.$root.scan.contract)) return '/images/logos/logo.svg';
        if(!this.form.address) return;
        return `https://raw.githubusercontent.com/trustwallet/assets/master/blockchains/smartchain/assets/${this.$root.checksumaddress(this.form.address)}/logo.png`;
      },
      otherinfo() {
        let result = false;
        if(this.balance) result = true;
        return result;
      },
      formattedBalance() {
        if(!this.balance) return 0;
        if(!this.selected) return 0;
        return (this.address || this.cov) ? this.$root.formatNumber(this.balance / (10**this.selected.decimals)) : this.$root.formatNumber(this.balance / (10**this.selected.decimals));
      },
    },

    methods: {
      init() {
        this.setChecksum();
      },
      setChecksum() {
        if(!this.token) return;
        this.checksum = (this.address || this.cov) ? this.$root.checksumaddress(this.token.contract_address) : this.$root.checksumaddress(this.token.address);
      },
      setSelected() {
        let token = this.selected ? this.selected : this.token;
        if(this.scan) this.$root.scanToken(token);
        this.$emit('selected', token);
      },
      cancel() {
        let token = this.selected ? this.selected : this.token;
        this.$emit('cancel', this.token);
      },
      setFormData() {
        this.form.name = (this.address || this.cov) ? this.token.contract_name : this.token.name;
        this.form.symbol = (this.address || this.cov) ? this.token.contract_ticker_symbol : this.token.symbol;
        this.form.network = 'BSC';
        this.form.address = (this.address || this.cov) ? this.token.contract_address : this.token.address;
        this.form.checksum = this.checksum;
        this.form.decimals = (this.address || this.cov) ? this.token.contract_decimals : this.token.decimals;
        this.form.logo = this.tokenlogo;
        if(this.token.id) this.selected = this.token;
        else this.updateOrCreate();
        // else this.findOrCreateToken();
      },
      updateOrCreate() {
        this.loading = true;
        axios.post(`/tokens/update-or-create`, this.form).then(response => {
          this.loading = false;
          this.selected = response.data.token;
        }).catch(error => {
          console.info(error);
          this.loading = false;
        });
      },
      findOrCreateToken() {
        this.loading = true;
        axios.post(`/tokens/find-or-create`, this.form).then(response => {
          this.loading = false;
          this.selected = response.data.token;
        }).catch(error => {
          console.info(error);
          this.loading = false;
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
