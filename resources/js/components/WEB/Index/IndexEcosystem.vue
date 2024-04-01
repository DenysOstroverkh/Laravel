<template>
    <div class="scan-ecosystem-content">
      <div class="scan-ecosystem-graph">
        <div class="scan-ecosystem-background">
          <img src="/images/Radar.png" srcset="/images/Radar.png 1x, /images/Radar.png 2x" alt="Radar Scan Web">
        </div>
        <div class="scan-ecosystem-rectangulo">
            <img src="/images/Rectángulo.png" srcset="/images/Rectángulo.png 1x, /images/Rectángulo@2x.png 2x" alt="Rectangulo Scan Web">
        </div>
        <div class="scan-ecosystem-items">
          <div class="scan-ecosystem-item" v-for="(option, index) in options" :key="index" @click="setSelected(option)" :class="{'is-selected': option.logo == selected.logo, 'not-selected': option.logo != selected.logo}">
            <img :src="option.logo" :srcset="option.logo" :alt="option.title">
            <p class="has-text-white">{{option.title}}</p>
          </div>
        </div>
      </div>
      <div class="scan-ecosystem-explanation">
        <div class="scan-ecosystem-explanation-content">
          <div class="scan-ecosystem-explanation-image">
            <img :src="selected.logo" :srcset="selected.logo" :alt="selected.title">
          </div>
          <div class="scan-ecosystem-explanation-title">
            <p>{{selected.title}}</p>
          </div>
          <div class="scan-ecosystem-explanation-desc">
            <p>{{selected.description}}</p>
          </div>
          <!-- <div class="scan-ecosystem-explanation-more">
            <p>More insights ></p>
          </div> -->
        </div>
       
        <div class="scan-ecosystem-explanation-dev m-t-20" v-if="selected.development">
          <div class="development">
            <div class="development-title">
              <p>{{trans('basic.dev_progress')}}</p>  
            </div>
            <div class="development-progress">
              <b-progress :value="selected.progress" type="is-success" size="is-large"></b-progress>
            </div>
          </div>
          <div class="buttons">
            <a  class="button is-gray disabled" disabled>{{trans('basic.coming_soon')}}</a>
            <a  class="button is-link" target="_blank" href="documents/WhitepaperScanDeFiEnglish.pdf">White Paper</a>
          </div>
        </div>
        <div class="scan-ecosystem-explanation-explore" v-else>
          <router-link  class="button is-link is-normal" to="/">{{trans('basic.explore')}} {{selected.title}}</router-link>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        selected: {logo: "images/tokenomics/blacklist.svg", title: this.trans('tokenomics.blacklist1_0_title'), description: this.trans('tokenomics.blacklist1_0_text'), development: false},
        options: [
          {logo: "images/tokenomics/battle.svg", title: this.trans('tokenomics.battle_title'), description: this.trans('tokenomics.battle_text'), development: true, progress: 10},
          {logo: "images/tokenomics/Farming.svg", title: this.trans('tokenomics.farming_title'), description: this.trans('tokenomics.farming_text'), development: true, progress: 5},
          {logo: "images/tokenomics/Gaming.svg", title: this.trans('tokenomics.gaming_title'), description: this.trans('tokenomics.gaming_text'), development: false},
          {logo: "images/tokenomics/NFT.svg", title: this.trans('tokenomics.nfts_title'), description: this.trans('tokenomics.nfts_text'), development: true, progress: 10},
          {logo: "images/tokenomics/Scaner.svg", title: this.trans('tokenomics.scanner1_0_title'), description: this.trans('tokenomics.scanner1_0_text'), development: true, progress: 40},
          {logo: "images/tokenomics/blacklist.svg", title: this.trans('tokenomics.blacklist1_0_title'), description: this.trans('tokenomics.blacklist1_0_text'), development: false},
          {logo: "images/tokenomics/Academy.svg", title: this.trans('tokenomics.accademy_title'), description: this.trans('tokenomics.accademy_text'), development: true, progress: 90},
          {logo: "images/tokenomics/VotingZone.svg", title: this.trans('tokenomics.voting_zone_title'), description: this.trans('tokenomics.voting_zone_text'), development: true, progress: 40},
          {logo: "images/tokenomics/Swap.svg", title: this.trans('tokenomics.scan_swap_title'), description: this.trans('tokenomics.scan_swap_text'), development: true, progress: 5},
          {logo: "images/tokenomics/rewards.svg", title: this.trans('tokenomics.rewards_title'), description: this.trans('tokenomics.rewards_text'), development: true, progress: 40},
          {logo: "images/tokenomics/MarketPlace.svg", title: this.trans('tokenomics.marketplace_title'), description: this.trans('tokenomics.marketplace_text'), development: true, progress: 10},
          {logo: "images/tokenomics/Staking.svg", title: this.trans('tokenomics.staking_title'), description: this.trans('tokenomics.staking_text'), development: true, progress: 10},
        ]
      }
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

    methods: {
      setSelected(option){
        this.selected = option
      }
    },

    mounted() {}
  }
</script>
