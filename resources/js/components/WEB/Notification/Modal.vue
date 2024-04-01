<template>
  <section class="scan-modal-component is-dark web-notification-modal-component">
    <div class="scan-modal">
      <header v-if="$parent.canCancel || title" class="scan-modal-head" :class="{'is-empty':!title}">
        <span v-if="$parent.canCancel" class="scan-modal-close" :class="{'is-muted':disableActions}" @click.prevent="$parent.close()"></span>
        <p v-if="title" class="scan-modal-title">{{title}}</p>
      </header>
      <section class="scan-modal-body">
        <div class="scan-notification-message" v-html="notification"></div>
        <button v-if="$parent.canCancel" class="button is-medium is-dark is-inset is-fullwidth m-t-40" @click.prevent="$parent.close()">{{trans('basic.close')}}</button>
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
      title: {
        type: String,
        required: false,
        default: null,
      },
      notification: {
        type: String,
        required: false,
        default: 'Keep calm and buy more SCAN',
      }
    },

    data() {
      return {}
    },

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
