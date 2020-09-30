<template>
    <div>
        <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
        <div class="myTooltip" ref="videoNotification" v-html="NoticeText" @click="playVideo">
            <i class="far fa-play-circle"></i>
        </div>
    </div>
</template>

<script>

    export default {
        name: "VideoSlide",
        components: {

        },
        props: [
            'videoId',
            'notices',
        ],
        created() {

        },
        mounted() {
            console.log(this.$props);
        },
        data() {
            return {
                NoticeText: "",
                Notices: this.notices ? this.notices : [],
            };
        },
        methods: {
            playVideo() {
                this.player.playVideo()
            },
            playing() {
                this.$refs.videoNotification.style.display = 'none';
                let app = this;
                //console.log(this.Notices);

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
            showVideoNotice(text){
                this.$refs.videoNotification.style.display = 'block';
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

<style>


</style>
