<template>
  <section class="web-stat-component">
    <div class="up">
      <div class="title">{{title}}</div>
    </div>
    <div class="down">
      <template v-if="comingsoon">
        <div class="info is-coming-soon">{{trans('games.no_stats')}}</div>
      </template>
      <template v-else>
        <div class="stat">{{$root.formatNumber(stat)}}</div>
        <div class="info">{{info}}</div>
      </template>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      title: {
        type: String,
        required: false,
        default: null,
      },
      stat: {
        type: Number,
        required: false,
        default: null,
      },
      info: {
        type: String,
        required: false,
        default: null,
      },
      comingsoon: {
        type: Boolean,
        required: false,
        default: false,
      }

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
