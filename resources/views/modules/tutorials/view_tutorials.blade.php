@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')
    <div class="container-fluid bg-standart">
        <div class="row h-100">
            <div class="col-md-1">
                <nav-small></nav-small>
            </div>
            <div class="col-md-2 offset-md-1 h-100 menu-column">
                <!-- <div class="background">
                     <img class="mr-3 mr-sm-4 back mr-5" src="/public/img/auth/bg-auth.jpg" alt="Responsive image">
                 </div> -->
                <div class="background">
                    @if ($settings->main_page_background===null)
                        <img class="mr-3 mr-sm-4 back mr-5" src="/public/img/auth/bg-auth.jpg" alt="">
                    @else
                        <img src="{{$settings->main_page_background}}" class="mr-3 mr-sm-4 back mr-5" alt="">
                    @endif
                </div>
                <div class="bg-light tutorial-navigation h-100 menu-column">
                    <div class="mt-4 mx-auto nav-fill">
                        <nav-acc :logo="'{{ $settings->logo }}'"></nav-acc>
                        <tutorial-list :tutorials="'{{ $tutorials }}'"></tutorial-list>
                        <div class="mt-5">
                            <chart-circle></chart-circle>
                        </div>
                    </div>
                </div>
            </div>

            @if($tutorial === '')
                <div class="col-md-8 user-column">
                    <display-tutorials-main-page :settings="'{{ json_encode($settings) }}'"></display-tutorials-main-page>
                </div>
            @else
                <div class="col-md-8 user-column">
                    <display-tutorial :tutorial="'{{ json_encode($tutorial) }}'"></display-tutorial>
                </div>
            @endif
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
            padding-left: 20px;
            padding-right: 20px;

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
            padding: 5px 10px;
            display: inline-block !important;
            cursor: pointer;
            position: relative;
            margin-top: 10px;
            background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
            color: #fff;
        }

        .teaser-button:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: #000;
            opacity: 0;
            transition: opacity .15s ease-in-out;
            z-index: 2;
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
            background: #05ffa3;
            opacity: 0.5;
            display: inline-block;
        }

        div.background {
            position: fixed;
        }

        img .back {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            min-width: 100%;
            height: auto;
            z-index: 1000;
        }

        .menu-column {
            position: relative;
            z-index: 2;
        }

        .user-column {

        }

        .teaser {
            z-index: 5;
            position: relative;
        }


    </style>

    <script>

    </script>

@endsection
