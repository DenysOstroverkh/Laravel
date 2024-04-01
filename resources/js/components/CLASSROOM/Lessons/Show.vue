<template>
  <section class="classroom-lesson-show-component">
    <aside class="classroom-sidebar" :class="{'is-opened':sidebar.opened, 'is-visible':modals.navbar}">
      <div class="classroom-sidebar-wrapper">
        <div class="navbar-trigger" @click="toggleModal('navbar')">
          <i v-if="!modals.navbar" class="fas fa-list-ul"></i>
          <span v-else class="trigger-close"></span>
        </div>
        <section class="classroom-sidebar-container">
          <div class="cs-head-container">
            <header class="cs-head" @click.prevent="sidebar.opened = !sidebar.opened">
              <div class="cs-head-avatar">
                <img src="/images/logos/logo.svg" alt="Course mentor avatar" class="cs-head-image">
              </div>
              <div class="cs-head-title">{{course.title}}</div>
            </header>
          </div>
          <div class="cs-units">
            <template v-for="(unit, i) in course.units">
              <div class="cs-list-item is-unit" :key="i">
                <div class="icon-container">
                  <scan-icon icon="classroom/flag-triangle" class="is-primary" size="1.4rem"></scan-icon>
                </div>
                <div class="csli-title">{{unit.title}}</div>
              </div>
              <div v-for="(lesson, index) in unit.lessons" class="cs-list-item is-lesson"
                :class="{
                  'is-active': lesson.id === filters.lesson.id,
                  'is-last-child':index+1 === unit.lessons.length,
                  'is-disabled':!lesson.opened
                }"
                :key="`${i}-${index}`"
                @click.prevent="setLesson(lesson)">
                <div v-if="lesson.opened" class="csli-index">{{index+1}}</div>
                <div v-else class="csli-index"><scan-icon icon="classroom/lock" color="#646464"></scan-icon></div>
                <div class="csli-title">{{lesson.title}}</div>
              </div>
            </template>
          </div>
        </section>
      </div>
    </aside>
    <scan-backdrop class="navbar-backdrop" />

    <section class="classroom-lesson">
      <section v-if="filters.lesson.type === 'video' && filters.lesson.preview" class="classroom-lesson-video">
        <youtube :videoId="filters.lesson.preview" maxWidth="100%"></youtube>
      </section>
      <section v-if="filters.lesson.type === 'audio'" class="classroom-lesson-audio">
        <web-course-poster :course="course" class="classroom-lesson-poster">
          <mini-audio :audio-source="filters.lesson.preview"></mini-audio>
        </web-course-poster>
      </section>
      <div class="classroom-lesson-info">
        <div class="cli-info-text">
          <div class="cli-title">{{filters.lesson.title}}</div>
          <div class="cli-mentor">{{trans('classroom.by')}} {{course.mentor.fullname}} <img src="/images/icons/verify.svg" alt="Scan DeFi icon"></div>
        </div>
        <!-- <a :href="nextClassHref" class="next-button button is-primary" :disabled="!nextClassHref" @click.prevent="next">Next class</a> -->
      </div>

      <div class="classroom-lesson-content">
        <div class="classroom-lesson-content-html" v-html="filters.lesson.content"></div>
        <div class="classroom-lesson-content-navbar">
          <a :href="nextClassHref" class="next-button button is-primary" :disabled="!nextClassHref" @click.prevent="next">{{trans('classroom.next_class')}}</a>
        </div>
      </div>

      <div class="classroom-lesson-tabs">
        <header class="clt-head">
          <div class="clt-button" @click.prevent="filters.tabs.lesson = 'means'" :class="{'is-active':filters.tabs.lesson === 'means'}">
            <scan-icon icon="classroom/box" size="1.4rem" :class="[filters.tabs.lesson === 'means' ? 'is-white' : 'is-text-secondary', 'm-r-10']"></scan-icon> {{choice('classroom.mean', 2)}}
          </div>
          <div class="clt-button" @click.prevent="filters.tabs.lesson = 'notes'" :class="{'is-active':filters.tabs.lesson === 'notes'}">
            <scan-icon icon="classroom/notes" size="1.4rem" :class="[filters.tabs.lesson === 'notes' ? 'is-white' : 'is-text-secondary', 'm-r-10']"></scan-icon> {{choice('classroom.note', 2)}}
          </div>
          <!-- <div class="clt-button" @click.prevent="filters.tabs.lesson = 'bugs'" :class="{'is-active':filters.tabs.lesson === 'bugs'}">
            <scan-icon icon="classroom/flag" size="1.4rem" :class="[filters.tabs.lesson === 'bugs' ? 'is-white' : 'is-text-secondary', 'm-r-10']"></scan-icon> Report Bugs
          </div> -->
        </header>
        <div class="clt-content-container">
          <!--<div class="div-comming">Comming soon</div>-->
          <div v-show="filters.tabs.lesson === 'means'" class="clt-content">
            <h5>{{trans('classroom.recommendation')}}</h5>
            <div class="clt-content-files"> 
                <a :href="path" v-for="path, index in attachments" :key="index" class="clt-file" download>
                  <div class="filename">
                    <i class="fas fa-file-download"></i> {{filename(path)}}
                  </div>
                  <div class="download-button">
                    <i class="fas fa-download"></i>
                  </div>
                </a>
            </div>
          </div>
          <div v-show="filters.tabs.lesson === 'notes'" class="clt-content">
            <template v-for="note, ni in notes">
              <lesson-note-editor :key="ni" :lesson="lesson" :note="note" @saved="getLessonNotes"></lesson-note-editor>
            </template>
          </div>
          <!-- <div v-show="filters.tabs.lesson === 'bugs'" class="clt-content">
            Coming soon...
          </div> -->
        </div>
      </div>
    </section> 

    <section class="lesson-comments classroom-lesson" :class="{'is-visible':modals.comments}">
      <div class="classroom-lesson-tabs-wrapper">
        <div class="comments-trigger" @click="toggleModal('comments')">
          <scan-icon v-if="!modals.comments" icon="classroom/comments" size="1.4rem" class="is-white"></scan-icon>
          <span v-else class="trigger-close"></span>
        </div>
        <div class="classroom-lesson-tabs">
          <!-- <header class="clt-head m-t-0">
            <div class="clt-button" @click.prevent="filters.tabs.comments = 'comments'" :class="{'is-active':filters.tabs.comments === 'comments'}">
              <scan-icon icon="classroom/comments" size="1.4rem" :class="[filters.tabs.comments === 'comments' ? 'is-white' : 'is-text-secondary', 'm-r-10']"></scan-icon> Comments
            </div>
          </header> -->
          <div class="clt-content-container">
            <!--<div class="div-comming">Comming soon</div>-->
            <div v-show="filters.tabs.comments === 'comments'" class="clt-content">
              <div class="lesson-comments-container">
                <scan-comment v-for="comment in comments" :comment="comment" :key="comment.id" nested reactable commentable></scan-comment>
              </div>
              <div class="lesson-comments-form">
                <div class="textarea-container" :class="{'is-muted':loading.comment}">
                  <textarea v-model="form.comment" class="input is-small is-semirounded" rows="1"></textarea>
                  <div class="submit-comment-button" :class="{'is-muted':submitCommentDisabled}" @click.prevent="comment">
                    <i v-if="loading.comment" class="loader"></i>
                    <i v-else class="fas fa-paper-plane"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div v-show="filters.tabs.comments === 'questions'" class="clt-content">
              Coming soon...
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <scan-backdrop class="lessons-backdrop" />
  </section>
