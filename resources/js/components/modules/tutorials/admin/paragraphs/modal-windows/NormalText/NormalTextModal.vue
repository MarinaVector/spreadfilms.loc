<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-header">
                    <label class="input-title"><i class="fas fa-heading mr-2"></i>Headline</label>
                </div>
                <div class="modal-body">
                    <ckeditor :editor="editor" v-model="NormalTextHeader" :config="editorConfig"></ckeditor>
                </div>
                <div class="modal-header">
                    <label class="input-title"><i class="fas fa-align-left mr-2"></i>Text</label>
                </div>
                <div class="modal-body">
                    <ckeditor :editor="editor" v-model="NormalTextBody" :config="editorConfig"></ckeditor>
                </div>
            </div>
                <div class="modal-footer1 mt-3 ml-5">
                    <button type="button" class="btn btn-primary btn-modal ml-5" data-dismiss="modal" @click="save()">Save changes</button>
                    <button type="button" class="btn close-modal btn-modal" data-dismiss="modal">Close window</button>
                </div>
        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        components: {

        },
        data() {
            return {
                editor: ClassicEditor,
                NormalTextHeader: '<p></p>',
                NormalTextBody: '<p></p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', this.NormalTextHeader, this.NormalTextBody)
            }
        },
        created() {

        },
    };
</script>

<style>

    button.btn-modal {
        margin-right: 40px;
        box-shadow: 0 0px 20px 3px rgba(0, 0, 0, 0.2);
    }

    .modal-footer1{
        pointer-events: auto;
    }

    .close-modal {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

</style>
