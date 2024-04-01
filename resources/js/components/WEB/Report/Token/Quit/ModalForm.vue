<template>
  <section class="scan-modal-component web-report-quit-modal-form-component">
    <div class="scan-modal">
      <header class="scan-modal-head">
        <span class="scan-modal-close" :class="{'is-muted':disableActions}" @click.prevent="$parent.close()"></span>
        <p class="scan-modal-title">{{trans('scanner.quit_token')}}</p>
        <!-- <button type="button" class="delete" @click="$emit('close')"/> -->
      </header>
      <section class="scan-modal-body">
        <web-quit-token-form ref="form" :token="token" :wallet="wallet" @loading="setDisableActions" @close="$parent.close()" />
      </section>
      <!-- <footer class="scan-modal-foot">
        <button class="button is-dark" @click="$emit('close')">Close</button>
        <button class="button is-primary">Login</button>
      </footer> -->
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      token: {
        type: Object,
        required: false,
        default: null,
      },
      wallet: {
        type: String,
        required: false,
        default: null,
      },
    },

    data() {
      return {
        disableActions: false,
      }
    },

    computed: {},

    methods: {
      setDisableActions(bool) {
        this.disableActions = bool;
      },
    },

    mounted() {}
  }
</script>

<style scoped lang="scss">
  .web-report-quit-modal-form-component{
    width: 340px;
    max-width: 90vw;
  }
</style>
