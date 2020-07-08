<template>
    <div class="container form-group paragraph-form-group">

        <layouts-panel v-on:addParagraphBlock="addParagraphBlock"></layouts-panel>
        <!-- Tutorial Name Block -->
        <div class="container group mt-5">
            <label class="tutorial-name" for="tutorial_name">Name</label>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <input class="input-hidden form-control" type="text" required placeholder="New Tutorial" name="tutorial_name"
                           id="tutorial_name">
                </div>
            </div>
        </div>
        <!-- Tutorial Name Block -->

        <!-- Default Page Block with PageBuilderParagraphBlocks -->
        <div class="container group py-5 mt-2">
            <h2 v-if="paragraphs.length == 0" class="empty-paragraphs-message py-5">Currently the Tutorial is still without content, modules can be
                selected above or a template can be loaded</h2>
            <draggable v-model="paragraphs" @start="drag=true" @end="drag=false" handle=".draggable">
                <div v-for="(paragraph, index) in paragraphs" class=".paragraph">
                    <component
                        v-on:childToParent="deleteParagraph(index)"
                        v-on:duplicateParagraph="duplicateParagraph(index)"
                        :index="index"
                        :key="index"
                        :is=paragraph.component
                    />
                </div>
            </draggable>
        </div>
        <!-- Default Page Block with PageBuilderParagraphBlocks -->

        <!-- Tutorial Background Image -->
        <div class="container group">
            <div class="panel-heading row">
                <div class="col-lg-11">
                    <div class="panel-title block-title">Background image for Tutorial Overview</div>
                </div>
                <div class="col-lg-1 pl-5 pl-2">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <question-dropdown :answerdropdown="'Currently the Tutorial is still without content, modules can ' +
                     'be selected above or a template\n'+
