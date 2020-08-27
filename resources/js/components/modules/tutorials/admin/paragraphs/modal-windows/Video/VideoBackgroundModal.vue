<template>
    <div class="modal fade container-fluid" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="py-3 px-4">
                <div class="scrollable modal-content">
                    <div class="edit-content mb-2">
                        <div class="modal-header p-1 ml-2">
                            <label class="input-title"><i class="fas fa-heading mr-2"></i>Title</label>
                        </div>
                        <div class="modal-body">
                            <ckeditor :editor="editor" v-model="NormalTextHeader" :config="editorConfig"></ckeditor>
                        </div>
                    </div>

                    <div class="part modal-content pt-2 pb-5 px-3">
                        <div class="pull-right">
                            <question-dropdown :answerdropdown="'The Video Banner is created automatically. ' +
                         'Please not that no Banner can be created for a password-protected Video.'"></question-dropdown>
                        </div>
                        <label class="input-title"><i class="fas fa-image mr-2"></i>Background</label>
                        <div class="elfinder-container"><input id="neu-1" type="hidden" data-type="bild" data-value="image" class="elfinder-idea">
                            <button data-inputid="neu-1" data-dismiss="modal" class="popup_selector btn btn-default">Select image
                            </button>
                        </div>
                        <hr>
                        <label class="input-title"><i class="fas fa-film mr-2 ml-2"></i>Video</label>
                        <div class="elfinder-container"><input type="text" placeholder="Video-URL" class="videourl">
                        </div>
                        <hr>
                        <label class="input-title"><i data-fa-transform="rotate-45" class="fas fa-arrows-alt-h mr-2 ml-2"></i>Dimension</label>

                        <div class="stay-logged-in ml-2">
                            <div class="pretty p-default p-round">
                                <div class="custom-checkbox pretty p-default p-round">
                                    <label for="remember1">
                                        <input type="radio" class="custom-control-input" name="remember" id="remember1">
                                        <div class="roundchek mr-1"></div>
                                        16:9
                                    </label>
                                </div>
                                <div class="pretty p-default p-round p-curve">
                                    <div class="custom-checkbox">
                                        <label for="remember2">
                                            <input type="radio" class="custom-control-input" name="remember" id="remember2">
                                            <div class="roundchek mr-1"></div>
                                            4:3
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <label class="input-title"><i class="far fa-sticky-note mr-2 ml-2"></i>Notice</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="notes">
                                    <table class="video-time ml-2">
                                        <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Note</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list ml-2">
                                        <tr>
                                            <td class="time">00:00</td>
                                            <td class="message"></td>
                                            <td class="remove">
                                                     <span title="" class="edit-note-button" data-original-title="Edit note">
                                                         <i class="fas fa-pen mr-1"></i>
                                                     </span>
                                                <span title="" class="remove-note-button" data-original-title="">
                                                         <i class="fas fa-trash-alt"></i>
                                                     </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="mt-2">
                                            <td><input type="hidden" value="">
                                                <vue-timepicker lazy format="mm:ss">
                                                </vue-timepicker>
                                            </td>
                                            <td><input type="text" class="form-txt ml-5"></td>
                                            <td><span title="" class="save-note-button ml-1" data-original-title="Save note">
                                                <i class="fas fa-save"></i></span></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import 'vue2-timepicker/dist/VueTimepicker.css';
import VueTimepicker from 'vue2-timepicker/src/vue-timepicker.vue';

export default {
    name: "VideoSimple",
    props: [
        'header',
        'body',
    ],
    components: {
        VueTimepicker
    },
    data() {
        return {
            editor: ClassicEditor,
            NormalTextHeader: this.$props.header ? this.$props.header : '<p></p>',
            NormalTextBody: this.$props.body ? this.$props.body : '<p></p>',
            editorConfig: {
                // The configuration of the editor.
            }
        };
    },
    methods: {
        save: function () {
            this.$emit('saveData', this.NormalTextHeader, this.NormalTextBody)
        },
        cancel: function (event) {
            if(event.target.id === 'NormalTextModal' || event.target.id === 'CancelModal') {
                this.NormalTextHeader = this.$props.header;
                this.NormalTextBody = this.$props.body;
            }
        }
    },
}
</script>

<style>

.scrollable {
    overflow-y: scroll !important;
    overflow-x: hidden;
    height: 70vh;
}

</style>

