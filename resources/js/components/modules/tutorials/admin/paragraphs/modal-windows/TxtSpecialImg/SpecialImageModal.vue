<template>
    <div class="modal fade" id="SpecialImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-body">

                    <label><u class="input-title"><i class="fas fa-image"></i>
                        First Image
                    </u>
                    </label>

                    <div class="elfinder-container">
                        <input id="neu-0-image-1" data-type="bild" data-value="image"
                               type="hidden" class="elfinder-idea">
                        <button  :data-inputid="dataInputID"
                                @click="showFirstImageModal()"
                                type="button"
                                class="popup_selector btn btn-default">
                            First Image
                         </button>
                    </div>

                    <label><u class="input-title"><i class="fas fa-image"></i>
                        Second Image
                    </u>
                    </label>

                    <div class="elfinder-container mt-2">
                        <input data-type="bild" data-value="image"
                               type="hidden" class="elfinder-idea">
                        <button  :data-inputid="dataSecondInputID"
                                 @click="showSecondImageModal()"
                                 type="button"
                                 class="popup_selector btn btn-default">
                            Second Image
                        </button>
                    </div>

                    <div class="modal-header">
                        <label><u class="input-title"><i class="fas fa-align-left mr-2"></i>
                            Header
                        </u>
                        </label>
                    </div>

                    <div class="modal-body">
                        <ckeditor :editor="editor" v-model="SpecialText" :config="editorConfig"></ckeditor>
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
        <NormalTextFilemanagerModal ref="filemanagerModal" v-on:saveData="save"></NormalTextFilemanagerModal>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import NormalTextFilemanagerModal from '../NormalText/NormalTextFilemanagerModal'

    export default {
        name: "SpecialImageModal",
        components: {
            NormalTextFilemanagerModal,
        },
        props: [
            'specialtext',
            'firstimage',
            'secondimage'
        ],
        created() {

        },
        mounted() {

        },
        data() {
            return {
                editor: ClassicEditor,
                SpecialText: this.$props.specialtext ? this.$props.specialtext : '',
                FirstImage: this.$props.firstimage ? this.$props.firstimage : '',
                SecondImage: this.$props.secondimage ? this.$props.secondimage : '',
                editorConfig: {
                    // The configuration of the editor.
                },
                btnBeforeText: true,
                btnBeforeImg: true,
                btnAfterImg: false,
                btnAfterText: false,
                textAfter: false,
                textBefore: true,
                imgAfter: false,
                imgBefore: true,
                dataInputID: '',
                dataSecondInputID: '',
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', null, null, {
                    specialtext: this.SpecialText,
                    firstimage: this.FirstImage,
                    secondimage: this.SecondImage,
                });
            },
            cancel: function (event) {
                if(event.target.id === 'SpecialImageModal' || event.target.id === 'CancelModal') {
                    this.SpecialText = this.$props.specialtext;
                    this.FirstImage = this.$props.firstimage;
                    this.SecondImage = this.$props.secondimage;
                }
            },
            showFirstImageModal: function (){
                let element = this.$refs.filemanagerModal.$el;
                $(element).modal('show');

                // set callback
                this.$store.commit('fm/setFileCallBack', url => {
                    let fileName = url.substring(9);
                    let selectedDisk = this.$store.getters['fm/selectedDisk'];
                    this.FirstImage = selectedDisk + '/' + fileName;
                    $(element).modal('hide');
                });
            },
            showSecondImageModal: function (){
                let element = this.$refs.filemanagerModal.$el;
                $(element).modal('show');

                // set callback
                this.$store.commit('fm/setFileCallBack', url => {
                    let fileName = url.substring(9);
                    let selectedDisk = this.$store.getters['fm/selectedDisk'];
                    this.SecondImage = selectedDisk + '/' + fileName;
                    $(element).modal('hide');
                });
            },
        },
        computed: {

        },
    };
</script>
