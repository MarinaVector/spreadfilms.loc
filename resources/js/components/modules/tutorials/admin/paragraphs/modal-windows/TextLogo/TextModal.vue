<template>
    <div class="modal fade" id="TextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-header">
                    <label class="input-title"><i class="fas fa-heading mr-2"></i>Headline</label>
                </div>
                <div class="modal-body">
                    <ckeditor :editor="editor" v-model="SingleText" :config="editorConfig"></ckeditor>
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
        name: "TextModal",
        components: {

        },
        props: [
            'singletext',
        ],
        created() {

        },
        mounted() {

        },
        data() {
            return {
                editor: ClassicEditor,
                SingleText: this.$props.singletext ? this.$props.singletext : '<p></p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', null, null, this.SingleText)
            },
            cancel: function (event) {
                if(event.target.id === 'TextModal' || event.target.id === 'CancelModal') {
                    this.SingleText = this.$props.singletext;
                }
            }
        },
        computed: {

        },
    };
</script>

<style>

</style>
