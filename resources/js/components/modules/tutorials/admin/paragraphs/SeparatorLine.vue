<template>
    <div class="container head-right">
        <div class="row nav-text separate-grid">
            <div class="btn-all col-3 py-4 p-0 p-sm-3">
                <div class="col-lg-1 btn-hd pull-left">
                    <button type="button" class="btn-small draggable ml-1 mt-2"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fas fa-arrows-alt-v fa-xs icon-sm"></i>
                    </button>
                </div>
            </div>
                <div class="py-4 col-6">
                    <input type="hidden" name="simple_line_modal" v-model="SimpleLineModal"
                           v-bind:class=" { modalline:modalLine } ">
                    <div class="text-center"  @click="showLineModal()">
                        <button  class="line-btn text-button px-sm-5 px-3 pt-1" type="button">
                            <i class="fas fa-cog blueiconcolor fa-2x">
                            </i>
                            <p class="head-tutorial">Setting</p>
                        </button>
                    </div>
                </div>

            <div class="col-3 py-4 p-0 p-sm-3">
                <form class="pull-right mt-2 mr-2">
                    <button type="button" class="btn-small"
                            @click="callParentDuplicateParagraphBlock()">
                        <i class="far fa-copy fa-xs icon-sm"></i>
                    </button>

                    <button type="button" class="btn-small ml-1"
                            @click="callParentDeleteParagraphBlock()">
                        <i class="fas fa-trash-alt fa-xs icon-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        <lineModal ref="modal" v-on:saveData="saveData" :header="SimpleLineModal"></lineModal>
    </div>
</template>

<script>
    import LineModal from './modal-windows/Separator/LineModal'

    export default {
        name: "SeparatorLine",
        components: {
            LineModal,
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => ({
                    simpleLineModal: '',
                }),
            },
        },
        created() {
            if(this.SimpleLineModal !== "" ){
                this.modalLine = true;
            }
        },
        mounted() {

        },
        data() {
            return {
                modalLine: false,
                SimpleLineModal: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showLineModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (header) {
                this.$emit('saveData', {
                    index: this.index,
                    myData: {
                        header: header,
                    }
                });
                this.SimpleLineModal = header;
                this.modalLine = true;
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {

        },
    };

</script>

<style lang="scss">

.separate-grid:hover .line-btn {

}

.separate-grid:hover {
    background-color: rgba(0, 0, 0, 0.5);
}

.separate-grid {
    min-height: 110px;
    cursor: pointer;
}

 .modalline {
     border-top:1px solid #9EC1D4;
 }

</style>
