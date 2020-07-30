<template>
    <div class="container">
        <input type="hidden" name="component_type" value="TxtImg" class="component_type"/>
        <div class="row">
            <div class="col-lg-12 text-image">
                <div class="row row-image">
                    <div class="col-lg-9 module-text" :id="dataInputPreviewID">
                        <div class="row">
                            <div class="col-lg-1 mt-3 ml-2">
                                <button type="button" class="btn-icon ml-n2 draggable">
                                    <i class="fa fa-arrows-v pt-2"></i>
                                </button>
                            </div>
                            <div class="col-lg-5 offset-lg-2 inner-trigger mt-5">

                                <input :id="dataInputID" class="elfinder-idea component_image" name="image"
                                       type="hidden"/>
                                <button :data-inputid="dataInputID"
                                        class="popup_selector text-button ml-4 py-2 px-5 mt-5 slide-border"
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
                                    <div class="inner-trigger col-lg-5 offset-lg-3">
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
                                        <button class="text-button py-2 px-5" type="button">
                                            <i class="fas fa-bars blueiconcolor fa-2x mt-1">
                                            </i>
                                            <div class="mt-n1 mb-n1">Text</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mt-2 tutorial-right">
                        <div class="row tutorial-right">
                            <div class="col-lg-3 offset-lg-9 mt-2 mb-5">
                                <button type="button" class="btn-icon ml-4 mb-5"
                                        @click="callParentDeleteParagraphBlock()">
                                    <i class="fa fa-trash-o pt-2"></i>
                                </button>
                            </div>
                            <div class="col-lg-5 offset-lg-9 pt-3 mt-5">
                                <button type="button" class="btn-icon ml-4"
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
        props: [
            'index',
            'blocksCounterID'
        ],
        data() {
            return {
                dataInputID: '',
                dataInputPreviewID: '',
                NormalTextHeader: '',
                NormalTextBody: ''
            };
        },
        created() {

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

        mounted() {
            //console.log(this.$props.blocksCounterID);
            this.dataInputID = 'background-image-' + this.$props.blocksCounterID;
            this.dataInputPreviewID = 'background-image-' + this.$props.blocksCounterID + '-preview';
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
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
        transition: opacity .3s ease, background-color .5s ease;
        width: 36%;
        height: 80%;
        margin-left: 50%;
        background-color: #d9d9d9;
        z-index: 2;
    }

    .level-text:hover {
        pointer-events: all;
        position: absolute;
        top: 50%;
        cursor: pointer;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
        transition: opacity .3s ease, background-color .5s ease;
        width: 36%;
        height: 80%;
        background-color: #6c6c6c;
        z-index: 2;
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
    }

    .tutorial-right {
        width: 100%;
    }

    .module-text:hover {
        background-color: #7c7c7c;
        pointer-events: all;
        cursor: pointer;
        transition: opacity .3s ease, background-color .5s ease;
        width: 100%;
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
