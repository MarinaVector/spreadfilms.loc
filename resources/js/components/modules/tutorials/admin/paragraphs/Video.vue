<template>
    <div class="container tutorial-video video-grid" v-bind:style="{ backgroundImage: 'url(' + Banner + ')' }">
        <input type="hidden" name="component_type" value="Video" class="component_type" ref="component_type" />
        <input type="hidden" name="video_url" v-model="VideoUrl" class="video_url"/>
        <input type="hidden" name="video_banner" v-model="Banner" class="video_banner"/>
        <input type="hidden" name="video_dimension" v-model="Dimension" class="video_dimension"/>
        <input type="hidden" name="video_notices" v-model="MyNotices" class="video_notices"/>
        <div class="row my-2">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-12 my-5 my-md-5">
                <div class="text-center my-md-5">
                    <button @click=showTextModal() class="text-button py-3 px-5 mt-2 my-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mt-n1 mb-n1">Video</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-left" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>

        <VideoSimpleModal ref="modal"
                     v-on:saveData="saveData"
                     v-on:resetNoticesProp="resetNoticesProp"
                     :videoUrl="VideoUrl"
                     :banner="Banner"
                     :dimension="Dimension"
                     :noticesProp="Notices"
        >
        </VideoSimpleModal>
        </div>
    </div>
</template>

<script>
    import VideoSimpleModal from './modal-windows/Video/VideoSimpleModal'

    export default {
        components: {
            VideoSimpleModal
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => ({
                    videoUrl: '',
                    banner: '',
                    dimension: '16:9',
                    notices: [],
                }),
            },
        },
        data() {
            return {
                VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
                Banner: this.mydata ? this.$props.mydata.banner : '',
                Dimension: this.mydata ? this.$props.mydata.dimension : '16:9',
                Notices: this.mydata ? this.$props.mydata.notices : [],
                MyNotices: null
            };
        },
        mounted() {
            if(this.Banner === undefined){
                this.Banner = '';
            }
        },
        created() {
            if(!Array.isArray(this.Notices)){
                if(this.Notices === undefined || this.Notices === ""){
                    this.Notices = [];
                } else {
                    this.Notices = JSON.parse(this.escapeHtml(this.Notices));
                }
            }
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (VideoUrl, Banner, Dimension, Notices) {
                this.VideoUrl = VideoUrl;
                this.Banner = Banner;
                this.Dimension = Dimension;
                this.Notices = Notices;
                this.btnAfterText = true;
                this.btnAfterSrc = true;
                this.textAfter = true;
                this.btnAfterImg = true;

                this.MyNotices = JSON.stringify(this.Notices)
                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        videoUrl: VideoUrl,
                        banner: Banner,
                        dimension: Dimension,
                        notices: Notices,
                    }
                });
            },
            resetNoticesProp: function () {
                this.$refs.modal.Notices = this.Notices ? this.Notices : [];
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {

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
        background-repeat: no-repeat;
        background-size: cover;
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

    .video-grid {
        display: grid;
        grid-gap: initial;
    }


</style>
