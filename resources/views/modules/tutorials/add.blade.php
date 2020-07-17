@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container bg-add">
        @include('layouts.notifications')



        <form class="no-bottom" method="POST" action="{{ route('module.tutorials.store') }}">
            @csrf
            <input type="hidden" id="public_path" name="public_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/public/' }}"/>
            <input type="hidden" id="private_path" name="private_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/private/' . Auth::user()->id . '/' }}"/>
            <tutorial-page-builder
                :usercompanycategories="'{{ $authUser->company()->companycategories->toJson() }}'"
                :usercompanyroles="'{{ $authUser->company()->companyroles->toJson() }}'"
                :usercompanyusers="'{{ $userCompanyUsers->toJson() }}'"
            ></tutorial-page-builder>
        </form>
    </div>
@endsection

@section('scripts')
    <style>

    </style>

    <script>

    </script>
@endsection
