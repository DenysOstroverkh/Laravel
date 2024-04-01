<template>
  <section class="web-report-quit-form-component">
    <searched-token-card class="is-selected" :token="token" :show-reports="false"/>
    <!-- <div class="avatar-wallet">
      <div class="wallet-logo" style="width: 35px;height: 35px;overflow: hidden;margin: 15px 15px 15px 0;padding: 5px;"><img :src="`https://avatars.dicebear.com/api/identicon/${wallet}.svg?colorLevel=300`" alt="Wallet avatar"></div>
      <div class="scanner-token-reporter">{{$root.shortenAddress(wallet, 5)}}</div>
    </div> -->

    <input v-model="form.telegram" class="input m-t-15" :class="{'is-muted':loading}" pattern="@[A-Za-z]" placeholder="@your_telegram_user">

    <textarea v-model="form.message" class="input textarea is-size-small m-t-20" :class="{'is-muted':loading}" rows="6" placeholder="Add your quit message"></textarea>

    <div class="sticky-button-container">
      <button class="button is-medium is-primary is-fullwidth m-t-50" :class="{'is-muted':disableActions}" @click.prevent="quit">{{trans('scanner.quit_token')}}</button>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      token: {
        type: Object,
        required: false,
        default: null,
      },
      wallet: {
        type: String,
        required: false,
        default: null,
      },
    },

    data() {
      return {
        form: {
          token: null,
          wallet: null,
          telegram: null,
          message: null,
        },
        loading: false,
      }
    },

    watch: {
      loading: {
        inmediate: true,
        handler(val) {
          this.$emit('loading', val);
        }
      },
      'form.telegram': {
        inmediate: true,
        handler(val) {
          if(val && val.length && val[0] !== '@') this.form.telegram = `@${val}`;
        }
      }
    },

    computed: {
      disableActions() {
        return this.loading || !this.form.telegram || !this.form.token || !this.form.wallet || !this.form.message || this.form.message.length < 3;
      },
    },

    methods: {
      init() {
        this.setData();
      },
      setData() {
        let quittoken = _.clone(this.token);
        delete quittoken.reports;
        delete quittoken.comments;
        this.form.token = quittoken;
        this.form.wallet = this.wallet;
      },
      quit() {
        this.loading = true;
        this.$emit('loading', true);
        axios.post(`/tokens/${this.form.token.id}/quit`, this.form).then(response => {
          this.loading = false;
          this.$emit('loading', false);
          this.$root.showToast('Quit request submitted correctly!');
          this.$emit('close', true);
        }).catch(error => {
          console.info(error);
          this.$emit('loading', false);
        });
      },
      close() {
        this.$emit('close', true);
        this.$router.go(0);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>