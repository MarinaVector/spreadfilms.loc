<template>
    <div class="container content-txt" >

        <div class="row switch-grid my-2">
            <div class="">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

            </div>

            <div class="">
                <div class="col-lg-12 tutorial-text text-center py-5 pt-3" @click="showImagesModal()">
                    <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1">Images</p>
                    </button>
                </div>

                <div class="col-lg-12 py-5 tutorial-text content-txt position-relative text-center" @click="showNormalTextModal()">
                    <button class="text-button btnhitxt btnhip position-absolute py-2 px-5 my-2" type="button"                          >
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
                         :textbefore="NormalTextHeader" :textafter="NormalTextBody">
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
        saveData: function (header = null, body = null, singletext = null) {
            if (header !== null){
                this.NormalTextHeader = header;
            }

            if (body !== null){
                this.NormalTextBody = body;
            }

            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    header: header,
                    text: body
                }
            });

            this.normalAfter = true;
            this.btnAfter = true;
            this.btnBefore = false;
            this.headerText = true;
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

.switch-grid {
    display: grid;
    grid-template-columns: 1fr 3fr 1fr;
}

.switchbtn-grid {
    display: grid;
    grid-template-rows: 6fr 1fr;
    gap: unset;
}

</style>
