<template>
  <section class="tokenomics-background">
    <div class="tokenomics-intro">
      <p class="tokenomics-intro-image has-text-success">O</p>
      <p class="has-text-success">Scanner 1.0 data</p>
    </div>
    <div class="tokenomics-card">


      <div class="tokenomics-card-info">
        <div class="tokenomics-card-info-data">
          <span class="title">{{trans('basic.contract')}}:</span>
          <div class="copy-contract">
            <p class="data net">BEP-20</p>
            <p class="data" @click.prevent="$root.clipboard($root.scan.contract, 'Address copied to clipboard!')">{{$root.shortenAddress($root.scan.contract)}}</p>
            <i class="far fa-copy cur-p m-x-7" @click.prevent="$root.clipboard($root.scan.contract)"></i>
          </div>
        </div>
        <div class="tokenomics-card-info-data">
          <span class="title">{{trans('basic.max_supply')}}:</span>
          <span class="data">1,000,000,000 SCAN</span>
        </div>
      </div>

      <div class="tokenomics-card-content">
        <div class="tokenomics-card-transaction">
          <div class="tokenomics-card-transaction-title">
              <p>{{trans('basic.transaction')}}</p>
          </div>
          
          <div class="tokenomics-card-table">
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.liquidity')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">1%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.marketing')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">4%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.transaction')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">95%</span>
            </div>
          </div>
        </div>
        <div class="tokenomics-card-transaction">
          <div class="tokenomics-card-transaction-title">
              <p>{{trans('basic.distribution')}}</p>
          </div>
          
          <div class="tokenomics-card-table">
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.public_sale')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">70%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.burn_reward')}}: </span>
              <span class="tokenomics-card-cell data has-text-success">10%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{choice('basic.partner', 2)}}:</span>
              <span class="tokenomics-card-cell data has-text-success">8%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.development')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">7%</span>
            </div>
            <div class="tokenomics-card-row">
              <span class="tokenomics-card-cell data title">{{trans('basic.marketing')}}:</span>
              <span class="tokenomics-card-cell data has-text-success">5%</span>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

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
