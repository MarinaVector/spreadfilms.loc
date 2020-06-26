<template>
    <div class="container tutorial-video">
        <div class="row mt-3">
            <div class="col-lg-1">
                <button type="button" class="btn-icon"><i class="fa fa-arrows-v pt-2"></i></button>
            </div>
            <div class="col-lg-1 offset-lg-10">
                <button type="button" class="btn-icon ml-4" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 offset-lg-5">
                <div >
                    <div class="ml-5">
                        <i class="fa fa-bars fa-3x blueiconcolor fa-5x">
                        </i>
                    </div>
                    <p class="mt-n3 ml-text">Text</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 offset-lg-11">
                <button type="button" class="btn-icon mb-3 ml-4"><i class="fa fa-files-o pt-2"></i></button>
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
            }
        },
        mounted() {

        },
        computed: {}
    };
</script>

<style>
    .ml-text {
        margin-left: 35px;
    }

    .tutorial-video {
        width: 100%;
        border: dotted 1px #333;
    }

    .bg-add {
        background-color: white;
        color: #424242;
        height: 100%;
        width: 100%;
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
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }
</style>