'                            can be loaded'"></question-dropdown>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="elfinder-container">
                    <input id="hintergrundbild-image" class="elfinder-idea" name="image" type="hidden"/>
                    <button data-inputid="hintergrundbild-image" class="popup_selector btn btn-default">
                        Select Wallpaper
                    </button>
                </div>
            </div>
        </div>
        <!-- Tutorial Background Image -->

        <!-- Parent Topic, Categories and Visibility Blocks -->
        <div class="row mb-5 pb-5">
            <!-- Parent Topic Column -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-lg-11">
                            <div class="panel-title block-title">Parent Topic</div>
                        </div>
                        <div class="col-lg-1">
                            <question-dropdown
                                :answerdropdown="'Choose a Tutorial that acts as a parent Tutorial'"></question-dropdown>
                        </div>
                    </div>
                </div>

                <div class="panel-body block-title">
                    <div class="form-group">
                        <select class="form-control" id="parent_topic" name="parent_id">
                            <option value="0">No Parent Tutorial</option>
                            <option value="5">Welcome to Verovis!</option>
                            <option value="10">What makes us successful</option>
                            <option value="11">Our Vision</option>
                            <option value="12">Onboarding for advisers</option>
                            <option value="13">How was Verovis founded</option>
                            <option value="14">Our Strategy</option>
                            <option value="15">verovis DNA</option>
                            <option value="16">Strategy, Values, #Project To A Successful Creators</option>
                            <option value="17">Excellence Concept</option>
                            <option value="22">New Tutorial</option>
                        </select>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- Parent Topic Column -->

            <!-- Categories Column -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-lg-11">
                            <div class="panel-title block-title">Categories</div>
                        </div>
                        <div class="col-lg-1">
                            <question-dropdown
                                :answerdropdown="'Choose a Tutorial that acts as a parent Tutorial'"></question-dropdown>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <select class="form-control block-title" id="hierarchy-select" name="parent_id">
                            <option value="0">Companies</option>
                            <option value="5">Strategic value # successful creators</option>
                            <option value="10">Superiority</option>
                        </select>
                        <hr>
                    </div>
                </div>
            </div>

            <!-- Categories Column -->
            <!-- Employees Assign -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-lg-11">
                            <div class="panel-title block-title"><span data-toggle="collapse"
                                                                       data-target="#collapse-staff">Employees assign</span><span
                                data-toggle="collapse" class="pull-right staff-toggler"
                                data-target="#collapse-staff"></span></div>
                        </div>
                        <div class="col-lg-1">
                            <question-dropdown
                                :answerdropdown="'Make the Tutorial visible to all or only selected employees'"></question-dropdown>
                        </div>
                    </div>

                    <div class="form-control">
                        <label for="visible_for_all">
                            <input class="panel-title block-title" checked type="checkbox" name="visible_for_all"
                                   id="visible_for_all">
                            Make visible to all employees
                        </label>
                    </div>
                    <div class="panel-body collapse" id="collapse-staff">
                        <div class="form-group block-title">
                            <table class="table">
                                <thead>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th><span class="pull-right block-title">Assign</span></th>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Andreas Ramelsberger</td>
                                    <td>ar@spreadfilms.de</td>
                                    <td><span class="label label-danger block-title">Not assigned</span></td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <label class="btn btn-sm btn-default"><input type="hidden" value="0"
                                                                                         name="attendees[67]"><input
                                                type="checkbox" value="1" name="attendees[67]"> </label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Employees Assign -->

            <!-- Trainees Assign -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading row">
                        <div class="col-lg-11">
                            <div class="panel-title block-title"><span data-toggle="collapse"
                                                                       data-target="#collapse-praktikanten">Probationers assign</span><span
                                data-toggle="collapse" class="pull-right staff-toggler"
                                data-target="#collapse-praktikanten"></span></div>
                        </div>
                        <div class="col-lg-1">
                            <question-dropdown
                                :answerdropdown="'Make the Tutorial visible to either all or only selected probationers'"></question-dropdown>
                        </div>
                    </div>
                    <div class="form-control block-title">
                        <label for="visible_for_trainees">
                            <input checked type="checkbox" name="visible_for_trainees" id="visible_for_trainees">
                            Make it visible to all probationers
                        </label>
                    </div>
                    <div class="panel-body collapse block-title" id="collapse-praktikanten">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th><span class="pull-right">Assign</span></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Christoph Manys</td>
                                    <td>cmanys@verovis.de</td>
                                    <td><span class="label label-danger">Not assigned</span></td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <label class="btn btn-sm btn-default"><input type="hidden" value="0"
                                                                                         name="attendees[23]"><input
                                                type="checkbox" value="1" name="attendees[23]"> </label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trainees Assign -->
        </div>
        <!-- Parent Topic and Categories Block -->
        <save-cancel-block></save-cancel-block>
    </div>
</template>

<script>
    import NormalText from './paragraphs/NormalText'
    import Video from './paragraphs/Video'
    import TextImg from './paragraphs/TextImg'
    import SliderAdd from './paragraphs/SliderAdd'
    import BackgroundVideo from './paragraphs/BackgroundVideo'
    import SimpleHead from './paragraphs/SimpleHead'
    import draggable from 'vuedraggable'
    import Quote from './paragraphs/Quote'
    import ImgHeadText from './paragraphs/ImgHeadText'
    import LgHeadText from './paragraphs/LgHeadText'
    import TextLogo from './paragraphs/TextLogo'
    import TextImgHigh from './paragraphs/TextImgHigh'

    export default {
        props: [],
        data() {
            return {
                paragraphs: []
            };
        },
        created() {

        },
        methods: {
            addParagraphBlock (paragraphName) {
                switch (paragraphName) {
                    case 'normalText':
                        this.paragraphs.push({component: NormalText});
                        break;
                    case 'video':
                        this.paragraphs.push({component: Video});
                        break;
                    case 'textImg':
                        this.paragraphs.push({component: TextImg});
                        break;
                    case 'slider':
                        this.paragraphs.push({component: SliderAdd});
                        break;
                    case 'bgVideo':
                        this.paragraphs.push({component: BackgroundVideo});
                        break;
                    case 'simpleHead':
                        this.paragraphs.push({component: SimpleHead});
                        break;
                    case 'quote':
                        this.paragraphs.push({component: Quote});
                        break;
                    case 'spImgText':
                        this.paragraphs.push({component: ImgHeadText});
                        break;
                    case 'lgHeadText':
                        this.paragraphs.push({component: LgHeadText});
                        break;
                    case 'logoText':
                        this.paragraphs.push({component: TextLogo});
                        break;
                    case 'highText':
                        this.paragraphs.push({component: TextImgHigh});
                        break;
                    default:
                        return;
                }
            },
            deleteParagraph (index) {
                this.paragraphs.splice(index, 1);
            },
            duplicateParagraph (index) {
                this.paragraphs.push(this.paragraphs[index]);
            }
        },
        mounted() {

        },
        components: {
            NormalText,
            Video,
            TextImg,
            SliderAdd,
            draggable,
            BackgroundVideo,
            SimpleHead,
            Quote,
            ImgHeadText,
            LgHeadText,
            TextLogo,
            TextImgHigh
        }
    };

