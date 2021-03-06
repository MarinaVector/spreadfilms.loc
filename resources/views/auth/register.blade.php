@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <div class="row page-register bg-white">
        <div class="offset-lg-2 col-xl-4 col-xl-3 px-5 mt-md-5 col-12 from_menu_margin">
            <div class="form-bg">
                <div class="col-lg-1 col-sm-2 offset-sm-5 offset-lg-11 mt-md-n3 col-3 offset-9"><a class="" href="/login"><i class="fas fa-times-circle fa-3x"></i></a></div>
                @include('layouts.notifications')
                <form method="POST" action="/register">
                    {!! csrf_field() !!}

                    <div class="form-group mt-3 mt-lg-0">
                        <h2 class="mb-3 text-center"><b>SFM</b> {{ __('messages.Registration') }}</h2>
                        <p class="mb-3">{{ __('messages.Registration_page_description') }}</p>
                        <hr>

                        <div class="form-group">
                            <label for="firstname">{{ __('messages.Firstname') }}</label>
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="surname">{{ __('messages.Surname') }}</label>
                            <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                                   class="form-control">
                        </div>

                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('messages.Password') }}
                            <small>{{ __('messages.Password_hint') }}</small></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('messages.Confirm_Password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="pretty p-default p-curve">
                            <div class="custom-checkbox">
                                <label for="privacy_policy555"><input class="close-input" type="checkbox" name="privacy_policy" value="yes" id="privacy_policy555">
                                    <div class="stlchek mr-3"></div>{{ __('messages.I_agree_with') }}<a
                                        href="/privacy_policy"
                                        target="_blank"><strong> {{ __('messages.Privacy_Policy') }}</strong></a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha text-center" data-sitekey="{{ env('RECAPTCHAV2_SITEKEY') }}"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-form btn-primary btn-block">{{ __('messages.Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
