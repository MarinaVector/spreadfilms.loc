<template>
    <div class="modal fade video-modal" id="VideoModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-3 px-4">
                <div class="part">
                    <div class="pull-right">
                        <question-dropdown :answerdropdown="'The Video Banner is created automatically. ' +
                         'Please not that no Banner can be created for a password-protected Video.'"></question-dropdown>
                    </div>

                    <label class="input-title"><i class="fas fa-film mr-2"></i>Video</label>
                    <div class="elfinder-container">
                        <input type="text" v-model="VideoUrl" placeholder="Video-URL" class="videourl">
                    </div>
                    <hr>
                    <label class="input-title">
                        <i data-fa-transform="rotate-45" class="fas fa-arrows-alt-h mr-2"></i>Dimension
                    </label>

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
                                    <tr v-for="(notice, index) in Notices">
                                        <td class="time">{{notice.noticeTime}}</td>
                                        <td class="message">{{notice.noticeText}}</td>
                                        <td class="remove">
                                            <span title="" class="edit-note-button"
                                                  data-original-title="Notiz bearbeiten"
                                                  @click="editTimeNotice(index)">
                                                <i class="fas fa-pen mr-2"></i>
                                            </span>
                                            <span title="" class="remove-note-button"
                                                    data-original-title=""
                                                    @click="deleteTimeNotice(index)">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="mt-2">
                                        <td>
                                            <input type="hidden" value="" ref="noticeIndex">
                                            <vue-timepicker v-model="editTime" format="mm:ss" ref="noticeTime"></vue-timepicker>
                                        </td>
                                        <td>
                                            <input type="text" name="noticeText" class="form-txt ml-5" ref="noticeText">
                                        </td>
                                        <td>
                                            <span title="" class="save-note-button ml-1"
                                                    data-original-title="Save note"
                                                    @click="saveTimeNotice">
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

    export default {
        name: "VideoModal",
        components: {
            VueTimepicker
        },
        props: {
            videoUrl: {
                type: String,
                default: () => ""
            },
            banner: {
                type: String,
                default: () => ""
            },
            dimension: {
                type: String,
                default: () => ""
            },
            noticesProp: {
                type: Array,
                default: () => []
            },
        },
        created() {
            this.Dimension = this.Dimension;
        },
        mounted(){

        },
        data() {
            return {
                Index: null,
                VideoUrl: null,
                Banner: null,
                Dimension: null,
                Notices: [],
                editTime: null,
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', {
                    index: this.Index,
                    videoUrl: this.VideoUrl,
                    banner: this.Banner,
                    dimension: this.Dimension,
                    notices: this.Notices,
                });
                this.clearData();
            },
            cancel: function (event) {
                if(event.target.id === 'VideoModal' || event.target.id === 'CancelModal') {
                    this.clearData();
                }
            },
            clearData: function () {
                this.VideoUrl = null;
                this.Banner = null;
                this.Dimension = null;
                this.Notices = [];
            },
            getBannerUrl: function (VideoUrl) {
                let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
                let match = VideoUrl.match(regExp);
                return (match&&match[7].length==11)? match[7] : false;
            },
            saveTimeNotice: function () {
                let noticeIndex = this.$refs.noticeIndex.value;
                let editingNotice = (noticeIndex !== "") ? true : false;
                let noticeTime = this.$refs.noticeTime.displayTime;
                let noticeText = this.$refs.noticeText.value;

                if(editingNotice){
                    //editing notice
                    this.Notices[noticeIndex] = {noticeTime: noticeTime, noticeText: noticeText};
                }else {
                    //adding notice
                    this.Notices.push({noticeTime: noticeTime, noticeText: noticeText});
                }

                this.$refs.noticeTime.clearTime();
                this.$refs.noticeText.value = null;
                this.$refs.noticeIndex.value = "";
            },
            editTimeNotice: function (index) {
                //console.log('Index: ' + index);
                this.$refs.noticeIndex.value = index;
                let noticeTime = this.Notices[index].noticeTime;
                let noticeText = this.Notices[index].noticeText;

                this.$refs.noticeText.value = noticeText;
                this.editTime = noticeTime;
            },
            deleteTimeNotice: function (index) {
                this.Notices.splice(index, 1);
            },
        },
        computed: {

        },
    }
</script>

<style>

</style>
