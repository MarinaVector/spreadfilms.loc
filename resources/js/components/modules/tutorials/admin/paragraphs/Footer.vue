<template>
    <div class="container footer-grid tutorial-text py-2" id="tutorial-text">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
                <button  class="text-button text-center slide-border py-2
                     px-5 mx-auto" type="button">
                    <i class="fas fa-bars blueiconcolor fa-2x">
                    </i>
                    <div class="mt-n1 mb-n1">Footer</div>
                </button>
                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
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


export default {
    name: "Footer",
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
        if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
            this.normalAfter = true;
            this.btnAfter = true;
            this.headerText = true;
        }
    },
    mounted() {

    },
    data() {
        return {
            NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
            normalBefore:true,
            normalAfter: false,
            btnBefore: true,
            btnAfter: false,
            headerText: false
        };
    },
    methods: {
        callParentDeleteParagraphBlock: function () {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function () {
            this.$emit('duplicateParagraph');
        },
        showTextModal: function () {
            let element = this.$refs.modal.$el;
            $(element).modal('show');
        },
        saveData: function (header, body) {
            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    header: header,
                    text: body
                }
            });
            this.NormalTextHeader = header;
            this.NormalTextBody = body;
            this.normalAfter = true;
            this.btnAfter = true;
            this.btnBefore = false;
            this.headerText = true;
        },
        getPreviousData: function () {
            return  [1,2,3,4 ]
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

  .footer-grid {
    display: grid;
    grid-gap: initial;
  }

</style>



