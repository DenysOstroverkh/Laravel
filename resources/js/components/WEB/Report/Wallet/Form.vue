<template>
  <section class="web-report-form-component">
    <section v-if="step === 1" class="web-report-token-section">
      <p class="report-explain-text">{{trans('report.description')}}</p>

      <article class="report-category-container">
        <div class="report-category-head">
          <i class="fas fa-gavel report-category-icon"></i>
        </div>
        <div class="report-category-button">
          <button class="button is-medium is-hover-primary is-fullwidth" :class="form.type === 'token' ? 'is-primary' : 'is-dark is-inset'" @click.prevent="setReportType('wallet')">{{trans('report.report_wallet')}}</button>
        </div>
        <div class="report-category-info">
          {{trans('report.report')}}
        </div>
      </article>
    </section>

    <section v-if="step === 2" class="web-report-token-section">
      <p class="report-explain-text">{{trans('report.how_to_wallet')}}</p>

      <template v-if="selected">
        <searched-wallet-card class="is-selected m-t-20" :wallet="selected" :show-reports="false" can-cancel @cancel="unselect" :shorten="8" />
        <button class="button is-medium is-primary is-fullwidth m-t-50" @click.prevent="setStep(3)">{{trans('report.report_wallet')}}</button>
      </template>  
      <template v-else>
        <search-box ref="searchbox" placeholder="Search by address" action="select" @selected="setSelected" :showFilters="false" type="wallet" />
      </template>
    </section>

    <section v-if="step === 3" class="web-report-token-section">
      <searched-wallet-card class="is-selected" :wallet="selected" :show-reports="false" :shorten="8" />

      <p class="has-text-grey is-size-small m-y-20">{{trans('report.related')}}</p>
      <searched-token-card v-if="form.token" class="is-selected m-t-20" :token="form.token" :show-reports="false" can-cancel @cancel="unselectToken" />
      <search-box v-else ref="searchboxtoken" placeholder="Search by address or name" action="select" @selected="setToken" :showFilters="false" type="token" />

      <p class="has-text-grey is-size-small m-y-20">{{trans('report.select_reasons')}}</p>
      <span> <!-- class="m-b-7" -->
        <b-checkbox v-model="form.complaints" :native-value="'whale'" size="is-small">{{trans('basic.whale')}}</b-checkbox>
      </span>

      <span> <!-- class="m-b-7" -->
        <b-checkbox v-model="form.complaints" :native-value="'trader'" size="is-small">{{trans('basic.trader')}}</b-checkbox>
      </span>

      <span> <!-- class="m-b-7" -->
        <b-checkbox v-model="form.complaints" :native-value="'scammer'" size="is-small">{{trans('basic.scammer')}}</b-checkbox>
      </span>

      <div class="sticky-button-container">
        <button class="button is-medium is-fullwidth m-t-50" :class="form.complaints.length && form.token_id ? 'is-primary' : 'is-dark is-inset is-muted'" @click.prevent="setStep(4)">{{trans('basic.continue')}}</button>
      </div>
    </section>

    <section v-if="step === 4" class="web-report-token-section">
      <searched-wallet-card class="is-selected m-b-20" :wallet="selected" :shorten="8" />

      <div class="web-report-complaints-container has-text-centered">
        <b-tooltip label="Whale" type="is-black" size="is-small"><i class="fas fa-fish is-size-3 m-x-10" :class="form.complaints.includes('whale') ? 'has-text-primary' : 'is-muted-dark'"></i></b-tooltip>
        <b-tooltip label="Trader" type="is-black" size="is-small"><i class="fas fa-sync is-size-3 m-x-10" :class="form.complaints.includes('trader') ? 'has-text-warning' : 'is-muted-dark'"></i></b-tooltip>
        <b-tooltip label="Scammer" type="is-black" size="is-small"><i class="fas fa-skull is-size-3 m-x-10" :class="form.complaints.includes('scammer') ? 'has-text-danger' : 'is-muted-dark'"></i></b-tooltip>
      </div>

      <textarea v-model="form.description" class="input textarea is-size-small m-t-20" rows="6" placeholder="Add your report description"></textarea>

      <p class="has-text-grey is-size-small has-text-centered m-t-20 has-sticky-sibiling">{{trans('report.controversy')}}</p>

      <div class="sticky-button-container">
        <button class="button is-medium is-primary is-fullwidth m-t-50" @click.prevent="report">{{trans('report.report_wallet')}}</button>
      </div>
    </section>

    <section v-if="step === 5" class="web-report-token-section">
      <article class="web-report-token-success-container">
        <p v-if="loading" class="has-text-centered is-size-5 is-weight-700">{{trans('report.wait')}}</p>
        <p v-else class="has-text-centered is-size-5 is-weight-700">{{trans('report.terminated')}}</p>
        
        <div class="report-success" :class="{'is-loading':loading}">
          <i v-if="loading" class="fas fa-hourglass-half"></i>
          <i v-else class="fas fa-gavel report-category-icon"></i>
        </div>

        <p class="has-text-grey is-size-small has-text-centered">{{trans('report.controversy')}}</p>

        <button class="button is-medium is-primary is-fullwidth m-t-50" :class="{'is-muted':loading}" @click.prevent="share">{{trans('report.share_link')}}</button>
        <button class="button is-medium is-dark is-inset is-fullwidth m-t-10" :class="{'is-muted':loading}" @click.prevent="close">{{trans('basic.close')}}</button>
      </article>
    </section>
  </section>
