@extends('layouts.profile')

@section('title', 'Password Change')

@section('content')
    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <h1 class="page-title mb-3 mt-5">Profile | Password Change</h1>

            @include('layouts.notifications')

            <form method="POST" action="{{ route('profile.password-change-store') }}" accept-charset="UTF-8">
                @csrf
                <div class="box-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Old Password</label>
                                <input type="password" name="old_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password(At least 6 characters)</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">New Password Confirmation</label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Change Password">
                    <a href="{{ route('profile.settings') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
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


    </style>


    <script>

    </script>
@endsection

