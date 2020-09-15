<template>

    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-2 mt-2">
                <div class="col-lg-1 mt-2 ml-2">
                    <button type="button" class="btn-icon ml-n2 draggable"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fa fa-arrows-v pt-2"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-8 inner-trigger lg-head mt-4">
                <div class="tutorial-text mt-3">
                    <button class="text-button py-2 px-5 mx-3 my-2" type="button">
                        <i class="far fa-question-circle blueiconcolor fa-2x">
                        </i>
                        <p class="mx-1 mb-n1">Questions and answers</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-2 mt-2">
                <div class="row py-1">
                    <div class="col-lg-5 offset-lg-7 mt-2">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-5 offset-lg-7">
                        <button type="button" class="btn-icon mb-2"
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
        name: "QuestionsAnswers",
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

</style>
