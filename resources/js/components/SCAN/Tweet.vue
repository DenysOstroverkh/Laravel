<template>
  <Tweet
    tweet-id="1370027087818461184"
    cards="visible"
    conversation="all"
    lang="en"
    theme="light"
    align="left"
    :width="400"
    :dnt="false"
    @tweet-load-error="onTweetLoadError"
    @tweet-load-success="onTweetLoadSuccess"
  >
    <template v-slot:loading>
      <span>{{trans('basic.loading')}}...</span>
    </template>

    <template v-slot:error>
      <span>{{trans('twitter.doesnt_exist')}}</span>
    </template>
  </Tweet>
</template>

<script>
import Tweet from "vue-tweet";

export default {
  components: {
    Tweet,
  },
  methods: {
    onTweetLoadSuccess(embedNode) {
      console.log(embedNode);
    },
    onTweetLoadError() {
      alert("Error");
      console.log("Ops... an error has occurred");
    }
  }
}
</script>