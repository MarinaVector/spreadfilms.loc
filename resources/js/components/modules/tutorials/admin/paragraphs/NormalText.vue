<template>
    <div class="card p-2">
        <div class="container" style="width: 100%;">
            <div class="row block-tutorial block-text">
                <div class="mt-4 ml-4">
                    <button type="button" class="btn-icon"><i class="fa fa-arrows-v pt-2"></i></button>
                </div>
                <div class="mt-5">
                    <div class="mt-5">
                        <i class="fa fa-bars blueiconcolor fa-5x mt-5">
                        </i>
                        <p class="mt-n3 ml-text">Text</p>
                    </div>
                </div>
                <div class="mt-4 mr-4">
                    <button type="button" class="btn-icon mb-5" @click="callParentDeleteParagraphBlock(this)">
                        <i class="fa fa-trash-o pt-2"></i>
                    </button>
                    <br>
                    <button type="button" class="btn-icon mt-5 mb-4"><i class="fa fa-files-o pt-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        data() {
            return {};
        },
        created() {

        },
        methods: {
            callParentDeleteParagraphBlock: function(paragraphBlock) {
                alert('delete button triggered');
                //this.$emit('childToParent', paragraphBlock);
            }
        },
        mounted() {

        },
        computed: {}
    };
</script>

<style>
    .card{
        /*min-height: 200px;*/
    }
</style>
