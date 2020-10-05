<template>
    <div class="container">
        <div class="align-items-start tutorial-complex contact-grid">
            <div class="mt-3">
                <div class="pull-left">
                    <button type="button" class="btn-icon ml-3 draggable"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fa fa-arrows-v pt-2"></i>
                    </button>
                </div>
            </div>

            <div class="inner-trigger lg-head tutorial-text mr-n3">
                <div class="py-5 my-5">
                    <button class="text-button py-md-2 px-md-5 my-md-5 mx-5 mr-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">Image</p>
                    </button>
                </div>
            </div>

            <div class="inner-trigger lg-head tutorial-text ml-n1">

                <div class="py-md-5 my-md-5">
                    <button class="text-button py-2 my-5 px-md-5 mx-5" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1">Contact</p>
                    </button>
                </div>

            </div>

                <div class="contact-right-grid">
                    <div class="pull-right mt-3">
                        <button type="button" class="btn-icon mb-5 pull-right mr-3"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn-icon pull-right mb-3 mr-3"
                                @click="callParentDuplicateParagraphBlock()">
                            <i class="fa fa-files-o pt-2"></i>
                        </button>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Contact",
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
            return {

            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
        },
        computed: {

        },
    };
</script>

<style scoped>

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 3fr 2fr 1fr;
    }

    .contact-right-grid {
        display: grid;
        grid-template-rows: 8fr 1fr;
        gap: unset;
    }

</style>
