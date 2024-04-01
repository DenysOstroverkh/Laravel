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
        {{ props.index+1 }}
      </b-table-column>
      <b-table-column field="name" label="Name" :td-attrs="columnTdAttrs" v-slot="props">
        <div class="blacklist-token cur-p" @click.prevent="scan(props.row.address)">
          <div class="blacklist-token-logo">
            <img v-if="!errorimages.includes(props.row.id)" :src="props.row.logo" :alt="props.row.name" @error="imageError(props.row)">
            <span v-else class="searched-token-image-missing" style="width:30px; height:30px;">?</span>
          </div>
          <div class="blacklist-token-data">
            <span class="blacklist-token-name">{{props.row.name}}</span>
            <span class="blacklist-token-symbol">{{props.row.symbol}}</span>
          </div>
        </div>
      </b-table-column>
      <!-- <b-table-column field="price" label="Price" :td-attrs="columnTdAttrs" numeric v-slot="props">
        {{$root.formatMoney(props.row.price)}}
      </b-table-column>
      <b-table-column field="holders" label="Holders" :td-attrs="columnTdAttrs" v-slot="props">
        {{$root.formatNumber(props.row.holders)}}
      </b-table-column> -->
      <b-table-column field="network" label="Network" :td-attrs="columnTdAttrs" v-slot="props">
        {{props.row.network}}
      </b-table-column>
      <b-table-column field="address" label="Address" :td-attrs="columnTdAttrs" v-slot="props">
        <!-- {{$root.shortenAddress(props.row.address, 9)}} -->
        <span class="cell-address-copy"><span class="cur-p" @click.prevent="scan(props.row.address)">{{$root.shortenAddress(props.row.address, 9)}}</span> <i class="far fa-copy cur-p m-x-7" @click.prevent="$root.clipboard(props.row.address, trans('basic.clipboard'))"></i></span>
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
        <!-- <a v-if="props.row.address !== $root.scan.contract" class="button is-small is-dark" @click.prevent="report(props.row)">Report</a> -->
      </b-table-column>
      <b-table-column field="scamlevel" label="Chance of being SCAM" :td-attrs="columnTdAttrs" numeric v-slot="props">
        <b-slider class="scam-slider" :value="props.row.scamlevel" type="is-transparent" size="is-small" :tooltip="false" rounded></b-slider>
      </b-table-column>

      <template v-if="!table.loading" slot="empty">
        <div class="hero-body">
          <div class="container has-text-centered">
            <p class="title has-text-white">{{trans('blacklist.no_records')}}</p>
            <p class="subtitle has-text-white">{{trans('blacklist.something_good')}}</p>
            <a class="button is-primary is-medium" @click.prevent="report">{{trans('blacklist.go_to_report')}}</a>
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
        this.$router.push({ name: 'scanner.token', params: { address: address } });
      },
      imageError(token) {
        this.errorimages.push(token.id);
      },
      getBlacklist() {
        this.table.loading = true
        axios.post(`/api/tokens/blacklist?page=${this.table.page}`, {filters: this.table, with_count:'reports,comments'}).then(response => {
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
      quitToken(token) {
        console.info('QUIT TOKEN', token);
      },
      report(token) {
        this.$root.reportToken(token);
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
