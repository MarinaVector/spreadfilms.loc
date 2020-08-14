<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-2 mt-2">
                <div class="row">
                    <div class="col-lg-1 mt-2 ml-3">
                        <button type="button" class="btn-icon ml-n2 draggable"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-arrows-v pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-1 offset-lg-10">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 inner-trigger">
                <div class="row">
                    <div class="col-lg-12 tutorial-text py-3">
                        <button class="text-button ml-4 py-2 px-5 my-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Image</p>
                        </button>
                    </div>
                    <div class="col-lg-12 tutorial-text py-1">
                        <button class="text-button ml-4 py-2 px-5 mt-2" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Text</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-7 mt-2 mb-5">
                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 offset-lg-7 pt-5">
                        <button type="button" class="btn-icon mt-3"
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

.tutorial-complex {
    background-color: #f9f9f9;
}

.tutorial-complex:hover .btn-icon {
    opacity: 1 !important;
}

</style>

