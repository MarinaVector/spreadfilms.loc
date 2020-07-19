<template>
    <div class="modal fade container fade-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="row">
            <div class="col-md-8">
                <div class="edit-view">
                    <div class="edit-inner">
                        <div class="edit-content mb-3">
                            <div class="part"><label class="input-title"><i class="fas fa-image mr-2"></i>Banner</label>

                                <div class="elfinder-container"><input id="neu-1" type="hidden" data-type="bild"
                                                                       data-value="image" class="elfinder-idea">
                                    <button data-inputid="neu-1" data-dismiss="modal" class="popup_selector btn btn-default">Select image
                                    </button>
                                </div> <!---->
                                <hr>
                                <label class="input-title"><i class="fas fa-film mr-2"></i>Video</label>
                                <div class="elfinder-container"><input type="text" placeholder="Video-URL"
                                                                       class="videourl">
                                </div>
                                <hr>
                                <label class="input-title"><i data-fa-transform="rotate-45"
                                                              class="fas fa-arrows-alt-h mr-2"></i>Dimension</label>
                                <fieldset data-content="dimension" data-content-field="videos"
                                          class="radio-data-video-slider">
                                    <div class="pretty p-default p-round"><input type="radio" value="16:9">
                                        <div class="state"><label>16:9</label></div>
                                    </div>
                                    <div class="pretty p-default p-round"><input type="radio" value="4:3">
                                        <div class="state"><label>4:3</label></div>
                                    </div>
                                </fieldset>
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
    export default {
        name: "VideoSimple"
    }
</script>

<style scoped>
    #modals-container
    .edit-view
    .edit-inner
    .edit-content {
        max-height: 80vh;
        overflow: auto;
        color: #424242;
    }

    .fade-modal {
        top: 20%;
        left: 30%;
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


    .pretty .state label {
        position: initial;
        display: inline-block;
        font-weight: 400;
        margin: 0;
        text-indent: 1.5em;
        min-width: calc(1em + 2px)
    }

    .pretty .state label:after,
    .pretty .state label:before {
        content: '';
        width: calc(1em + 2px);
        height: calc(1em + 2px);
        display: block;
        box-sizing: border-box;
        border-radius: 0;
        border: 1px solid transparent;
        z-index: 0;
        position: absolute;
        left: 0;
        top: calc((0% - (100% - 1em)) - 8%);
        background-color: transparent
    }

    .pretty .state label:before {
        border-color: #bdc3c7
    }


    .pretty.p-default .state label:after {
        -webkit-transform: scale(.6);
        -ms-transform: scale(.6);
        transform: scale(.6)
    }

    .pretty.p-default input:checked ~ .state label:after {
        background-color: #bdc3c7 !important
    }

    .pretty.p-icon input:checked ~ .state label:before {
        border-color: #5a656b
    }

    .pretty.p-round .state label:after,
    .pretty.p-round .state label:before {
        border-radius: 100%
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
</style>
