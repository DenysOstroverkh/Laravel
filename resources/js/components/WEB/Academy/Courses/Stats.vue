<template>
  <section class="web-course-info-stats">
    <div v-if="course.discount" class="wc-discount">{{discountText}} Dct. <del>{{$root.formatNumber(course.price)}} SCAN</del></div>
    <div v-if="course.price" class="wc-price-container">
      <img class="wc-price-logo" src="/images/logos/logo.svg" alt="Scan DeFi logo">
      <div class="wc-price-dollar">
        <div class="wc-price">{{$root.formatNumber(course.final_price)}} SCAN</div>
        <div class="wc-dollar"> ≈ {{$root.formatMoney(course.final_price * $root.scan.price.busd)}}</div>
      </div>
    </div>
    <template v-if="$root.walletConnected">
      <web-course-buy-button :course="course"></web-course-buy-button>
    </template>
    <button v-else class="buy-button button is-primary is-semirounded is-fullwidth" @click.prevent="$root.connectWallet();">{{trans('basic.connect_wallet')}}</button>
    <div v-if="course.discount_deadline" class="wc-deadline-container">
      <div class="wc-deadline-text">{{trans('academy.offer_ends_in')}}:</div>
      <div class="wc-deadline-countdown">01{{trans('basic.char_days')}} : 01{{trans('basic.char_hours')}} : 23{{trans('basic.char_minutes')}} : 45{{trans('basic.char_seconds')}}</div>
    </div>
    <div class="wc-stats-container">
      <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/star.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{trans('basic.level')}}: <span class="has-text-warning">{{course.level.name}}</span></div>
      </div>
      <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/video-play.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{course.lessons_count}}  {{trans('academy.unlimited_classes').toLowerCase()}}</div>
      </div>
      <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/user.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{course.students_count}} {{choice('academy.student', course.students_count)}}</div>
      </div>
      <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/like.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{course.positive_votes_percentage}}% {{trans('academy.positive_votes')}}</div>
      </div>
      <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/clock.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{trans('basic.duration')}}: {{course.duration}}</div>
      </div>
      <!-- <div class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/subtitles.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">Subtitles: {{subtitlesText}}</div>
      </div> -->
      <div v-if="course.nft_certification" class="wc-stat">
        <img class="wc-stat-icon" src="/images/icons/award.svg" alt="Scan DeFi icon" />
        <div class="wc-stat-text">{{trans('academy.nft_certification_end')}}</div>
      </div>
    </div>
  </section>
</template>

<script>
  import CourseBuyModalForm from './ModalBuy.vue';
  import AlertModal from '../../../SCAN/AlertModal';

  export default {
    props: {
      course: {
        type: Object,
        required: true,
        default: null,
      }
    },

    data() {
      return {
        enrolls: [],
        loading: {
          enrolls: false,
          buy: false,
        },
      }
    },

    watch: {
      '$store.state.Authuser.authuser': {
        immediate: true,
        handler(val) {
          if(val) this.getUserEnrolls();
        }
      },
    },

    computed: {
      buyButtonText() {
        return this.course.final_price ? this.trans('basic.buy_now') : this.trans('academy.start_course');
      },
      discountText() {
        let discountText = this.course.discount + '';
        discountText += this.course.discount_type === 'percentage' ? '%' : ' SCAN';
        return discountText;
      },
      subtitlesText() {
        return 'Español, English, Portugués, Deutche, François';
      },
      authuserEnrolledToCourse() {
        return !this.loading.enrolls && this.enrolls.find(o => o.id === this.course.id);
      },
    },

    methods: {
      init() {
        // if(this.$store.state.Authuser.authuser) this.getUserEnrolls();
        if(this.$root.authuser) this.getUserEnrolls();
      },
      getUserEnrolls() {
        this.loading.enrolls = true;
        // let authuser = this.$store.state.Authuser.authuser;
        let authuser = this.$root.authuser;
        axios.get(`/api/users/${authuser.id}/enrolls`).then(response => {
          this.enrolls = response.data;
          this.loading.enrolls = false;
        }).catch(error => {
          console.info(error);
          this.loading.enrolls = false;
        });
      },
      gotoCourse() {
        // this.$router.push({
        //   name: 'classroom.lesson',
        //   params: {
        //     course: this.course.slug,
        //     lesson: '9999999',
        //   }
        // });
        location.href = `/classroom/courses/${this.course.id}`;
      },
      buyButtonClick() {
        if(this.loading.buy) return;
        this.course.final_price ? this.buy() : this.enroll();
      },

      enroll() {
        this.loading.buy = true;
        axios.post(`/courses/${this.course.id}/subscribe`).then(response => {
          this.showAlert(this.trans('basic.congrats'), this.trans('academy.enrolled', {title: this.course.title}));
        }).catch(error => {
          console.info(error);
          this.loading.buy = false;
        });
      },
      buy() {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: CourseBuyModalForm,
          canCancel: true,
          props: { course: this.course },
          events: {},
          onCancel: () => {}
        });
      },
      showAlert(title, message) {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: AlertModal,
          canCancel: false,
          props: { title: title, message: message },
          events: {
            closed: bool => {
              // vue.$router.push({
              //   name: 'classroom.lesson',
              //   params: {
              //     course: vue.course.slug,
              //     lesson: '9999999',
              //   }
              // });
              location.href = `/classroom/courses/${this.course.id}`;
            },
          },
          onCancel: () => {}
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
