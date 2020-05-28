@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="row page-register">
    <div class="offset-lg-2 col-xl-4 col-xl-3 px-5 mt-md-5 col-12 from_menu_margin">
        <div class="form-bg">
            <h2 class="text-center mb-3"><strong>SFM</strong>Login</h2>
            <p class="text-center">Just enter your <strong>E-Mail Adress</strong> and your <strong>Password</strong>
                to log in.</p>
            <hr>
            @include('layouts.notifications')
            <form method="POST" action="/login">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email" class="font-weight-bold">E-Mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label> <small class="float-right"><a
                            href="/password/reset" tabindex="-1" title="Forgot Password" class="forgot-password-link">Forgot
                            Password</a></small>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group form-row">
                    <div class="col">
                        <button type="submit" class="btn btn-form btn-block">Login</button>
                    </div>
                    <div class="col stay-logged-in ml-5">
                        <div class="pretty p-default p-curve">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="keep_signed" name="keep_signed">
                                <label class="custom-control-label" for="keep_signed">Keep me signed in.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="login-arrow"><i class="fal fa-angle-down"></i></div>
        </div>
        <div class="box-register text-center">
            <h2>Registration</h2>
            <p>Not registered yet?</p>
            <p><a href="/register" class="btn btn-form btn-full">Get free access</a></p>
            <hr>
            <p>Everything is new with us! If your registration from a previous version does not work, you can use the
                <strong><a href="/password/reset" tabindex="-1" title="Forgot Password">"Forgot Password"</a></strong>
                Function reset your password.')</p>
        </div>
        <div class="box-line"></div>
    </div>
</div>

@endsection
