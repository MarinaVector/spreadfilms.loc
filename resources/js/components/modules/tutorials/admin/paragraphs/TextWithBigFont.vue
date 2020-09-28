<template>
    <div class="container video-grid">
        <input type="hidden" name="component_type" value="TextWithBigFont" class="component_type" />
        <input type="hidden" name="normal_text_header" v-model="NormalTextHeader" class="normal_text_header">
        <input type="hidden" name="normal_text_body" v-model="NormalTextBody" class="normal_text_body">
        <input type="hidden" name="normal_text_buttons" v-model="ButtonsJSON" class="twbfbuttons">
        <div class="row align-items-start tutorial-complex py-3">

            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>


            <div class="col-10 offset-1">
                <div class="row">
            <div class="col-lg-5 inner-trigger header-txt lg-head">
                <div class="tutorial-text py-2 mt-5" @click="showHeadlineModal()">
                    <button  v-bind:class=" {btnheadbefore:btnHeadBefore, btnheadafter:btnHeadAfter} " class="text-button bgfont-btn py-1 px-5 my-2 mx-auto" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">HeadLine</p>
                    </button>
                    <div v-bind:class=" {bigtext:headerText} " class="final-text text-justify h2 ml-3" v-html="NormalTextHeader"></div>
                </div>
            </div>

            <div class="col-lg-7 inner-trigger lg-head">
                <div class="row ml-1">
                    <div class="col-lg-12 tutorial-text content-txt position-relative" @click="showTextModal()">
                        <button v-bind:class=" {btntxtbefore:btnTxtBefore, btntxtafter:btnTxtAfter} " class="text-button bgfont-btn  bgfonttxt-btn py-1 px-5 mx-auto m-3" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="my-n1">Text</p>
                        </button>
                        <div class="text-justify" v-html="NormalTextBody"></div>
                    </div>
                    <div class="col-lg-9 tutorial-text my-2">
                        <div class="button-show set-button">
                            <div>
                                <div v-for="(button, index) in Buttons">
                                    <div class="text-button mx-5 px-n5">
                                    <button class="py-2 px-5 bgfont-btn text-button added-btn"
                                            type="button" @click="showAddButtonModal(index)">
                                        <i class="fas fa-bars blueiconcolor fa-2x">
                                        </i>
                                        <div class="mb-1">Button {{index}}</div>
                                    </button>
                                    <span @click="deleteButton(index)"><i class="fas fa-times mt-n5"></i></span>
                                </div>
                                </div>
                                <div class="text-button mx-5 px-n5">
                                <button class="py-2 px-5 text-button bgfont-btn" type="button" @click="showAddButtonModal()">
                                    <i class="fas fa-bars blueiconcolor fa-2x">
                                    </i>
                                    <div class="mb-n1">Add Button</div>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>


            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>

        </div>
        <HeadlineModal ref="headlinemodal" v-on:saveData="saveData" :header="NormalTextHeader"></HeadlineModal>
        <TextModal ref="textmodal" v-on:saveData="saveData" :body="NormalTextBody"></TextModal>
        <ButtonModal ref="buttonmodal" v-on:saveData="saveData"></ButtonModal>
    </div>
</template>

<script>
    import HeadlineModal from './modal-windows/TextWithBigFont/HeadlineModal'
    import TextModal from './modal-windows/TextWithBigFont/TextModal'
    import ButtonModal from './modal-windows/TextWithBigFont/ButtonModal'

    export default {
        name: "TextWithBigFont",
        components: {
            HeadlineModal,
            TextModal,
            ButtonModal,
        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {}
            },
        },
        created() {
            if(this.NormalTextHeader !== "" ){

                this.btnHeadAfter = true;
            }

            if( this.NormalTextBody !== ""){

                this.btnTxtAfter = true;
            }
        },
        mounted() {
            if(this.Buttons === ''){
                this.Buttons = [];
            } else {
                this.Buttons = JSON.parse(this.escapeHtml(this.Buttons));
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Buttons: this.mydata ? this.escapeHtml(this.$props.mydata.buttons) : [],
                ButtonsJSON: '',
                headerText: false,
                btnHeadBefore:true,
                btnHeadAfter:false,
                btnTxtAfter:false,
                btnTxtBefore:true,

            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
            showHeadlineModal: function () {
                let element = this.$refs.headlinemodal.$el;
                $(element).modal('show');
            },
            showTextModal: function () {
                let element = this.$refs.textmodal.$el;
                $(element).modal('show');
            },
            showAddButtonModal: function (index = null) {
                let element = this.$refs.buttonmodal.$el;
                $(element).modal('show');

                if(index !== null){
                    this.$refs.buttonmodal.Index = index;
                    this.$refs.buttonmodal.Text = this.Buttons[index].text;
                    this.$refs.buttonmodal.Link = this.Buttons[index].link;
                    this.$refs.buttonmodal.ButtonType = this.Buttons[index].buttontype;
                }
            },
            saveData: function (header = null, body = null, button = null) {
                if (header !== null){
                    this.NormalTextHeader = header;
                    this.bgHeadAfter = true;
                    this.btnHeadAfter = true;
                }

                if (body !== null){
                    this.NormalTextBody = body;
                    this.btnTxtAfter = true;
                }

                if (button !== null){
                    if(button.index === null){
                        this.Buttons.push({
                            text: button.myData.text,
                            link: button.myData.link,
                            buttontype: button.myData.buttontype,
                        });
                    } else {
                        this.Buttons[button.index].text = button.myData.text;
                        this.Buttons[button.index].link = button.myData.link;
                        this.Buttons[button.index].buttontype = button.myData.buttontype;
                    }

                    this.ButtonsJSON = JSON.stringify(this.Buttons);
                }

                this.$emit('saveParagraphData', {
                    index: this.index,
                    myData: {
                        header: this.NormalTextHeader,
                        text: this.NormalTextBody,
                        buttons: this.Buttons,
                    }
                });


               // this.headerText = true;


            },
            deleteButton: function (index) {
                this.Buttons.splice(index, 1);
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {

        },
    };

</script>

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .lg-head {
        position: relative;
        z-index: 1;
    }

    .button-show {
        z-index: 2;
    }

    .set-button {
        z-index: 2;
    }

    .fa-times {
    color:#f7022e;
    }

    . added-btn {
        border-bottom: 1px solid gray;
    }

    .bigtext:before {
        background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
        content: "";
        width: 60px;
        height: 4px;
        background: #333;
        position: absolute;
        left: 0;
        margin-left: 20px;
    }

    .bgfont-btn {
        width: 170px;
    }

    @media only screen and (max-width: 750px) {
        .bgfont-btn {
            width: 80px;
        }
    }

    .header-txt:hover .btnheadafter {
        display: block;
    }

    .content-txt:hover .btntxtafter {
        display: block;
    }


    .btnheadbefore,
    .btntxtbefore  {
        display: block;
    }

    .btnheadafter,
    .btntxtafter  {
        display: none;
    }

    .btntxtafter {
        position: absolute;
        left: 50%;
        top: -30px;
        margin-left: -85px !important;
    }

    .rightbtn-grid {
        display: grid;
        grid-template-rows: 50% 50%;
        grid-gap: initial;
    }


</style>

