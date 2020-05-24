@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <example-component></example-component>

  <div class="row">
    <div class="col-xs-10 col-md-8 col-lg-6 col-xl-4 offset-sm-1 mt-5">
      <div class="box-login">
        <h2 class="text-center mb-3"><strong>SFM</strong>Registration</h2>
        <p>Hello, nice that you want to register in our database. Please enter your name and email address here so that we can create your account. You will then receive a confirmation email.</p>
        <hr>
        <form method="POST" action="/register">
          {!! csrf_field() !!}

          <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="{{ old('surname') }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <small>(At least 6 characters)</small>
            <input type="password" name="password" id="password" class="form-control">
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
          </div>

          <div class="form-group">
            <div class="pretty p-default p-curve">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="privacy_policy" name="privacy_policy">
                    <label class="custom-control-label" for="privacy_policy">I agree with the Privacy Policy.</label>
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="g-recaptcha text-center" data-sitekey="{{ env('RECAPTCHAV2_SITEKEY') }}"></div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('scripts')

    <script src="https://www.google.com/recaptcha/api.js"></script>

@endsection
