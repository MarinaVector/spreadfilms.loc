<template>
    <div class="container form-group paragraph-form-group">

        <!-- Tutorial Name Block -->
        <div class="container group">
            <label for="tutorial_name">Name</label>
            <input class="input-hidden" type="text" required placeholder="New Tutorial" name="tutorial_name" id="tutorial_name">
        </div>
        <!-- Tutorial Name Block -->

        <!-- Default Page Block with PageBuilderParagraphBlocks -->
        <div class="container group">
            <h2 class="empty-paragraphs-message">Currently the Tutorial is still without content, modules can be
                selected above or a template can be loaded</h2>
            <!-- PageBuilderParagraphBlocks must be HERE
                <div class="card p-2">
                    <div class="container">
                        <div class="row block-tutorial block-text">
                            <div class="mt-4 ml-4">
                                <button type="button" class="btn-icon"><i class="fa fa-arrows-v pt-2"></i></button>
                            </div>
                            <div class="mt-5">
                                <div class="mt-5">
                                    <i class="fa fa-bars blueiconcolor fa-5x mt-5">
                                    </i>
                                    <p class="mt-n3 ml-text">Text</p>
                                </div>
                            </div>
                            <div class="mt-4 mr-4">
                                <button type="button" class="btn-icon mb-5"><i class="fa fa-trash-o pt-2"></i></button>
                                <br>
                                <button type="button" class="btn-icon mt-5 mb-4"><i class="fa fa-files-o pt-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            -->
        </div>
        <!-- Default Page Block with PageBuilderParagraphBlocks -->

        <!-- Tutorial Background Image -->
        <div class="container group">
            <div class="panel-heading">
                <div class="panel-title">Background image for Tutorial Overview</div>
                <div class="i-have-a-tooltip" data-description="Currently the Tutorial is still without content, modules can be selected above or a template
                            can be loaded">
                    <div class="admin-description"></div>
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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Parent Topic</div>
                        <div class="i-have-a-tooltip"
                             data-description="Choose a Tutorial that acts as a parent Tutorial.">
                            <div class="admin-description"></div>
                        </div>
                    </div>

                    <div class="panel-body">
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
            </div>
            <!-- Parent Topic Column -->

            <!-- Categories Column -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Categories</div>
                        <div class="i-have-a-tooltip"
                             data-description="Choose a Tutorial that acts as a parent Tutorial.">
                            <div class="admin-description"></div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">

                            <select class="form-control" id="hierarchy-select" name="parent_id">
                                <option value="0">Companies</option>
                                <option value="5">Strategic value # successful creators</option>
                                <option value="10">Superiority</option>

                            </select>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Categories Column -->

            <!-- Employees Assign -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><span data-toggle="collapse" data-target="#collapse-staff">Employees assign</span><span
                            data-toggle="collapse" class="pull-right staff-toggler"
                            data-target="#collapse-staff"></span></div>

                        <div class="i-have-a-tooltip"
                             data-description="Make the Tutorial visible to all or only selected employees">
                            <div class="admin-description"></div>
                        </div>
                    </div>

                    <div class="form-control">
                        <label for="visible_for_all">
                            <input checked type="checkbox" name="visible_for_all" id="visible_for_all">
                            Make visible to all employees
                        </label>
                    </div>
                    <div class="panel-body collapse" id="collapse-staff">
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
                                    <td>Andreas Ramelsberger</td>
                                    <td>ar@spreadfilms.de</td>
                                    <td><span class="label label-danger">Not assigned</span></td>
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
                    <div class="panel-heading">
                        <div class="panel-title"><span data-toggle="collapse" data-target="#collapse-praktikanten">Probationers assign</span><span
                            data-toggle="collapse" class="pull-right staff-toggler"
                            data-target="#collapse-praktikanten"></span></div>

                        <div class="i-have-a-tooltip"
                             data-description="Make the Tutorial visible to either all or only selected probationers">
                            <div class="admin-description"></div>

                        </div>

                    </div>
                    <div class="form-control">
                        <label for="visible_for_trainees">
                            <input checked type="checkbox" name="visible_for_trainees" id="visible_for_trainees">
                            Make it visible to all probationers
                        </label>
                    </div>
                    <div class="panel-body collapse" id="collapse-praktikanten">
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
    export default {
        props: [

        ],
        data() {
            return {

            };
        },
        created() {

        },
        methods: {

        },
        mounted() {

        },
        components: {

        }
    };

</script>

<style>
    .form-control, .form-control:focus {
        font-size: 14px;
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        color: #777777;
        border: 0;
        padding: 0 15px;
    }

    .input-hidden {
        font-size: 18px;
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

    div.admin-description:before {
        content: "\f128";
        font-family: "Font Awesome 5 Pro";
        width: 25px;
        height: 25px;
        line-height: 25px;
        text-align: center;
        font-size: 1em;
        border: solid 1px #333;
        border-radius: 100%;
        display: block;
        font-weight: bold;
    }

    .admin-description {
        float: right;
        position: absolute;
        margin-bottom: 5px;
        opacity: 0.5;
        cursor: help;
        top: 5px;
        right: 5px;

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

    .admin-description {
        float: right;
        position: absolute;
        margin-bottom: 5px;
        opacity: 0.5;
        cursor: help;
        top: 5px;
        right: 5px;
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
        margin-right: 20px;
        margin-left: 20px;
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
        color: #26d7d9;
        background: #d5d5d5;
        border: 6px solid white;
        border-radius: 3px;

    }

    .i-have-a-tooltip:before {
        content: attr(data-description);
        box-sizing: border-box;
        display: block;
        background: white;
        border: 1px solid black;
        color: grey;
        padding: 5px;
        position: absolute;
        left: 90%;
        top: -30px;
        margin-left: -100px;
        width: 200px;
        height: auto;
        line-height: 15px;
        border-radius: 2px;
        opacity: 0;
        transition: .25s ease-in-out;
    }

    .i-have-a-tooltip:hover:before {
        opacity: 1;
        top: 32px;
        z-index: 1;
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
</style>
