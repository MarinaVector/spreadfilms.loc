@extends('layouts.master')

@section('title', 'Login')

@section('content')

	<div class="row">
		<div class="col-xs-10 col-md-8 col-lg-6 col-xl-4 offset-sm-1 mt-5">
			<div class="box-login">
				<h2 class="text-center mb-3"><strong>SFM</strong>Login</h2>
				<p class="text-center">Gib einfach deine <strong>E-Mail Adresse</strong> und dein <strong>Passwort</strong> ein um dich einzuloggen.</p>
				<hr>
				<form method="POST" action="/login">
				    {!! csrf_field() !!}

				    <div class="form-group">
				    	<label for="email" class="font-weight-bold">{{ _i('E-Mail') }}</label>
				      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
				    </div>

				    <div class="form-group">
				    	<label for="password" class="font-weight-bold">{{ _i('Passwort') }}</label> <small class="float-right"><a href="/password/reset" tabindex="-1" title="{{ _i('Passwort vergessen') }}" class="forgot-password-link">{{ _i('Passwort vergessen?') }}</a></small>
				      <input type="password" name="password" id="password" class="form-control">
				    </div>

				    <div class="form-group form-row">
				    	<div class="col">
				        <button type="submit" class="btn btn-primary btn-block">{{ _i('Login') }}</button>
				    	</div>
				    	<div class="col stay-logged-in">
				    		<div class="pretty p-default p-curve">
									{!! Form::checkbox('remember', false) !!}
							    <div class="state">
							      <label>{{ _i('Angemeldet bleiben') }}</label>
							    </div>
							  </div>
				    	</div>
				    </div>
				</form>
				<div class="login-arrow"><i class="fal fa-angle-down"></i></div>
			</div>
			<div class="box-register text-center">
				<h2>{{ _i('Registrierung') }}</h2>
				<p>{{ _i('Noch nicht registriert?') }}</p>
				<p><a href="/register" class="btn btn-primary btn-full">{!! _i('Kostenlosen Zugang erhalten') !!}</a></p>
				<hr>
				<p>{!! _i('Bei uns ist alles neu! Falls deine Anmeldung aus einer früheren Version nicht funktioniert kannst du mit der <strong><a href="/password/reset" tabindex="-1" title="Passwort vergessen">"Passwort vergessen"</a></strong> Funktion dein Passwort zurücksetzen.') !!}</p>
			</div>

		</div>


	</div>

@endsection