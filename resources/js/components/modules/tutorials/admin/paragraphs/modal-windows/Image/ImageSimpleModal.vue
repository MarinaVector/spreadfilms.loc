<template>
    <div class="modal fade container fade-modal" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="row">
            <div class="col-md-8">
                <div class="edit-view">
                    <div class="edit-inner">
                        <div class="edit-content mb-3">
                            <div class="part"><label class="input-title"><i class="fas fa-image mr-2"></i>Image</label>

                                <div class="elfinder-container"><input id="neu-1" type="hidden" data-type="bild"
                                                                       data-value="image" class="elfinder-idea">
                                    <button data-inputid="neu-1"
                                            class="popup_selector btn btn-default">Select image
                                    </button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ImageSimpleModal",
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

        },
        computed: {

        },
    }
</script>

<style scoped>


</style>
