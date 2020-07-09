<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-2 mt-2">
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

            <div class="col-lg-3 inner-trigger lg-head">
                <div class="tutorial-text py-2 mt-5">
                    <button class="text-button py-2 px-5 my-2" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">HeadLine</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 inner-trigger lg-head">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text">
                        <button class="text-button py-2 my-4 px-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                    </div>
                    <div @mouseover="show = !show" @mouseleave="hide = !hide" class="col-lg-9  tutorial-text mt-2">
                        <button v-if="hide" class="text-button py-2 px-5" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Button</p>
                        </button>

                        <div v-if="show" class="button-show set-button">
                            <div>
                                <button class="py-2 px-5 text-button" type="button">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Button 1</div>
                                </button>
                            </div>
                            <div>
                                <button class="text-button py-2 px-5" type="button">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Button 2</div>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-7 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-7 pt-5 mt-5">
                        <button type="button" class="btn-icon"
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
        props: [
            'index'
        ],
        data() {
            return {
                show: false,
                hide: true
            };
        },
        created() {

        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            }
        },
        mounted() {

        },
        computed: {}
    };

</script>

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .lg-head {
        position: relative;
        z-index: 1;
    }

    .button-show {
        z-index: 2;
    }

    .set-button {
        z-index: 2;
    }

</style>
