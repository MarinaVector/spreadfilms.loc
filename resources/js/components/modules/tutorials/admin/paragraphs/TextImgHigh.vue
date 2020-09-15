<template>
   <div class="container lyout-panel">
            <div class="row align-items-start tutorial-complex">
                <div class="col-lg-1 mt-2">
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

                <div class="trigger-headline col-lg-4 mt-5">
                    <div class="tutorial-text h-block mt-5">
                        <button class="px-3 h-button" type="button">
                            <i class="fa fa-heading blueiconcolor fa-7x">
                            </i>
                            <p class="mb-n1 mt-n3 mx-1">Headline</p>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6 down-trigger">
                    <div class="row ml-2">
                        <div class="col-lg-12 tutorial-text py-5 pt-3">
                            <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                                <i class="fas fa-image blueiconcolor fa-2x">
                                </i>
                                <p class="mb-n1">Text</p>
                            </button>
                        </div>

                        <div class="col-lg-12 tutorial-text">
                            <button class="text-button py-2 px-5 my-2" type="button">
                                <i class="fas fa-bars blueiconcolor fa-2x">
                                </i>
                                <p class="mb-n1 mx-1">Text</p>
                            </button>
                        </div>

                    </div>
                </div>
                <div class="col-lg-1 mt-2">
                    <div class="row py-1">
                        <div class="col-lg-3 offset-lg-3 mt-2 mb-5">
                            <button type="button" class="btn-icon mb-5"
                                    @click="callParentDeleteParagraphBlock()">
                                <i class="fa fa-trash-o pt-2"></i>
                            </button>
                        </div>
                        <div class="col-lg-3 offset-lg-3 pt-5 mt-5">
                            <button type="button" class="btn-icon mt-5"
                                    @click="callParentDuplicateParagraphBlock()">
                                <i class="fa fa-files-o pt-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>

    export default {
        name: "TextImgHigh",
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
            callParentDeleteParagraphBlock: function () {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            }
        },
        computed: {

        },
    };
</script>

<style>

    .trigger-headline {
        pointer-events: all;
        cursor: pointer;
        left: 29%;
        transform: translate3d(-50%, -50%, 0);
        transition: opacity .3s ease, background-color .5s ease;
        width: 100%;
        height: 100%;
        z-index: 43;
        padding: 5px 6px;
        min-width: 160px;
        text-align: center;
    }

    .down-trigger {

        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
        z-index:42;
        position: relative;
    }

    .h-block {
        background-color: #d9d9d9;
        margin-top: 100px;
    }

    .h-button {
        background-color: #d9d9d9;
        border: none;
    }

    .h-block:hover .h-button {
        background-color: white;
    }

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

</style>
