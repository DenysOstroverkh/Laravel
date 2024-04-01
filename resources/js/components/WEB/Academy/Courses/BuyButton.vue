<template>
  <section class="web-course-buy-button-component">
    <template v-if="course.comingsoon">
      <button class="buy-button button is-primary is-semirounded is-fullwidth pointer-events-none">{{buyButtonText}}</button>
    </template>
    <template v-else>
      <button v-if="authuserEnrolledToCourse" class="buy-button button is-primary is-semirounded is-fullwidth" @click.stop="gotoCourse">{{trans('academy.go_to_class')}}</button>
      <button v-else class="buy-button button is-primary is-semirounded is-fullwidth" :class="{'is-loading':loading.buy}" @click.stop="buyButtonClick">{{buyButtonText}}</button>
    </template>
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
        if(this.course.comingsoon) return this.trans('basic.coming_soon');
        return this.course.final_price ? this.trans('basic.buy_now') : this.trans('academy.start_course');
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
          this.showAlert(this.trans('basic.congrats'), this.trans('academy.enrolled', {title:this.course.title}));
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