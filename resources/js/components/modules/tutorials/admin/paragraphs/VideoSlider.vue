<template>
    <div class="container tutorial-text">
        <input type="hidden" name="component_type" value="VideoSlider" class="component_type" />
        <input type="hidden" name="slider_videos" v-model="VideosJSON" class="slider_videos">
        <div class="row mt-2">
            <div class="col-lg-1 offset-lg-0 col-md-3 offset-md-1 col-7">
                <button type="button" class="btn-icon ml-n2 draggable">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 offset-lg-10 col-md-3 offset-md-5 col-5">
                <button type="button" class="btn-icon ml-4" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>
        </div>
        <div class="row mb-5 my-5">
            <div class="col-lg-9  tutorial-text mt-2">
                <div class="button-show set-button">
                    <div>
                        <div v-for="(Video, index) in Videos">
                            <button class="py-2 px-5 text-button bgfont-btn added-btn"
                                    type="button" @click="showAddVideoModal(index)">
                                <i class="fas fa-bars blueiconcolor fa-2x">
                                </i>
                                <div class="mb-1">Video {{index}}</div>
                                <span @click="deleteVideo(index)"><i class="fas fa-times ml-5 pl-4 mt-n5"></i></span>
                            </button>
                        </div>

                        <button class="py-2 px-5 text-button bgfont-btn" type="button" @click="showAddVideoModal()">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <div class="mb-n1">Add Video</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 offset-md-9 col-lg-1 offset-lg-11 float-sm-right">
                <button type="button" class="btn-icon mb-2 ml-4" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>
        </div>
        <VideoModal ref="videomodal" v-on:saveData="saveData"></VideoModal>
    </div>
</template>

<script>
    import VideoModal from './modal-windows/VideoSlider/VideoModal'

    export default {
        name: "VideoSlider",
        components: {
            VideoModal,
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
        },
        created() {

        },
        mounted() {
            if(!Array.isArray(this.Videos)){
                if(this.Videos === undefined || this.Videos === ""){
                    this.Videos = [];
                } else {
                    this.Videos = JSON.parse(this.escapeHtml(this.Videos));
                }
            }
        },
        data() {
            return {
                Videos: this.mydata ? this.escapeHtml(this.$props.mydata.slidervideos) : [],
                VideosJSON: '',
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showAddVideoModal: function (index = null) {
                let element = this.$refs.videomodal.$el;
                $(element).modal('show');

                if(index !== null){
                    this.$refs.videomodal.VideoUrl = this.Videos[index].VideoUrl;
                    this.$refs.videomodal.Banner = this.Videos[index].Banner;
                    this.$refs.videomodal.Dimension = this.Videos[index].Dimension;
                    this.$refs.videomodal.Notices = this.Videos[index].Notices;
                }
            },
            saveData: function (videoObj) {
                if (videoObj !== null){
                    if(videoObj.index === null){
                        this.Videos.push({
                            VideoUrl: videoObj.videoUrl,
                            Banner: videoObj.banner,
                            Dimension: videoObj.dimension,
                            Notices: videoObj.notices,
                        });
                    } else {
                        this.Videos[videoObj.index].VideoUrl = videoObj.videoUrl;
                        this.Videos[videoObj.index].Banner = videoObj.banner;
                        this.Videos[videoObj.index].Dimension = videoObj.dimension;
                        this.Videos[videoObj.index].Notices = videoObj.notices;
                    }

                    this.VideosJSON = JSON.stringify(this.Videos);
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        Videos: this.Videos,
                    }
                });
            },
            deleteVideo: function (index) {
                console.log('delete paragraph triggered');
                this.Videos.splice(index, 1);
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

    .buttons-box {
        border-radius: 3px !important;
        background-color: white !important;
        height: auto;
        text-align: center;
    }

    .first-button {

        background-color: white;
        border: none;
        border-bottom: 1px solid #ddd;
    }

</style>
