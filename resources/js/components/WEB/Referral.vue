<template>
  <section class="scan-referral">
    <section class="scan-referral-ranking">
      <div class="scan-referral-ranking-title">
        <p class="has-text-white">{{trans('referral.list')}}</p>
      </div>
      <web-ranking-table @ranking="setRanking"></web-ranking-table>
      <!-- <div class="scan-referral-ranking-tabs">
        <b-tabs>
          <b-tab-item label="7-Day Ranking">
            <web-ranking-table></web-ranking-table>
          </b-tab-item>
          <b-tab-item label="Monthly Ranking">
            <web-ranking-table></web-ranking-table>
          </b-tab-item>
          <b-tab-item label="3-Month Ranking">
            <web-ranking-table></web-ranking-table>
          </b-tab-item>

        </b-tabs>
      </div> -->
    </section>
    <aside class="scan-referral-main">
      <div class="scan-referral-main-title">
        <p class="has-text-white">{{trans('referral.program')}}</p>
      </div>
      <template v-if="$root.walletConnected">
        <div class="scan-referral-main-info">
          <div class="scan-referral-main-info-block">
            <p class="block-title">{{trans('referral.your_ranking')}}</p>
            <p class="block-info has-text-success">{{connectedWalletRanking}}</p>
          </div>
          <div class="scan-referral-main-info-block">
            <p class="block-title">{{trans('referral.invitees')}}</p>
            <p class="block-info">{{referrals.length}}</p>
          </div>
          <div class="scan-referral-main-info-block">
            <p class="block-title">{{trans('referral.link')}}</p>
            <div class="block-referral-link cur-p" @click.prevent="$root.clipboard($store.state.Authuser.authuser.referrer_link, 'Referral link copied to clipboard!')">
              <p class="block-info link">{{$store.state.Authuser.authuser.referrer_link}}</p>
              <i class="far fa-copy cur-p m-x-7"></i>
            </div>
          </div>
        </div>
        <div class="scan-referral-main-title">
          <p>{{trans('referral.referral_list')}}</p>
        </div>
        <div>
          <web-referral-table @referrals="setReferrals"></web-referral-table>
        </div>
      </template>
      <template v-else>
        <a class="button is-primary is-medium m-t-10" @click.prevent="$root.connectWallet()">{{trans('basic.connect_wallet')}}</a>
      </template>
    </aside>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        ranking: [],
        referrals: [],
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

    computed: {
      connectedWalletRanking() {
        return this.$root.web3.account ? this.ranking.map(o => o.wallet).indexOf(this.$root.web3.account) + 1 : 0;
      },
    },

    methods: {
      setRanking(ranking) {
        this.ranking = ranking;
      },
      setReferrals(referrals) {
        this.referrals = referrals;
      }
    },

    mounted() {}
  }
</script>
