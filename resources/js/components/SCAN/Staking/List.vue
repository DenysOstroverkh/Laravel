<template>
  <section class="scan-staking-list-component">
    <nav v-if="false" class="scan-staking-navbar">
      <div v-if="false" class="ssn-item" :class="{'is-active':filters.layout === 'card'}" @click.stop="filters.layout = 'card'">
        <scan-icon icon="staking/grid" size="1.6rem"></scan-icon>
      </div>
      <div v-if="false" class="ssn-item" :class="{'is-active':filters.layout === 'list'}" @click.stop="filters.layout = 'list'">
        <scan-icon icon="staking/list" size="1.7rem"></scan-icon>
      </div>
      <div v-if="false" class="ssn-item m-l-20">
        <b-switch size="is-small">{{trans('staking.staked_only')}}</b-switch>
      </div>
    </nav>
    
    <section class="scan-staking-list-container" :class="classtype">
      <scan-staking-card
        icon="octopus"
        :type="filters.layout"
        :duration="30"
        :token-address="this.$root.scan.address"
        :token-decimals="this.$root.scan.decimals"
        :token-symbol="this.$root.scan.symbol"
        :token-abi="this.$root.scan.abi"
        :staking-address="this.$root.scan.staking.blocked30.address"
        :staking-abi="this.$root.scan.staking.blocked30.abi">
      </scan-staking-card>
      <scan-staking-card
        icon="shark"
        :type="filters.layout"
        :duration="90"
        :token-address="this.$root.scan.address"
        :token-decimals="this.$root.scan.decimals"
        :token-symbol="this.$root.scan.symbol"
        :token-abi="this.$root.scan.abi"
        :staking-address="this.$root.scan.staking.blocked90.address"
        :staking-abi="this.$root.scan.staking.blocked90.abi">
      </scan-staking-card>
      <scan-staking-card
        icon="whale"
        :type="filters.layout"
        :duration="180"
        :token-address="this.$root.scan.address"
        :token-decimals="this.$root.scan.decimals"
        :token-symbol="this.$root.scan.symbol"
        :token-abi="this.$root.scan.abi"
        :staking-address="this.$root.scan.staking.blocked180.address"
        :staking-abi="this.$root.scan.staking.blocked180.abi">
      </scan-staking-card>
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        filters: {
          layout: 'list',
        },
      }
    },

    watch: {
      '$root.web3.account': {
        immediate: true,
        handler(val) {
          this.checkjma();
        }
      },
      'filters.layout': {
        inmediate: true,
        handler(val) {
          window.localStorage.setItem(`filters.layout`, val);
        },
      },
    },

    computed: {
      classtype() {
        return `is-${this.filters.layout}`;
      },
    },

    methods: {
      init() {
        this.setGridLayout();
      },
      setGridLayout() {
        if(window.localStorage.getItem(`filters.layout`)){
          this.filters.layout = window.localStorage.getItem(`filters.layout`).tlc();
        }
      },
    },

    mounted() {
      this.init();
    }
  }
</script>

<style scoped>
.css-1dbjc4n * {
  font-size: .8rem !important;
  line-height: 1.2 !important;
}
</style>