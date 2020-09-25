<template>
    <div class="" style="width: 1000px; height: 500px; border: 1px solid red;">
        <swiper ref="mySwiper" :options="swiperOptions">
            <swiper-slide>Slide 1</swiper-slide>
            <swiper-slide>Slide 2</swiper-slide>
            <swiper-slide>Slide 3</swiper-slide>
            <swiper-slide>Slide 4</swiper-slide>
            <swiper-slide>Slide 5</swiper-slide>
            <div class="swiper-pagination" slot="pagination"></div>
        </swiper>
    </div>
</template>

<script>
    export default {
        name: "VideoSlider",
        components: {

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

            console.log('Current Swiper instance object', this.swiper)
            //this.swiper.slideTo(3, 1000, false)
        },
        data() {
            return {
                Videos: this.mydata ? this.escapeHtml(this.$props.mydata.slidervideos) : [],
                VideosJSON: '',
                swiperOptions: {
                    pagination: {
                        el: '.swiper-pagination'
                    },
                    // Some Swiper option/callback...
                },
            };
        },
        methods: {
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {
            swiper() {
                return this.$refs.mySwiper.$swiper
            }
        },
    };
</script>

<style lang="scss" scoped>
    /*@import './base.scss';*/

    .swiper {
        height: 400px;

        .swiper-slide {
            background: #444;
        }
    }
</style>
