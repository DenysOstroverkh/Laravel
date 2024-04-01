<template>
  <section class="team-card">
    <div class="team-card-image">
      <img src="/images/index/svg/frame.svg" srcset="/images/index/svg/frame.svg 1x, /images/index/svg/frame.svg 2x" alt="Frame team card">
    </div>
    <div class="team-card-name">{{name}}</div>
    <div class="team-card-work">{{work}}</div>
  </section>
</template>

<script>
  export default {
    props: {
        image: {
            type: String,
            required: false,
            default: null,
        },
        name: {
            type: String,
            required: false,
            default: null,
        },
        work: {
            type: String,
            required: false,
            default: null,
        },
    },

    data() {
      return {}
    },

    watch: {
      data: {
        inmediate: true,
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
