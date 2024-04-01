<template>
  <section class="blacklist-table-component">
    <b-table :data="blacklist"
      class="m-b-80"
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
      :mobile-cards="false">
      <b-table-column field="id" label="#" width="40" :td-attrs="columnTdAttrs" centered v-slot="props">
        <i class="fas fa-star is-size-5 m-r-7 cur-p" @click.prevent="$root.notifyWorkingOnIt()"></i> {{ props.index+1 }}
      </b-table-column>
      <b-table-column field="address" label="Address" :td-attrs="columnTdAttrs" v-slot="props">
        <div class="blacklist-token cur-p">
          <div class="blacklist-token-logo" @click.prevent="scan(props.row.address)">
            <img :src="props.row.avatar" :alt="props.row.address">
            <!-- <span class="jazzicon"><jazzicon :address="props.row.address" :diameter="25" /></span> -->
          </div>
          <div class="blacklist-token-data">
            <span class="cell-address-copy"><span class="cur-p" @click.prevent="scan(props.row.address)">{{props.row.address}}</span> <i class="far fa-copy cur-p m-x-7" @click.prevent="$root.clipboard(props.row.address, trans('basic.clipboard'))"></i></span>
          </div>
        </div>
      </b-table-column>
      <b-table-column field="type" label="Type" :td-attrs="columnTdAttrs" v-slot="props">
        <b-tooltip multilined label="The wallet sold a large number of tokens in a single movement, drawing a lot of liquidity" type="is-black" size="is-large" position="is-top"><i class="fas fa-fish m-x-4" :class="Object.values(props.row.types).includes('whale') ? 'has-text-primary' : 'is-muted-dark'"></i></b-tooltip>
        <b-tooltip multilined label="The wallet bought and sold the token many times, creating volatility" type="is-black" size="is-large" position="is-top"><i class="fas fa-sync m-x-4" :class="Object.values(props.row.types).includes('trader') ? 'has-text-warning' : 'is-muted-dark'"></i></b-tooltip>
        <b-tooltip multilined label="The wallet participated directly or indirectly in a scam on the blockchain" type="is-black" size="is-large" position="is-top"><i class="fas fa-skull m-x-4" :class="Object.values(props.row.types).includes('scammer') ? 'has-text-danger' : 'is-muted-dark'"></i></b-tooltip>
      </b-table-column>
      <b-table-column field="firstreport" label="First report" :td-attrs="columnTdAttrs" v-slot="props">
        {{props.row.firstreport ? $root.formatDate(props.row.firstreport) : trans('blacklist.not_reported')}}
      </b-table-column>
      <b-table-column field="lastreport" label="Last report" :td-attrs="columnTdAttrs" v-slot="props">
        {{props.row.lastreport ? $root.formatDate(props.row.lastreport) : trans('blacklist.not_reported')}}
      </b-table-column>
      <b-table-column field="reports" label="Reports" :td-attrs="columnTdAttrs" v-slot="props">
        {{props.row.reports_count ? $root.formatNumber(props.row.reports_count) : 0}}
      </b-table-column>
      <b-table-column field="comments" label="Comments" :td-attrs="columnTdAttrs" v-slot="props">
        {{props.row.comments_count ? $root.formatNumber(props.row.comments_count) : 0}}
      </b-table-column>
      <b-table-column field="owner" label="" :td-attrs="columnTdAttrs" centered v-slot="props">
        <a v-if="props.row.address !== $root.scan.contract" class="button is-small is-dark" @click.prevent="report(props.row)">{{trans('basic.report')}}</a>
      </b-table-column>

      <template v-if="!table.loading" slot="empty">
        <div class="hero-body">
          <div class="container has-text-centered">
            <p class="title has-text-white">{{trans('blacklist.no_records')}}</p>
            <p class="subtitle has-text-white">{{trans('blacklist.something_good')}}</p>
            <a class="button is-primary is-medium" @click.prevent="report()">{{trans('blacklist.go_to_report')}}</a>
          </div>
        </div>
      </template>
    </b-table>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        blacklist: [],
        table: {
          page: 1,
          from: 0,
          to: 0,
          total: 0,
          last_page: 0,
          backend: true,

          perpage: 20,
          rounded: false,
          loading: false,
          sort_field: 'lastreport',
          sort_order: 'desc',
          default_sort_order: 'desc',
        },
        errorimages: [],
      }
    },

    watch: {},

    computed: {
      tablePaginated() {
        if(this.table.backend) return this.blacklist && this.table.last_page != 1;
        else return this.blacklist && this.blacklist.length > this.table.perpage;
      },
    },

    methods: {
      init() {
        this.getBlacklist();
      },
      scan(address) {
        this.$router.push({ name: 'scanner.wallet', params: { address: address } });
      },
      getBlacklist() {
        this.table.loading = true
        axios.post(`/api/wallets/blacklist?page=${this.table.page}`, {filters: this.table, with_count:'reports,comments'}).then(response => {
          this.blacklist = response.data.data;
          this.table.page = response.data.current_page; 
          this.table.last_page = response.data.last_page;
          this.table.from = response.data.from;
          this.table.to = response.data.to;
          this.table.total = response.data.total;
          this.errorimages = [];
          this.table.loading = false;
        }).catch(error => {
          this.blacklist = [];
          this.table.page = 1;
          this.table.last_page = 0;
          this.table.from = 0;
          this.table.to = 0;
          this.table.total = 0;
          this.errorimages = [];
          this.table.loading = false;
          throw error
        });
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
      quitWallet(wallet) {
        console.info('QUIT WALLET', wallet);
      },
      report(wallet = null) {
        this.$root.reportWallet(wallet);
      },
      dateThAttrs(column) {
        if(column.label === 'Date'){
          return {
            title: 'This title is sponsored by "th-attrs" prop',
            class: 'has-text-success'
          }
        }

        return null;
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
      this.init();
    }
  }
</script>
