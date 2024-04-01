<template>
  <section class="scan-modal-component is-large web-courses-preview-modal-component">
    <div class="scan-modal">
      <section class="scan-modal-body">
        <web-course-preview :course="course"></web-course-preview>
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

    methods: {},

    mounted() {}
  }
</script>
