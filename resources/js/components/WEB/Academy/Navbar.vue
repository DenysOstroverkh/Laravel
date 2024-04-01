<template>
  <nav class="web-academy-navbar-component">
    <div class="wan-container">
      <router-link class="wan-item" to="/academy/courses">{{choice('academy.course', 2)}}</router-link>
      <a href="https://blog.scandefi.net" class="wan-item" target="_blank">{{trans('academy.blog')}}</a>
      <router-link class="wan-item pointer-events-none" to="/academy/forum" data-tooltip="Coming soon" coming-soon>{{trans('academy.forum')}}</router-link>
      <router-link class="wan-item pointer-events-none" to="/academy/glossary" data-tooltip="Coming soon" coming-soon>{{trans('academy.glossary')}}</router-link>
    </div>
  </nav>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    watch: {
      data: {
        immediate: true,
        deep: true,
        handler(val, oldVal) {
          //do something
        }
      },
    },

    computed: {},

    methods: {},

    mounted() {}
  }
</script>
