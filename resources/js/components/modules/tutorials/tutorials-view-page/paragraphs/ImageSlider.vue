<template>
    <div class="col-12">
    <div class="video-slider">
        <swiper class="swiper" :options="swiperOption">
            <swiper-slide v-for="(image, index) in Images" :key="index">
                <img :src="image.ImagePath" alt=""/>
            </swiper-slide>
            <div class="swiper-pagination swiper-pagination-bullets" slot="pagination"></div>
        </swiper>
    </div>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'
    import { getIdFromUrl } from 'vue-youtube'
    import VideoSlide from './VideoSlider/VideoSlide'

    export default {
        name: "ImageSlider",
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
            if(!Array.isArray(this.Images)){
                if(this.Images === undefined || this.Images === ""){
                    this.Images = [];
                } else {
                    this.Images = JSON.parse(this.escapeHtml(this.Images));
                }
            }

            this.Images = this.Images.map(i => ({
                Image: i.Image,
                ImagePath: this.getImagePath(i.Image),
                NormalTextBody: i.NormalTextBody,
            }));
        },
        data() {
            return {
                Images: this.mydata ? this.escapeHtml(this.$props.mydata.sliderimages) : [],
                ImagesJSON: '',
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
            getImagePath: function(path) {
                let disk = path.split('/')[0];
                let realPath = '';
                switch (disk) {
                    case 'company-public':
                        realPath = this.$parent.publicpath + path.split('/')[1];
                        break;
                    case 'company-private':
                        realPath = this.$parent.privatepath + path.split('/')[1];
                        break;
                    default:
                        return;
                }

                return realPath;
            },
        },
        computed: {

        },
    };
</script>

<style lang="scss">

  $text-color: gray;
  $transition-time-normal: 3s;
  $white: 'white';

  .swiper-pagination-bullet {
      width: 20px !important;
      height: 20px !important;
      display: inline-block;
      border-radius: 100%;
      line-height: 16px !important;
      text-align: center;
      color: white;
      opacity: 0.7;
      background: gray;
  }

  .swiper {
      .swiper-pagination-bullet-custom {
      $size: 16px;
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
      .swiper-pagination-bullet {
          width: 16px !important;
          height: 16px !important;
      }
  }

  .video-slider {
      width: 60vw;
      height: calc(60vw * 9 / 16);

      /* align center */
      margin: auto;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
  }

  @media (min-width: 177.778vh) {
      .video-slider1 {
          height: 100vh;
          width: calc(100vh * 16 / 9);
      }
  }

  .swiper-container {
      padding-bottom: 36px !important;
  }

</style>
