<template>
    <div class="modal fade" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-body">
                    <button :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                            :data-inputid="dataInputID"
                            class="py-2 mb-md-0 px-md-5 txt-btn btn-right"
                            @click="showFilemanagerModal('imagebefore')"
                            type="button">
                        <i class="fas fa-image blueiconcolor fa-2x pt-1">
                        </i>
                        <div class="mt-n1 mb-n1">Image Before</div>
                    </button>

                    <button :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                            :data-inputid="dataInputID"
                            class="py-2 mb-md-0 px-md-5 txt-btn btn-right"
                            @click="showFilemanagerModal('imageafter')"
                            type="button">
                        <i class="fas fa-image blueiconcolor fa-2x pt-1">
                        </i>
                        <div class="mt-n1 mb-n1">Image After</div>
                    </button>
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
                this.$emit('saveData', this.ImageBefore, this.ImageAfter, this.TextBefore, this.TextAfter);
            },
            cancel: function (event) {
                if(event.target.id === 'ImageModal' || event.target.id === 'CancelModal') {
                    this.ImageBefore = this.$props.imagebefore;
                    this.ImageAfter = this.$props.imageafter;
                    this.TextBefore = this.$props.textbefore;
                    this.TextAfter = this.$props.textafter;
                }
            },
            showFilemanagerModal: function (imageType = ''){
                let element = this.$refs.filemanagerModal.$el;
                $(element).modal('show');

                // set callback
                this.$store.commit('fm/setFileCallBack', url => {
                    let fileName = url.substring(9);
                    let selectedDisk = this.$store.getters['fm/selectedDisk'];
                    if(imageType === 'imagebefore'){
                        this.ImageBefore = selectedDisk + '/' + fileName;
                    } else {
                        this.ImageAfter = selectedDisk + '/' + fileName;
                    }

                    $(element).modal('hide');
                });
            },
        },
        computed: {

        },
    };
</script>
