<template>
  <section class="scan-modal-component scan-swap-modal-component">
    <div class="scan-modal">
      <header class="scan-modal-head">
        <span v-if="$parent.canCancel" class="scan-modal-close" @click.prevent="$parent.close()"></span>
        <p class="scan-modal-title">{{trans('swap.select_token')}}</p>
      </header>
      <section class="scan-modal-body">
        <div class="scan-swap-tokens-list">
          <scan-swap-token v-for="token in sortedSwappables" :key="token.id" :token="token" @selected="selected"/>
        </div>
        <!-- <button v-if="$parent.canCancel" class="button is-medium is-dark is-inset is-fullwidth m-t-40" @click.prevent="$parent.close()">Close</button> -->
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
      default: {
        type: Array,
        required: false,
        default: null,
      },
    },

    data() {
      return {
        required: [
          {
            address: this.$root.bnbAddress,
            logo: '/images/tokens/bnb.svg',
            symbol: 'BNB',
            decimals: 18,
            priority: 1,
          },
          {
            address: '0xe9e7cea3dedca5984780bafc599bd69add087d56',
            logo: 'https://bscscan.com/token/images/busd_32.png',
            symbol: 'BUSD',
            decimals: 18,
            priority: 2,
          },
        ],
        swappables: [],
      }
    },

    computed: {
      sortedSwappables() {
        if(!this.swappables || !this.swappables.length) return [];

        return this.swappables.sort((a,b) => {
          if(a.priority - b.priority !== 0) return a.priority - b.priority;
          return b.symbol - a.symbol
        });
      },
    },

    methods: {
      init() {
        this.initSwappablesAndConcat(this.default);
        this.getSwappables();
      },
      initSwappablesAndConcat(tokens = null) {
        this.swappables = tokens ? this.$root.cloneObject(this.required).concat(tokens) : this.$root.cloneObject(this.required);
      },
      getSwappables() {
        axios.get(`/api/tokens/swappables`).then(response => {
          this.initSwappablesAndConcat(response.data.tokens);
        });
      },
      selected(token) {
        this.$emit('selected', token);
        this.$parent.close();
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
