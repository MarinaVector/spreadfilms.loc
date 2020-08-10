@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')
<div class="container-fluid bg-standart">
    <div class="row h-100">
        <div class="col-md-1">
            <nav-small></nav-small>
        </div>

        <div class="col-md-2 offset-md-1 h-100">
        <div class="bg-light tutorial-navigation h-100">
        <nav-acc></nav-acc>

            <div class="mt-5 mx-auto">
                <chart-circle></chart-circle>
            </div>
            <tutorial-list :tutorials="'{{ $tutorials }}'" />
        </div>
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
                width: 3px !important;
                position: absolute;
                min-height: 30px;
                height: 313px;
                top: 0px;
                display: block;
                max-height: 506px;
               /* background-color: rgba(0,0,0,0.15); --*/
            }

        </style>


        <script>

        </script>


@endsection
