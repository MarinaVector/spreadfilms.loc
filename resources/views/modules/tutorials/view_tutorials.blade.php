@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')
    <div class="container-grid bg-standart h-100">
        <div class="col-ttr">
            <nav-small></nav-small>
        </div>
        <div class="col-ttr h-100 bg-light menu-column">
            <!-- <div class="background">
                 <img class="mr-3 mr-sm-4 back mr-5" src="/public/img/auth/bg-auth.jpg" alt="Responsive image">
             </div> -->
            <div class="tutorial-navigation menu-column">
                <div class="mt-4 mx-auto nav-fill">
                    <nav-acc :logo="'{{ $settings->logo }}'"></nav-acc>
                    <tutorial-list :tutorials="'{{ $tutorials }}'"></tutorial-list>
                    <div class="mt-5">
                        <chart-circle></chart-circle>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-ttr h-100 w-100 col-picture">
            @if($tutorial === '')
                <div class="col-ttr h-100 w-100">
                    <div id="background-im">
                        @if ($settings->main_page_background===null)
                            <img id="back-default" src="/public/img/auth/bg-auth.jpg" alt="">
                        @else
                            <img src="{{$settings->main_page_background}}" id="back" alt="">
                        @endif
                        <div class="help-trigger">
                            <i class="fal fa-question-circle">
                            </i></div>
                    </div>
                    <display-tutorials-main-page
                        :settings="'{{ json_encode($settings) }}'"></display-tutorials-main-page>

                    @else
                        <div class="user-column">
                            <display-tutorial :tutorial="'{{ json_encode($tutorial) }}'"></display-tutorial>
                        </div>
                    @endif
                </div>
        </div>

    </div>

@endsection

@section('scripts')

    <style>

        .v-sidebar-menu {
            visibility: hidden;
        }

        .tutorial-navigation {
            width: 250px;
            padding-left: 25px;
            padding-right: 25px;

        }

        .tutorial-navigation {
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
            -moz-overflow-scrolling: touch;
            -ms-overflow-scrolling: touch;
            -o-overflow-scrolling: touch;
            overflow-scrolling: touch;
        }

        .tutorial-navigation::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 7px;
            color: black;
        }

        .tutorial-navigation::-webkit-scrollbar-thumb {
            border-radius: 3px;
            background-color: #000000e6;
            margin: 0 3px;
            width: 2px !important;
            position: absolute;
            min-height: 30px;
            height: 313px;
            top: 0px;
            display: block;
            max-height: 506px;
        }

        .teaser-button {
            padding: 3px;
            display: inline-block !important;
            cursor: pointer;
            position: relative;
            background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
            color: #fff;
            border: 0;
            border-radius: 0;

        }

        .teaser-button:hover {
            color: #fff;

        }

        .nav-fill {
            opacity: 1 !important;
        }

        .teaser-head {
            text-transform: uppercase;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            font-size: 2.5em;
            line-height: 1em;
            color: #fff;
            display: inline-block;

        }

        #background-im {
            position: fixed;
            width: inherit;
            height: inherit;
            max-width: 77%;
            object-fit: cover;
            margin-top: -48px;
            padding-right: 77px;
        }

        #back, #back-default {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: inherit;
            height: inherit;
            z-index: 100;
            background-repeat: no-repeat;
            object-fit: cover;
        }

        .help-trigger {
            z-index: 123;
            border-radius: 3px;
            background-color: #212529;
            position: absolute;
            right: 0;
            bottom: 0;
        }

        .help-trigger {
            color: #fff;
            cursor: pointer;
            font-size: 1.5em;
            display: inline-block;
            line-height: 1em;
            vertical-align: middle;
            padding: 10px;
        }


        .menu-column {
            position: relative;
            z-index: 2;
        }

        .user-column {

        }

        .container-grid {
            display: grid;
            grid-template-columns: 1fr 2fr 16fr;
            grid-template-rows: 100% 100% 100%;
            justify-items: start;
        }

        .col-picture {

        }

    </style>

    <script>

    </script>

@endsection
