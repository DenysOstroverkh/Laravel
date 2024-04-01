<template>
  <article class="searched-token-card-component is-wallet" :class="[type ? `${type}-card` : null, size, {'is-muted':loading, 'is-placeholder':(placeholder||!selected), 'is-address':address}]" @click="setSelected">
    <div class="searched-token-card-logo-container">
      <template v-if="!placeholder && selected">
        <img class="searched-token-card-logo" :src="selected.avatar" :alt="selected.address">
      </template>
    </div>
    <div class="searched-token-card-info-container">
      <div class="searched-token-card-info-data">
        <div class="searched-token-card-info-name">{{ (placeholder || !selected) ? null : $root.shortenAddress(selected.address, parseInt(shorten)) }}</div>
        <div class="searched-token-card-info-symbol is-size-8">{{ (placeholder || !selected) ? null : $root.shortenAddress(selected.address, parseInt(shorten)) }}</div>
      </div>
      <div v-if="!placeholder && selected" class="searched-token-card-info-extra">
        <div v-if="canCancel" class="searched-token-card-cancel" @click.prevent="cancel"></div>
        <div v-if="selected && showReports" class="searched-token-card-info-reports">
          <span class="has-text-centered is-block" v-if="selected.reports_count">{{selected.reports_count}} {{trans('basic.reports')}}</span>
          <span class="has-text-centered is-block" v-else>{{trans('basic.no_reports')}}</span>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    props: {
      wallet: {
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
      shorten: {
        type: [String, Number],
        required: false,
        default: 12,
      },
    },

    data() {
      return {
        form: {
          address: null,
        },
        selected: null,
        loading: false,
      }
    },

    watch: {
      wallet: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          this.setFormData();
        }
      },
    },

    computed: {},

    methods: {
      init() {
        this.setFormData();
      },
      setSelected() {
        let wallet = this.selected ? this.selected : this.wallet;
        this.$emit('selected', wallet);
      },
      cancel() {
        let wallet = this.selected ? this.selected : this.wallet;
        this.$emit('cancel', this.wallet);
      },
      setFormData() {
        if(this.wallet){
          this.form.address = this.wallet.address;
          this.findOrCreateWallet();
        }
      },
      findOrCreateWallet() {
        this.loading = true;
        axios.post(`/wallets/find-or-create`, this.form).then(response => {
          this.loading = false;
          this.selected = response.data.wallet;
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
