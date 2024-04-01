<template>
  <section class="scan-modal-component is-dark scan-alert-modal-component">
    <div class="scan-modal">
      <section class="scan-modal-body">
        <div class="scan-alert-icon">
          <img src="/images/icons/alert-check.svg" alt="Scan DeFi icon">
        </div>
        <div v-if="title" class="scan-alert-title" v-html="title"></div>
        <div v-if="message" class="scan-alert-message" v-html="message"></div>
      </section>
      <footer class="scan-modal-foot">
        <button class="close-button button is-primary" @click.prevent="close">{{trans('basic.done')}}</button>
      </footer>
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
      message: {
        type: String,
        required: false,
        default: null,
      },
      type: {
        type: String,
        required: false,
        default: 'is-success',
      },
    },

    data() {
      return {}
    },

    watch: {},

    computed: {},

    methods: {
      close() {
        this.$emit('closed', true);
        this.$parent.close();
      },
    },

    mounted() {}
  }
</script>