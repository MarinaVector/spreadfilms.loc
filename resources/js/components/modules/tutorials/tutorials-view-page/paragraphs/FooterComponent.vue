<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-12">
                <div class="row tutorial-foot module-text pt-3">

                <div class="col-lg-2 mt-2">
                    <button type="button" class="btn-icon draggable ml-4"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fa fa-arrows-v pt-2"></i>
                    </button>

            </div>

            <div class="col-lg-8 inner-trigger lg-head">

                <div class="">
                    <button class="text-button px-5 mx-5" type="button">
                        <i class="fas fa-shoe-prints blueiconcolor fa-2x"></i>
                        <p class="mb-n1">Contact</p>
                    </button>
                </div>

            </div>



            <div class="col-lg-1 pl-5 ml-5 mt-2">

                        <button type="button" class="btn-icon mb-5"
                                @click="callParentDeleteParagraphBlock()">
                            <i class="fa fa-trash-o pt-2"></i>
                        </button>
                                               </div>
                </div>

                    <div class="row">
                    <div class="col-lg-1 offset-lg-11 pt-5">
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

<style>

.tutorial-foot {
    border: dotted 1px #333;
    }

</style>
