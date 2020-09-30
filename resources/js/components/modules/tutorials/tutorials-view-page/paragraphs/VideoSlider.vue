<template>
    <div class="" style="width: 1000px; height: 500px; border: 1px solid red;">
        <swiper class="swiper" :options="swiperOption">
            <swiper-slide v-for="(video, index) in Videos" :key="index">
                <VideoSlide :videoId="video.videoId" :notices="video.Notices">

                </VideoSlide>
            </swiper-slide>
            <div class="swiper-pagination swiper-pagination-bullets" slot="pagination"></div>
        </swiper>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'
    import { getIdFromUrl } from 'vue-youtube'
    import VideoSlide from './VideoSlider/VideoSlide'

    export default {
        name: "VideoSlider",
        components: {
            Swiper,
            SwiperSlide,
            VideoSlide,
        },
        directives: {
            swiper: directive
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {}
            },
        },
        created() {

        },
        mounted() {
            if(!Array.isArray(this.Videos)){
                if(this.Videos === undefined || this.Videos === ""){
                    this.Videos = [];
                } else {
                    this.Videos = JSON.parse(this.escapeHtml(this.Videos));
                }
            }

            this.Videos = this.Videos.map(i => ({
                videoId: getIdFromUrl(i.VideoUrl),
                VideoUtubeSrc: this.getVideoSrc(i.VideoUrl, getIdFromUrl(i.VideoUrl)),
                Banner: i.Banner,
                Dimension: i.Dimension,
                Notices: i.Notices,
            }));
        },
        data() {
            return {
                Videos: this.mydata ? this.escapeHtml(this.$props.mydata.slidervideos) : [],
                VideosJSON: '',
                NoticeText: "",
                slide: 0,
                sliding: null,
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        renderBullet(index, className) {
                            return `<span class="${className} swiper-pagination-bullet-custom">${index + 1}</span>`
                        }
                    }
                }
            };
        },
        methods: {
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
            onSlideStart(slide) {
                this.sliding = true
            },
            onSlideEnd(slide) {
                this.sliding = false
            },
            getVideoSrc(url, videoId){
                return "https://www.youtube.com/embed/" + videoId;
            },
        },
        computed: {

        },
    };
</script>

<style lang="scss" scoped>
  $text-color: black;
  $transition-time-normal: 3s;
  $white: 'white';

  .swiper {
    .swiper-pagination-bullet-custom {
      $size: 20px;
      width: $size !important;
      height: $size !important;
      line-height: $size !important;
      text-align: center;
      color: $text-color;
      opacity: 0.7;
      background: rgba($text-color, 0.2);
      transition: all $transition-time-normal;

      &:hover {
        opacity: 1;
      }

      &.swiper-pagination-bullet-active {
        opacity: 1;
        color: $white;
        background: #007aff;
      }
    }
  }
</style>
