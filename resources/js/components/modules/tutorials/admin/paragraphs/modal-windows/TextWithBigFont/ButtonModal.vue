<template>
    <div class="modal fade part" id="ButtonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="py-3">
                <div class="modal-body ">
                    <div class="part edit-content">
                        <div class="">
                            <label class="input-title"><i class="fas fa-font mr-1"></i>Text</label>
                            <input type="text" class="btnmodal-form form-control" id="text">
                        </div>

                        <div>
                            <label class="input-title"><i class="fas fa-link mr-1"></i>Link</label>
                            <input type="text" class="btnmodal-form form-control" id="link">
                        </div>
                    </div>

                    <div class="part edit-content">
                         <div>
                        <label class="input-title"><i class="fas fa-desktop mr-1"></i>Button Type</label>
                        </div>
                        <p-radio name="dimension" v-model="color" :value="'coloured'">Coloured</p-radio>
                        <p-radio name="dimension" v-model="color" :value="'grey'">Grey</p-radio>
                    </div>
                </div>
            </div>

            <div class="modal-footer1 ml-5">
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
    export default {
        name: "ButtonModal",
        components: {

        },
        props: [

        ],
        created() {

        },
        mounted() {

        },
        data() {
            return {
                color: null,
            };
        },
        methods: {
            save: function () {
                this.$emit('saveButton')
            },
            cancel: function (event) {
                if(event.target.id === 'ButtonModal' || event.target.id === 'CancelModal') {

                }
            }
        },
        computed: {

        },
    };
</script>

<style>
    .input-title {
        margin-bottom: 10px;
        display: inline-block;
        border-bottom: solid 1px;
        font-size: 0.8em;
    }

    .btnmodal-form, .btnmodal-form:focus {
        font-size: 14px;
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,0.1);
        color: #777777;
        border: 1px solid #ced4da !important;
        padding: 0 15px;
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        line-height: 1.5;
        background-clip: padding-box;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .part {
        padding: 15px;
        margin-bottom: 15px;
    }

    .edit-content {
        max-height: 80vh;
        overflow: auto;
    }

</style>
