<template>
  <section class="scan-modal-component scan-tweet-component">
    <div class="scan-modal">
      <section class="scan-modal-body">
        <p class="scan-tweet-title">{{trans('twitter.challenge')}}</p>
        <scan-tweet :id="tweetId"></scan-tweet>
        <footer class="scan-tweet-foot">
          <div class="scan-retweets">
            <div class="scan-retweets-text">{{trans('twitter.number_rt')}}</div>
            <div class="scan-retweets-count">{{retweetsCountText}}</div>
            <div class="scan-retweets-target">{{retweetsTargetText}}</div>
          </div>
        </footer>
      </section>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      tweetId: {
        type: String,
        required: true,
      },
    },

    data() {
      return {
        tweet:{
          loading: true,
          id: this.tweetId,
          retweetsCount: 0,
          retweetsTarget: 150000,
        },
      }
    },

    computed: {
      retweetsCountText() {
        return this.$root.formatNumber(this.tweet.retweetsCount);
      },
      retweetsTargetText() {
        return this.$root.formatNumber(this.tweet.retweetsTarget);
      },
    },

    methods: {
      init() {
        this.getTweetMetrics();
      },
      async getTweetMetrics() {
        this.tweet.loading = true;
        await axios.get(`/api/twitter/tweets/${this.tweetId}/metrics`).then(response =>{
          console.info(response.data.data.public_metrics.retweet_count);
          this.tweet.retweetsCount = response.data.data.public_metrics.retweet_count;
        });
        this.tweet.loading = false;
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
