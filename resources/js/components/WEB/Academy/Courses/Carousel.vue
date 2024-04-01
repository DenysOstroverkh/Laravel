<template>
  <section class="academy-carousel">
    <slick class="best-courses-carousel" ref="carousel" :options="slick.options"> 
      <div v-for="(course, index) in courses" :key="index" class="academy-best-course cur-p pos-r" @click="preview(course)">
        <div class="course-background-image" :style="{backgroundImage: `url('${course.image}'`}"></div>
        <div class="academy-best-course-background">
          <span class="academy-best-course-position m-t-16 has-text-weight-semibold m-l-30">{{course.position}}</span>
          <div class="academy-best-course-info m-b-45">
            <span class="academy-best-course-title has-text-weight-bold m-b-18">{{course.title}}</span>
            <span class="academy-best-course-teacher has-text-weight-light m-b-25">{{course.teacher}}</span>
            <span class="academy-best-course-students has-text-weight-bold">{{course.students}} {{choice('academy.student', 2)}}</span>
          </div>
        </div>
      </div>
    </slick>
    <div class="slick-navigator m-t-40">
      <div class="slick-arrow-left" @click="prev"></div>
      <div class="slick-dots">
        <div v-for="(course, index) in courses.length" :key="index" @click="goTo(index)" :class="{'slick-dot-selected': selected == course.position, 'slick-dot': selected != course.position}"></div>
      </div>
      <div class="slick-arrow-right" @click="next"></div>
    </div>
  </section>
</template>

<script>
  import CoursePreviewModalForm from './ModalPreview.vue';
  import * as Vibrant from 'node-vibrant';

  export default {
    props: {},

    data() {
      return {
        selected : 1,
        courses: [
          {position: 1, title: "The world of the Scam", teacher: "Scan Defi", students: 61323, image: "/images/academy/dummy/img_portada/portada-1.png"},
          {position: 2, title: "Economy", teacher: "Scan Defi", students: 50346, image: "/images/academy/dummy/img_portada/portada-3.png"},
          {position: 3, title: "NFT", teacher: "Buenos dias cripto", students: 20563, image: "/images/academy/dummy/img_portada/portada-2.png"},
          {position: 4, title: "Cryptocurrency trading", teacher: "Trifasiko Trading", students: 18943, image: "/images/academy/dummy/img_portada/portada-4.png"},
          {position: 5, title: "The world of the Scam", teacher: "Scan Defi", students: 18943, image: "/images/academy/dummy/img_portada/portada-1.png"},
          {position: 6, title: "NFT", teacher: "Buenos dias cripto", students: 18943, image: "/images/academy/dummy/img_portada/portada-2.png"},
        ],
        slick: {
          options: {
            slidesToShow: 4,
            loop: true,
            autoplay: false,
            autoplaySpeed: 2000,
            dots: false,
            arrows: false,
            responsive: [
              {
                breakpoint: 1250,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          },
        }
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

    computed: {},

    methods: {
      preview(course) {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: CoursePreviewModalForm,
          canCancel: true,
          props: { course: course },
          events: {},
          onCancel: () => {}
        });
      },
      prev() {
        this.$refs.carousel.prev();
      },
      next() {
          this.$refs.carousel.next();
      },
      goTo(index) {
        this.$refs.carousel.goTo(index);
        selected = index;
      },
      setBackgrounds() {
        let backgrounds = $('.academy-best-course .course-background-image');

        for(let i = 0; i < backgrounds.length; i++){
          let background = backgrounds[i];
          let backgroundImage = background.style.backgroundImage;
          let src = backgroundImage.replace('url("', '').replace('")', '');

          Vibrant.from(src).quality(1).clearFilters().getPalette().then((palette) => {
            let bgColor = palette.Vibrant.hex;
            let textColor = palette.Vibrant.titleTextColor;
            
            $(background).next('.academy-best-course-background')
                         .css('background', `linear-gradient(transparent -20%, ${bgColor} 80%)`)
                         .find('.academy-best-course-students')
                         .css('color', bgColor);
          });
        }
      },
    },

    mounted() {
      this.setBackgrounds();
    }
  }
</script>
