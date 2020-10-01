<template>
    <div class="container tutorial-video video-grid content-txt" >

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
                <div class="row mb-5 my-5">
                    <div class="col-lg-12 mt-2">
                        <div class="button-show set-button">
                            <div class="text-center">
                                <div v-for="(Image, index) in Images">
                                    <button class="py-2 px-5 text-button bgfont-btn added-btn"
                                            type="button" @click="showAddImageSimpleModal(index)">
                                        <i class="fas fa-bars blueiconcolor fa-2x">
                                        </i>
                                        <div class="mb-1">Image {{index}}</div>
                                        <span @click="deleteImage(index)"><i class="fas fa-times ml-5 pl-4 mt-n5"></i></span>
                                    </button>
                                </div>

                                <button class="py-2 px-5 text-button bgfont-btn" type="button" @click="showAddImageSimpleModal()">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Add Slide</div>
                                </button>
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
    </div>
</template>

<script>


import ImageSimpleModal from "./modal-windows/Image/ImageSimpleModal";

export default {
    name: "ImageSlider",
    components: {
        ImageSimpleModal,
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
        if(!Array.isArray(this.Images)){
            if(this.Images === undefined || this.Images === ""){
                this.Images = [];
            } else {
                this.Images = JSON.parse(this.escapeHtml(this.Images));
            }
        }
    },
    data() {
        return {
            Images: this.mydata ? this.escapeHtml(this.$props.mydata.sliderimages) : [],
            ImagesJSON: '',
        };
    },
    methods: {
        callParentDeleteParagraphBlock: function() {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function() {
            this.$emit('duplicateParagraph');
        },
        showAddImageSimpleModal: function (index = null) {
            let element = this.$refs.imagemodal.$el;
            $(element).modal('show');

            if(index !== null){
                this.$refs.imagemodal.Image = this.Images[index].Image;
            }
        },
        saveData: function (imageObj) {
            if (imageObj !== null){
                if(imageObj.index === null){
                    this.Images.push({
                        Image: imageObj.Image,

                    });
                } else {
                    this.Images[imageObj.index].Image = imageObj.Image;
                }

                this.ImagesJSON = JSON.stringify(this.Images);
            }

            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    Images: this.Images,
                }
            });
        },
        deleteImage: function (index) {
            console.log('delete img triggered');
            this.Images.splice(index, 1);
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



</style>
