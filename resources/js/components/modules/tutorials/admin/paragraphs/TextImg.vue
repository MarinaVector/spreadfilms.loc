<template>
    <!DOCTYPE html>
    <div>
        <div class="container txt-img">
            <input type="hidden" name="component_type" value="TxtImg" class="component_type" />
            <div class="row cont-elements">

                <div class="col-md-9 px-0 img-hover module-img" id="">

                    <div v-bind:class=" {txt_img_img_before:imgBefore, txt_img_img_after:imgAfter} "
                         class="h-100" :id="dataInputPreviewID" ref="preview">

                        <button type="button" class="btn-icon draggable mt-3 ml-3">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>

                        <input :id="dataInputID" class="elfinder-idea component_image" name="image"
                               v-model="Src" type="hidden" ref="Src" />

                        <button v-bind:class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                                :data-inputid="dataInputID"
                                class="popup_selector py-2 mb-md-0 px-md-5 slide-border txt-btn btn-left align-middle"
                                type="button">
                            <i class="fas fa-image blueiconcolor fa-2x pt-1">
                            </i>
                            <div class="mt-n1 mb-n1">Image</div>
                        </button>

                        <div class="row h-100 text-level">
                            <div v-bind:class=" { txt_img_txt_after : textAfter, txt_img_txt_before : textBefore} "
                                 class="clas col-4 offset-md-8 col-md-4 py-5">
                                <div class="" @click="showTextModal()">
                                    <div class="h2 headtext" v-html="NormalTextHeader">
                                    </div>
                                    <div class="text-justify" v-html="NormalTextBody"> </div>

                                    <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
                                    <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">

                                    <button v-bind:class=" {txt_img_btn_txt_before:btnBeforeText, txt_img_btn_txt_after:btnAfterText} "
                                            class="txt-btn px-md-5 px-2 btn-right" type="button">
                                        <i class="fas fa-bars blueiconcolor fa-2x mt-1">
                                        </i>
                                        <div class="">Text</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 container-right" id="right">
                    <div></div>
                    <div><button type="button" class="btn-icon mt-2 ml-3" @click="callParentDeleteParagraphBlock()">
                        <i class="fa fa-trash-o pt-2"></i>
                    </button></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div><button type="button" class="btn-icon ml-3" @click="callParentDuplicateParagraphBlock()">
                        <i class="fa fa-files-o pt-2"></i>
                    </button></div>
                </div>
            </div>
            <NormalTextModal ref="modal" v-on:saveData="saveData" v-on:getPreviousData="getPreviousData"
                             :header="NormalTextHeader" :body="NormalTextBody"></NormalTextModal>
        </div>
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
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Src: this.mydata ? this.$props.mydata.src : '',
                btnBeforeSrc: true,
                btnBeforeText: true,
                btnBeforeImg: true,
                btnAfterImg: false,
                btnAfterSrc: false,
                btnAfterText: false,
                textAfter: false,
                textBefore: true,
                imgAfter: false,
                imgBefore: true,
            };
        },
        created() {
            if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
                this.btnAfterText = true;
                this.textAfter = true;
            }
            if(this.Src !== "" ){
                this.btnAfterImg = true;
            }

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
                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: header,
                        text: body,
                        Src: this.$refs.Src.value,
                    }
                });
                this.Src = this.$refs.Src.value;
                this.NormalTextHeader = header;
                this.NormalTextBody = body;
                this.btnAfterText = true;
                this.btnAfterSrc = true;
                this.textAfter = true;
                this.btnAfterImg = true;
            },
            getPreviousData: function () {
                return [1, 2, 3, 4];
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {}
    };
</script>

<style lang="scss">

$height1:100%;
$height2:95%;

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
    }

    .text-button {
        border: none;
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

    .text-image:hover .btn-icon,
    .tutorial-right:hover .btn-icon {
        opacity: 1 !important;
        transition: opacity .3s ease, background-color .5s ease;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .text-image {
        background-color: #f9f9f9;
        top: 0px;
        left: 0px;
        width: 100%;
    }

    .txt_img_img_before {
        height: 274px;
        min-height: 239px;
    }

    .txt_img_img_after {
        border: none;
        height: $height1;
    }

    .row-image {
        height: inherit;
    }

    .txt_img_btn_img_before,
    .txt_img_btn_txt_before {
        visibility: visible;
    }

    .txt_img_btn_img_after,
    .txt_img_btn_txt_after {
        display: none;
    }

    .txt_img_txt_after:hover .txt_img_btn_txt_after {
        display: block;
    }

    .img-hover:hover .txt_img_btn_img_after {
        display: block;
    }

    .text-content {
        box-sizing: border-box;
    }

    .content-height {
        height: auto;
    }

    .module-img {
    height: ($height2) !important;
}

   .module-img {
    /*min-height: 300px;*/
    border: dotted 1px #333;
    background-size: cover;
    background-position: center;
    cursor: pointer;
    background: no-repeat !important;
}

  .module-img:hover  {
    background-color: rgba(0, 0, 0, 0.5) !important;
    cursor: pointer;
    transition: opacity .3s ease, background-color .5s ease;
 }

    .txt_img_txt_before {
        pointer-events: all;
        cursor: pointer;
        left: 100%;
        transition: opacity 0.3s ease, background-color 0.5s ease;
        width: 36%;
        height: 80%;
        background-color: #d9d9d9;
        border: dotted 1px #333;
         position: relative;
        z-index: 8;

        &:hover {
            background: gray;

            }

        }

    .txt_img_txt_before:hover .txt-btn,
    .module-img:hover .txt-btn {
        background-color: white;
        border-radius: 3px;
    }

    .txt_img_txt_after {
    color: #fff;
    background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
    cursor: pointer;
    word-wrap: break-word;
    left: 100%;
    border: none;
    width: 46%;
    pointer-events: all;
    transition: opacity 0.3s ease, background-color 0.5s ease;
    position: relative;
    z-index: 8;
    height: $height2;
}

    .clas {
        margin-left: 90%;
        left: 0;
    }

    .displaynone {
        visibility: hidden;
    }

    .img-btn {
        position: absolute;
        top: 40%;
        left: 40%;
    }

    .txt-btn {
        border: none;
        position: absolute;
        z-index: 20;
        top: 40%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: transparent;
    }

    #right {
        border-bottom: 1px solid #d9d9d9;
        background-color: #f1f1f1;
    }

    #background-image-2-preview {
        min-height: 300px;
    }

    .container-right {
        display: grid;
        grid-template-columns: auto 50px;
        grid-template-rows: 50px auto 50px;
        justify-items: start;
    }

    .txt-img:hover .btn-icon {
        opacity: 1 !important;
    }

    .headtext {
        margin: 0;
        padding-bottom: 35%;
        font-size: 3.1em;
        line-height: 1em;
    }

</style>
