@extends('layouts.profile')

@section('title', 'Tutorials Info')

@section('content')
    <div class="container-grid bg-standart h-100 m-0">
        <div class="col-ttr1">
            <nav-small></nav-small>
        </div>
        <div class="col-ttr h-100 bg-light menucolumn tutorial-field tutorial-navigation">
            <div class="menucolumn">
                <div class="mt-4 mx-auto nav-fill">
                    <nav-acc :logo="'{{ $settings->logo }}'"></nav-acc>
                    <tutorial-list :tutorials="'{{ $tutorials }}'"></tutorial-list>
                    <div class="mt-5">
                        <chart-circle></chart-circle>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-ttr w-100 col-picture">
            @if($tutorial === '')
                <div class="col-ttr h-100 w-100">

                        @if ($settings->main_page_background===null)
                        <div id="background-im">
                            <img id="back-default" src="/public/img/auth/bg-auth.jpg" alt="">
                        </div>
                        @else
                        <div id="background-im">
                            <img src="{{$settings->main_page_background}}" id="back" alt="">
                        </div>
                        @endif
                        <div class="help-trigger">
                            <i class="fal fa-question-circle">
                            </i></div>

                    <display-tutorials-main-page
                        :settings="'{{ json_encode($settings) }}'"></display-tutorials-main-page>

                    @else
                        <div class="user-column">
                            <display-tutorial :tutorial="'{{ json_encode($tutorial) }}'"
                                              :breadcrumb="'{{ json_encode($breadcrumb) }}'"
                            >
                            </display-tutorial>
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

        .tutorial-field {
            width: 250px;
            padding-left: 25px;
            padding-right: 25px;
            position: sticky;

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
            width: 5px;
            color: #424242;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        .tutorial-navigation::-webkit-scrollbar-thumb {
            border-radius: 3px;
            background-color: #000000e6;
            margin: 0 3px;
            width: 2px !important;
            min-height: 30px;
            height: 120px;
            top: 0px;
            display: block;
            max-height: 120px;
            position: absolute;
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

        @media only screen and (max-width: 450px) {
            .container-grid {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: 100% 100%;
                justify-items: start;
            }

            .col-picture {
                 align-items: stretch;
            }

            .menucolumn {
                  grid-column: 1/4;
                   overflow: hidden;
                grid-row: 1/auto;
                align-items: stretch;
            }

            .tutorial-field {
                width: auto;
                padding-left: 25px;
                /* padding-right: 25px; */
                /* position: sticky; */
            }

            .tutorial-field {
                width: auto;
                padding-left: 25px;
            }

        }

        .col-ttr {

        }

    </style>

    <script>

    </script>

@endsection