</template>

<script>
  export default {
    props: {
      course: {
        type: Object,
        required: true,
        default: null,
      },
      lesson: {
        type: Object,
        required: true,
        default: null,
      },
    },

    data() {
      return {
        sidebar: {
          opened: false,
        },
        filters: {
          lesson: this.lesson,
          tabs: {
            lesson: 'means',
            comments: 'comments',
          },
        },
        loading: {
          comments: false,
          comment: false,
          notes: false,
        },
        form: {
          comment: null,
        },
        comments: [],
        notes: [],
        modals: {
          navbar: false,
          comments: false,
        }
      }
    },

    watch: {
      'filters.lesson': function(lesson, oldlesson){
        let path = location.href;
        let newpath = `${path.substring(0, path.lastIndexOf('/'))}/${lesson.id}`;
        this.$root.setPageUrl(newpath);
        this.init();
      },
      '$store.state.Authuser.authuser': {
        immediate: true,
        handler(val) {
          if(val) this.init();
        }
      },
    },

    computed: {
      submitCommentDisabled() {
        return !this.form.comment || this.form.comment.length < 3;
      },
      nextLesson() {
        let lessons = this.course.units.map(o => o.lessons).flat();
        let index = lessons.map(o => o.id).indexOf(this.filters.lesson.id);
        let next = index + 1;
        
        while(lessons[next] && !lessons[next].opened) next ++;
        
        if(next >= 0 && next < lessons.length){
          return lessons[next];
        }

        return null;
      },
      nextClassHref() {
        return this.nextLesson ? `/classroom/courses/${this.course.slug}/lessons/${this.nextLesson.id}` : null;
      },
      attachments() {
        return this.filters.lesson.attachments;
      },
    },

    methods: {
      init() {
        this.getComments();
        this.getLessonNotes();
      },
      async getComments() {
        this.loading.comments = true;
        await axios.get(`/api/lessons/${this.filters.lesson.id}/comments`).then(response => this.comments = response.data);
        this.loading.comments = false;
      },
      async comment() {
        this.loading.comment = true;
        await axios.post(`/lessons/${this.filters.lesson.id}/comment`, {content: this.form.comment}).then(response => this.form.comment = null);
        this.loading.comment = false;
        this.getComments();
      },
      async getLessonNotes() {
        this.loading.notes = true;
        await axios.get(`/api/lessons/${this.filters.lesson.id}/authuser-notes`).then(response => {
          if(response.data.length) this.notes = response.data;
          else this.notes = [{ id:null, type:'note', content:null }];
        });
        this.loading.notes = true;
      },
      filename(path) {
        return path.substring(path.lastIndexOf('/') + 1);
      },
      next() {
        if(this.nextLesson) this.setLesson(this.nextLesson);
      },
      setLesson(lesson) {
        this.filters.lesson = lesson;
      },
      toggleModal(target) {
        this.modals[target] = !this.modals[target];
      },
    },

    mounted() {
      this.init();
    }
  }
</script>