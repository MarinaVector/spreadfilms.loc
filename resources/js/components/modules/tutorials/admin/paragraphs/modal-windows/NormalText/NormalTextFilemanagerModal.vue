<template>
    <div class="modal fade" id="NormalTextFilemanagerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" @click="cancel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content py-5">
                <file-manager></file-manager>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'NormalTextFilemanagerModal',
        props: [

        ],
        components: {

        },
        data() {
            return {

            };
        },
        methods: {
            save: function () {
                this.$emit('saveData', this.NormalTextHeader, this.NormalTextBody)
            },
            cancel: function (event) {
                if(event.target.id === 'NormalTextModal' || event.target.id === 'CancelModal') {
                    this.NormalTextHeader = this.$props.header;
                    this.NormalTextBody = this.$props.body;
                }
            },
        },
        created() {

        },
    };
</script>

<style>

    button.btn-modal {
        margin-right: 40px;
        box-shadow: 0 0px 20px 3px rgba(0, 0, 0, 0.2);
    }

    .modal-footer1{
        pointer-events: auto;
    }

    .close-modal {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    .modal-dialog {
        width: 100%;
        height: 70%;
        padding: 0;
    }

    .modal-content {
        height: 100%;
        border-radius: 0;
    }

</style>
