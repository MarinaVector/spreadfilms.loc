<template>
    <div class="container inner-menu top-menu pt-1 mb-5">
        <div class="row mt-3 ml-2">

                <div class="col-lg-3 col-12 mb-3 ml-1">
                <button v-cloak v-on:click.stop="toggleTooltip" type="button" class="btn-blue  btn-fltr px-2 mb-1 pb-1 ml-4"><span class="filter-content"  v-if="text_content">{{text_content}}
                       </span>
                        <div class="tool ml-2 mb-1 filter-content" v-on:click.stop v-if="show_input">
                            <input type="text" class="btn-inp"/>
                        </div>
                    </button>
                </div>
                <div class="col-lg-2 col-12 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video" @click="callParentAddParagraphBlock('video')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout new-text p-0" type="button"
                        data-toggle="tooltip"
                        data-placement="bottom" title="Video with Background"
                        @click="callParentAddParagraphBlock('bgVideo')">
                    <i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                </div>
                <div class="col-lg-2 col-12 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Normal Text" @click="callParentAddParagraphBlock('normalText')">
                    <i class="fa fa fa-align-left fa-3x pt-2 button-doc"></i>
                </button>


                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and Picture"
                        @click="callParentAddParagraphBlock('textImg')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
                </div>
                <div class="col-lg-1 col-12 mb-3 btn-layout">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle btn-layout p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Picture-Slider" @click="callParentAddParagraphBlock('slider')">
                    <i class="fa fa-sliders fa-3x pt-2"></i>
                </button>
                </div>
            <div class="col-lg-3 col-12 mb-3 btn-layout">
                <a href="#" @click="switchLayoutsPanel()">
                    <button type="button" class="btn-blue button-arrow layouts py-2 ml-4 mr-3" ref="layoutsButton">
                        Show all<i class="fas fa-arrow-down ml-1"></i>
                    </button>
                </a>
                <dropdown-button></dropdown-button>
                </div>
        </div>




        <div id="layoutsPanel" ref="layoutsPanel" :style="{ display: 'none' }">
            <p class="head-group font-weight-bold mb-0">Text</p>
            <hr class="mr-5 mt-0">
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Head" @click="callParentAddParagraphBlock('simpleHead')">
                    <i class="fa fa-header fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Normal Text"><i
                    class="fa fa-align-left fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Center Text"><i
                    class="fa fa-align-center fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text with large headline"><i
                    class="fa fa-address-card-o fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text with logo" @click="callParentAddParagraphBlock('logoText')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image-text" @click="callParentAddParagraphBlock('lgHeadText')">
                    <i class="fa fa-text-height fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image-text special" ><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>


                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and image high" @click="callParentAddParagraphBlock('spImgText')">
                    <i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>


                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Text and image high" @click="callParentAddParagraphBlock('highText')">
                    <i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
            </div>
            <p class="head-group font-weight-bold mb-0">Video</p>
            <hr class="mr-5 mt-0">
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video with background"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video with text"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Video slider"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
            </div>

            <p class="head-group font-weight-bold mb-0">Image</p>
            <hr class="mr-5 mt-0">
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image"><i
                    class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image slider"><i
                    class="fa fa-slideshare fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Image switch"><i
                    class="fa fa-toggle-on fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Icons"><i class="fa fa-grav fa-3x pt-2"></i>
                </button>
            </div>

            <p class="head-group font-weight-bold mb-0">Other</p>
            <hr class="mr-5 mt-0">
            <div class="mb-2">
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Distance"><i class="fa fa-arrows-v fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Contact person" @click="callParentAddParagraphBlock('contact')">
                    <i class="fa fa-envelope-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Multiple choice"><i
                    class="fa fa-puzzle-piece fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle p-0" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="FAQs" @click="callParentAddParagraphBlock('question')">
                    <i class="fa fa-question fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn btn-circle new-text" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Citation"
                        @click="callParentAddParagraphBlock('quote')">
                    <i class="fa fa-quote-left fa-3x pt-2"></i>
                </button>

                <button class="mr-2 btn-tutorial tooltip-btn" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Header"><i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial tooltip-btn" type="button" data-toggle="tooltip"
                        data-placement="bottom" title="Footer"><i class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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

</style>

