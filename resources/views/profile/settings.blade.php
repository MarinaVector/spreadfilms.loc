@extends('layouts.profile')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            @include('layouts.notifications')

            <h1 class="page-title mb-3 mt-5">Profile | Personal info</h1>

            <a href="{{ route('profile.password-change') }}">
                <button class="btn btn-block btn-sm" id="btn-grey" type="button"><i
                    class="fa fa-key" id="fa-pencil"></i>PASSWORD CHANGE</button>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <style>

        #btn-grey {
            background: #eee;
            border: 1px solid #ccc;
            color: #333;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);

        }

        #fa-pencil {
            color: #3A3A3A;
            display: inline-block;
            width: 26px;
            height: 26px;
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

    </style>


    <script>

    </script>
@endsection

