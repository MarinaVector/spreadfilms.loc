<template>
    <div class="container tutorial-text">
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
        <div class="row mx-5 mb-5 my-5">
            <div  class="video-wrapper col-md-4 offset-md-4 inner-trigger col-12 mx-sm-auto mt-5 py-5">
                <div class="mx-5 my-5">
                    <button @click=showVideoBackgroundModal() class="text-button py-2 px-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <div class="mb-n1">Video</div>
                    </button>
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
        <VideoBackgroundModal ref="modal"></VideoBackgroundModal>
    </div>

</template>

<script>
    import VideoBackgroundModal from './modal-windows/Video/VideoBackgroundModal'

    export default {

        components: {
            VideoBackgroundModal
        },

        props: [
            'index'
        ],
        data() {
            return {};
        },
        created() {

        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showVideoBackgroundModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            }
        },

        mounted() {

        },
        computed: {}
    };
</script>

<style scoped>

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
