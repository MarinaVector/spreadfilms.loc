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

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
        z-index:5;
    }

    .text-button {
        background-color: white;
        border-radius: 3px
    }

    .tutorial-video {
        width: 100%;
        border: dotted 1px #333;
    }

    .tutorial-video:hover {
        background-color: rgba(0, 0, 0, 0.5);
        transition: 3s;
    }

    .btn-icon {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        top: 20px;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
        opacity:0.5 !important;
        transition: opacity .25s ease-in-out!important;
        -moz-transition: opacity .25s ease-in-out!important;
        -webkit-transition: opacity .25s ease-in-out!important;
    }

    .tutorial-video:hover .btn-icon {
        opacity:1!important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .modal-video {
        top: 50%;
        left: 50%;
    }

</style>
