<template>
  <section class="scan-modal-component web-languages-modal-component">
    <div class="scan-modal">
      <header class="scan-modal-head is-empty p-t-0 p-b-15">
        <!-- <span class="scan-modal-close" @click.prevent="$parent.close()"></span> -->
        <!-- <p class="scan-modal-title">Select language</p> -->
      </header>
      <section class="scan-modal-body">
        <div class="languages-container">
          <div v-for="language in $root.languages" :key="language.id" class="language-wrapper" @click="select(language)">
            <scan-language :language="language"
              :class="{'is-selected': selected && selected.locale === language.locale}">
            </scan-language>
          </div>
        </div>
      </section>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        languages: [],
        selected: null,
      }
    },

    computed: {},

    methods: {
      init() {
        this.setSelectedLanguage();
      },
      setSelectedLanguage() {
        this.selected = this.$root.settings.website.language.selected;
      },
      getLanguages() {
        axios.get('/api/languages/active').then(response => {
          this.languages = response.data.languages;
          this.$root.languages = this.languages;
        });
      },
      select(language) {
        this.$root.settings.website.language.selected = language;
        this.$emit('selected', language);
        this.$parent.close();
      }
    },

    mounted() {
      this.init();
    }
  }
</script>
