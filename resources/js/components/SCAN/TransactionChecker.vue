<template>
  <section class="transaction-checker-component">
    <p class="has-text-centered has-text-white is-size-2 m-b-75">{{trans('basic.check_transactions')}}</p>
    <div class="check-by-wallet">
      <input v-model="filters.search" class="input is-semirounded" placeholder="Search your wallet" />

      <b-table :data="filteredTransactions"
        class="m-t-50"
        striped
        narrowed
        mobile-cards
        :loading="filters.loading">

        <b-table-column field="date" label="DATE" v-slot="props">
          <span class="no-wrap">{{$root.formatTimestamp(props.row.timeStamp)}}</span>
        </b-table-column>

        <b-table-column field="address" label="ADDRESS" v-slot="props">
          {{props.row.from}}
        </b-table-column>

        <b-table-column field="amount" label="AMOUNT" width="100" v-slot="props" numeric>
          {{$root.formatDecimals(props.row.value)}}
        </b-table-column>
      </b-table>
      <!-- <b-table :data="transactions" :columns="columns"></b-table> -->
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      address: {
        type: String,
        required: true,
      }
    },

    data() {
      return {
        transactions: [],
        filters: {
          search: '',
          direction: 'desc',
          loading: false,
        },
        columns: [
          { field: 'date', label: 'DATE', width: '100', numeric: false },
        ],
      };
    },

    computed: {
      filteredTransactions() {
        if(!this.filters.search) return this.transactions;
        return this.transactions.filter(o => o.from.tlc() === this.filters.search.tlc());
      },
    },

    methods: {
      init() {
        this.getTransactions();
      },
      getTransactions() {
        this.filters.loading = true;
        axios.get(`/api/bsc/transactions/${this.address}`).then(response => {
          this.transactions = response.data.result.reverse();
          this.filters.loading = false;
        });
      },
    },

    mounted() {
      let vue = this;
      vue.init();
    }
};
</script>
