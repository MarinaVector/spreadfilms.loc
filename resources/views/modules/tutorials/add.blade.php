@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')

    <div class="container bg-add">
        @include('layouts.notifications')
        This page must be like <a href="https://verovis.spreadfilms.space/tools/tutorial/create" target="_blank">https://verovis.spreadfilms.space/tools/tutorial/create</a>

        <div class="container inner-menu mt-3 pt-1">
            <div class="mt-3 mb-3">
                <a href="#">
                    <button type="button" class="btn-blue layouts">
                        Laouts filters<i class="fas fa-filter ml-1"></i>
                    </button>
                </a>

                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle new-text" type="button"><i
                        class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                        class="fa fa fa-align-left fa-3x pt-2 button-doc"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-sliders fa-3x pt-2"></i>
                </button>

                <a href="#" onclick="view('hidden1'); return false">
                    <button type="button" class="btn-blue button-arrow layouts">
                        Show all<i class="fas fa-arrow-down ml-1"></i>
                    </button>
                </a>

            </div>

            <div id="hidden1" style="display: none;">
                <p class="">Text</p>
                <hr class="mr-5">
                <div class="">
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-header fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-align-left fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-align-center fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-text-height fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-address-card-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                    </button>
                </div>
                <p class="">Video</p>
                <hr class="mr-5">
                <div class="">
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-file-video-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-file-video-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-file-video-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-file-video-o fa-3x pt-2"></i>
                    </button>
                </div>

                <p class="">Image</p>
                <hr class="mr-5">
                <div class="">
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-picture-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-slideshare fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-toggle-on fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-grav fa-3x pt-2"></i>
                    </button>
                </div>

                <p class="">Other</p>
                <hr class="mr-5">
                <div class="mb-2">
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-arrows-v fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-envelope-o fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                            class="fa fa-puzzle-piece fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-question fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial" type="button"><i class="fa fa-quote-left fa-3x pt-2"></i>
                    </button>
                    <button class="mr-2 btn-tutorial" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                    </button>
                </div>
            </div>
        </div>


        <form>

            <div class="container group">
                <label for="name">Name</label>
                <input class="input-hidden" type="text" required value="New Tutorial">
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>


        </form>


        <div class="container form-group paragraph-form-group">

            <input type="hidden" name="ideas">


            <div class="panel panel-default">

                <h2 class="empty-paragraphs-message">Currently the Tutorial is still without content, modules can be
                    selected above or a template can be loaded</h2>

                <div class="panel-heading">
                    <div class="panel-title">Background image for Tutorial Overview</div>
                    <div class="i-have-a-tooltip" data-description="Currently the Tutorial is still without content, modules can be selected above or a template
                            can be loaded">
                        <div class="admin-description"></div>
                    </div>
                </div>

                <div class="form-group">
                    <img class="">
                    <div class="elfinder-container">
                        <input id="hintergrundbild-image" class="elfinder-idea" name="image" type="hidden"/>
                        <button data-inputid="hintergrundbild-image" class="popup_selector btn btn-default">
                            Select Wallpaper
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mb-5 pb-5">
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

                                <select class="form-control" id="hierarchy-select" name="parent_id">
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
                            <label for="forall">
                                <input checked type="checkbox" name="forall">
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
                            <label for="forall_trainees">
                                <input checked type="checkbox" name="forall_trainees">
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
                <div class="col-12 block-tutorial block">
                    <div class="alert text-tutorial">
                        <button type="button" class="close ml-3" data-dismiss="alert" aria-hidden="true"><i
                                class="fa fa-trash-o blueiconcolor" aria-hidden="true"></i></button>
                        <div class="default">
                            <div class="inner-trigger">
                                <i class="fa fa-bars blueiconcolor fa-5x">
                                </i>
                                <p class="ml-4 pl-2">Text</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <style>

        .default {
            margin: 0 auto;
            margin-left: 50%;
        }

        .text-tutorial {
            pointer-events: all;
            position: absolute;
            top: 50%;
            cursor: pointer;
            left: 50%;
            transform: translate3d(-50%, -50%, 0);
            transition: opacity .3s ease, background-color .5s ease;
            width: 100%;
            height: 100%;
            background-color: transparent;


        }


        .block-tutorial {
            display: none;
            width: 100%;
            position: absolute;
            top: 0;
            pointer-events: none;
            border: dotted 1px #333;
        }

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

        .taggle_placeholder {

            position: absolute;
            color: #ccc;
            top: 12px;
            left: 8px;
            transition: opacity, .25s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #data-categories {
            position: relative;
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

        .hierarchy-select {

        }

        .panel-heading {

        }

        .panel-default {

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

        .label-danger {

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

        body.route-offer-show, body.route-offer-edit, body.route-offer-edit-hash, body.route-offer-create, body.route-tutorial-meta, body.route-tutorial-show, body.route-tutorial-edit, body.route-tutorial-create {
            background-color: #fff;
            font-family: 'Didact Gothic', sans-serif;

        }

        .form-group {

        }


        .paragraph-form-group {

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


        . dmin-description {

        }

        .text {

        }


        .empty-paragraphs-message {
            padding: 50px 20px;
            background: repeating-linear-gradient(45deg, #efefef, #efefef 10px, #fefefe 10px, #fefefe 20px);
            border-radius: 3px;
        }

        .bg-add {
            background-color: white;
            color: #424242;
            height: 100%;
            width: 100%;
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


        .blueiconcolor {
            color: #00bff9 !important;
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

    </style>

    <script>

        function view(n) {
            style = document.getElementById(n).style;
            style.display = (style.display == 'block') ? 'none' : 'block';
        }

        function changeText() {
            return document.querySelector(".button-arrow").innerHTML = "New text";
        }

        document.addEventListener("click", changeText);
        // document.addEventListener("click", change2);

        // document.querySelector(".button-doc").onclick = function () {
        //    let r = document.querySelector("div").classList.toggle("move");

        //  }

        let btn = document.querySelector(".button-doc");
        btn.onclick = function () {
            let element = document.querySelector(".block");
            if (element.classList.contains("show-block")) {
                element.classList.remove("show-block");
            } else {
                element.classList.add("show-block");
            }
        }


    </script>


@endsection
