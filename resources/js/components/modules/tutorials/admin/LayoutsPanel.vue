<template>
    <div class="container inner-menu top-menu pt-1 mb-5">
        <div class="row mt-3 ml-2">
            <div class="col-lg-3 col-12 mb-3 ml-lg-1">
                <button v-cloak v-on:click.stop="toggleTooltip" type="button" class="btn-blue  btn-fltr px-2 mb-1 pb-1 ml-lg-4">
                    <span class="filter-content"  v-if="text_content">{{text_content}}
                   </span>
                    <div class="tool ml-2 mb-1 filter-content" v-on:click.stop v-if="show_input">
                        <input type="text" class="btn-inp"/>
                    </div>
                </button>
            </div>

            <!-- Quick Layouts Bar -->
            <div class="col-lg-2 col-5 ml-n1 ml-lg-0 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video"
                        @click="callParentAddParagraphBlock('Video')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout new-text p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video with Background"
                        @click="callParentAddParagraphBlock('bgVideo')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
            </div>
            <div class="col-lg-2 col-5 ml-n4 ml-lg-0 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Normal Text"
                        @click="callParentAddParagraphBlock('NormalText')">
                    <i class="fa fa fa-align-left fa-3x pt-2 button-doc"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and Image"
                        @click="callParentAddParagraphBlock('TextImg')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 col-2 ml-n4 ml-lg-0 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image slider"
                        @click="callParentAddParagraphBlock('ImageSlider')">
                    <i class="fa fa-slideshare fa-3x pt-2"></i>
                </button>
            </div>
            <!-- Quick Layouts Bar -->

            <div class="col-lg-3 col-12 mb-3 btn-layout">
                <a href="#" @click="switchLayoutsPanel()">
                    <button type="button" ref="layoutsButton"
                            class="btn-blue button-arrow layouts py-2 ml-4 mr-3">
                        Show all<i class="fas fa-arrow-down ml-1"></i>
                    </button>
                </a>
                <dropdown-button></dropdown-button>
            </div>
        </div>

        <div id="layoutsPanel" ref="layoutsPanel" :style="{ display: 'none' }">
            <p class="head-group font-weight-bold mb-0">Text</p>
            <hr class="mr-5 mt-0">

            <!-- Text Layouts Bar -->
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Headline"
                        @click="callParentAddParagraphBlock('Headline')">
                    <i class="fa fa-header fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Normal Text"
                        @click="callParentAddParagraphBlock('NormalText')">
                    <i class="fa fa-align-left fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Center Text"
                        @click="callParentAddParagraphBlock('CenterText')">
                    <i class="fa fa-align-center fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text with Big Font"
                        @click="callParentAddParagraphBlock('TextWithBigFont')">
                    <i class="fa fa-address-card-o fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text with Logo"
                        @click="callParentAddParagraphBlock('TextWithLogo')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and Image"
                        @click="callParentAddParagraphBlock('TextImg')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and Special Image"
                        @click="callParentAddParagraphBlock('TxtSpecialImg')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and High Image"
                        @click="callParentAddParagraphBlock('TextWithHighImage')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
            </div>
            <!-- Text Layouts Bar -->

            <p class="head-group font-weight-bold mb-0">Video</p>
            <hr class="mr-5 mt-0">

            <!-- Video Layouts Bar -->
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video"
                        @click="callParentAddParagraphBlock('Video')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout new-text p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video with Background"
                        @click="callParentAddParagraphBlock('bgVideo')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video with Text"
                        @click="callParentAddParagraphBlock('VideoWithText')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video-Slider"
                        @click="callParentAddParagraphBlock('VideoSlider')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
            </div>
            <!-- Video Layouts Bar -->

            <p class="head-group font-weight-bold mb-0">Image</p>
            <hr class="mr-5 mt-0">

            <!-- Image Layouts Bar -->
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image"
                        @click="callParentAddParagraphBlock('Image')">
                    <i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image slider"
                        @click="callParentAddParagraphBlock('ImageSlider')">
                    <i class="fa fa-slideshare fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image switch"
                        @click="callParentAddParagraphBlock('ImageSwitch')">
                    <i class="fa fa-toggle-on fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Icons"
                        @click="callParentAddParagraphBlock('Icons')">
                    <i class="fa fa-grav fa-3x pt-2"></i>
                </button>
            </div>
            <!-- Image Layouts Bar -->

            <p class="head-group font-weight-bold mb-0">Other</p>
            <hr class="mr-5 mt-0">

            <!-- Other Layouts Bar -->
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Separator Line"
                        @click="callParentAddParagraphBlock('SeparatorLine')">
                    <i class="fa fa-arrows-v fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Contact person"
                        @click="callParentAddParagraphBlock('ContactPerson')">
                    <i class="fa fa-envelope-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Multiple Choice"
                        @click="callParentAddParagraphBlock('MultipleChoice')">
                    <i class="fa fa-puzzle-piece fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="FAQs"
                        @click="callParentAddParagraphBlock('FAQs')">
                    <i class="fa fa-question fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle new-text"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Quote"
                        @click="callParentAddParagraphBlock('Quote')">
                    <i class="fa fa-quote-left fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Header"
                        @click="callParentAddParagraphBlock('Header')">
                    <i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn"
                        type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Footer"
                        @click="callParentAddParagraphBlock('Footer')">
                    <i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
            </div>
            <!-- Other Layouts Bar -->

        </div>
        <div class="toggle-collapse"></div>
    </div>
