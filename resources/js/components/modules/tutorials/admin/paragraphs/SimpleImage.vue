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
                <div class="text-center my-md-5 position-relative">
                    <button @click=showTextModal() class="text-button position-absolute btn-video py-3 px-5 mt-2"
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

            <ImageSimpleModal>
            </ImageSimpleModal>
        </div>
    </div>
</template>

<script>

import ImageSimpleModal from "./modal-windows/Image/ImageSimpleModal";

export default {
    name: "Image",
    components: {
        ImageSimpleModal
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
    data() {
        return {

        };
    },
    methods: {


        },

    computed: {

    },
};
</script>

<style>



</style>
