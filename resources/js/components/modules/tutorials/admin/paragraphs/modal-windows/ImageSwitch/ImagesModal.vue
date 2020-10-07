<template>
    <div class="modal fade" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="rounded pb-3">
                <div class="modal-body">
                    <div class="part"><label class="input-title"><i class="fas fa-image"></i>
                        Image Before
                    </label>
                        <div class="elfinder-container"><input id="neu-0-image-1" data-type="bild" data-value="image"
                                                               type="hidden" class="elfinder-idea">
                            <button data-inputid="neu-0-image-1"
                                    class="btn btn-default py-2 mb-md-0 px-md-5"
                                    :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                                    :data-inputid="dataInputID"
                                    @click="showFilemanagerModal('imagebefore')"
                                    type="button">
                                Image Before
                            </button>
                        </div>
                        <!---->
                        <hr>
                        <label class="input-title"><i class="fas fa-image"></i>
                            Image After
                        </label>
                        <div class="elfinder-container">
                            <input id="neu-0-image-2" type="hidden" class="elfinder-idea">
                            <button data-inputid="neu-0-image-2"
                                    class="btn btn-default py-2 mb-md-0 px-md-5"
                                    :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                                    :data-inputid="dataInputID"
                                    @click="showFilemanagerModal('imageafter')"
                                    type="button">
                                Image After
                            </button>
                        </div>
                        <!---->
                    </div>

                    <div class="part">
                        <label class="input-title mt-3">
                            <i class="fas fa-arrow-left"></i>
                            Text Before
                        </label>
                        <input type="text" name="textbefore" placeholder="Text Before" class="form-txt"
                               v-model="TextBefore"/>
                        <hr>
                        <label class="input-title">
                            <i class="fas fa-arrow-right"></i>
                            Text After
                        </label>
                        <input type="text" name="textafter" placeholder="Text After" class="form-txt"
                               v-model="TextAfter"/>
                    </div>

                </div>

            </div>
            <div class="modal-footer mt-3 ml-5">
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
import NormalTextFilemanagerModal from '../NormalText/NormalTextFilemanagerModal'

export default {
    name: "ImagesModal",
    components: {
        NormalTextFilemanagerModal,
    },
    props: {
        imagebefore: {
            type: String,
            default: () => ''
        },
        imageafter: {
            type: String,
            default: () => ''
        },
        textbefore: {
            type: String,
            default: () => ''
        },
        textafter: {
            type: String,
            default: () => ''
        },
    },
    created() {

    },
    mounted() {

    },
    data() {
        return {
            ImageBefore: this.$props.imagebefore ? this.$props.imagebefore : '',
            ImageAfter: this.$props.imageafter ? this.$props.imageafter : '',
            TextBefore: this.$props.textbefore ? this.$props.textbefore : '',
            TextAfter: this.$props.textafter ? this.$props.textafter : '',
            btnBeforeText: true,
            btnBeforeImg: true,
            btnAfterImg: false,
            btnAfterText: false,
            textAfter: false,
            textBefore: true,
            imgAfter: false,
            imgBefore: true,
            dataInputID: '',
        };
    },
    methods: {
        save: function () {
            this.$emit('saveData', null, null, {
                imagebefore: this.ImageBefore,
                imageafter: this.ImageAfter,
                textbefore: this.TextBefore,
                textafter: this.TextAfter,
            });
        },
        cancel: function (event) {
            if (event.target.id === 'ImageModal' || event.target.id === 'CancelModal') {
                this.ImageBefore = this.$props.imagebefore;
                this.ImageAfter = this.$props.imageafter;
                this.TextBefore = this.$props.textbefore;
                this.TextAfter = this.$props.textafter;
            }
        },
        showFilemanagerModal: function (imageType = '') {
            let element = this.$refs.filemanagerModal.$el;
            $(element).modal('show');

            // set callback
            this.$store.commit('fm/setFileCallBack', url => {
                let fileName = url.substring(9);
                let selectedDisk = this.$store.getters['fm/selectedDisk'];
                if (imageType === 'imagebefore') {
                    this.ImageBefore = selectedDisk + '/' + fileName;
                } else {
                    this.ImageAfter = selectedDisk + '/' + fileName;
                }

                $(element).modal('hide');
            });
        },
    },
    computed: {},
};
</script>

<style>

.form-txt {
    border: 1px solid #ced4da;
    font-size: 14px;
    background: #fff;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
    color: #777777;
    padding: 0 15px;
    display: block;
    width: 100%;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

</style>
