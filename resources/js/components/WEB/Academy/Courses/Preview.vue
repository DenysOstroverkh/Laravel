<template>
  <section class="web-course-preview">
    <section v-if="course.preview" class="web-course-preview-video">
      <youtube v-if="course.preview" :videoId="course.preview" maxWidth="100%"></youtube>
    </section>
    <web-course-poster v-else :course="course"></web-course-poster>
    <section class="web-course-info-container">
      <div class="web-course-info-text">
        <div class="wc-title">{{course.title}}</div>
        <div class="wc-subtitle">{{course.subtitle}}</div>
        <div class="wc-teacher">{{trans('academy.course_by')}} {{course.mentor.fullname}}</div>
        <div class="wc-description">{{course.description}}</div>
        <div class="wc-more">
          <a class="button is-white is-outlined is-rounded" @click.prevent="goto">{{trans('academy.learn_more')}} →</a>
        </div>
      </div>
      <web-course-stats :course="course"></web-course-stats>
    </section>
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
      return {}
    },

    watch: {
      data: {
        immediate: true,
        deep: true,
        handler(val, oldVal) {
          //do something
        }
      },
    },

    computed: {},

    methods: {
      goto() {
        this.$root.destroyModals();

        this.$router.push({
          name: 'academy.course.show',
          params: {
            course: this.course.slug
          }
        });
      },
    },

    mounted() {}
  }
</script>