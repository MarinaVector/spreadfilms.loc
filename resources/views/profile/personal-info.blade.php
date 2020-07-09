@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')

    <div class="container-fluid bg-profile">
        <div class="container bg-profile">
            <h1 class="page-title mb-3 mt-5">Profile | Personal info</h1>
            @include('layouts.notifications')
            <br>
            <div class="page-title user-box">
                <i class="fas fa-user-tie fa-3x"></i>
            </div>
            <p class="profile-hello"><strong>Hello {{ $authUser->firstname }},</strong>
                <br>
                glad you're here. A smooth cooperation with our partners is very important to us. If you have any
                problems or questions you can always contact our Team via info@verovis.de turn.</p>
            <div class="row mt-3 panel">
                <div class="col-12">
                    <div class="container mb-3">
                        <div class="row mx-3 mt-2">
                            <div class="col-10">
                                <h3>Personal Info</h3>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('profile.personal-info.edit') }}">
                                    <button class="btn btn-block btn-bg btn-sm" type="button"><i
                                            class="fa fa-pencil fa-profile"></i>EDIT
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="profile-line">
                            <hr>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">{{ __('messages.Firstname') }}:</th>
                                <td>{{ $authUser->firstname }}</td>

                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Surname') }}:</th>
                                <td>{{ $authUser->surname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Email') }}:</th>
                                <td>{{ $authUser->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Gender') }}:</th>
                                <td>{{ $authUser->showGender() }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Native_Language') }}:</th>
                                <td>{{ $authUser->native_language }} (not showing properly, need to fix later)</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Country') }}:</th>
                                <td>{{ $authUser->country }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Postcode') }}:</th>
                                <td>{{ $authUser->postcode }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Location') }}:</th>
                                <td>{{ $authUser->location }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Street') }}:</th>
                                <td>{{ $authUser->street }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Homepage') }}:</th>
                                <td>{{ $authUser->homepage }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Phone') }}:</th>
                                <td>{{ $authUser->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Birth_Year') }}:</th>
                                <td>{{ $authUser->birth_year }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <style>

        .btn-bg {
            background: #eee !important;
            border: 1px solid #ccc !important;
            color: #333 !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
        }

        .btn-bg:hover {
            background: #00bff9 !important;
        }


        .fa-profile {
            color: #3A3A3A !important;
            display: inline-block !important;
            width: 26px !important;
            height: 26px !important;
        }


        .profile-line {
            background: linear-gradient(90deg, #232323 0%, #858585 100%);
            height: 2px;
            display: block;
            position: absolute
        }

        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: 100%;
            width: 100%;
        }

        .panel {
            background: #fff;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .page-title {
            text-transform: uppercase;
            font-weight: normal;
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
        }

        .profile-hello {
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
        }

        .slide-border {
            border-bottom: 1px solid darkgray !important;
            background-color: white !important;
            border-top: none;
            border-left: none;
            border-right: none;
        }

    </style>
@endsection

