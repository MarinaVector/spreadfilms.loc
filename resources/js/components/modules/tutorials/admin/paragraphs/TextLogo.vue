<template>
    <div class="container video-grid">
        <input type="hidden" name="component_type" value="TextWithLogo" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="single_text_body" v-model="SingleText" class="single_text_body">
        <input type="hidden" name="text_logo" v-model="LogoJSON" class="text_logo">
        <div class="row align-items-start tutorial-complex py-3">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-10 offset-1">
                <div class="row">
            <div class="col-lg-5 content-txt inner-trigger mr-n4">
                <div class="tutorial-text py-2 mt-3" @click="showLogoModal()" v-bind:style="{ backgroundImage: 'url(' + LogoPath + ')' }">
                    <button class="text-button py-1 px-5" :class=" {btnlogobefore:btnLogoBefore, btnlogoafter:btnLogoAfter} " type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">Image</p>
                    </button>
                </div>
                <div class="tutorial-text content-txt py-1 mt-3 position-relative" @click="showTextModal()">
                    <button class="text-button btn-single py-1 px-5" :class=" {btnsinglebefore:btnSingleBefore, btnsingleafter:btnSingleAfter} " type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-2">Text</p>
                    </button>
                    <div :class=" {singletxt:singleTxt} " class="final-text text-justify m-3" v-html="SingleText"></div>
                </div>
            </div>

            <div class="col-lg-7 inner-trigger mr-n4">
                <div class="row ml-2">
                    <div class="tutorial-text content-txt py-5 pt-3 position-relative" @click="showNormalTextModal()">
                        <button class="text-button btn-single mx-auto py-1 px-5" v-bind:class=" {btntxtbefore:btnTxtBefore, btntxtafter:btnTxtAfter} " type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                        <div class="ml-3">
                            <div v-bind:class=" {headertext:headerText} "
                                 class="text-header h2 text-left position-relative pb-0 normal_text"
                                 v-html="NormalTextHeader">
                            </div>

                            <div class="final-text text-justify" v-html="NormalTextBody"></div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
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
                this.btnTxtAfter = true;
                this.btnTxtBefore = false;
                this.headerText = true;
            }

            if(this.SingleText !== "" ){
                this.singleTxt = true;
                this.btnSingleAfter = true;
                this.btnSingleBefore =false;
            }
        },
        mounted() {
            if(this.Logo === ''){
                this.Logo = '';

            } else {
                this.Logo = JSON.parse(this.escapeHtml(this.Logo));
                this.LogoPath = this.getImagePath(this.Logo.path);
                this.BtnLogoAfter = true;
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                SingleText: this.mydata ? this.escapeHtml(this.$props.mydata.singletext) : '',
                Logo: this.mydata ? this.escapeHtml(this.$props.mydata.logo) : '',
                LogoPath: '',
                LogoJSON: '',
                normalBefore:true,
                normalAfter: false,
                btnTxtBefore: true,
                btnTxtAfter: false,
                btnSingleBefore:true,
                btnSingleAfter:false,
                headerText: false,
                singleTxt: false,
                btnLogoBefore: true,
                btnLogoAfter: false,
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
            saveData: function (header = null, body = null, singletext = null, logoobj = null) {
                if (header !== null){
                    this.NormalTextHeader = header;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                }

                if (singletext !== null){
                    this.SingleText = singletext;
                    this.btnSingleAfter = true;
                }

                if (logoobj !== null){
                    this.Logo = logoobj;
                    this.LogoJSON = JSON.stringify(logoobj);
                    this.LogoPath = this.getImagePath(this.Logo.path);
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
                        singletext: this.SingleText,
                        logo: this.Logo,
                    }
                });

               this.bgHeadAfter = true;
               this.btnTxtAfter = true;
               this.btnTxtBefore = false;
               this.headerText = true;
               this.singleTxt = true;
                this.btnLogoAfter = true;

            },
            getImagePath: function(path) {
                let disk = path.split('/')[0];
                let realPath = '';
                switch (disk) {
                    case 'company-public':
                        realPath = this.$parent.$parent.publicpath + path.split('/')[1];
                        break;
                    case 'company-private':
                        realPath = this.$parent.$parent.privatepath + path.split('/')[1];
                        break;
                    default:
                        return;
                }

                return realPath;
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

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .singletxt {
       color: white;
        background: linear-gradient(40deg, #2096ff, #05ffa3);
    }

    .btn-single {
        position: absolute;
        left: 50%;
        top: 50%;
        margin-top: -30px;
        margin-left: -68px !important;
    }

</style>
