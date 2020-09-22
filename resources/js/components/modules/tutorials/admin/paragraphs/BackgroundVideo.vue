<template>
    <div class="container tutorial-text video-grid" v-bind:style="{ backgroundImage: 'url(' + BgImagePath + ')' }">
        <input type="hidden" name="component_type" value="BackgroundVideo" class="component_type" ref="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header"/>
        <input type="hidden" name="video_background" v-model="BgImage" class="video_background"/>
        <input type="hidden" name="video_url" v-model="VideoUrl" class="video_url"/>
        <input type="hidden" name="video_banner" v-model="Banner" class="video_banner"/>
        <input type="hidden" name="video_dimension" v-model="Dimension" class="video_dimension"/>
        <input type="hidden" name="video_notices" v-model="MyNotices" class="video_notices"/>
        <div class="row my-2 zindeged">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-12 my-5 my-md-5">
                <div class="text-center mx-5 px-5 my-5">
                <div class="my-md-5 video-wrapper">
                    <button  @click=showVideoBackgroundModal() class="text-button py-3 px-5 mt-2 my-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mt-n1 mb-n1">Video</p>
                    </button>
                </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-left" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>

            <VideoBackgroundModal ref="modal" v-on:saveData="saveData"
                                  :header="NormalTextHeader"
                                  :dimension="Dimension"
                                  :noticesProp="Notices"
                                  :videoUrl="VideoUrl"
                                  :banner="Banner"
            ></VideoBackgroundModal>
        </div>

    </div>

</template>

<script>
    import VideoBackgroundModal from './modal-windows/Video/VideoBackgroundModal'

    export default {
        name: "BackgroundVideo",
        components: {
            VideoBackgroundModal
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => ({
                    header: '',
                    background: '',
                    videoUrl: '',
                    banner: '',
                    dimension: '16:9',
                    notices: [],
                }),
            },
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
        mounted() {
            if(this.Banner === undefined){
                this.Banner = '';
            }

            if(this.BgImage === undefined){
                this.BgImage = '';
            } else {
                this.BgImagePath = this.getImagePath(this.BgImage);
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                BgImage: this.mydata ? this.$props.mydata.background : '',
                VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
                Banner: this.mydata ? this.$props.mydata.banner : '',
                Dimension: this.mydata ? this.$props.mydata.dimension : '16:9',
                Notices: this.mydata ? this.$props.mydata.notices : [],
                MyNotices: null,
                BgImagePath: null,
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showVideoBackgroundModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (VideoUrl, Banner, Dimension, Notices, Header, BgImage) {
                this.VideoUrl = VideoUrl;
                this.Banner = Banner;
                this.Dimension = Dimension;
                this.Notices = Notices;
                this.NormalTextHeader = Header;
                this.BgImage = BgImage;
                this.btnAfterText = true;
                this.btnAfterSrc = true;
                this.textAfter = true;
                this.btnAfterImg = true;

                this.MyNotices = JSON.stringify(this.Notices)
                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        videoUrl: this.VideoUrl,
                        banner: this.Banner,
                        dimension: this.Dimension,
                        notices: this.Notices,
                        header: this.NormalTextHeader,
                    }
                });
            },
            resetNoticesProp: function () {
                this.$refs.modal.Notices = this.Notices ? this.Notices : [];
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
            getImagePath: function(path) {
                let disk = path.split('/')[0];
                let realPath = '';
                switch (disk) {
                    case 'company-public':
                        realPath = this.$parent.$parent.publicpath + path.split('/')[1];
                        break;
                    case 'company-private':
                        realPath = this.$parent.$parent.privatepath + path.split('/')[1];
                        break;
                    default:
                        return;
                }

                return realPath;
            },
        },
        computed: {

        },
    };
</script>

<style scoped>
    .zindeged {
        z-index: 8000;
    }

    .video-wrapper {
        box-shadow: 0px 0px 20px 3px rgba(0, 0, 0, 0.2);
        border-radius: 5px !important;
    }

    .video-grid {
        background-repeat: no-repeat;
        background-size: cover;
        transition: opacity .3s ease, background-color .5s ease;
        background-color: transparent;
    }

    .video-grid:hover {
        background-repeat: no-repeat;
        background-size: cover;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.5);
    }

</style>
