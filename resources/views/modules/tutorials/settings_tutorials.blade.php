@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container-fluid h-100">
        <div class="container-fluid">
            @include('layouts.notifications')
            <input type="hidden" id="public_path" name="public_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/public/' }}"/>
            <input type="hidden" id="private_path" name="private_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/private/' . Auth::user()->id . '/' }}"/>
            <div class="col-xl-10 offset-xl-1">
                <h1 class="page-title">TUTORIAL SETTINGS</h1>
                <div class="vue-container">
                    <tutorials-settings :settings="'{{ $userCompanyTutorialsSettings }}'"
                                        :action="'{{ route('module.tutorials.settings.update') }}'"
                    ></tutorials-settings>
                </div>
            </div>
        </div>
    </div>
@endsection
