<template>
  <section class="referral-table-component">
    <b-table :data="referrals" :loading="table.loading" :paginated="tablePaginated" :per-page="table.perpage" :pagination-rounded="table.rounded" :mobile-cards="false" aria-next-label="Next page" aria-previous-label="Previous page" aria-page-label="Page" aria-current-label="Current page">
        <b-table-column field="time" label="Time" v-slot="props">
            {{ $root.formatDateTime(props.row.created_at) }}
        </b-table-column>
        <b-table-column field="wallet" label="Wallet" v-slot="props">
            {{$root.shortenAddress(props.row.wallet, 6)}}
        </b-table-column>
    </b-table>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
            referrals: [
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
                // { time: moment(), wallet: 'aaaa8fC9ff98CD894141F40c2f995E3C96d12aa1Ce', commission: 162, status: 'Completed'},
            ],
            table: {
                perpage: 10,
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
        this.getRererrals();
      },
      getRererrals() {
        axios.get(`/api/wallets/${this.$root.web3.account}/referrals`).then(response => {
          this.referrals = response.data.referrals;
          this.$emit('referrals', this.referrals);
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
