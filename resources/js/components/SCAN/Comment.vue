<template>
  <article class="scan-comment-component">
    <header class="scan-comment-head">
      <div class="scan-comment-head-avatar">
        <img class="scan-comment-avatar" :src="comment.avatar">
      </div>
      <div class="scan-comment-head-info">
        <div class="scan-comment-user">{{$root.shortenAddress(comment.wallet)}}</div>
        <div class="scan-comment-date">{{$root.timeAgo(comment.created_at)}}</div>
      </div>
    </header>
    <div class="scan-comment-content-container">
      <div class="scan-comment-content">{{comment.content}}</div>
      <footer class="scan-comment-foot">
        <div class="scan-comment-foot-content">
          <div v-if="commentable" class="answer">
            <i class="fas fa-comment-dots m-r-3"></i>
            {{trans('basic.answer')}}
          </div>
          <div v-if="reactable" class="like" :class="{'is-liked has-text-danger':liked, 'is-loading':loading.like}" @click.prevent="likeToggle">
            <i v-if="liked" class="fas fa-heart m-r-3 has-text-danger"></i>
            <i v-else class="far fa-heart m-r-3"></i>
            {{likes}}
          </div>
        </div>
      </footer>
    </div>

    <section v-if="showCommentComments" class="scan-comment-comments">
      <scan-comment v-for="comment in comment.comments" :comment="comment" :key="comment.id" class="is-nested" reactable></scan-comment>
    </section>
  </article>
</template>

<script>
  export default {
    props: {
      comment: {
        type: Object,
        required: true,
        default: null,
      },
      nested: {
        type: [Boolean, Number],
        required: false,
        default: false,
      },
      reactable: {
        type: [Boolean, Number],
        required: false,
        default: false,
      },
      commentable: {
        type: [Boolean, Number],
        required: false,
        default: false,
      },
    },

    data() {
      return {
        liked: false,
        likes: 0,
        loading: {
          like: false,
        },
      }
    },

    watch: {},

    computed: {
      showCommentComments() {
        return this.nested && this.comment && this.comment.comments && this.comment.comments.length;
      },
    },

    methods: {
      init() {
        this.setInitialLike();
      },
      setInitialLike() {
        this.liked = this.comment ? this.comment.liked_by_authuser : false;
        this.likes = this.comment ? this.comment.likes : 0;
      },
      async likeToggle() {
        if(!this.$root.web3.account){
          this.$root.connectWallet();
          return;
        }
        
        this.loading.like = true;
        await axios.post(`/comments/${this.comment.id}/likes/toggle`).then(response => {
          this.liked = response.data.comment.liked_by_authuser;
          this.likes = response.data.comment.likes;
          this.loading.like = false;
        });
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
