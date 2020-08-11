@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container-fluid h-100">
    <div class="container-fluid">
        @include('layouts.notifications')
        <div>
                            <div class="row h-100">
                    <div class="col-xl-10 offset-xl-1">

                        <h1 class="page-title">TUTORIAL SETTINGS</h1>


                        <div class="vue-container">
                            <form method="POST" action="#" >
                                <input name="_token" type="hidden" value="">
                                <input type="hidden" name="screenshots" value="">
                                <div class="card mb-4">
                                    <div class="set-header">
                                        General
                                    </div>
                                    <div class="container-fluid px-4">
                                        <div class="row">
                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Theme</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Logo</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'Select the Logo to be displayed in the Tutorial overview'"></question-dropdown>
                                                    </div>
                                                    <div class="col-md-12 mb-1"><img src="">
                                                        <div class="elfinder-container">
                                                            <input name="logo" id="meta-logo-image" type="hidden"
                                                                   data-type="bild" data-value="image"
                                                                   class="elfinder-idea"
                                                                   value="">
                                                            <button data-inputid="meta-logo-image"
                                                                    class="popup_selector btn btn-default">Select image
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Startscreen Headline</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'This is the title for the home page of the Tutorials. Example:\n'+
'                                                    Welcome'"></question-dropdown>
                                                    </div>
                                                    header
                                                </div>
                                            </div>

                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Startscreen Button Text</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'This is the Button on the home page of the Tutorials. Example: Get\n'+
'                                                started Now'"></question-dropdown>
                                                    </div>
                                                    input
                                                </div>
                                            </div>


                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Startscreen Wallpaper</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'This is the full screen wallpaper on the home page of Tutorials'"></question-dropdown>
                                                    </div>
                                                    <div class="col-md-12 mb-1"><img src="">
                                                        <div class="elfinder-container">
                                                            <input name="logo" id="meta-logo-image" type="hidden"
                                                                   data-type="bild" data-value="image"
                                                                   class="elfinder-idea"
                                                                   value="">
                                                            <button data-inputid="meta-logo-image"
                                                                    class="popup_selector btn btn-default">Select image
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Startscreen Button Text</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="font-weight-bold">E-Mail</label>
                                                        <input type="text" name="text" id="text" value="Get start" class="form-control btn-block">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">Chapter Done</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                                    </div>
                                                    text
                                                </div>
                                            </div>

                                            <div class="col-md-12 vue-container mt-3">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <p class="head-inline">TIPS Text</p>
                                                    </div>
                                                    <div class="col-md-1 mt-2 text-right">
                                                        <question-dropdown
                                                            :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                                    </div>
                                                    text
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="vue-container">

                            <div class="set-header">
                                General
                            </div>
                            <div class="container-fluid px-4">
                                <div class="row">

                                    <div class="col-md-12 vue-container mt-3">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <p class="head-inline">Startscreen Wallpaper</p>
                                            </div>
                                            <div class="col-md-1 mt-2 text-right">
                                                <question-dropdown
                                                    :answerdropdown="'Here you can create '"></question-dropdown>
                                            </div>

                                            <div class="col-md-12 mb-1"><img src="">
                                                <div class="elfinder-container">
                                                    <input name="logo" id="meta-logo-image" type="hidden"
                                                           data-type="bild" data-value="image" class="elfinder-idea"
                                                           value="">
                                                    <button data-inputid="meta-logo-image"
                                                            class="popup_selector btn btn-default">Select Screenshot
                                                    </button>
                                                </div>
                                                <div class="modal-footer1 mt-3">
                                                    <button type="button" class="btn btn-primary btn-modal my-4 px-5">
                                                        Save
                                                    </button>
                                                    <button type="button" class="btn close-modal btn-modal my-4 px-4">
                                                        Chancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            @endsection


    <style>
        .set-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }


        .set-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            font-size: 18px;
            color: #424242;
        }

        .vue-container {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px;
        }


        .head-inline {
            display: inline-block;
        }

        .head-inline {
            font-size: 20px;
            font-weight: bold;
            color: #424242;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .page-title {
            color: #4A494A;
            text-transform: uppercase;
            margin: 35px 45px 45px 15px;
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
        }

    </style>





