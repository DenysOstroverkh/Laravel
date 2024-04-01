<template>
  <section class="web-course-card-component">
    <div class="web-course-card" :class="{'pointer-events-none':false}" @click.prevent="preview">
      <div ref="background" class="web-course-card-background-image" :style="{backgroundImage: `url('${course.image}'`}"></div>
      <div class="web-course-card-content">
        <span class="web-course-card-category">{{course.category.name}}</span>
        <div class="web-course-card-students">
          <img class="web-course-card-footer-students-img" src="/images/icons/user.svg" alt="Course | Students">
          <span class="studenst-count has-text-weight-light">{{course.students_count}}</span>
        </div>
        <div class="web-course-card-main-info">
          <div class="web-course-card-title is-weight-600 m-b-5">{{course.title}}</div>
          <div class="web-course-card-teacher m-b-10 has-text-weight-light">By {{course.mentor.fullname}}</div>
          <div class="web-course-card-price web-course-info-stats" :class="{'has-discount': course.discount, 'is-free':!course.final_price}">
            <template v-if="course.comingsoon">
              <div class="wc-free-container">
                <div class="wc-free-icon">
                  <img class="wc-free-image" src="/images/icons/free_primary.svg" alt="Free course">
                </div>
                <div class="wc-free-info">
                  <div class="wc-free-title">{{trans('basic.coming_soon')}}</div>
                  <div class="wc-free-text">{{trans('academy.will_be_available')}}</div>
                </div>
              </div>
            </template>
            <template v-else>
              <template v-if="course.final_price">
                <div v-if="course.discount" class="wc-discount">{{discountText}} {{trans('basic.dct')}} <del>{{$root.formatNumber(course.price)}} SCAN</del></div>
                <div v-if="course.price" class="wc-price-container">
                  <!-- <img class="wc-price-logo" src="/images/logos/logo.svg" alt="Scan DeFi logo"> -->
                  <div class="wc-price-dollar">
                    <div class="wc-price">{{$root.formatNumber(course.final_price)}} SCAN</div>
                    <div class="wc-dollar"> ≈ {{$root.formatMoney(course.final_price * $root.scan.price.busd)}}</div>
                  </div>
                </div>
              </template>
              <template v-else>
                <div class="wc-free-container">
                  <div class="wc-free-icon">
                    <img class="wc-free-image" src="/images/icons/free_primary.svg" alt="Free course">
                  </div>
                  <div class="wc-free-info">
                    <div class="wc-free-title">{{trans('basic.free_content')}}</div>
                    <div class="wc-free-text">{{trans('academy.exclusive_course')}}</div>
                  </div>
                </div>
              </template>
            </template>
          </div>
          <div class="web-course-card-footer">
            <web-course-buy-button :course="course"></web-course-buy-button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import CoursePreviewModalForm from '../Courses/ModalPreview.vue';

  export default {
    props: {
      course: {
        type: Object,
        required: false,
        default: null,
      },
    },

    data() {
      return {}
    },

    watch: {},

    computed: {
      discountText() {
        let discountText = this.course.discount + '';
        discountText += this.course.discount_type === 'percentage' ? '%' : ' SCAN';
        return discountText;
      },
    },

    methods: {
      init() {},
      preview() {
        if(this.course.comingsoon) return;

        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: CoursePreviewModalForm,
          canCancel: true,
          props: { course: this.course },
          events: {},
          onCancel: () => {}
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
