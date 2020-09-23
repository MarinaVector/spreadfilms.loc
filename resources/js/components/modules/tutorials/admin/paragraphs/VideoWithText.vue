<template>
    <div class="container">
        <input type="hidden" name="component_type" value="VideoWithText" class="component_type" ref="component_type" />
        <input type="hidden" name="video_url" v-model="VideoUrl" class="video_url"/>
        <input type="hidden" name="video_banner" v-model="Banner" class="video_banner"/>
        <input type="hidden" name="video_dimension" v-model="Dimension" class="video_dimension"/>
        <input type="hidden" name="video_notices" v-model="MyNotices" class="video_notices"/>
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-1 mt-2">
                <div class="row">
                    <div class="col-lg-1 mt-2 ml-2">
                        <button type="button" class="btn-icon ml-n2 draggable"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-1 offset-lg-10">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 inner-trigger mt-n1 ml-n1 my-5 mr-n3">
                <div class="row ml-2 mt-5" v-bind:style="{ backgroundImage: 'url(' + Banner + ')' }">
                    <div class="col-lg-12 tutorial-text py-5 pt-3" @click=showVideoModal()>
                        <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Video</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 inner-trigger mt-n1 ml-n1 my-5">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text shadow-right py-5 pt-3" @click="showTextModal()">
                        <button v-bind:class=" {btnbefore:btnBefore, btnafter:btnAfter} " class="text-button py-2 my-5 px-5 pb-3" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                        <div v-bind:class=" {headertext:headerText} "
                             class="text-header h2 text-left position-relative pb-0 normal_text"
                             v-html="NormalTextHeader">
                        </div>

                        <div class="final-text text-justify" v-html="NormalTextBody"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-5 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-5 pt-5 mt-5">
                        <button type="button" class="btn-icon mt-5"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <NormalTextModal ref="textmodal" v-on:saveData="saveData"
                         :header="NormalTextHeader"
                         :body="NormalTextBody">
        </NormalTextModal>
        <VideoModal ref="videomodal"
                          v-on:saveData="saveData"
                          v-on:resetNoticesProp="resetNoticesProp"
                          :videoUrl="VideoUrl"
                          :banner="Banner"
                          :dimension="Dimension"
                          :noticesProp="Notices"
        >
        </VideoModal>
    </div>
</template>

<script>
import NormalTextModal from './modal-windows/VideoWithText/NormalTextModal'
import VideoModal from './modal-windows/VideoWithText/VideoModal'

export default {
    name: "VideoWithText",
    components: {
        NormalTextModal,
        VideoModal,
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
                header: '',
                text: '',
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
    },
    data() {
        return {
            NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
            VideoUrl: this.mydata ? this.$props.mydata.videoUrl : '',
            Banner: this.mydata ? this.$props.mydata.banner : '',
            Dimension: this.mydata ? this.$props.mydata.dimension : '16:9',
            Notices: this.mydata ? this.$props.mydata.notices : [],
            MyNotices: null,
            normalBefore:true,
            normalAfter: false,
            btnBefore: true,
            btnAfter: false,
            headerText: false
        };
    },
    methods: {
        callParentDeleteParagraphBlock: function() {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function() {
            this.$emit('duplicateParagraph');
        },
        showTextModal: function () {
            let element = this.$refs.textmodal.$el;
            $(element).modal('show');
        },
        showVideoModal: function () {
            let element = this.$refs.videomodal.$el;
            $(element).modal('show');
        },
        saveData: function (VideoUrl = null, Banner = null, Dimension = null, Notices = null, Header, Text) {
            if(VideoUrl !== null){
                this.VideoUrl = VideoUrl;
            }

            if(Banner !== null){
                this.Banner = Banner;
            }

            if(Dimension !== null){
                this.Dimension = Dimension;
            }

            if(Notices !== null){
                console.log('resetting notices to:');
                console.log(Notices);
                this.Notices = Notices;
            }

            if(Header !== null){
                this.NormalTextHeader = Header;
            }

            if(Text !== null){
                this.NormalTextBody = Text;
            }

            if(Header !== null || Text !== null){
                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;
            }

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
                    text: this.NormalTextBody,
                }
            });
        },
        resetNoticesProp: function () {
            this.$refs.videomodal.Notices = this.Notices ? this.Notices : [];
        },
        escapeHtml: function (value) {
            return $('<div/>').html(value).text();
        },
    },
    computed: {

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
