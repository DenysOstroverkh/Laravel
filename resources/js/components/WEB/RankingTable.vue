<template>
  <section class="referral-table-component">
    <b-table :data="ranking"
      :loading="table.loading"
      :paginated="tablePaginated"
      :per-page="table.perpage"
      :pagination-rounded="table.rounded"
      :mobile-cards="false"
      aria-next-label="Next page"
      aria-previous-label="Previous page"
      aria-page-label="Page"
      aria-current-label="Current page">
      <b-table-column field="time" label="Rank" centered v-slot="props">
        {{props.index+1}}
      </b-table-column>
      <b-table-column field="wallet" label="Wallet" v-slot="props">
        {{props.row.wallet}}
      </b-table-column>
      <b-table-column field="wallet" label="Referrals" centered v-slot="props">
        {{props.row.referrals_count}}
      </b-table-column>
    </b-table>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        ranking: [],
        table: {
          perpage: 20,
          rounded: false,
          loading: false,
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

    computed: {
      tablePaginated() {
        return this.referrals && this.referrals.length > this.table.perpage;
      },
    },

    methods: {
      init() {
        this.getRanking();
      },
      getRanking() {
        this.table.loading = true;
        axios.get(`/api/users/referrals/ranking`).then(response => {
          this.ranking = response.data.ranking;
          this.table.loading = false;
          this.$emit('ranking', this.ranking);
        }).catch(error => {
          console.info(error);
          this.table.loading = false;
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>

