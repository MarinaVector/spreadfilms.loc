<template>
    <div class="container">
        <input type="hidden" name="component_type" value="TextWithLogo" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="single_text_body" v-model="SingleText" class="single_text_body">
        <input type="hidden" name="text_logo" v-model="LogoJSON" class="text_logo">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-1 mt-2">
                <div class="row">
                    <div class="col-lg-1 mt-2 ml-2">
                        <button type="button" class="btn-icon ml-n2 draggable"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-1 offset-lg-10">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 inner-trigger mr-n4">
                <div class="tutorial-text py-2 mt-5" @click="showLogoModal()">
                    <button class="text-button py-1 px-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">Image</p>
                    </button>
                </div>
                <div class="tutorial-text py-1 mt-3" @click="showTextModal()">
                    <button class="text-button py-1 px-5" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-2">Text</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 inner-trigger mt-n1 ml-n1">
                <div class="row ml-2">
                    <div class="col-lg-12 tutorial-text py-5 pt-3" @click="showNormalTextModal()">
                        <button  v-bind:class=" {btnbefore:btnBefore, btnafter:btnAfter} " type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                        <div class="">
                            <div v-bind:class=" {headertext:headerText} " class="text-header h2 text-left position-relative pb-0 normal_text" v-html="NormalTextHeader">
                            </div>

                            <div class="final-text text-justify" v-html="NormalTextBody"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-7 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-7 pt-5 mt-3">
                        <button type="button" class="btn-icon"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <TextModal ref="textmodal" v-on:saveData="saveData" :singletext="SingleText"></TextModal>
        <NormalTextModal ref="normaltextmodal" v-on:saveData="saveData"
                         :header="NormalTextHeader" :body="NormalTextBody"></NormalTextModal>
        <LogoModal ref="logomodal" v-on:saveData="saveData" :logo="Logo"></LogoModal>
    </div>
</template>

<script>
    import TextModal from './modal-windows/TextLogo/TextModal'
    import NormalTextModal from './modal-windows/TextLogo/NormalTextModal'
    import LogoModal from './modal-windows/TextLogo/LogoModal'

    export default {
        name: "TextLogo",
        components: {
            TextModal,
            NormalTextModal,
            LogoModal,
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
            if(this.Logo === ''){
                this.Logo = '';
            } else {
                this.Logo = JSON.parse(this.escapeHtml(this.Logo));
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                SingleText: this.mydata ? this.escapeHtml(this.$props.mydata.singletext) : '',
                Logo: this.mydata ? this.escapeHtml(this.$props.mydata.logo) : '',
                LogoJSON: '',
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
            showTextModal: function () {
                let element = this.$refs.textmodal.$el;
                $(element).modal('show');
            },
            showNormalTextModal: function () {
                let element = this.$refs.normaltextmodal.$el;
                $(element).modal('show');
            },
            showLogoModal: function () {
                let element = this.$refs.logomodal.$el;
                $(element).modal('show');

                if(this.Logo !== undefined){
                    this.$refs.logomodal.LogoType = this.Logo.logotype;
                    this.$refs.logomodal.Path = this.Logo.path;
                }
            },
            saveData: function (header, body, singletext, logoobj) {
                if (header !== null){
                    this.NormalTextHeader = header;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                }

                if (singletext !== null){
                    this.SingleText = singletext;
                }

                if (logoobj !== null){
                    this.Logo = logoobj;
                    this.LogoJSON = JSON.stringify(logoobj);
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
                        singletext: this.SingleText,
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
</style>
