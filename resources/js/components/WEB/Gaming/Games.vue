<template>
  <section class="web-games-component">
    <section class="gaming-carousel-container">
      <slick class="gaming-carousel" ref="carousel" :options="slick.options">
        <div class="gaming-minigame">
          <a class="gaming-minigame-link" href="https://minigames.scandefi.net/scanjump" target="_blank">
            <img class="gaming-minigame-image" src="/images/games/scanjump/banner.jpg" alt="SCAN JUMP | Scan DeFi minigame">
            <button class="goto-minigame button is-primary">{{trans('games.play_now').toUpperCase()}}</button>
          </a>
          <div class="gaming-minigame-foot">
            <!-- <p class="gaming-minigame-foot-title">Scan Jump</p> -->
            <p class="gaming-minigame-foot-text">{{trans('games.captain_scan_description')}}</p>
          </div>
        </div>
        <div class="gaming-minigame">
          <a class="gaming-minigame-link pointer-events-none"><img class="gaming-minigame-image" src="/images/games/coming-soon-1.png" alt="COMING SOON | Scan DeFi minigame"></a>
        </div>
        <div class="gaming-minigame">
          <a class="gaming-minigame-link pointer-events-none"><img class="gaming-minigame-image" src="/images/games/coming-soon-2.png" alt="COMING SOON | Scan DeFi minigame"></a>
        </div>
      </slick>
    </section>

    <section v-if="rounds.active" class="gaming-end-ranking">
      <vue-countdown-timer
        @start_callback="startCallBack('event started')"
        @end_callback="endCallBack('event ended')"
        :start-time="rounds.active.start_date"
        :end-time="rounds.active.end_date"
        :interval="1000"
        :start-label="'The competition starts in'"
        :end-label="'The competition ends in'"
        label-position="begin"
        :end-text="''"
        :day-txt="'days'"
        :hour-txt="'hours'"
        :minutes-txt="'minutes'"
        :seconds-txt="'seconds'">
        <template slot="start-label" slot-scope="scope">
          <span class="scan-countdown-label is-uppercase" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.startLabel}}:</span>
          <span class="scan-countdown-label is-uppercase" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.endLabel}}:</span>
        </template>

        <template slot="countdown" slot-scope="scope">
          <div class="scan-countdown">
            <div class="scan-countdown-wrapper">
              <span class="scan-countdown-time">
                <span class="scan-countdown-time-up"></span>
                <span class="scan-countdown-time-down"></span>
                {{scope.props.days}}
              </span>
              <span class="scan-countdown-text">{{scope.props.dayTxt}}</span>
            </div>
            <div class="scan-countdown-wrapper">
              <span class="scan-countdown-time">
                <span class="scan-countdown-time-up"></span>
                <span class="scan-countdown-time-down"></span>
                {{scope.props.hours}}
              </span>
              <span class="scan-countdown-text">{{scope.props.hourTxt}}</span>
            </div>
            <div class="scan-countdown-wrapper">
              <span class="scan-countdown-time">
                <span class="scan-countdown-time-up"></span>
                <span class="scan-countdown-time-down"></span>
                {{scope.props.minutes}}
              </span>
              <span class="scan-countdown-text">{{scope.props.minutesTxt}}</span>
            </div>
            <div class="scan-countdown-wrapper">
              <span class="scan-countdown-time">
                <span class="scan-countdown-time-up"></span>
                <span class="scan-countdown-time-down"></span>
                {{scope.props.seconds}}
              </span>
              <span class="scan-countdown-text">{{scope.props.secondsTxt}}</span>
            </div>
          </div>
        </template>

        <template slot="end-label" slot-scope="scope">
          <span class="scan-countdown-label" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.startLabel}}:</span>
          <span class="scan-countdown-label" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.endLabel}}:</span>
        </template>

        <template slot="end-text" slot-scope="scope">
          <span class="scan-countdown-label">{{ scope.props.endText}}</span>
        </template>
      </vue-countdown-timer>
    </section>

    <section class="gaming-section">
      <header class="gaming-section-head">
        <div class="gaming-section-title">{{trans('games.my_stats')}}</div>
      </header>
      <div class="gaming-section-container">
        <template v-if="$root.walletConnected">
          <div class="web-stats-container">
            <web-games-stat :title="stats.ranking.title" :stat="stats.ranking.stat" :info="stats.ranking.info" :comingsoon="stats.ranking.comingsoon" />
            <web-games-stat :title="stats.lives.title" :stat="stats.lives.stat" :info="stats.lives.info" :comingsoon="stats.lives.comingsoon" />
            <web-games-stat :title="stats.rewards.title" :stat="stats.rewards.stat" :info="stats.rewards.info" :comingsoon="stats.rewards.comingsoon" />
          </div>
        </template>
        <template v-else>
          <div class="has-text-centered">
            <a class="button is-primary is-medium m-t-10" @click.prevent="$root.connectWallet()">{{trans('games.connect_to_see')}}</a>
          </div>
        </template>
      </div>
    </section>

    <section class="gaming-section">
      <header class="gaming-section-head">
        <div class="gaming-section-title">{{trans('games.weekly_rankings')}}</div>
        <div class="gaming-section-subtitle">{{trans('games.last_update')}}: {{lastUpdate}}</div>
        <!-- <div class="gaming-section-subtitle is-uppercase">the data below is fictitious</div> -->
      </header>
      <div class="gaming-section-container">
        <b-table :data="rankings.active"
          class="gaming-ranking-table"
          narrowed
          backend-pagination
          :paginated="tablePaginated"
          :per-page="table.perpage"
          :total="table.total"
          :default-sort-direction="table.default_sort_order"
          :default-sort="[table.sort_field, table.sort_order]"
          @page-change="onPageChange"
          @sort="onSort"
          :loading="table.loading"
          :pagination-rounded="table.rounded"
          :mobile-cards="false"
          :selected="selectedRanking">
          <b-table-column field="wallet" label="Wallet" :td-attrs="columnTdAttrs" v-slot="props">
            <span v-if="props.index+1 <= 3" class="gaming-table-ranking-position"><img :src="`/images/ranking/${props.index+1}.svg`" :alt="`Ranking position ${props.index+1}`"></span>
            <span v-else class="gaming-table-ranking-position">{{ props.index+1 }}</span>
            <span class="gaming-table-wallet">{{$root.shortenAddress(props.row.wallet, 5)}}</span>
          </b-table-column>
          <b-table-column field="score" label="Score" :td-attrs="columnTdAttrs" v-slot="props">
            {{$root.formatNumber(props.row.score)}}
          </b-table-column>
          <b-table-column field="rewardS" label="Expected Reward (SCAN)" :td-attrs="columnTdAttrs" v-slot="props" width="40" numeric>
            $ {{$root.formatNumber(rankingPlayerReward(props.index))}}
          </b-table-column>
          <b-table-column field="promoter" label="Promoter" :td-attrs="columnTdAttrs" v-slot="props">
            <span v-if="props.row.promoter" class="gaming-table-wallet">{{$root.shortenAddress(props.row.promoter, 5)}}</span>
            <span v-else>{{trans('basic.not_available')}}</span>
          </b-table-column>
          <b-table-column field="promoter_rewards" label="Promoted Reward (SCAN)" :td-attrs="columnTdAttrs" v-slot="props" width="40" numeric>
            $ {{$root.formatNumber(rankingPromoterReward(props.index))}}
          </b-table-column>

          <template v-if="!table.loading" slot="empty">
            <div class="hero-body">
              <div class="container has-text-centered">
                <p class="title has-text-white">{{trans('games.no_records')}}</p>
                <p class="subtitle has-text-white">{{trans('games.keep_calm')}}</p>
              </div>
            </div>
          </template>
        </b-table>
      </div>
    </section>

    <section v-if="rankings.previous" class="gaming-section">
      <header class="gaming-section-head">
        <div class="gaming-section-title">{{trans('games.previous')}}</div>
        <!-- <div class="gaming-section-subtitle">Last Update: {{lastUpdate}}</div> -->
        <!-- <div class="gaming-section-subtitle is-uppercase">the data below is fictitious</div> -->
      </header>
      <div class="gaming-section-container">
        <b-table :data="rankings.previous"
          class="gaming-ranking-table"
          narrowed
          backend-pagination
          :paginated="tablePaginated"
          :per-page="table.perpage"
          :total="table.total"
          :default-sort-direction="table.default_sort_order"
          :default-sort="[table.sort_field, table.sort_order]"
          @page-change="onPageChange"
          @sort="onSort"
          :loading="table.loading"
          :pagination-rounded="table.rounded"
          :mobile-cards="false"
          :selected="selectedRanking">
          <b-table-column field="wallet" label="Wallet" :td-attrs="columnTdAttrs" v-slot="props">
            <span v-if="props.index+1 <= 3" class="gaming-table-ranking-position"><img :src="`/images/ranking/${props.index+1}.svg`" :alt="`Ranking position ${props.index+1}`"></span>
            <span v-else class="gaming-table-ranking-position">{{ props.index+1 }}</span>
            <span class="gaming-table-wallet">{{$root.shortenAddress(props.row.wallet, 5)}}</span>
          </b-table-column>
          <b-table-column field="score" label="Score" :td-attrs="columnTdAttrs" v-slot="props">
            {{$root.formatNumber(props.row.score)}}
          </b-table-column>
          <b-table-column field="rewardS" label="Expected Reward (SCAN)" :td-attrs="columnTdAttrs" v-slot="props" width="40" numeric>
            $ {{$root.formatNumber(rankingPlayerReward(props.index))}}
          </b-table-column>
          <b-table-column field="promoter" label="Promoter" :td-attrs="columnTdAttrs" v-slot="props">
            <span v-if="props.row.promoter" class="gaming-table-wallet">{{$root.shortenAddress(props.row.promoter, 5)}}</span>
            <span v-else>{{trans('basic.not_available')}}</span>
          </b-table-column>
          <b-table-column field="promoter_rewards" label="Promoted Reward (SCAN)" :td-attrs="columnTdAttrs" v-slot="props" width="40" numeric>
            $ {{$root.formatNumber(rankingPromoterReward(props.index))}}
          </b-table-column>

          <template v-if="!table.loading" slot="empty">
            <div class="hero-body">
              <div class="container has-text-centered">
                <p class="title has-text-white">{{trans('games.no_records')}}</p>
                <p class="subtitle has-text-white">{{trans('games.keep_calm')}}</p>
              </div>
            </div>
          </template>
        </b-table>
      </div>
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        rounds: {
          active: null,
          previous: null,
        },
        rankings: {
          active: [],
          previous: [],
        },
        slick: {
          options: {
            slidesToShow: 3,
            loop: true,
            autoplay: false,
            autoplaySpeed: 2000,
            dots: false,
            arrows: false,
            responsive: [
              {
                breakpoint: 1250,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          },
        },
        stats: {
          ranking: {title: "Ranking", stat: 645, info: "of 17,621", comingsoon: true},
          lives: {title: "Lives", stat: 15, info: "lives of 36", comingsoon: true},
          rewards: {title: "Expected Reward", stat: 3432, info: "SCAN", comingsoon: true},
        },
        lastUpdate: null,
        table: {
          page: 1,
          from: 0,
          to: 0,
          total: 0,
          last_page: 0,
          backend: true,

          perpage: 30,
          rounded: false,
          loading: true,
          sort_field: 'position',
          sort_order: 'asc',
          default_sort_order: 'asc',
        },
        selectedRanking: null,
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
      tablePaginated() {
        return false;
        if(this.table.backend) return this.rankings.active && this.table.last_page != 1;
        else return this.rankings.active && this.blacklist.length > this.table.perpage;
      },
      totalRewardsUSD() {
        return 1000;
      },
      rewardsPercentagePerRanking() {
        return [19, 15, 12, 10, 8, 6, 5, 4, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5];
      },
      playerPercentage() {
        return 80;
      },
      promoterPercentage() {
        return 20;
      },
    },

    methods: {
      init() {
        this.getActiveRound();
        this.getActiveRanking();
        this.getPreviousRanking();
        this.setSelectedRanking(this.$root.web3.account);
      },
      getActiveRound() {
        axios.get(`/api/scan/minigames/scanjump/round/active`).then(response => {
          this.rounds.active = response.data.round;
        }).catch(error => {
          console.info(error);
        });
      },
      getActiveRanking() {
        axios.get(`/api/scan/minigames/scanjump/ranking/active`).then(response => {
          this.rankings.active = response.data.ranking;
          this.table.loading = false;
          this.lastUpdate = moment().format(`DD-MM-YYYY HH:mm`);
          this.setSelectedRanking(this.$root.web3.account);
        }).catch(error => {
          console.info(error);
          this.table.loading = false;
        });
      },
      getPreviousRanking() {
        axios.get(`/api/scan/minigames/scanjump/ranking/previous`).then(response => {
          this.rankings.previous = response.data.ranking;
          this.table.loading = false;
          this.lastUpdate = moment().format(`DD-MM-YYYY HH:mm`);
          this.setSelectedRanking(this.$root.web3.account);
        }).catch(error => {
          console.info(error);
          this.table.loading = false;
        });
      },
      getStats(wallet) {
        axios.get(`/api/scan/users/${wallet}/minigames/scanjump/ranking/active`).then(response => {
          let scanreward = 0;
          let busdreward = this.rankingPlayerReward(response.data.ranking);
          if(busdreward > 0) scanreward = busdreward / this.$root.scan.price.busd;
          this.stats.ranking = {title: 'Ranking', stat: response.data.ranking, info: 'of ' + response.data.total, comingsoon: false};
          this.stats.rewards = {title: 'Expected reward', stat: scanreward, info: 'SCAN', comingsoon: false};
        }).catch(error => {
          console.info(error);
        });

        axios.get(`/api/scan/users/${wallet}/minigames/scanjump/lives`).then(response => {
          this.stats.lives = {title: 'Lives', stat: response.data.lives, info: 'lives', comingsoon: false};
        }).catch(error => {
          console.info(error);
        });

        this.setSelectedRanking(wallet);
      },
      setSelectedRanking(wallet = null){
        if(!wallet) return;
        this.selectedRanking = this.rankings.active.find(o => o.wallet === wallet);
      },
      rankingPlayerReward(ranking) {
        return this.totalRewardsUSD * (this.rewardsPercentagePerRanking[ranking]/100) * (this.playerPercentage / 100);
      },
      rankingPromoterReward(ranking) {
        return this.totalRewardsUSD * (this.rewardsPercentagePerRanking[ranking]/100) * (this.promoterPercentage / 100);
      },
      startCallBack: function(x) {
        // console.log(x);
      },
      endCallBack: function(x) {
        // console.log(x);
      },
      onPageChange(page) {
        this.table.page = page;
        this.getBlacklist();
      },
      onSort(field, sort_order) {
        this.table.sort_field = field;
        this.table.sort_order = sort_order;
        this.getBlacklist();
      },
      columnTdAttrs(row, column) {
        if (row.id === 'Total') {
          if (column.label === 'ID') {
            return {
              colspan: 4,
              class: 'has-text-weight-bold',
              style: {
                'text-align': 'left !important'
              }
            }
          } else if (column.label === 'Gender') {
            return {
              class: 'has-text-weight-semibold'
            }
          } else {
            return {
              style: {display: 'none'}
            }
          }
        }

        return null;
      },
    },

    mounted() {
      let vue = this;
      vue.init();
      vue.$root.$on('web3.account', function(wallet){
        vue.getStats(wallet);
        vue.setSelectedRanking(wallet);
      });
    }
  }
</script>
