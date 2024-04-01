<template>
  <article class="media-card">
    <div class="media-card-info">
      <div class="media-card-info-top">{{top}}</div>
      <div class="media-card-info-center" :style="style">{{center}}</div>
      <template v-if="bottom">
        <a v-if="link" :href="link" class="media-card-info-bottom media-card-info-link">{{bottom}}</a>
        <div v-else class="media-card-info-bottom">{{bottom}}</div>
      </template>
    </div>
  </article>
</template>

<script>
  export default {
    props: {
      top: {
        type: String,
        required: false,
        default: null,
      },
      center: {
        type: String,
        required: false,
        default: null,
      },
      bottom: {
        type: String,
        required: false,
        default: null,
      },
      link: {
        type: String,
        required: false,
        default: null,
      },
      loading: {
        type: Boolean,
        required: false,
        default: false,
      },
    },

    data() {
      return {};
    },

    computed: {
      style() {
        return this.loading ? {filter: 'blur(4px)', pointerEvents:'none'} : null;
      },
    },

    methods: {}
};
</script>
