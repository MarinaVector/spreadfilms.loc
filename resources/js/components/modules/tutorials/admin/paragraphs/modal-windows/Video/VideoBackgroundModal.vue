<template>
    <div class="modal fade container video-modal" id="VideoSimpleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-3 px-4 scrollable">
                <div class="mb-2">
                    <div class="p-1">
                        <label class="input-title modal-name"><i class="fas fa-heading mr-2"></i>Title</label>
                    </div>
                    <ckeditor :editor="editor" v-model="NormalTextHeader" :config="editorConfig"></ckeditor>
                </div>

                <div class="part">
                    <div class="pull-right">
                        <question-dropdown :answerdropdown=" videoBg "></question-dropdown>
                    </div>
                    <label class="input-title modal-name"><i class="fas fa-image mr-2"></i>Background</label>
                    <div class="elfinder-container">
                        <input id="neu-1" type="hidden" data-type="bild" data-value="image" class="elfinder-idea">
                        <button data-inputid="neu-1" data-dismiss="modal" class="popup_selector btn btn-default">Select image
                        </button>
                    </div>
                    <hr>
                    <label class="input-title modal-name">
                        <i class="fas fa-film mr-2"></i>Video
                    </label>
                    <div class="elfinder-container">
                        <input type="text" v-model="VideoUrl" placeholder="Video-URL" class="videourl">
                    </div>
                    <hr>
                    <label class="input-title modal-name">
                        <i data-fa-transform="rotate-45" class="fas fa-arrows-alt-h mr-2"></i>Dimension
                    </label>
                    <br>
                    <p-radio name="dimension" v-model="Dimension" :value="'16:9'">16:9</p-radio>
                    <p-radio name="dimension" v-model="Dimension" :value="'4:3'">4:3</p-radio>

                    <hr>
                    <label class="input-title modal-name">
                        <i class="far fa-sticky-note mr-2"></i>Notice
                    </label>
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
                                    <tbody class="list mb-2">
                                    <tr class="my-2">
                                        <td class="time">00:00</td>
                                        <td class="message"></td>
                                        <td class="remove">
                                            <span title="" class="edit-note-button" data-original-title="Edit note">
                                                <i class="fas fa-pen mr-1"></i>
                                            </span>
                                            <span title="" class="remove-note-button" data-original-title="Remove note">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="mt-auto">
                                    <tr class="mt-2">
                                        <td>
                                            <input type="hidden">
                                            <vue-timepicker format="mm:ss">
                                            </vue-timepicker>
                                        </td>
                                        <td>
                                            <input type="text" class="form-txt ml-5">
                                        </td>
                                        <td>
                                            <span title="" class="save-note-button ml-1" data-original-title="Save note">
                                            <i class="fas fa-save"></i>
                                            </span>
                                        </td>
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
import 'vue2-timepicker/dist/VueTimepicker.css';
import VueTimepicker from 'vue2-timepicker/src/vue-timepicker.vue';
import PrettyCheckbox from 'pretty-checkbox-vue';
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
    name: "VideoSimple",
    components: {
        VueTimepicker
    },
    props: [
        'videoUrl',
        'banner',
        'dimension',
        'notices',
        'header',
    ],
    created() {
        this.Dimension = this.Dimension;
    },
    mounted(){

    },
    data() {
        return {
            editor: ClassicEditor,
            VideoUrl: this.$props.videoUrl ? this.$props.videoUrl : '',
            Banner: this.$props.banner ? this.$props.banner : '',
            Dimension: this.$props.dimension ? this.$props.dimension : '',
            Notices: this.$props.notices ? this.$props.notices : '',
            NormalTextHeader: this.$props.header ? this.$props.header : '<p></p>',
            editorConfig: {
                // The configuration of the editor.
            },
            videoBg: 'The Video Banner is created automatically.' + ' ' +
                'Please not that no Banner can be created for a password-protected Video',

        };

    },
    methods: {
        save: function () {
            this.Banner = "https://i.ytimg.com/vi/" + this.getBannerUrl(this.VideoUrl) + "/hqdefault.jpg";
            this.$emit('saveData', this.VideoUrl, this.Banner, this.Dimension, this.Notices);
            this.$emit('saveData', this.NormalTextHeader)
        },
        cancel: function (event) {
            if(event.target.id === 'VideoBackgroundModal' || event.target.id === 'CancelModal') {
                this.VideoUrl = this.$props.videoUrl;
                this.Banner = this.$props.banner;
                this.Dimension = this.$props.dimension;
                this.Notices = this.$props.notices;
                this.NormalTextHeader = this.$props.header;
            }
                    },
        getBannerUrl: function (VideoUrl) {
            let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
            let match = VideoUrl.match(regExp);
            return (match&&match[7].length==11)? match[7] : false;
        },
    },
    computed: {

    },
}
</script>

<style>

.scrollable {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 80vh;
}

.modal-name {
    border-bottom: 1px solid #dee2e6;
}

.vue__time-picker .dropdown {
    top: 0;
    position: absolute;
    z-index: 5;
    top: calc(2.2em + 2px);
    left: 0;
    background: #fff;
    box-shadow: 0 1px 6px rgba(0,0,0,0.15);
    transform: translateY(-100%);
    width: 10em;
    height: 10em;
    font-weight: normal;
}

</style>

