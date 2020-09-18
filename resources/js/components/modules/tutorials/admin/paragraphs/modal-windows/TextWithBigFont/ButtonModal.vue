<template>
    <div class="modal fade" id="ButtonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content py-5">
                <div class="modal-body">
                    <div>
                        <label class="input-title" for="text">Text</label>
                        <input type="text" v-model="Text" class="form-control" id="text">
                    </div>

                    <div>
                        <label class="input-title" for="link">Link</label>
                        <input type="text" v-model="Link" class="form-control" id="link">
                    </div>

                    <div>
                        <p-radio name="dimension" v-model="ButtonType" :value="'coloured'">Coloured</p-radio>
                        <p-radio name="dimension" v-model="ButtonType" :value="'grey'">Grey</p-radio>
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
    export default {
        name: "ButtonModal",
        components: {

        },
        props: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                Index: null,
                Text: null,
                Link: null,
                ButtonType: null,
            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', null, null, {
                    index: this.Index,
                    myData: {
                        text: this.Text,
                        link: this.Link,
                        buttontype: this.ButtonType,
                    }
                });
                this.clearData();
            },
            cancel: function (event) {
                if(event.target.id === 'ButtonModal' || event.target.id === 'CancelModal') {
                    this.clearData();
                }
            },
            clearData: function () {
                this.Text = null;
                this.Link = null;
                this.ButtonType = null;
            },
        },
        computed: {

        },
    };
</script>
