<template>
  <section v-if="course" class="web-courses-show-component">
    <div class="wcs-info-wrapper">
      <div class="wc-info-container">
        <div class="wc-title">{{course.title}}</div>
        <div class="wc-teacher">{{trans('academy.created_by')}} <span class="wc-teacher-name">{{course.mentor.fullname}}</span> {{mentorSkillsText}}</div>
        <div class="wc-data-container">
          <div class="wc-data-item">
            <img class="wcdi-icon" src="/images/icons/like-circle-blue.svg" alt="Scan DeFi icon">
            <div class="wcdi-data">
              <div class="wcdi-top">{{course.positive_votes_percentage}}%</div>
              <div class="wcdi-bottom">{{trans('academy.positive_votes')}}</div>
            </div>
          </div>
          <div class="wc-data-item">
            <img class="wcdi-icon" src="/images/icons/user-circle-blue.svg" alt="Scan DeFi icon">
            <div class="wcdi-data">
              <div class="wcdi-top">{{$root.formatNumber(course.students_count)}}</div>
              <div class="wcdi-bottom">{{choice('academy.student', 2)}}</div>
            </div>
          </div>
          <div class="wc-data-item">
            <img class="wcdi-icon" src="/images/icons/es-circle-blue.svg" alt="Scan DeFi icon">
            <div class="wcdi-data">
              <div class="wcdi-top">{{trans('academy.course')}}</div>
              <div class="wcdi-bottom">{{trans('academy.in_spanish')}}</div>
            </div>
          </div>
          <div class="wc-data-item">
            <img class="wcdi-icon" src="/images/icons/award-circle-blue.svg" alt="Scan DeFi icon">
            <div class="wcdi-data">
              <div class="wcdi-top">{{trans('academy.certified')}}</div>
              <div class="wcdi-bottom">{{trans('basic.in')}} NFT</div>
            </div>
          </div>
        </div>
        <section v-if="course.preview" class="web-course-preview-video">
          <youtube :videoId="course.preview" maxWidth="100%"></youtube>
        </section>
        <web-course-poster class="m-t-20" v-else :course="course"></web-course-poster>
        <div class="wc-subtitle">{{course.subtitle}}</div>
        <div class="wc-description">{{course.description}}</div>
      </div>
      <div class="wc-info-container">
        <div class="wc-subtitle">{{trans('academy.syllabus')}}</div>
        <div class="course-show-lessons-container">
          <b-collapse v-for="(unit, index) of course.units"
            class="course-show-lesson"
            :key="index"
            animation="slide"
            :open="filters.unit == index"
            @open="filters.unit = index">
            <template #trigger="props">
              <div class="card-header" role="button">
                <div class="card-header-unit-icon">
                  U{{index+1}}
                </div>
                <p class="card-header-title">{{unit.title}}</p>
                <a class="card-header-icon">
                  <i v-if="props.open" class="fas fa-chevron-up"></i>
                  <i v-else class="fas fa-chevron-down"></i>
                </a>
              </div>
            </template>
            <div class="card-content">
              <div class="content">
                <div class="course-lesson-lectures">
                  <div v-for="(lesson, index) in unit.lessons" :key="index" class="course-lesson-lecture">
                    <div class="cll-title">{{lesson.title}}</div>
                    <div class="cll-duration">{{$root.shortDuration(lesson.duration)}}</div>
                  </div>
                </div>
              </div>
            </div>
          </b-collapse>
        </div>
      </div>
      <div v-if="course.requirements && course.requirements.length" class="wc-info-container">
        <div class="wc-subtitle">{{trans('academy.requirements')}}</div>
        <ul class="wc-list">
          <li v-for="requirement, ri in course.requirements" :key="ri" class="wc-list-item">{{requirement}}</li>
        </ul>
      </div>
    </div>
    <web-course-stats :course="course"></web-course-stats>
  </section>
</template>

<script>
  export default {
    props: {
      // course: {
      //   type: Object,
      //   required: true,
      //   default: null,
      // },
    },

    data() {
      return {
        course: null,
//         course: {
//           title: 'Introducción Al Mundo Del Blockchain',
//           subtitle: 'Learn how to create and invest in Ape Academy NFTs from scratch',
//           teacher: 'BDCrypto',
//           teacher_skills: ['Trader', 'Video Creator'],
//           description: `Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
          
// At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr...`,
//           price: 12900,
//           discount: 75,
//           discount_type: 'percentage',
//           final_price: 3225,
//           discount_deadline: new Date().setDate(14),
//           level: 2,
//           lessons_count: 60,
//           students_count: 4386,
//           duration: '150h',
//           subtitles: ['es', 'en', 'pt', 'gb', 'fr'],
//           nft_certification: true,
//           positive_votes_percentage: 98,
//           lessons: [
//             {
//               title: 'Introduction',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//             {
//               title: 'How to create an NFT?',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//             {
//               title: 'When to sell and when to buy',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//             {
//               title: 'Where to buy bitcoin and cryptocurrencies?',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//             {
//               title: 'Wallets and types of wallets',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//             {
//               title: 'Lorem ipsum',
//               lectures: [
//                 { title: 'About me', duration: '5m' },
//                 { title: 'What will we do in the course?', duration: '12m' },
//                 { title: 'Dolor sit amet', duration: '5m' },
//                 { title: 'Sadipscing elitr', duration: '27m' },
//                 { title: 'Diam nonumy', duration: '45m' },
//                 { title: 'Invidunt ut labore', duration: '34m' },
//                 { title: 'Sed diam nonumy eirmod', duration: '90m' },
//               ],
//             },
//           ],
//         },
        filters: {
          lesson: 0,
        },
      }
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

    computed: {
      mentorSkillsText(){
        if(!this.course) return null;
        // return this.$root.joinArray(this.course.mentor.skills);
        return null;
      },
    },

    methods: {
      init() {
        this.getCourse();
      },
      getCourse() {
        let params = {
          with: 'category,level,mentor,units.lessons',
          with_count: 'students,lessons,upVoters,downVoters',
        };
        axios.get(`/api/courses/${this.$route.params.course}/get-by-slug`, {params:params}).then(response => this.course = response.data);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
