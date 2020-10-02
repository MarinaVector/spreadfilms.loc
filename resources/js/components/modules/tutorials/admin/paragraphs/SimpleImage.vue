<template>
    <div class="container tutorial-video video-grid content-txt" v-bind:style="{ backgroundImage: 'url(' + ImagePath + ')' }">
        <input type="hidden" name="component_type" value="SimpleImage" class="component_type" />
        <input type="hidden" name="normal_text_image" v-model="Image" class="normal_text_image">
        <div class="row my-2">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-12 my-md-5">
                <div class="text-center my-md-5 position-relative">
                    <button @click=showImageModal() class="text-button position-absolute btn-video py-3 px-5 mt-2"
                            type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mt-n1 mb-n1">Image</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>

            <ImageModal ref="imagemodal" v-on:saveData="saveData" :image="Image"></ImageModal>
        </div>
    </div>
</template>

<script>
import ImageModal from './modal-windows/SimpleImage/ImageModal'

export default {
    name: "SimpleImage",
    components: {
        ImageModal,
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

    },
    mounted() {
        if(this.Image === '' || this.Image === null || this.Image === undefined){
            this.Image = '';
        } else {
            this.Image = this.escapeHtml(this.Image);
            this.ImagePath = this.getImagePath(this.Image);
        }
    },
    data() {
        return {
            Image: this.mydata ? this.$props.mydata.image : '',
            ImagePath: '',
        };
    },
    methods: {
        callParentDeleteParagraphBlock: function () {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function () {
            this.$emit('duplicateParagraph');
        },
        showImageModal: function () {
            let element = this.$refs.imagemodal.$el;
            $(element).modal('show');
        },
        saveData: function (image = null) {
            if (image !== null){
                this.Image = image;
                this.ImagePath = this.getImagePath(this.Image);
            }

            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    image: this.Image,
                }
            });
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



</style>
