<template>
    <div class="container tutorial-video">
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
        <div class="row my-5 pt-5">
            <div class="col-lg-1 offset-lg-5 inner-trigger my-5">
                <div class="my-5">
                    <button class="text-button ml-4 py-2 px-5 mt-2" type="button">
                        <i class="fa fa-file-video-o blueiconcolor fa-5x">
                        </i>
                        <p class="mt-n3 mb-n1">Video</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 offset-lg-11">

                <button type="button" class="btn-icon mt-5 ml-4 mb-2" @click="callParentDuplicateParagraphBlock()">
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

<style>

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        padding: 5px 10px;
        min-width: 160px;
        text-align: center;
        z-index:5;
    }

    .text-button {
        background-color: white;
        border: none;
    }

    .tutorial-video {
        width: 100%;
        border: dotted 1px #333;
    }

    .tutorial-video:hover {
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

    .tutorial-video:hover .btn-icon {
        opacity:1!important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

</style>
