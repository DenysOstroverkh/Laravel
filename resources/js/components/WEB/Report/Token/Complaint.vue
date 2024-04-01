<template>
  <section class="web-report-complaint">
    <span class="web-report-complaint-border" :style="{backgroundColor: `${complaint.color}`}"></span>
    {{complaint.customizable && complaint.customization ? complaint.customization : complaint.description}}
  </section>
</template>

<script>
  export default {
    props: {
      complaint: {
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
