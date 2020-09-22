<template>
    <div class="modal fade modal-dialog modal-dialog-centered" id="LineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="line-modal-content">
                <div class="modal-header">
                    <label class="input-title">
                        <i class="fas fa-align-left mr-2"></i>Line</label>
                </div>
                <div class="modal-body">
                    <div class="pretty p-switch p-fill mt-2"><input type="checkbox">
                        <div class="state">
                            <label>Aktive</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-btns mt-3 ml-5">
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
    import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

    export default {
        name: "LineModal",
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
                SimpleLineModal: this.$props.header ? this.$props.header : '<p></p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData')
            },
            cancel: function (event) {
                if(event.target.id === 'LineModal' || event.target.id === 'CancelModal') {


                }
            }
        },
        computed: {

        },
    };

</script>

<style scoped>

    .line-modal {
        position: fixed;
        z-index: 1050;
        display: none;
        height: 100%;
        overflow: hidden;
        outline: 0;
    }

    .line-modal-content {
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 6px;
        -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
        -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
        box-shadow: 0 0 40px rgba(0,0,0,.5);
        color: #000;
        background-color: #fff;
        border: rgba(0,0,0,0);
    }

</style>
