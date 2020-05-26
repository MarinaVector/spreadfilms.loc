@extends('layouts.auth')

@section('title', 'Register')

@section('content')


    <div class="row">

        <div class="offset-lg-2 col-xl-3 col-xl-3 px-5 mt-md-5 col-12 form-bg">
            <div class="col-1 offset-11"><img src="public/img/icon_close_dark.png"></div>
            @include('layouts.notifications')
            <form method="POST" action="/register">
                {!! csrf_field() !!}

                <div class="form-group mt-4 mt-lg-0">
                    <h2 class="mb-3 text-center"><b>SFM</b>Registrieren</h2>
                    <p class="mb-3">Hallo, schön, dass du dich in unserer Datenbank registrieren möchtest. Bitte trage
                        hier zuerst deinen Namen und deine E-Mail Adresse ein damit wir deinen Account anlegen können.
                        Anschließend erhältst du eine E-Mail zur Bestätigung.</p>
                    <hr>


                    <div class="form-group">
                        <label for="exampleInputVorname">Vorname</label>
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNachname">Nachname</label>
                        <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                               class="form-control">
                    </div>

                    <label for="exampleInputEmail1">E-Mai</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passwort <small>(Mindestens 6 Zeichen)</small></label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passwort bestätigen</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="custom-control-input" id="privacy_policy" name="privacy_policy">
                    <label class="form-check-label" for="exampleCheck1">Ich bin mit der</label>
                </div>

                <div class="form-group">
                    <div class="g-recaptcha text-center" data-sitekey="{{ env('RECAPTCHAV2_SITEKEY') }}"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-form btn-primary btn-block">Registrieren</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
