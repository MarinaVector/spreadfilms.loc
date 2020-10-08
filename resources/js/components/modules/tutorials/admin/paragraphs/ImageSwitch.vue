<template>
    <div class="container tutorial-switch content-txt" >
        <input type="hidden" name="component_type" value="ImageSwitch" class="component_type" ref="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="image_before" v-model="ImageBefore" class="image_before">
        <input type="hidden" name="image_after" v-model="ImageAfter" class="image_after">
        <input type="hidden" name="text_before" v-model="TextBefore" class="text_before">
        <input type="hidden" name="text_after" v-model="TextAfter" class="text_after">
        <div class="row switch-grid my-2">
            <div class="">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>

            <div class="row tutorial-text">
                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image" @click="showImagesModal()"
                     v-bind:style="{ backgroundImage: 'url(' + ImageBeforePath + ')' }">
                </div>

                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image" @click="showImagesModal()"
                     v-bind:style="{ backgroundImage: 'url(' + ImageAfterPath + ')' }">
                    <button class="text-button switchimg-btn py-2 mb-5 mr-4 px-5 pb-3" type="button"
                    :class="{switch_img_btn_before:SwitchImgBtnBefore}">
                        <i class="fas fa-image blueiconcolor fa-2x"></i>
                        <p class="mb-n1">Images</p>
                    </button>
                    <div :class="{switch_img_btn_after:SwitchImgBtnAfter}">
                        <img src="/public/img/arrow_button_image_switch.png" class="switchimg-btn py-2 mb-5 mr-4 px-5 pb-3" alt="btn">
                   </div>
                </div>

                <div class="col-lg-12 py-5 tutorial-text content-txt position-relative text-center" @click="showNormalTextModal()">
                    <button class="text-button btnhitxt btnhip position-absolute py-2 px-5 my-2" type="button"
                    :class="{switch_img_btn_txt_before:SwitchImgTxtBtnBefore, switch_img_btn_txt_after:SwitchImgTxtBtnAfter }">
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

            <div class="switchbtn-grid">
                <div class="">
                   <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                      <i class="fa fa-trash-o pt-2"></i>
                   </button>
                </div>
                <div class="">
                   <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                      <i class="fa fa-files-o pt-2"></i>
                   </button>
                </div>
            </div>
        </div>
        <NormalTextModal ref="textmodal" v-on:saveData="saveData"
                         :header="NormalTextHeader" :body="NormalTextBody">
        </NormalTextModal>
        <ImagesModal ref="imagesmodal" v-on:saveData="saveData"
                         :textbefore="TextBefore" :textafter="TextAfter"
                         :imagebefore="ImageBefore" :imageafter="ImageAfter">
        </ImagesModal>
    </div>
</template>

<script>
import NormalTextModal from './modal-windows/ImageSwitch/NormalTextModal'
import ImagesModal from './modal-windows/ImageSwitch/ImagesModal'

export default {
    name: "ImageSwitch",
    components: {
        NormalTextModal,
        ImagesModal,
    },
    props: {
        index: {
            type: Number,
            default: null
        },
        mydata: {
            type: Object,
            default: () => ({

            }),
        },
    },
    created() {
        if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
            this.normalAfter = true;
            this.headerText = true;
            this.SwitchImgTxtBtnBefore = false;
            this.SwitchImgTxtBtnAfter = true;
        }

        if(this.ImageBeforePath !== "" && this.ImageAfterPath !== ""){
            this.SwitchImgBtnAfter = false;
            this.SwitchImgBtnBefore = true;
        }
        else {
           this.SwitchImgBtnAfter = true;
           this.SwitchImgBtnBefore = false;
        }
    },
    mounted() {
        this.ImageBeforePath = this.getImagePath(this.ImageBefore);
        this.ImageAfterPath = this.getImagePath(this.ImageAfter);
    },
    data() {
        return {
            NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
            ImageBefore: this.mydata.imagebefore ? this.mydata.imagebefore : '',
            ImageBeforePath: null,
            ImageAfter: this.mydata.imageafter ? this.mydata.imageafter : '',
            ImageAfterPath: null,
            TextBefore: this.mydata.textbefore ? this.escapeHtml(this.mydata.textbefore) : '',
            TextAfter: this.mydata.textafter ? this.escapeHtml(this.mydata.textafter) : '',
            normalBefore:true,
            normalAfter: false,
           // btnBefore: true,
           // btnAfter: false,
            headerText: false,
            SwitchImgBtnAfter:true,
            SwitchImgBtnBefore:false,
            SwitchImgTxtBtnBefore:true,
            SwitchImgTxtBtnAfter:false
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
            let element = this.$refs.textmodal.$el;
            $(element).modal('show');
        },
        showImagesModal: function () {
            let element = this.$refs.imagesmodal.$el;
            $(element).modal('show');
        },
        saveData: function (header = null, body = null, imagesObj = null) {
            if (header !== null){
                this.NormalTextHeader = header;
            }

            if (body !== null){
                this.NormalTextBody = body;
            }

            if (imagesObj !== null){
                this.ImageBefore = imagesObj.imagebefore;
                this.ImageBeforePath = this.getImagePath(this.ImageBefore);
                this.ImageAfter = imagesObj.imageafter;
                this.ImageAfterPath = this.getImagePath(this.ImageAfter);
                this.TextBefore = imagesObj.textbefore;
                this.TextAfter = imagesObj.textafter;
            }

            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    header: header,
                    text: body,
                    imagebefore: this.ImageBefore,
                    imageafter: this.ImageAfter,
                    textbefore: this.TextBefore,
                    textafter: this.TextAfter,
                }
            });

            this.normalAfter = true;
            this.headerText = true;
            this.SwitchImgBtnBefore = false;
            this.SwitchImgBtnAfter = true;
            this.SwitchImgTxtBtnBefore = false;
            this.SwitchImgTxtBtnAfter = true;
        },
        escapeHtml: function (value) {
            return $('<div/>').html(value).text();
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
    },

    computed: {

    },
};
</script>

<style>

.background-image,.background-image:hover{
    background-repeat: no-repeat;
    background-size: cover;
}

.switch-grid {
    display: grid;
    grid-template-columns: 1fr 3fr 1fr;
}

.switchbtn-grid {
    display: grid;
    grid-template-rows: 6fr 1fr;
    gap: unset;
}

.switchimg-btn {
    margin-left: -100%;
    top: -20%;
}

.tutorial-switch {
    cursor: pointer;
}

.tutorial-switch:hover {
    transition: 3s;
}

.tutorial-switch:hover .btn-icon {
    opacity: 1;
}

.switch_img_btn_before {
    display: none;
}

.switch_img_btn_after {
    display: none;
}

.switch_img_btn_txt_before {
    display: block;
}

.switch_img_btn_txt_after {
    display: none;
}

.content-txt:hover .switch_img_btn_txt_after {
    display: block;
}


</style>
