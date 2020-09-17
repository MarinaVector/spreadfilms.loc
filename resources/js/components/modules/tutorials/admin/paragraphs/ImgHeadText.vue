<template>
    <div class="container">
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
                    <div class="col-12 tutorial-text text-center py-5">
                        <button class="text-button ml-4 py-2 my-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Image and heading</p>
                        </button>
                    </div>
                    <div class="col-12 tutorial-text text-center py-2">
                        <button class="text-button ml-4 py-2 px-5 mt-2" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Text</p>
                        </button>
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
    </div>
</template>

<script>

    export default {
        name: "ImgHeadText",
        components: {

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
            return {};
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            }
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
