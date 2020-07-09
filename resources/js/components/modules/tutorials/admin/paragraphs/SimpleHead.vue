<template>
    <div class="container head-right">
        <div class="row nav-text">
            <div class="col-lg-5 tutorial-text btn-all">
                <div class="row">
                    <div class="col-lg-3 btn-hd">
                        <button type="button" class="btn-small draggable ml-1 mt-4"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fas fa-arrows-alt-v fa-xs icon-sm"></i>
                        </button>
                    </div>
                    <div class="col-lg-6">
                        <button class="text-button px-5 pt-3" type="button">
                            <i class="fa fa-heading blueiconcolor fa-7x mt-3">
                            </i>
                            <p class="mt-n1 head-tutorial">Head</p>
                        </button>
                    </div>
                    <div class="col-lg-3 btn-hd"></div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-5">
                <form class="ml-5 mt-3">
                    <button type="button" class="btn-small ml-5"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fas fa-trash-alt fa-xs icon-sm"></i>
                    </button>

                    <button type="button" class="btn-small ml-1"
                            @click="callParentDuplicateParagraphBlock()">
                        <i class="far fa-copy fa-xs icon-sm"></i>
                    </button>
                </form>
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
            return {};
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
    .nav-text {
        border-bottom: 1px solid #d9d9d9 !important;
        color: #424242 !important;
        font-size: 13px;
        background: #f9f9f9;
        position: relative;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
        z-index: 1 !important;
    }

    .btn-small {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        width: 20px;
        height: 20px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        opacity: 0.5 !important;
        transition: opacity .25s ease-in-out !important;
        -moz-transition: opacity .25s ease-in-out !important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .icon-sm {
        font-size: 10px !important;
    }

    .head-tutorial {
        font-size: 12px;
    }

    .fa-heading {
        font-size: 28px !important;
        font-weight: bold !important;
    }

    .tutorial-text:hover .btn-small {
        opacity: 1 !important;
    }

    .head-right:hover .btn-small {
        opacity: 1 !important;
    }

</style>
