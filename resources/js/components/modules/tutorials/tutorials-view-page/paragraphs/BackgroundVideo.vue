<template>
    <div class="container tutorial-text backgroundImage" v-bind:style="{ backgroundImage: 'url(' + BgImagePath + ')' }">
        <div class="row mx-5 mb-5 my-5">
            <div class="video-wrapper col-md-4 offset-md-4 inner-trigger col-12 mx-sm-auto mt-5 py-5">
                <div class="mx-5 my-5">
                    <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
                    <div class="myTooltip" ref="videoNotification" v-html="NoticeText" @click="playVideo">
                        <i class="far fa-play-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {getIdFromUrl} from "vue-youtube";

    export default {
        name: "BackgroundVideo",
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

            if(this.BgImage === undefined){
                this.BgImage = '';
            } else {
                this.BgImagePath = this.getImagePath(this.BgImage);
            }
        },
        data() {
            return {
                VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
                Banner: this.mydata ? this.$props.mydata.banner : '',
                BgImage: this.mydata ? this.$props.mydata.background : '',
                BgImagePath: '',
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
            player() {
                return this.$refs.youtube.player
            },
        },
    };
</script>

<style scoped>
    .backgroundImage {
        background-repeat: no-repeat;
        background-size: cover;
    }

    .video-wrapper{
        background-size: cover;
        z-index: 2;
        background-position: center;
        box-shadow: 0px 0px 20px 3px rgba(0, 0, 0, 0.2);
        border-radius: 5px !important;
        overflow: hidden;
        height: 66%;
        width: 40%;
    }
</style>
