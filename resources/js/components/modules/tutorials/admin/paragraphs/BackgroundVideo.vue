<template>
    <div class="container tutorial-text video-grid">
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

            <VideoBackgroundModal ref="modal"></VideoBackgroundModal>
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
                default: () => {}
            },
        },
        created() {

        },
        mounted() {

        },
        data() {
            return {};
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
        },
        computed: {

        },
    };
</script>

<style scoped>

    .video-wrapper {
        box-shadow: 0px 0px 20px 3px rgba(0, 0, 0, 0.2);
        border-radius: 5px !important;
            }
</style>
