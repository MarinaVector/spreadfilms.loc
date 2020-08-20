@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')

    <div class="container bg-profile">
        <div class="container bg-profile">
            <div class="col-md-12 col-lg-12 col-xl-6">
                <h2 class="section__title mb-4 pt-4 page-title">Statistics</h2>
                <p class="font-size-20">We’re always searching for people to join our team</p>
            </div>

            <signs-statistics></signs-statistics>
            <tutorials-statistics
                :tutorials="'{{ $companyTutorials }}'"
                :users="'{{ $companyUsers }}'"
            ></tutorials-statistics>

        </div>
    </div>

@endsection

@section('scripts')
    <style>
        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: 100%;
            width: 100%;
        }


        .bg-light-gray {
            background-color: #f7f7f7;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }


        .bg-sky.box-shadow {
            box-shadow: 0px 5px 0px 0px #00a2a7
        }

        .bg-orange.box-shadow {
            box-shadow: 0px 1px 0px 0px #af4305
        }

        .bg-green.box-shadow {
            box-shadow: 0px 1px 0px 0px #4ca520
        }

        .bg-yellow.box-shadow {
            box-shadow: 0px 5px 0px 0px #dcbf02
        }

        .si-times {
            box-shadow: 0px 1px 0px 0px #e82d8b
        }

        .bg-purple.box-shadow {
            box-shadow: 0px 1px 0px 0px #8343e8
        }

        .bg-lightred.box-shadow {
            box-shadow: 0px 1px 0px 0px #d84213
        }

        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #f7941e
        }

        .bg-green {
            background-color: #8dc63f
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #662d91
        }

        .bg-lightred {
            background-color: #ff5722
        }

        .padding-15px-lr {
            padding-left: 15px;
            padding-right: 15px;
        }
        .padding-5px-tb {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .margin-10px-bottom {
            margin-bottom: 10px;
        }
        .border-radius-5 {
            border-radius: 5px;
        }

        .margin-10px-top {
            margin-top: 10px;
        }
        .font-size14 {
            font-size: 14px;
        }

        .text-light-gray {
            color: #d6d5d5;
        }
        .font-size13 {
            font-size: 13px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
@endsection


