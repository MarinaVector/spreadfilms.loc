<template>
    <div class="container mt-5" id="tutorial-text">
        <input type="hidden" name="component_type" value="Video" class="component_type" ref="component_type"/>

        <div class="row">
            <div class="col-md-12">
                <youtube :video-id="videoId" ref="youtube" @playing="playing"></youtube>
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
            };
        },
        mounted() {
            this.videoId = getIdFromUrl(this.VideoUrl);
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
                console.log('\o/ we are watching!!!')
                let app = this;
                let i = 0;
                // This block will be executed 100 times.
                setInterval(() => {
                    if (i == 100) {
                        clearInterval(this);
                    }
                    else {
                        console.log( 'Currently at ' + (i++) );
                        console.log(app.player.getCurrentTime());
                        if(i == 3){
                            player.pauseVideo();
                        }
                    }
                }, 1000);
            },
            pause () {
                this.player.pauseVideo()
            },
            formatTime(time){
                time = Math.round(time);

                var minutes = Math.floor(time / 60),
                    seconds = time - minutes * 60;

                seconds = seconds < 10 ? '0' + seconds : seconds;

                return minutes + ":" + seconds;
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

    iframe {
        width: 100%;
        max-width: 650px;
    }

   </style>
