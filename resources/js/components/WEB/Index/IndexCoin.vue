<template>
  <section class="coin-index">
    <div class="coin-index-main">
      <div class="coin-index-main-image">
        <img class="scan-more-info-img" :src="image" :srcset="image" alt="Token image">
      </div>
      <div class="coin-index-main-text">
          <p class="coin-index-main-text-1 has-text-white">{{top}}</p>
          <p class="coin-index-main-text-2">{{bottom}}</p>
      </div>
    </div>
    <div class="coin-index-report">
        <span><div :style="{background: color}" class="coin-index-report-color"></div></span>
        <div class="coin-index-report-comment">
            <p class="has-text-white">{{comment}}</p>
        </div>
    </div>
    <div class="coin-index-bar">
        <b-progress :value="number" show-value :type="barColor">
            {{reports}} {{trans('basic.reports')}}
        </b-progress>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
        top: {
            type: String,
            required: false,
            default: null,
        },
        bottom: {
            type: String,
            required: false,
            default: null,
        },
        image: {
            type: String,
            required: false,
            default: null,
        },
        comment: {
            type: String,
            required: false,
            default: null,
        },
        
        reports: {
            type: Number,
            required: false,
            default: null,
        },
        number: {
            type: Number,
            required: false,
            default: null,
        },
        image: {
            type: String,
            required: false,
            default: null,
        },
        color: {
            type: String,
            required: false,
            default: null,
        },
        barColor: {
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