</template>

<script>
  export default {
    props: {
      wallet: {
        type: Object,
        required: false,
        default: null,
      }
    },

    data() {
      return {
        step: 1,
        form: {
          type: null,
          wallet: null,
          wallet_id: null,
          token: null,
          token_id: null,
          complaints: [],
          description: null,
        },
        selected: null,
        complaints: [],
        loading: false,
      }
    },

    watch: {
      step: {
        inmediate: true,
        handler(val, oldVal) {
          this.$emit('step', {step:val, showPrevStep:this.showPrevStep, showNextStep:this.showNextStep});
          if(val === 2) setTimeout(() => { this.$refs.searchbox.focusinput(); }, 50);
        }
      },
      'form.type': {
        inmediate: true,
        handler(val, oldVal) {
          this.$emit('type', val);
        }
      },
      loading: {
        inmediate: true,
        handler(val) {
          this.$emit('reporting', val);
        }
      }
    },

    computed: {
      showPrevStep() {
        if(this.wallet) return this.step > 3 && this.step < 5;
        return this.step > 2 && this.step < 5;
      },
      showNextStep() {
        if(this.step === 1) return this.form.type ? true : false;
        if(this.step === 2) return this.form.complaints.length ? true : false;
        if(this.step === 3) return this.form.complaints.length && this.form.description ? true : false;
        if(this.step === 4) return false;
        if(this.step === 5) return false;
      },
    },

    methods: {
      init() {
        this.setReportType('wallet');
        if(this.wallet) this.setWallet();
        if(localStorage.getItem('scan.complaints')) this.complaints = JSON.parse(localStorage.getItem('scan.complaints'));
        this.getComplaints();
      },
      getComplaints() {
        axios.get(`/api/complaints`).then(response => {
          localStorage.setItem('scan.complaints', JSON.stringify(response.data.complaints));
          this.complaints = response.data.complaints;
        });
      },
      setWallet() {
        this.form.type = 'wallet';
        this.selected = this.wallet;
        this.form.wallet = this.wallet;
        this.form.wallet_id = this.wallet.id || null;
        this.setStep(3);
      },
      setToken(data) {
        this.form.token = data.item;
        this.form.token_id = data.item.id;
      },
      unselectToken() {
        this.form.token = null;
        this.form.token_id = null;
      },
      setStep(step) {
        this.step = step;
      },
      setReportType(type) {
        this.form.type = type;
        if(this.step === 1) this.setStep(2);
      },
      stepDown() {
        this.step --;
      },
      stepUp() {
        this.step ++;
      },
      setSelected(data) {
        this.selected = data.item;
        this.form.wallet = data.item;
        this.form.wallet_id = data.item.id;
        this.setStep(3);
      },
      unselect() {
        this.step = 2;
        this.selected = null;
        this.form.wallet = null;
        this.form.wallet_id = null;
        this.form.complaints = [];
      },
      report() {
        this.setStep(5);
        this.loading = true;
        this.$emit('reporting', true);
        axios.post(`/wallets/${this.form.wallet.id}/report`, this.form).then(response => {
          this.loading = false;
          this.$emit('reporting', false);
        }).catch(error => {
          console.info(error);
          this.$emit('reporting', false);
        });
      },
      close() {
        this.$emit('close', true);
        this.$router.go(0);
      },
      share() {
        let link = `${window.location.origin}/scanner/wallet/${this.form.wallet.address}`;
        this.$root.clipboard(link, this.trans('report.copied'));
      },
    },

    mounted() {
      this.init();
    }
  }
</script>