<template>
    <div class="container">
        <input type="hidden" name="component_type" value="TxtSpecialImg" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="special_text_body" v-model="SpecialText" class="special_text_body">
        <input type="hidden" name="first_image" v-model="FirstImage" class="first_image">
        <input type="hidden" name="second_image" v-model="SecondImage" class="second_image">
        <div class="row align-items-start tutorial-complex imghead-grid">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-2">
                        <button type="button" class="btn-icon ml-n2 draggable pull-left"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>
                        <button type="button" class="btn-icon pull-right"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                </div>
            </div>
            </div>
            <div class="col-7 h-100 offset-2 inner-trigger">
                <div class="row">
                    <div class="col-12 tutorial-text text-center py-5" @click="showSpecialImageModal()">
                        <button class="text-button ml-4 py-2 my-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Image and heading</p>
                        </button>
                    </div>
                    <div class="col-12 tutorial-text text-center py-2" @click="showNormalTextModal()">
                        <button class="text-button ml-4 py-2 px-5 mt-2" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Text</p>
                        </button>
                        <div class="">
                            <div v-bind:class=" {headertext:headerText} "
                                 class="text-header h2 text-left position-relative pb-0 normal_text"
                                 v-html="NormalTextHeader">
                            </div>
                            <div class="final-text text-justify" v-html="NormalTextBody"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">

                <button type="button" class="btn-icon"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                </button>

            </div>
        </div>
        <NormalTextModal ref="normaltextmodal" v-on:saveData="saveData"
                         :header="NormalTextHeader" :body="NormalTextBody"></NormalTextModal>
        <SpecialImageModal ref="specialimagemodal" v-on:saveData="saveData"
                           :specialtext="SpecialText"
                           :firstimage="FirstImage"
                           :secondimage="SecondImage"
        >
        </SpecialImageModal>
    </div>
</template>

<script>
    import NormalTextModal from './modal-windows/TxtSpecialImg/NormalTextModal'
    import SpecialImageModal from './modal-windows/TxtSpecialImg/SpecialImageModal'

    export default {
        name: "TxtSpecialImg",
        components: {
            NormalTextModal,
            SpecialImageModal,
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
                SpecialText: this.mydata ? this.escapeHtml(this.$props.mydata.specialtext) : '',
                FirstImage: this.mydata ? this.escapeHtml(this.$props.mydata.firstimage) : '',
                SecondImage: this.mydata ? this.escapeHtml(this.$props.mydata.secondimage) : '',
                normalBefore:true,
                normalAfter: false,
                btnBefore: true,
                btnAfter: false,
                headerText: false,
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showNormalTextModal: function () {
                let element = this.$refs.normaltextmodal.$el;
                $(element).modal('show');
            },
            showSpecialImageModal: function () {
                let element = this.$refs.specialimagemodal.$el;
                $(element).modal('show');
            },
            saveData: function (header, body, special) {
                if (header !== null){
                    this.NormalTextHeader = header;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                }

                if (special !== undefined){
                    this.SpecialText = special.specialtext;
                    this.FirstImage = special.firstimage;
                    this.SecondImage = special.secondimage;
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
                    }
                });

                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;

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

    .imghead-grid {
        display: grid;
        grid-gap: initial;
    }


</style>
