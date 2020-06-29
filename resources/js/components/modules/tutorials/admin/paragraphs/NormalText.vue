<template>
    <div class="container tutorial-text">
        <div class="row mt-2">
            <div class="col-lg-1">
                <button type="button" class="btn-icon ml-n2 draggable">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 offset-lg-10">
                <button type="button" class="btn-icon ml-4" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 offset-lg-5 inner-trigger">
                <button class="text-button ml-4 py-2 px-5" type="button">
                    <i class="fa fa-bars blueiconcolor fa-5x">
                    </i>
                    <p class="mt-n3 mb-n1">Text</p>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 offset-lg-11">
                <button type="button" class="btn-icon mb-2 ml-4" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
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
            callParentDeleteParagraphBlock: function () {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            }
        },
        mounted() {

        },
        computed: {}
    };
</script>

<style>

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
    }

    .text-button {
        background-color: white;
        border: none;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
    }

    .tutorial-text:hover {
        background-color: rgba(0, 0, 0, 0.5);
        transition: 3s;
    }

    .btn-icon {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        top: 20px;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
        opacity:0.5 !important;
        transition: opacity .25s ease-in-out!important;
        -moz-transition: opacity .25s ease-in-out!important;
        -webkit-transition: opacity .25s ease-in-out!important;
    }

    .tutorial-text:hover .btn-icon {
        opacity:1!important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

</style>
