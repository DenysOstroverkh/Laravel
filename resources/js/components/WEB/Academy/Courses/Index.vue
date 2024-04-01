<template>
  <section class="web-courses-index-component">
    <div class="web-course-category-filter">
      <div class="web-course-categories">
        <div :class="['web-course-category', {'is-active':filters.category === null}]" @click="filters.category = null">{{trans('basic.all')}}</div>
        <div v-for="category in categories" :key="category.id" :class="['web-course-category', {'is-active':filters.category === category.id}]" @click="filters.category = category.id">{{category.name}}</div>
      </div>
      <div class="web-course-searchbox">
        <div class="search-box-input-container control has-icons-right">
          <input ref="input" v-model="filters.search" class="search-box-input input is-rounded" placeholder="Search courses" />
          <span class="icon is-right">
            <i class="fa fa-search has-text-white"></i>
          </span>
        </div>
      </div>
    </div>

    <div class="web-courses-categories">
      <web-course-card v-for="course in filteredCourses" :key="course.id" :course="course"></web-course-card>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        filters: {
          category: null,
          search: '',
        },
        categories: [],
        courses: [],
      }
    },

    watch: {},

    computed: {
      filteredCourses() {
        let vue = this;
        return vue.courses.filter(o => {
          let show = false;
          
          let search = vue.filters.search.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
          let title = o.title ? o.title.normalize('NFD').replace(/[\u0300-\u036f]/g, "") : '';
          let description = o.description.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
          if(title.toLowerCase().includes(search.toLowerCase())) show = true;
          if(description.toLowerCase().includes(search.toLowerCase())) show = true;
          
          if(vue.filters.category && o.category_id !== vue.filters.category) show = false;
          return show;
        });
      },
    },

    methods: {
      async init() {
        await this.getCategories(true);
        await this.getCourses();
      },
      getCategories(used = false) {
        let endpoint = used ? `/api/categories/fetch/used` : `/api/categories/fetch`;
        axios.get(endpoint).then(response => this.categories = response.data);
      },
      getCourses() {
        let params = {
          with: 'category,level,mentor',
          with_count: 'students,lessons',
        };
        axios.get(`/api/courses/fetch`, {params:params}).then(response => this.courses = response.data);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>