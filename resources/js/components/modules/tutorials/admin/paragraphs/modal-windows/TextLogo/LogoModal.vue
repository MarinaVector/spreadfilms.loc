<template>
    <div class="modal fade" id="LogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-body">
                    <div>
                        <p-radio name="dimension" v-model="LogoType" :value="'fs'">Full screen</p-radio>
                        <p-radio name="dimension" v-model="LogoType" :value="'fh'">Full height</p-radio>
                        <p-radio name="dimension" v-model="LogoType" :value="'fw'">Full width</p-radio>
                    </div>

                    <button :class=" {txt_img_btn_img_before:btnBeforeImg, txt_img_btn_img_after:btnAfterImg} "
                            :data-inputid="dataInputID"
                            class="py-2 mb-md-0 px-md-5 txt-btn btn-right"
                            @click="showFilemanagerModal()"
                            type="button">
                        <i class="fas fa-image blueiconcolor fa-2x pt-1">
                        </i>
                        <div class="mt-n1 mb-n1">Image</div>
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
        name: "LogoModal",
        components: {
            NormalTextFilemanagerModal,
        },
        props: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                Path: null,
                LogoType: null,
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
                this.$emit('saveData', null, null, null, {
                    path: this.Path,
                    logotype: this.LogoType,
                });
                this.clearData();
            },
            cancel: function (event) {
                if(event.target.id === 'LogoModal' || event.target.id === 'CancelModal') {
                    this.clearData();
                }
            },
            clearData: function () {
                this.Path = null;
                this.LogoType = null;
            },
            showFilemanagerModal: function (){
                let element = this.$refs.filemanagerModal.$el;
                $(element).modal('show');

                // set callback
                this.$store.commit('fm/setFileCallBack', url => {
                    let fileName = url.substring(9);
                    let selectedDisk = this.$store.getters['fm/selectedDisk'];
                    this.Path = selectedDisk + '/' + fileName;
                    $(element).modal('hide');
                });
            },
        },
        computed: {

        },
    };
</script>