</script>

<style>

    .paragraph-form-group {
        margin-block-end: 0 !important;
        bottom: 0 !important;
        margin: 0 auto !important;
        margin-bottom: 0 !important;
    }


    .form-control,
    .form-control:focus,
    .form-control:hover {
        font-size: 14px;
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        color: #777777;
        border: 0;
        padding: 0 15px;
    }

    .input-hidden {
        font-size: 15px;
        color: #777777;
        padding: 10px 10px 10px 5px;
        display: block;
        width: 300px;
        border: none;
        border-bottom: 1px solid #757575;
    }

    .input-hidden:focus {
        outline: none;
    }

    .panel-title {
        font-size: 18px;
    }

    .panel {
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }


    div.admin-description {
        float: right;
        position: absolute;
        margin-bottom: 5px;
        opacity: 0.5;
        cursor: help;
        top: 5px;
        right: 5px;
    }

    .elfinder-container {
        position: relative;
        border: 2px dashed #ddd;
        border-top-color: rgb(221, 221, 221);
        border-top-style: dashed;
        border-top-width: 2px;
        border-right-color: rgb(221, 221, 221);
        border-right-style: dashed;
        border-right-width: 2px;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-style: dashed;
        border-bottom-width: 2px;
        border-left-color: rgb(221, 221, 221);
        border-left-style: dashed;
        border-left-width: 2px;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        background: #f1f1f1;
        border-radius: 7px;
        text-align: center;
        padding: 20px;
    }

    *, ::after, ::before {
        box-sizing: border-box;
    }

    user agent stylesheet
    div {
        display: block;
    }

    .panel-heading {

        padding: 10px 15px;
        background: #FFFFFF;
        border-radius: 0;
        border: 0;
        position: relative;
    }

    .panel-title {
        font-size: 18px;
        font-weight: bold;
    }

    .empty-paragraphs-message {
        padding: 50px 20px;
        background: repeating-linear-gradient(45deg, #efefef, #efefef 10px, #fefefe 10px, #fefefe 20px);
        border-radius: 3px;
    }

    .inner-menu {
        background: #ECECEC;
        text-align: left;
        border: solid 1px #aaa;
        border-top: none;
    }

    .layouts {
        font-size: 0.85em;
        padding: 5px 15px 5px 20px;
        display: inline-block;
        vertical-align: bottom;
        margin-bottom: 12px;
        border-radius: 3px;
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
    }

    .float-e-margins .btn {
        margin-bottom: 5px;
    }

    .btn-blue {
        color: white;
        border: none;
        display: inline-block;
        font-weight: 400;
        text-transform: uppercase;
    }

    .btn-tutorial {
        background: #d5d5d5;
        border: 6px solid white;
        border-radius: 3px;
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

    .btn-icon {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        top: 20px;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }

    .blueiconcolor {
        color: #00bff9 !important;
    }

    .tutorial-name {
        font-size: 16px;
        color: #424242;
    }

    .empty-paragraphs-message {
        font-size: 32px;
        color: #424242;
        font-weight: normal;
        padding: 10px 40px;
    }

    .block-title {
        color: #424242;
    }

</style>
