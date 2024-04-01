<template>
  <div class="scan-copy-address">
    <div class="scan-copy-address-input">
      <span>{{address}}</span>
      <span class="scan-copy-address-copy" @click.prevent="copyScanAddress">
        <i class="fa fa-clone has-text-white"></i>
      </span>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      address: {
        type: String,
        required: false,
        default: trans('basic.coming_soon_dots'),
      }
    },

    data() {
      return {};
    },

    computed: {},

    methods: {
      copyScanAddress() {
        let input = document.createElement('input');
        document.body.appendChild(input);
        input.value = this.address;
        input.focus();
        input.select();
        document.execCommand('copy');
        input.parentNode.removeChild(input);

        /* Alert the copied text */
        this.$buefy.toast.open({
          message: this.trans('basic.address_copied'),
          type: 'is-success',
        });
      }
    }
};
</script>
