<template>
  <section class="scan-modal-component is-dark web-courses-buy-modal-component">
    <div class="scan-modal">
      <section class="scan-modal-body pos-r">
        <div class="buy-background-image" :style="{backgroundImage: `url('/images/index/png/MovilScan.png')`}"></div>
        <div class="buy-background-gradient"></div>
        <div class="buy-content pos-r">
          <div class="web-course-info-stats">
            <div class="course-buy-title">{{course.title}}</div>
            <div class="course-buy-teacher">By {{course.mentor.fullname}} <img class="cbt-verify" src="/images/icons/verify.svg" alt="Scan DeFi icon"></div>
            <div v-if="course.discount" class="wc-discount">{{discountText}} Dct. <del>{{$root.formatNumber(course.price)}} SCAN</del></div>
            <template v-if="course.price">
              <div class="course-will-pay">{{trans('basic.you_pay')}}</div>
              <div class="wc-price-container">
                <img class="wc-price-logo" src="/images/logos/logo.svg" alt="Scan DeFi logo">
                <div class="wc-price">{{$root.formatNumber(course.final_price)}} SCAN</div>
              </div>
              <div class="wc-dollar"> ≈ {{$root.formatMoney(course.final_price * $root.scan.price.busd)}}</div>
            </template>
          </div>
          <div v-if="needMoreScan" class="course-buy-morescan">
            <div class="morescan-alert">
              <div class="ma-icon">
                <span>!</span>
              </div>
              <div class="ma-message">
                <p>{{trans('basic.not_enough_scan')}}</p>
                <a>{{trans('navbar.buy_pancake')}}</a>
              </div>
            </div>
            <div class="available-scan">
              <span>{{trans('basic.available_scan')}}</span>
              <span>{{$root.wallet.balance_text}} SCAN</span>
            </div>
          </div>
          <div class="course-buy-footer">
            <button class="buy-button button is-primary" :class="{'is-loading':loading.buy}" :disabled="needMoreScan" @click.prevent="submit">{{buyButtonText}}</button>
          </div>
        </div>
      </section>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      course: {
        type: Object,
        required: true,
        default: null,
      },
    },

    data() {
      return {
        loading: {
          buy: false,
        },
      }
    },

    watch: {},

    computed: {
      buyButtonText() {
        return this.course.final_price ? this.trans('basic.buy_now') : this.trans('academy.start_course');
      },
      discountText() {
        let discountText = this.course.discount + '';
        discountText += this.course.discount_type === 'percentage' ? '%' : ' SCAN';
        return discountText;
      },
      needMoreScan() {
        return this.course.final_price && (parseFloat(this.$root.wallet.balance) < parseFloat(this.course.final_price));
      },
    },

    methods: {
      submit() {
        this.course.final_price ? this.buy() : this.enroll();
      },
      enroll() {
        this.loading.buy = true;
        axios.post(`/courses/${this.course.id}/subscribe`).then(response => {
          this.showAlert(this.trans('basic.congrats'), this.trans('academy.enrolled', {title:this.course.title}));
        }).catch(error => {
          console.info(error);
          this.loading.buy = false;
        });
      },
      buy() {
        if(this.needMoreScan) return;

        let vue = this;
        vue.loading.buy = true;
        setTimeout(function(){
          vue.loading.buy = false;
          vue.$root.showAlert(this.trans('basic.success'), this.trans('academy.implement'));
        }, 1000);
      },
    },

    mounted() {}
  }
</script>