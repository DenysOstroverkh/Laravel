<template>
  <section class="web-report-form-component">
    <section v-if="step === 1" class="web-report-token-section">
      <p class="report-explain-text">{{trans('report.description')}}</p>

      <article class="report-category-container">
        <div class="report-category-head">
          <i class="fas fa-gavel report-category-icon"></i>
        </div>
        <div class="report-category-button">
          <button class="button is-medium is-hover-primary is-fullwidth" :class="form.type === 'token' ? 'is-primary' : 'is-dark is-inset'" @click.prevent="setReportType('token')">{{trans('report.report_token')}}</button>
        </div>
        <div class="report-category-info">
          {{trans('report.report')}}
        </div>
      </article>

      <!-- <article class="report-category-container">
        <div class="report-category-head">
          <i class="fas fa-gavel report-category-icon"></i>
        </div>
        <div class="report-category-button">
          <button class="button is-medium is-hover-primary is-fullwidth" :class="form.type === 'presale' ? 'is-primary' : 'is-dark is-inset'" @click.prevent="setReportType('presale')">Report Presale</button>
        </div>
        <div class="report-category-info">
          In this option you can report any presale of scammers public form with its characteristics.
        </div>
      </article> -->
    </section>

    <section v-if="step === 2" class="web-report-token-section">
      <p class="report-explain-text">{{trans('report.how_to')}}</p>

      <template v-if="selected">
        <searched-token-card class="is-selected m-t-20" :token="selected" :show-reports="false" can-cancel @cancel="unselect" />
        <button class="button is-medium is-primary is-fullwidth m-t-50" @click.prevent="setStep(3)">{{trans('report.report_token')}}</button>
      </template>  
      <template v-else>
        <search-box ref="searchbox" placeholder="Search by address or name" action="select" @selected="setSelected" :showFilters="false" type="token" />
      </template>
    </section>

    <section v-if="step === 3" class="web-report-token-section">
      <searched-token-card class="is-selected" :token="selected" />

      <p class="has-text-grey is-size-small m-y-20">{{trans('report.select_reasons')}}</p>

      <div v-for="(complaint, i) in filteredComplaints" :key="complaint.id" :class="i === filteredComplaints.length-1 ? 'has-sticky-sibiling' : 'm-b-7'">
        <b-checkbox v-model="form.complaints" :native-value="complaint" size="is-small">{{complaint.description}}</b-checkbox>
        <div v-if="complaint.id === 'other' && form.complaints.includes(complaint)" class="m-t-7">
          <textarea v-model="complaint.notes" class="input textarea is-size-small" rows="4" placeholder="Add custom complaint"></textarea>
        </div>
      </div>

      <div class="sticky-button-container">
        <button class="button is-medium is-fullwidth m-t-50" :class="form.complaints.length ? 'is-primary' : 'is-dark is-inset is-muted'" @click.prevent="setStep(4)">{{trans('basic.continue')}}</button>
      </div>
    </section>

    <section v-if="step === 4" class="web-report-token-section">
      <searched-token-card class="is-selected m-b-20" :token="selected" />

      <div class="web-report-complaints-container">
        <web-report-token-complaint  v-for="complaint in form.complaints" :key="complaint.id" :complaint="complaint" />
      </div>

      <textarea v-model="form.description" class="input textarea is-size-small m-t-20" rows="6" placeholder="Add your report description"></textarea>

      <p class="has-text-grey is-size-small has-text-centered m-t-20 has-sticky-sibiling">{{trans('report.controversy')}}</p>

      <div class="sticky-button-container">
        <button class="button is-medium is-primary is-fullwidth m-t-50" @click.prevent="report">Report {{form.token.symbol}}</button>
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
      token: {
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
      filteredComplaints() {
        let complaints =  this.complaints.filter(o => o.type === this.form.type);
        complaints.push({ id: 'other', description: `Other`, descriptions: {en:`Other`}, color: '#F01414', notes: null });
        return complaints;
      },
      showPrevStep() {
        if(this.token) return this.step > 3 && this.step < 5;
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
        this.setReportType('token');
        if(this.token) this.setToken();
        if(localStorage.getItem('scan.complaints')) this.complaints = JSON.parse(localStorage.getItem('scan.complaints'));
        this.getComplaints();
      },
      getComplaints() {
        axios.get(`/api/complaints`).then(response => {
          localStorage.setItem('scan.complaints', JSON.stringify(response.data.complaints));
          this.complaints = response.data.complaints;
        });
      },
      setToken() {
        this.form.type = 'token';
        this.selected = this.token;
        this.form.token = this.token;
        this.form.token_id = this.token.id || null;
        this.setStep(3);
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
        this.form.token = data.item;
        this.form.token_id = data.item.id;
        this.setStep(3);
      },
      unselect() {
        this.step = 2;
        this.selected = null;
        this.form.token = null;
        this.form.token_id = null;
        this.form.complaints = [];
      },
      report() {
        this.setStep(5);
        this.loading = true;
        this.$emit('reporting', true);
        axios.post(`/tokens/${this.form.token.id}/report`, this.form).then(response => {
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
        let link = `${window.location.origin}/scanner/token/${this.form.token.address}`;
        this.$root.clipboard(link, this.trans('report.copied'));
      },
    },

    mounted() {
      this.init();
    }
  }
</script>