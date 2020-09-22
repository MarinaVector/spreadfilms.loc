<template>
    <div class="container lyout-panel">
        <input type="hidden" name="component_type" value="TextWithHighImage" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="normal_text_image" v-model="Image" class="normal_text_image">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-1 mt-2">
                <div class="row">
                    <div class="col-lg-1 mt-2 ml-3">
                        <button type="button" class="btn-icon ml-n2 draggable"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-1 offset-lg-10">
                    </div>
                </div>
            </div>

            <div class="trigger-headline col-lg-4 mt-5">
                <div class="tutorial-text h-block mt-5" @click="showHeaderModal()">
                    <button class="px-3 h-button" type="button">
                        <i class="fa fa-heading blueiconcolor fa-7x">
                        </i>
                        <p class="mb-n1 mt-n3 mx-1">Headline</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 down-trigger">
                <div class="row ml-2">
                    <div class="col-lg-12 tutorial-text py-5 pt-3" @click="showImageModal()">
                        <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Image</p>
                        </button>
                    </div>

                    <div class="col-lg-12 tutorial-text" @click="showTextModal()">
                        <button class="text-button py-2 px-5 my-2" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Text</p>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-lg-1 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-3 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-3 pt-5 mt-5">
                        <button type="button" class="btn-icon mt-5"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <TextModal ref="textmodal" v-on:saveData="saveData" :text="NormalTextBody"></TextModal>
        <HeaderModal ref="headermodal" v-on:saveData="saveData" :header="NormalTextHeader"></HeaderModal>
        <ImageModal ref="imagemodal" v-on:saveData="saveData" :image="Image"></ImageModal>
    </div>
</template>

<script>
    import TextModal from './modal-windows/TextWithHighImage/TextModal'
    import HeaderModal from './modal-windows/TextWithHighImage/HeaderModal'
    import ImageModal from './modal-windows/TextWithHighImage/ImageModal'

    export default {
        name: "TextWithHighImage",
        components: {
            TextModal,
            HeaderModal,
            ImageModal,
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
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Image: this.mydata ? this.$props.mydata.image : '',
                normalBefore:true,
                normalAfter: false,
                btnBefore: true,
                btnAfter: false,
                headerText: false,
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
                let element = this.$refs.textmodal.$el;
                $(element).modal('show');
            },
            showHeaderModal: function () {
                let element = this.$refs.headermodal.$el;
                $(element).modal('show');
            },
            showImageModal: function () {
                let element = this.$refs.imagemodal.$el;
                $(element).modal('show');
            },
            saveData: function (header = null, body = null, image = null) {
                if (header !== null){
                    this.NormalTextHeader = header;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                }

                if (image !== null){
                    this.Image = image;
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
                        image: this.Image,
                    }
                });

                this.bgHeadAfter = true;
                this.btnAfter = true;
                this.btnBefore =false;
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

    .trigger-headline {
        pointer-events: all;
        cursor: pointer;
        left: 29%;
        transform: translate3d(-50%, -50%, 0);
        transition: opacity .3s ease, background-color .5s ease;
        width: 100%;
        height: 100%;
        z-index: 43;
        padding: 5px 6px;
        min-width: 160px;
        text-align: center;
    }

    .down-trigger {

        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
        z-index:42;
        position: relative;
    }

    .h-block {
        background-color: #d9d9d9;
        margin-top: 100px;
    }

    .h-button {
        background-color: #d9d9d9;
        border: none;
    }

    .h-block:hover .h-button {
        background-color: white;
    }

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

</style>
