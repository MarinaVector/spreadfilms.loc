<template>
    <div class="container head-right">
        <input type="hidden" name="component_type" value="Headline" class="component_type" ref="component_type" />
        <div class="row nav-text head-grid">
            <div  v-bind:class=" {bgheadbefore:bgHeadBefore, bgheadafter:bgHeadAfter} "
                  class="btn-all">

                    <div class="col-lg-1 btn-hd pull-left">
                        <button type="button" class="btn-small draggable ml-1 mt-2"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fas fa-arrows-alt-v fa-xs icon-sm"></i>
                        </button>
                    </div>
                    <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="headline">
                    <div class="text-center py-4" @click="showTextModal()"
                    >
                        <div class="h2 m-0 ml-5 position-relative" v-html="NormalTextHeader"></div>
                        <div class="text-center">
                        <button v-bind:class=" {btnheadbefore:btnBefore, btnheadafter:btnAfter} "
                                class="text-button px-5 pt-3 position-relative" type="button">
                            <i class="fa fa-heading blueiconcolor fa-7x mt-3">
                            </i>
                            <p class="head-tutorial">Head</p>
                        </button>
                        </div>
                    </div>
                    <!-- <div class="col-lg-1 btn-hd"></div> -->
            </div>

            <div class="col-lg-21">
                <form class="pull-right mt-2 mr-2">
                    <button type="button" class="btn-small"
                            @click="callParentDuplicateParagraphBlock()">
                        <i class="far fa-copy fa-xs icon-sm"></i>
                    </button>

                    <button type="button" class="btn-small ml-1"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fas fa-trash-alt fa-xs icon-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        <HeadlineModal ref="modal" v-on:saveData="saveData" :header="NormalTextHeader"></HeadlineModal>
    </div>
</template>

<script>
    import HeadlineModal from './modal-windows/Headline/HeadlineModal'

    export default {
        name: "Headline",
        components: {
            HeadlineModal,
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => ({
                    normalTextHeader: '',
                }),
            },
        },
        created() {
            if(this.NormalTextHeader !== "" ){
                this.bgHeadAfter = true;
                this. btnAfter = true;
            }
        },
        mounted() {

        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                bgHeadBefore: true,
                bgHeadAfter: false,
                btnBefore: true,
                btnAfter: false
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (header) {
                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: header,
                    }
                });
                this.NormalTextHeader = header;
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

<style lang="scss">

    .nav-text {
        border-bottom: 1px solid #d9d9d9 !important;
        color: #424242 !important;
        font-size: 13px;
        background: #f9f9f9;
        position: relative;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
        z-index: 1 !important;

        &:hover {
            background: gray;

        }
    }

    .btn-small {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        width: 20px;
        height: 20px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        opacity: 0.5 !important;
        transition: opacity .25s ease-in-out !important;
        -moz-transition: opacity .25s ease-in-out !important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .icon-sm {
        font-size: 10px !important;
    }

    .head-tutorial {
        font-size: 12px;
    }

    .fa-heading {
        font-size: 28px !important;
        font-weight: bold !important;
    }

    .tutorial-text:hover .btn-small {
        opacity: 1 !important;
    }

    .head-right:hover .btn-small {
        opacity: 1 !important;
    }

    .head-grid {
        display: grid;
        grid-template-columns: auto 200px;
    }

    .bgheadafter {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        min-height: 50px;
        cursor: pointer;
    }

    .btnheadbefore {
        visibility: visible;
    }

    .bgheadbefore:hover {
        background-color: rgba(0, 0, 0, 0.5);
        transition: 3s;
    }

    .btnheadafter {
        position: absolute !important;
        visibility: hidden;
        top: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .btn-all:hover .btnheadafter {
        visibility: visible;
    }

    .btn-all:hover {
        z-index: 12;
        opacity: 1;
        transition: opacity .3s ease;

    }

</style>
