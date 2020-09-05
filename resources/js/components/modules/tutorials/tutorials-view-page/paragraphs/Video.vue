<template>
    <div class="container mt-5" id="tutorial-text">
        <input type="hidden" name="component_type" value="Video" class="component_type" ref="component_type"/>

        <div class="row">
            <div class="col-md-12">
                <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
                <div class="myTooltip" ref="videoNotification" v-html="NoticeText"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import { getIdFromUrl } from 'vue-youtube'

    export default {
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
            blocksCounterID: {
                type: Number,
                default: null
            },
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
        mounted() {
            this.videoId = getIdFromUrl(this.VideoUrl);
            this.VideoUtubeSrc = this.getVideoSrc(this.VideoUrl);
        },
        created() {
            if(!Array.isArray(this.Notices)){
                this.Notices = JSON.parse(this.escapeHtml(this.Notices));
            }
            console.log(this.Notices);
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

                setInterval(() => {
                    app.player.getCurrentTime().then((time) => {
                        let playerSeconds = Math.round(time); // seconds in x format
                        let date = new Date(0);
                        date.setSeconds(playerSeconds);
                        let HhMmSs = date.toISOString().substr(11, 8); // time in hh:mm:ss format
                        let MmSs = HhMmSs.substr(3, HhMmSs.length); // time in mm:ss format

                        app.Notices.find(function(notice, index) {
                            if(notice.noticeTime === MmSs){
                                app.pause();
                                clearInterval();
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
        background-color: grey;
        margin-left: auto;
        margin-right: auto;
        top: 50px;
        z-index: 10;
    }

    iframe {
        width: 100%;
        max-width: 650px;
    }

</style>
