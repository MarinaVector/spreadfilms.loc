<template>
    <div class="container mt-5" id="tutorial-text">
        <input type="hidden" name="component_type" value="Video" class="component_type" ref="component_type"/>

        <div class="row">
            <div class="col-md-12 videoSc video">
                <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
                <div class="myTooltip"ref="videoNotification" v-html="NoticeText" @click="playVideo">
                    <i class="far fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { getIdFromUrl } from 'vue-youtube'

    export default {
        name: "Video",
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
            blocksCounterID: {
                type: Number,
                default: null
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
                VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
                Banner: this.mydata ? this.$props.mydata.banner : '',
                Dimension: this.mydata ? this.$props.mydata.dimension : '16:9',
                Notices: this.mydata ? this.$props.mydata.notices : [],
                videoId: "",
                NoticeText: "",
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
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

<style>

    .myTooltip{
        display: none;
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        padding: 10px;
        border-radius: 5px;
        background: #fff;
        transition: opacity .3s;
        z-index: 1234;
        pointer-events: none;
        cursor: pointer;
        opacity: 1;
        pointer-events: all;
    }

    .videoSc {
        height: 100%;
    }

    .video {
        position:relative;
        padding-bottom:56.25%;
    }

    iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

</style>
