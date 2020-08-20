@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')

    <div class="container-fluid bg-profile">
        <div class="container bg-profile">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <h2 class="section__title mb-4 pt-4">Statistics</h2>
                <p>We’re always searching for people to join our team.</p>
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
    </style>
@endsection


