<template>
  <section class="web-course-poster" :style="{backgroundImage: `url('${course.image || '/images/academy/dummy/img_preview/preview-8.png'}'`}">
    <slot></slot>
  </section>
</template>

<script>
  export default {
    props: {
      course: {
        type: Object,
        required: true,
        default: null,
      }
    },

    data() {
      return {}
    },

    watch: {},

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
