<template>
    <div class="container">
        <input type="hidden" name="component_type" value="TxtImg" class="component_type"/>
        <div class="row">
            <div class="col-md-12 col-12 text-image">
                <div class="row row-image">
                    <div class="col-lg-9 col-8">
                        <div class="row module-text" :id="dataInputPreviewID" ref="preview">
                            <div class="col-2 col-md-1 mt-3 ml-2">
                                <button type="button" class="btn-icon ml-n2 draggable">
                                    <i class="fa fa-arrows-v pt-2"></i>
                                </button>
                            </div>
                            <div class="col-5 col-md-5 offset-md-2 inner-trigger mt-md-5">

                                <input :id="dataInputID" class="elfinder-idea component_image" name="image"
                                       :value="Src" type="hidden"/>
                                <button :data-inputid="dataInputID"
                                        class="popup_selector text-button ml-md-4 py-2 mb-md-0 mb-5 px-md-5 mt-md-5 slide-border"
                                        type="button">
                                    <i class="fas fa-image blueiconcolor fa-2x pt-1">
                                    </i>
                                    <div class="mt-n1 mb-n1">Image</div>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="level-text pt-5" @click="showTextModal()">
                                <div class="row mt-4">
                                    <div class="inner-trigger level-panel col-md-5 col-5 offset-md-3">
                                        <div class="text-output mx-n5">
                                            <div class="text-header text-left mb-3" v-html="NormalTextHeader">

                                            </div>
                                            <div class="text-print text-justify" v-html="NormalTextBody">

                                            </div>
                                        </div>
                                        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader"
                                               class="normal_text_header">
                                        <input type="hidden" name="normal_text_body" v-model="NormalTextBody"
                                               class="normal_text_body">
                                        <button class="text-button py-2 px-md-5 px-2" type="button">
                                            <i class="fas fa-bars blueiconcolor fa-2x mt-1">
                                            </i>
                                            <div class="mt-n1 mb-n1">Text</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-4 mt-2 tutorial-right">
                        <div class="row tutorial-right">
                            <div class="col-12 col-md-3 offset-md-9 mt-2 mb-5">
                                <button type="button" class="btn-icon ml-3 mb-5"
                                        @click="callParentDeleteParagraphBlock()">
                                    <i class="fa fa-trash-o pt-2"></i>
                                </button>
                            </div>
                            <div class="col-12 col-md-5 offset-md-9 pt-3 mt-5">
                                <button type="button" class="btn-icon ml-3"
                                        @click="callParentDuplicateParagraphBlock()">
                                    <i class="fa fa-files-o pt-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <NormalTextModal ref="modal" v-on:saveData="saveData" v-on:getPreviousData="getPreviousData"
                         :header="NormalTextHeader"
                         :body="NormalTextBody"></NormalTextModal>
    </div>
</template>

<script>
    import NormalTextModal from './modal-windows/NormalText/NormalTextModal'

    export default {
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
            blocksCounterID: {
                type: Number,
                default: null
            },
        },
        data() {
            return {
                dataInputID: '',
                dataInputPreviewID: '',
                NormalTextHeader: this.mydata ? this.$props.mydata.header : '',
                NormalTextBody: this.mydata ? this.$props.mydata.text : '',
                Src: this.mydata ? this.$props.mydata.src : '',
            };
        },
        created() {

        },
        mounted() {
            this.dataInputID = 'background-image-' + this.$props.blocksCounterID;
            this.dataInputPreviewID = 'background-image-' + this.$props.blocksCounterID + '-preview';
            $(this.$refs.preview).css("background-image", "url("+this.Src+")");
        },
        methods: {
            callParentDeleteParagraphBlock: function () {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (header, body) {
                this.NormalTextHeader = header;
                this.NormalTextBody = body;
            },
            getPreviousData: function () {
                return [1, 2];
            }
        },
        computed: {}
    };
</script>

<style>
    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
    }

    .text-button {
        background-color: white;
        border: none;
    }

    .level-text {
        pointer-events: all;
        position: absolute;
        top: 50%;
        cursor: pointer;
        left: 100%;
        transform: translate3d(-50%, -50%, 0);
        transition: opacity .3s ease, background-color .5s ease;
        width: 36%;
        height: 80%;
        background-color: #d9d9d9;
        z-index: 2;
    }

    .level-text:hover    {
        background-color: #6c6c6c;
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
        opacity: 0.5 !important;
        transition: opacity .25s ease-in-out !important;
        -moz-transition: opacity .25s ease-in-out ! important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .module-text {
        width: 100%;
        height: 100%;
        border: dotted 1px #333;
        z-index: 1;
        background-size: cover;
        background-position: center;
        cursor: pointer;
    }

    .tutorial-right {
        width: 100%;
    }

    .module-text:hover {
        background-color: #7c7c7c;
        cursor: pointer;
        transition: opacity .3s ease, background-color .5s ease;
    }

    .text-image:hover .btn-icon,
    .tutorial-right:hover .btn-icon {
        opacity: 1 !important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .text-image {
        border-bottom: 1px solid #d9d9d9;
        background-color: #f9f9f9;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 274px;
        max-height: 1000px;
        min-height: 239px;
    }

    .row-image {
        height: inherit;
    }

</style>