</template>

<script>
    export default {
        name: "LayoutsPanel",
        props: [],
        data() {
            return {
                show_input: false,
                text_content: 'Layouts filters'
            };
        },
        created() {

        },
        methods: {
            switchLayoutsPanel: function () {
                this.$refs.layoutsPanel.style.display = (this.$refs.layoutsPanel.style.display === 'none') ? 'block' : 'none';
                this.$refs.layoutsButton.innerHTML = (this.$refs.layoutsPanel.style.display === 'none') ? 'Show all<i class="fas fa-arrow-down ml-1"></i>' : 'Hide<i class="fas fa-arrow-up ml-1"></i>';
            },
            callParentAddParagraphBlock: function (blockType) {
                this.$emit('addParagraphBlock', blockType);
            },

            hideTooltip: function(){
               // this.show_tooltip = true;
               // this.text_content = false;
                //this.text_content = false;
                //this.text_content = !this.text_content;
            },
            toggleTooltip: function(){
                this.show_input = !this.show_input;
                if (!this.show_input) {
                    this.text_content = 'Layouts filters';
                }
                else {
                    this.text_content = false;
                }
            }
        },
        mounted() {
            $('.tooltip-btn').tooltip();
        },
        computed: {
            computedLayoutsDisplay: function () {
                return this.layoutsDisplay;
            }
        }
    };
</script>

<style>

    .inner-menu {
        background: #ECECEC;
        text-align: left;
        border: solid 1px #aaa;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    .top-menu {
        border-top: none;
        z-index: 50;
        position: absolute;
    }

    .btn-blue {
        color: white;
        border: none;
        display: inline-block;
        font-weight: 400;
        text-transform: uppercase;
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
    }

    .btn-tutorial {
        background: #d5d5d5;
        border: 6px solid white;
        border-radius: 3px;
        width: 82px;
    }

    .block-text {
        display: flex;
        justify-content: space-between;
    }

    .ml-text {
        margin-left: 35px;
    }

    .block-tutorial {
        width: 100%;
        position: absolute;
        top: 0;
        pointer-events: none;
        border: dotted 1px #333;
    }

    .head-group {
        text-transform: uppercase;
        color: #424242;
        font-family: 'Didact Gothic', sans-serif;
    }

    [v-cloak] {
        display: none;
    }

    .tool input {
        border: none;
        line-height: 24px;
        text-align: left;
        font-size: 12px;
        font-family: inherit;
        outline: none;
        width: 150px;
        height: 27px;
        display:inline-block;
    }

    .filter-content {
        cursor:default;
    }

    .filter-content:after {
        font-family: FontAwesome;
        content:'\f0b0';
        font-size: 22px;
        display:inline-block;
        margin-left:5px;
        font-weight:normal;
        color: white;
    }

    .btn-fltr {
      white-space: nowrap;
        vertical-align: bottom;
        border-radius: 3px;
        width: 200px;
        height: 46px;
        display:inline-block;
    }

    .button-arrow {
        width: 110px;
        height: 35px;
        display:inline-block;
    }

    .btn-layout {
        margin-left: 0;
        margin-right: 0;
        padding-left: 0;
        padding-right:0;
    }

    @media only screen and (max-width: 576px) {
        .btn-tutorial {
            border: 2px solid white;
            width: 46px;
        }

           }

    .toggle-collapse:before {
        content: "\f341";
        font-family: "Font Awesome 5 Pro";
        color: #fff;
        line-height: 50px;
        font-size: 1.2em;
    }

    .toggle-collapse {
        width: 50px;
        height: 50px;
        position: absolute;
        right: 20px;
        text-align: center;
        background: #bbb;
        cursor: pointer;
        border-radius: 0 0 3px 3px;
        bottom: 0;
        transform: translateY(100%);
    }


</style>

