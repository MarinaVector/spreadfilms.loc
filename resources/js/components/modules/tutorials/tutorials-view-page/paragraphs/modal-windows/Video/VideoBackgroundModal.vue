<template>
    <div class="modal fade container video-modal scroll-hidden" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="row scroll-show">
            <div class="col-md-8">
                <div class="edit-view">
                    <div class="edit-inner">
                        <div class="mb-3">

                            <div class="edit-content ">
                                <div class="modal-header">
                                    <label class="input-title"><i class="fas fa-heading mr-2"></i>Headline</label>
                                </div>
                                <div class="modal-body">
                                    <ckeditor :editor="editor" v-model="NormalTextHeader" :config="editorConfig"></ckeditor>
                                </div>
                            </div>



                            <div class="edit-content px-3">
                                <label class="input-title"><i class="fas fa-image mr-2"></i>Image in the background</label>

                                <div class="elfinder-container"><input id="neu-2" type="hidden" data-type="bild"
                                                                       data-value="image" class="elfinder-idea">
                                    <button data-inputid="neu-1" data-dismiss="modal" class="popup_selector btn btn-default">Select image
                                    </button>
                                </div>
                                <hr>


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

                                <p-radio name="dimension" v-model="Dimension" :value="'16:9'">16:9</p-radio>
                                <p-radio name="dimension" v-model="Dimension" :value="'4:3'">4:3</p-radio>

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
                                                <tr>
                                                    <td><input type="hidden" value=""> <span
                                                        class="time-picker"><input type="text" readonly="readonly"
                                                                                   class="display-time"> <span
                                                        class="clear-btn"
                                                        style="">×</span>
                                                        <!----> <div class="dropdown" style="display: none;"><div
                                                            class="select-list"><ul class="hours"><li
                                                            class="hint">HH</li> <li
                                                            class="">00</li><li class="">01</li><li
                                                            class="">02</li><li
                                                            class="">03</li><li class="">04</li><li
                                                            class="">05</li><li


                                                            class="">56</li><li class="">57</li><li
                                                            class="">58</li><li
                                                            class="">59</li></ul>
                                                            <!----></div></div></span></td>
                                                    <td><input type="text" class="form-control"></td>
                                                    <td><span title="" class="save-note-button"
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
                        <div class="buttons mt-5 video-btn">
                            <div class="btn btn-primary save-btn"><span class="button-inner">
            Save
        </span></div>
                            <div class="btn btn-secondary cancel-btn" data-dismiss="modal"><span class="button-inner">
            Chancel
        </span></div>
                        </div>
                    </div>
                </div>

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
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
        methods: {

        },
        created() {

        },
    };

</script>

<style scoped>

    .scroll-hidden {
        overflow: hidden;
    }

    .scroll-show {
        overflow-y: scroll;
        overflow-x: hidden;
        position: sticky;
        margin: 0;
    }

    .video-modal {
        left: 30%;
        height: 300px;
    }


    </style>
