<template>
    <div v-bind:class=" {normalbefore:normalBefore, normalafter:normalAfter} " class="container video-grid tutorial-text py-2" id="tutorial-text">
        <input type="hidden" name="component_type" value="CenterText" class="component_type" ref="component_type" />
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-12  video-grid" @click="showTextModal()">
                <div class="text-center mt-5">
                    <button v-bind:class=" {btnbefore:btnBefore, btnafter:btnAfter} " class="text-button slide-border py-2
                     px-5 mx-auto" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <div class="mt-n1 mb-n1">Text</div>
                    </button>
                    <div class="">
                        <div v-bind:class=" {headertext:headerText} " class="text-header h2 text-left position-relative pb-0 normal_text" v-html="NormalTextHeader">
                        </div>

                        <div class="final-text text-justify" v-html="NormalTextBody"></div>
                        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
                        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-left" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>

            <CenterTextModal ref="modal" v-on:saveData="saveData" v-on:getPreviousData="getPreviousData" :header="NormalTextHeader" :body="NormalTextBody">
            </CenterTextModal>

        </div>
    </div>

</template>

<script>
    import CenterTextModal from './modal-windows/CenterText/CenterTextModal'

    export default {
        name: "CenterText",
        components: {
            CenterTextModal
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
            if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;
            }
        },
        mounted() {

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
                return $('<div/>').html(value).text();
            },
        },
        computed: {

        },
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

    .tutorial-text,
    .bgheadbefore {
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
        background: linear-gradient(to right, #3ecdf1, #2badce);
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

    button {
        cursor: pointer;
    }

    .btnafter {
        display:none;
        top: 45%;
    }

    .tutorial-normal-text:hover .btnafter{
        display:block;
    }


    .btnbefore {
        visibility: visible;
    }

    @media only screen and (max-width: 450px) {
        #butTxt button {
            left: 32%;
        }
    }



</style>



