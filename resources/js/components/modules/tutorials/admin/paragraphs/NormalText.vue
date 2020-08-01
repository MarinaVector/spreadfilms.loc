<template>
    <div class="container tutorial-text" id="tutorial-text">
        <input type="hidden" name="component_type" value="NormalText" class="component_type" ref="component_type"/>
        <div class="row mt-2">
            <div class="col-lg-1 offset-lg-0 col-md-3 offset-md-1 col-7">
                <button type="button" class="btn-icon ml-n2 draggable">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 offset-lg-10 col-md-3 offset-md-5 col-5">
                <input type="hidden" name="normal_text[]" value="">
                <button type="button" class="btn-icon ml-4" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>
        </div>
        <div class="row" @click="showTextModal()">
            <div class="col-md-8 offset-md-1 inner-trigger col-12 mx-sm-auto">
                <div class="text-output mx-n5">
                    <div class="text-header text-left mb-3" v-html="NormalTextHeader">

                    </div>
                    <div class="text-print text-justify" v-html="NormalTextBody">

                    </div>
                </div>
                <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
                <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
                <button class="text-button position-button slide-border ml-4 py-2 px-5" type="button">
                    <i class="fas fa-bars blueiconcolor fa-2x">
                    </i>
                    <div class="mt-n1 mb-n1">Text</div>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 offset-md-9 col-lg-1 offset-lg-11 float-sm-right">
                <button type="button" class="btn-icon mb-2 ml-4" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>
        </div>

        <NormalTextModal ref="modal" v-on:saveData="saveData" v-on:getPreviousData="getPreviousData"
                         :header="NormalTextHeader"
                         :body="NormalTextBody">

        </NormalTextModal>
    </div>
</template>

<script>
    import NormalTextModal from './modal-windows/NormalText/NormalTextModal'

    export default {
        components: {
            NormalTextModal
        },
        props: [
            'index',
            'mydata'
        ],
        data() {
            return {
                NormalTextHeader: '',
                NormalTextBody: '',
            };
        },
        created() {
            //console.log(this.$props);
            //let data = this.$emit('getParagraphData', this.index);
            //console.log(this.$props);
        },
        mounted() {
            //console.log(this.$attrs.blocksCounterID);
            //this.setParagraphData('hello header');
        },
        methods: {
            callParentDeleteParagraphBlock: function () {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (header, body) {
                this.NormalTextHeader = header;
                this.NormalTextBody = body;
            },
            getPreviousData: function () {
                return [1, 2];
            },
            setParagraphData: function (data) {
                //console.log('calling component from child');
                //this.data = data;
                //console.log(this);
                //this.NormalTextHeader = data; // это не работает, ошибка app.js:58667 [Vue warn]: Method "NormalTextHeader" has type "string" in the component definition. Did you reference the function correctly?
                //this.NormalTextBody = 'My Text'; // та же ошибка
            },
        },
        computed: {}
    };
</script>

<style>

    .inner-trigger {
        transition: background-color .3s ease;
        background-color: transparent;
        border-radius: 2px;
        padding: 5px 10px;
        min-width: 100px;
        text-align: center;
    }

    .text-button {
        background-color: white;
        border: none;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
        overflow: auto;
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
        opacity: 0.5 !important;
        transition: opacity .25s ease-in-out !important;
        -moz-transition: opacity .25s ease-in-out !important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .tutorial-text:hover .btn-icon {
        opacity: 1 !important;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .position-button {
        z-index: 20;
        position: relative;
    }

    .text-print {

        column-count: 2;
        margin-bottom: 20px;
    }

    .text-output {
        position: absolute;
    }


</style>
