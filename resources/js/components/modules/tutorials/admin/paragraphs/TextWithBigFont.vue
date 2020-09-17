<template>
    <div class="container">
        <input type="hidden" name="component_type" value="TextWithBigFont" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-2 mt-2">
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

            <div class="col-lg-3 inner-trigger lg-head">
                <div class="tutorial-text py-2 mt-5" @click="showHeadlineModal()">
                    <button class="text-button py-2 px-5 my-2" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">HeadLine</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 inner-trigger lg-head">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text" @click="showTextModal()">
                        <button class="text-button py-2 my-4 px-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                    </div>
                    <div @mouseover="show = !show" @mouseleave="hide = !hide" class="col-lg-9  tutorial-text mt-2">
                        <button v-if="hide" class="text-button py-2 px-5" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Button</p>
                        </button>

                        <div v-if="show" class="button-show set-button">
                            <div>
                                <button class="py-2 px-5 text-button" type="button">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Button 1</div>
                                </button>
                            </div>
                            <div>
                                <button class="text-button py-2 px-5" type="button">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Button 2</div>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-7 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-7 pt-5 mt-5">
                        <button type="button" class="btn-icon"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <HeadlineModal ref="headlinemodal" v-on:saveData="saveData" :header="NormalTextHeader"></HeadlineModal>
        <TextModal ref="textmodal" v-on:saveData="saveData" :body="NormalTextBody"></TextModal>
    </div>
</template>

<script>
    import HeadlineModal from './modal-windows/TextWithBigFont/HeadlineModal'
    import TextModal from './modal-windows/TextWithBigFont/TextModal'

    export default {
        name: "TextWithBigFont",
        components: {
            HeadlineModal,
            TextModal,
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
                show: false,
                hide: true,
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showHeadlineModal: function () {
                let element = this.$refs.headlinemodal.$el;
                $(element).modal('show');
            },
            showTextModal: function () {
                let element = this.$refs.textmodal.$el;
                $(element).modal('show');
            },
            saveData: function (header, body, button) {
                if (header !== null){
                    this.NormalTextHeader = header;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
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

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .lg-head {
        position: relative;
        z-index: 1;
    }

    .button-show {
        z-index: 2;
    }

    .set-button {
        z-index: 2;
    }

</style>

