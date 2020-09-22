<template>
    <div class="modal fade" id="SpecialImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-body">
                    <div>
                        <label>First Image</label>
                        <button :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                                :data-inputid="dataInputID"
                                class="py-2 mb-md-0 px-md-5 btn-right"
                                @click="showFirstImageModal()"
                                type="button">
                            <i class="fas fa-image blueiconcolor fa-2x pt-1"></i>
                        </button>
                    </div>

                    <div>
                        <label>Second Image</label>
                        <button :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                                :data-inputid="dataSecondInputID"
                                class="py-2 mb-md-0 px-md-5 btn-right"
                                @click="showSecondImageModal()"
                                type="button">
                            <i class="fas fa-image blueiconcolor fa-2x pt-1"></i>
                        </button>
                    </div>

                    <div class="modal-header">
                        <label class="input-title"><i class="fas fa-align-left mr-2"></i>Header</label>
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
