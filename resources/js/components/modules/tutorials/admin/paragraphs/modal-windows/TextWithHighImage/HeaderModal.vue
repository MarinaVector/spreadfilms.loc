<template>
    <div class="modal fade" id="HeaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-header">
                    <label class="input-title"><i class="fas fa-heading mr-2"></i>Headline</label>
                </div>
                <div class="modal-body">
                    <ckeditor :editor="editor" v-model="NormalTextHeader" :config="editorConfig"></ckeditor>
                </div>
            </div>

            <div class="modal-footer1 mt-3 ml-5">
                <button type="button" class="btn btn-primary btn-modal ml-5" data-dismiss="modal" @click="save()">
                    Save changes
                </button>
                <button type="button" class="btn close-modal btn-modal" data-dismiss="modal" id="CancelModal">
                    Close window
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        name: "HeaderModal",
        components: {

        },
        props: [
            'header',
        ],
        created() {

        },
        mounted() {

        },
        data() {
            return {
                editor: ClassicEditor,
                NormalTextHeader: this.$props.header ? this.$props.header : '<p></p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', this.NormalTextHeader)
            },
            cancel: function (event) {
                if(event.target.id === 'HeaderModal' || event.target.id === 'CancelModal') {
                    this.NormalTextHeader = this.$props.header;
                }
            },
        },
        computed: {

        },
    };
</script>

<style>

</style>
