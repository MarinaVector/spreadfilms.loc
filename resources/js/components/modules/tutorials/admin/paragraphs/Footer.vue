<template>
    <div class="container py-2" id="tutorial-text">
        <div class="row footer-files">
            <div class="col-12">
                <div class="tutorial-text footer-grid-top">
                    <button type="button" class="btn-icon draggable pull-left mt-3 ml-2">
                        <i class="fa fa-arrows-v pt-2"></i>
                    </button>
                    <div class="text-center">
                        <button class="text-button slide-border py-2 px-5 my-4 mx-auto" type="button">
                            <i class="fas fa-shoe-prints blueiconcolor fa-2x"></i>
                            <div class="mb-n1">Footer</div>
                        </button>
                    </div>
                    <button type="button" class="btn-icon pull-right mt-3 ml-3"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fa fa-trash-o pt-2"></i>
                    </button>

                </div>

                <div class="col-lg-12">
                    <button type="button" class="btn-icon pull-right my-4" @click="callParentDuplicateParagraphBlock()">
                        <i class="fa fa-files-o pt-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Footer",
    components: {},
    props: {
        index: {
            type: Number,
            default: null
        },
        mydata: {
            type: Object,
            default: () => {
            }
        },
    },
    created() {

    },
    mounted() {

    },
    data() {
        return {

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

        },

    },
    computed: {},
};

</script>

<style>

.footer-grid {
    display: grid;
    grid-gap: initial;
}

.footer-grid-top {
    display: grid;
    grid-template-columns: 1fr 15fr 1fr;
}

.footer-files {
    cursor: pointer;
    border-bottom: 1px solid #d9d9d9;
}

</style>



