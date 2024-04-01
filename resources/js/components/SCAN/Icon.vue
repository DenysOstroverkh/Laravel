<template>
  <i class="scan-icon" :style="styles"></i>
</template>

<script>
  export default {
    props: {
      icon: {
        Type: String,
        required: true,
      },
      color: {
        Type: String,
        required: false,
        default: '#fff',
      },
      size: {
        Type: String,
        required: false,
        default: '1rem',
      },
      selected: Boolean,
    },

    data () {
      return {}
    },

    computed: {
      styles() {
        return {
          '--color': this.color,
          '--mask': `url("/images/icons/${this.icon}.svg") no-repeat center / contain`,
          '--size': this.size,
        }
      }
    },

    methods: {},

    mounted() {}
  }
</script>

<style lang="scss" scoped>
  @import "./../../../sass/general/_variables.scss";

  .scan-icon{
    display: inline-block;
    width: var(--size);
    height: var(--size);
    background-color: var(--color);
    mask: var(--mask);

    &.is-selected, &.is-primary{ background-color: $primary-color; }
    &.is-secondary{ background-color: $secondary-color; }
    &.is-tertiary{ background-color: $tertiary-color; }
    &.is-danger{ background-color: $danger-color; }
    &.is-success{ background-color: $success-color; }
    &.is-info{ background-color: $info-color; }
    &.is-warning{ background-color: $warning-color; }
    &.is-black{ background-color: #000; }
    &.is-white{ background-color: #fff; }
    &.is-gray{ background-color: $modal-background; }
    &.is-text-secondary{ background-color: $text-secondary-color; }
  }
</style>
