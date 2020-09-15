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
        <div class="row my-n3" @click="showTextModal()">
            <div class="col-md-4 offset-md-4 inner-trigger col-12 mx-sm-auto">
                <button class="text-button slide-border ml-4 py-2 px-5" type="button">
                    <i class="fas fa-bars blueiconcolor fa-2x">
                    </i>
                    <div class="mb-n2">Quote</div>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 offset-md-9 col-lg-1 offset-lg-11 float-sm-right">
                <button type="button" class="btn-icon mb-2 ml-4" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>
        </div>

        <NormalTextModal ref="modal"></NormalTextModal>
    </div>
</template>

<script>
    import NormalTextModal from './modal-windows/NormalText/NormalTextModal'

    export default {
        name: "Quote",
        components: {
            NormalTextModal
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
            return {

            };
        },
        methods: {
            callParentDeleteParagraphBlock: function () {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            }
        },
        computed: {

        },
    };
</script>

<style>


</style>
