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

            <div class="col-lg-5 inner-trigger lg-head tutorial-text mr-n3">
                <div class="py-5 my-5">
                    <button class="text-button py-2 px-5 my-5 mx-5 mr-5" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">Image</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-3 inner-trigger lg-head tutorial-text ml-n1">

                <div class="py-5 my-5">
                    <button class="text-button py-2 my-5 px-5 mx-5" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1">Contact</p>
                    </button>
                </div>

            </div>
            <div class="col-lg-2 mt-2">
                <div class="row py-1">
                    <div class="col-lg-4 offset-lg-8 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-4 offset-lg-8 pt-5 mt-5">
                        <button type="button" class="btn-icon mt-5"
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

</style>
