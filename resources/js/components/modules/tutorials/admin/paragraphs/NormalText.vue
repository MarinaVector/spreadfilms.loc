<template>
    <div v-bind:class=" {normalbefore:normalBefore, normalafter:normalAfter} " class="container tutorial-normal-text"
         id="tutorial-text">
        <input type="hidden" name="component_type" value="NormalText" class="component_type" ref="component_type" />
        <div class="row">
            <div class="col-lg-1 offset-lg-0 col-md-3 offset-md-1 col-7">
                <button type="button" class="btn-icon mt-2 draggable">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 offset-lg-10 col-md-3 offset-md-5 col-5">
                <input type="hidden" name="normal_text[]" value="">
                <button type="button" class="btn-icon mt-2 ml-4" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>
        </div>
        <div class="row" @click="showTextModal()">
            <div class="col-md-8 mx-auto col-12 mx-sm-auto" id="butTxt">
                <button v-bind:class=" {btnbefore:btnBefore, btnafter:btnAfter} " class="text-button slide-border py-2
                 px-5" type="button">
                    <i class="fas fa-bars blueiconcolor fa-2x">
                    </i>
                    <div class="mt-n1 mb-n1">Text</div>
                </button>
                <div class="">
                    <div v-bind:class=" {headertext:headerText} " class="text-header h2 text-left mb-2 headline normal_text"
                         v-html="NormalTextHeader">
                    </div>

                    <div class="final-text text-justify" v-html="NormalTextBody"></div>
                    <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
                    <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
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

        <NormalTextModal ref="modal" v-on:saveData="saveData" v-on:getPreviousData="getPreviousData"
                         :header="NormalTextHeader" :body="NormalTextBody">
        </NormalTextModal>
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
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                normalBefore:true,
                normalAfter: false,
                btnBefore: true,
                btnAfter: false,
                headerText: false
            };
        },
        created() {
            if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;
            }
        },
        mounted() {

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
                        text: body
                    }
                });
                this.NormalTextHeader = header;
                this.NormalTextBody = body;
                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;
            },
            getPreviousData: function () {
                return  [1,2,3,4 ]
            },
            escapeHtml: function (value) {
                return $('<div :class=" { normalafter:true} " class="normal_text"/>').html(value).text();
            },
        },
        computed: {


        }
    };
</script>

<style>

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        border-radius: 2px;
        padding: 5px 10px;
        min-width: 100px;
        text-align: center;
    }

    .text-button {
        background-color: white;
        border: none;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
    }

    .tutorial-text:hover {
        background-color: rgba(0, 0, 0, 0.5);
        transition: 3s;
    }

    .tutorial-normal-text {
        width: 100%;
        transition: opacity .3s ease, background-color .5s ease;
        background-color: white;
    }

    .tutorial-normal-text:hover {
        background-color: rgba(0, 0, 0, 0.5);
        transition: 3s;
    }

    .normalbefore {
        border: dotted 1px #333;
    }

    .normalafter {
        width: 100%;
        height: auto;
        border-bottom-width: 2px;
        border-bottom-style: solid;
        border-bottom-color: lightgray;
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
        -moz-transition: opacity .25s ease-in-out !important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .tutorial-text:hover .btn-icon {
        opacity: 1 !important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .position-button {
        z-index: 20;
        position: relative;
    }

    .text-print {

        column-count: 1;
        margin-bottom: 20px;
    }

    .text-output {
        position: absolute;
    }

    .headertext:before {

        background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
        content: "";
        width: 60px;
        height: 4px;
        background: #333;
        top: -10px;
        position: absolute;
        left: 0;
    }

    #butTxt {
        position: relative;
        top: 0;
        left: 0;
    }

    #butTxt button {
        position: absolute;
        left: 42%;
        top: 45%;
        cursor: pointer;
    }

    .btnafter {
        display:none;
    }

    .tutorial-normal-text:hover .btnafter{
        display:block;
    }

    .btnbefore {
        visibility: visible;
    }

</style>
