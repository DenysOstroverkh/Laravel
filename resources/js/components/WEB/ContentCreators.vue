<template>
  <section class="content-creators-component">
    <img class="scan-circle-bg-image" src="/images/killcirclebg.png" srcset="/images/killcirclebg.png 1x, /images/killcirclebg@2x.png 2x" alt="Scan DeFi Circles BG">
      <img class="scan-money-bg-image" src="/images/killmoneybg.png" srcset="/images/killmoneybg.png 1x, /images/killmoneybg@2x.png 2x" alt="Scan DeFi Moneys BG">

    <p class="has-text-centered scan-title m-t-100 m-b-40">{{choice('basic.partner', 2).toUpperCase()}}</p>

    <article class="content-creators-promoted">
      <youtube :videoId="promotedVideo" maxWidth="100%"></youtube>
    </article>

    <section class="content-creators-list">
      <article v-for="video in nonPromotedVideos" :key="video" class="content-creator-container">
        <youtube :videoId="video" maxWidth="100%"></youtube>
      </article>
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
    },

    watch: {},

    computed: {
      videos() {
        return [
          'vDeMyFgj1ng',
          'XOHy0D7Ad-o',
          '_BNNX_jItME',
          'Xt0HYwh7RaA',
          '15NXdhI2FhY',
          'fEDv7cZXJo4',
          'UP8DhOfvi04',
          'vESLdikWmzU',
          'vyOh5emFqOs',
          'Jqrvz8TDBxY',
        ];
      },
      promotedVideo() {
        return this.videos[this.videos.length-1];
      },
      nonPromotedVideos() {
        let npv = this.videos.pop();
        return this.videos.reverse();
      },
    },

    methods: {},

    mounted() {}
  }
</script>
