<template>
    <div class="modal fade container video-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-3 px-4">
                <div class="part">
                    <div class="pull-right">
                        <question-dropdown :answerdropdown="'The Video Banner is created automatically. ' +
                         'Please not that no Banner can be created for a password-protected Video.'"></question-dropdown>
                    </div>
                    <label class="input-title"><i class="fas fa-image mr-2"></i>Banner</label>

                    <div class="elfinder-container"><input id="neu-1" type="hidden" data-type="bild"
                                                           data-value="image" class="elfinder-idea">
                        <button data-inputid="neu-1" data-dismiss="modal" class="popup_selector btn btn-default">Select image
                        </button>
                    </div>
                    <hr>
                    <label class="input-title"><i class="fas fa-film mr-2"></i>Video</label>
                    <div class="elfinder-container"><input type="text" placeholder="Video-URL"
                                                           class="videourl">
                    </div>
                    <hr>
                    <label class="input-title"><i data-fa-transform="rotate-45"
                                                  class="fas fa-arrows-alt-h mr-2"></i>Dimension</label>

                    <div class="stay-logged-in">
                        <div class="pretty p-default p-round">
                            <div class="custom-checkbox pretty p-default p-round">
                                <label for="remember1">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember1">
                                    <div class="roundchek mr-1"></div>
                                    16:9
                                </label>
                            </div>
                            <div class="pretty p-default p-round p-curve">
                            <div class="custom-checkbox">
                                <label for="remember2">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember2">
                                    <div class="roundchek mr-1"></div>
                                    4:3
                                </label>
                            </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <label class="input-title"><i class="far fa-sticky-note mr-2"></i>Notice</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notes">
                                <table class="video-time">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Note</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr>
                                        <td class="time">00:00</td>
                                        <td class="message"></td>
                                        <td class="remove"><span title="" class="edit-note-button"
                                                                 data-original-title="Notiz bearbeiten"><i
                                            class="fas fa-pen mr-2"></i></span><span title=""
                                                                                     class="remove-note-button"
                                                                                     data-original-title=""><i
                                            class="fas fa-trash-alt"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="time">00:00</td>
                                        <td class="message"></td>
                                        <td class="remove"><span title="" class="edit-note-button"
                                                                 data-original-title="Edit note"><i
                                            class="fas fa-pen mr-2"></i></span><span title=""
                                                                                     class="remove-note-button"
                                                                                     data-original-title="Remove note"><i
                                            class="fas fa-trash-alt"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="time">00:00</td>
                                        <td class="message"></td>
                                        <td class="remove"><span title="" class="edit-note-button"
                                                                 data-original-title="Edit note"><i
                                            class="fas fa-pen mr-2"></i></span><span title=""
                                                                                     class="remove-note-button"
                                                                                     data-original-title="Remove note"><i
                                            class="fas fa-trash-alt"></i></span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="mt-2">
                                        <td><input type="hidden" value="">
                                            <vue-timepicker format="mm:ss"></vue-timepicker>
                                        </td>
                                        <td><input type="text" class="form-txt ml-5"></td>
                                        <td><span title="" class="save-note-button ml-1"
                                                  data-original-title="Save note"><i
                                            class="fas fa-save"></i></span></td>
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

    #modals-container
    .edit-view
    .edit-inner
    .edit-content {
        max-height: 80vh;
        overflow: auto;
        color: #424242;
    }

    .video-modal {
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
    }

    .edit-view
    .edit-inner
    .part {
        background: #fff;
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 3px;
        position: relative;
    }

    .edit-content {
        background-color: white;
        text-align: left;
        border-radius: 3px;
        box-shadow: 0 20px 60px -2px rgba(27, 33, 58, 0.4);
        padding: 0;
    }

    .edit-view
    label.input-title {
        margin-bottom: 10px;
        display: inline-block;
        border-bottom: solid 1px;
        font-size: 0.8em;
    }


    .elfinder-container {
        position: relative;
        border: 2px dashed #ddd;
        background: #f1f1f1;
        border-radius: 7px;
        text-align: center;
        padding: 20px;
    }

    fieldset {
        margin-bottom: 20px;
    }

    label .input-title {
        color: #777777;
        font-size: 12px;
    }

    .pretty {
        position: relative;
        display: inline-block;
        margin-right: 1em;
        white-space: nowrap;
        line-height: 1;
    }

    .pretty input {
        position: absolute;
        left: 0;
        top: 0;
        min-width: 1em;
        width: 100%;
        height: 100%;
        z-index: 2;
        opacity: 0;
        margin: 0;
        padding: 0;
        cursor: pointer;
    }

     .video-time {
        width: 100%;
    }

    .save-btn,
    .cancel-btn {
        margin-right: 40px;
        box-shadow: 0 0px 20px 3px rgba(0, 0, 0, 0.2);
        width: 100px !important;
    }

    .buttons {
        display: inline;
        margin-left: 35%;
    }

    .roundchek {
        display: inline-block;
        border: 1px solid #b2b1b1;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        position: relative;
        vertical-align: middle;
        box-sizing: border-box;
        margin-right: 4px;
    }

    .roundchek:before {
        content: '';
        background: #bdc3c7;
        width: 10px;
        height: 10px;
        opacity: 0;
        transition: 0.3s;
        position: absolute;
        border-radius: 50%;
        top: 2px;
        left: 2px;
    }

    input:checked + .roundchek:before {
        opacity: 1;
    }

    .form-txt {
        border: 1px solid #ced4da;
    }


</style>
