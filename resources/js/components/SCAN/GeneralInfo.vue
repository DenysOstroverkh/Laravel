<template>
  <section class="scan-general-info-component">
    <div class="blacklist-header-info">
      <div class="blacklist-cards-container">
        <div class="scan-card cur-p" @click="$root.scanToken('scan')">
          <coin-card token="SCAN" />
        </div>
        <div class="blacklist-media-cards">
          <media-card top="Scan Community" :center="$root.formatNumber(count.users)" :loading="count.users === '9,999'" />
          <media-card top="Blacklisted Coins" :center="$root.formatNumber(count.blacklist)" :loading="count.blacklist === '9,999'" />
          <media-card top="Coin reports" :center="$root.formatNumber(count.reports)" :loading="count.reports === '9,999'" />
          <media-card top="Comments" :center="$root.formatNumber(count.comments)" :loading="count.comments === '9,999'" />
        </div>
      </div>
      <div class="blacklist-search-container">
        <search-box placeholder="Search by address or name" showSCAN @selected="selected" action="select"></search-box>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      showSCAN: {
        type: Boolean,
        required: false,
        default: false,
      },
    },

    data() {
      return {
        count: {
          users: '9,999',
          blacklist: '9,999',
          reports: '9,999',
          comments: '9,999',
        },
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
      init() {
        this.getUsersCount();
        this.getBlacklistCount();
        this.getReportsCount();
        this.getCommentsCount();
      },
      getUsersCount() {
        axios.get(`/api/count/users`).then(response => {
          this.count.users = response.data.count;
        });
      },
      getBlacklistCount() {
        axios.get(`/api/count/blacklist`).then(response => {
          this.count.blacklist = response.data.count;
        });
      },
      getReportsCount() {
        axios.get(`/api/count/reports`).then(response => {
          this.count.reports = response.data.count;
        });
      },
      getCommentsCount() {
        axios.get(`/api/count/comments`).then(response => {
          this.count.comments = response.data.count;
        });
      },
      selected(data) {
        this.$emit('selected', data);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>