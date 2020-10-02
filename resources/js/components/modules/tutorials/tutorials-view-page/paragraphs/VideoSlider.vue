<template>
    <div class="col-12">
    <div class="video-slider">
        <swiper class="swiper" :options="swiperOption">
            <swiper-slide v-for="(video, index) in Videos" :key="index">
                <youtube :video-id="video.videoId" ref="youtube" @playing="playing(index)"></youtube>
                <div class="myTooltip" ref="videoNotification" v-html="NoticeText" @click="playVideo(index)">
                    <i class="far fa-play-circle"></i>
                </div>
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
            playVideo(index) {
                this.$refs.youtube[index].player.playVideo()
            },
            playing(videoPlayerIndex) {
                this.$refs.videoNotification[videoPlayerIndex].style.display = 'none';
                const refPlayer = this.$refs.youtube[videoPlayerIndex].player
                let app = this;

                let myClock = setInterval(() => {
                    refPlayer.getCurrentTime().then((time) => {
                        let playerSeconds = Math.round(time); // seconds in x format
                        let date = new Date(0);
                        date.setSeconds(playerSeconds);
                        let HhMmSs = date.toISOString().substr(11, 8); // time in hh:mm:ss format
                        let MmSs = HhMmSs.substr(3, HhMmSs.length); // time in mm:ss format

                        this.Videos[videoPlayerIndex].Notices.find(function(notice, index) {
                            if(notice.noticeTime === MmSs){
                                refPlayer.pauseVideo();
                                clearInterval(myClock);
                                app.showVideoNotice(videoPlayerIndex, notice.noticeText);
                            }
                        });
                    });
                }, 1000);
            },
            pause () {
                this.player.pauseVideo();
            },
            showVideoNotice(index, text){
                console.log(index);
                console.log(text);
                console.log(this.$refs);
                this.$refs.videoNotification[index].style.display = 'block';
                this.NoticeText = text;
            },
        },
        computed: {
            player() {
                return this.$refs.youtube.player
            },
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
