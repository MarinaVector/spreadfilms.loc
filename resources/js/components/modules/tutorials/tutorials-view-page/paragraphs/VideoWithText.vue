<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-6 inner-trigger mt-n1 ml-n1 my-5 mr-n3">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text py-5 pt-3">
                        <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
                        <div class="myTooltip" ref="videoNotification" v-html="NoticeText" @click="playVideo">
                            <i class="far fa-play-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 inner-trigger mt-n1 ml-n1 my-5">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text shadow-right py-5 pt-3">
                        <div class="headline h2 text-left mb-2 mt-2 final-header" v-html="NormalTextHeader">

                        </div>
                        <div class="final-text" v-html="NormalTextBody">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {getIdFromUrl} from "vue-youtube";

    export default {
        name: "VideoWithText",
        components: {

        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object, default: () => {}
            },
        },
        created() {
            if(!Array.isArray(this.Notices)){
                this.Notices = JSON.parse(this.escapeHtml(this.Notices));
            }
        },
        mounted() {
            this.videoId = getIdFromUrl(this.VideoUrl);
            this.VideoUtubeSrc = this.getVideoSrc(this.VideoUrl);
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
                Banner: this.mydata ? this.$props.mydata.banner : '',
                Dimension: this.mydata ? this.$props.mydata.dimension : '16:9',
                Notices: this.mydata ? this.$props.mydata.notices : [],
                videoId: "",
                NoticeText: "",
            };
        },
        methods: {
            showVideoSimpleModule: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
            playVideo() {
                this.player.playVideo()
            },
            playing() {
                this.$refs.videoNotification.style.display = 'none';
                let app = this;

                let myClock = setInterval(() => {
                    app.player.getCurrentTime().then((time) => {
                        let playerSeconds = Math.round(time); // seconds in x format
                        let date = new Date(0);
                        date.setSeconds(playerSeconds);
                        let HhMmSs = date.toISOString().substr(11, 8); // time in hh:mm:ss format
                        let MmSs = HhMmSs.substr(3, HhMmSs.length); // time in mm:ss format

                        app.Notices.find(function(notice, index) {
                            if(notice.noticeTime === MmSs){
                                app.pause();
                                clearInterval(myClock);
                                app.showVideoNotice(notice.noticeText);
                            }
                        });
                    });
                }, 1000);
            },
            pause () {
                this.player.pauseVideo();
            },
            getVideoSrc(url){
                return "https://www.youtube.com/embed/" + this.videoId;
            },
            showVideoNotice(text){
                this.$refs.videoNotification.style.display = 'block';
                this.NoticeText = text;
            }
        },
        computed: {
            player() {
                return this.$refs.youtube.player
            },
        },
    };
</script>

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .shadow-right {
        -webkit-box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
        -moz-box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
        box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
    }

</style>
