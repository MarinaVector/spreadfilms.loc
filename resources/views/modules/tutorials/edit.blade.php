@extends('layouts.profile')

@section('title', 'Edit tutorial')

@section('content')
    <div class="container bg-add">
        @include('layouts.notifications')
        <input type="hidden" id="public_path" name="public_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/public/' }}"/>
        <input type="hidden" id="private_path" name="private_path" value="{{ '/userfiles/companies/' . Auth::user()->company()->id . '/private/' . Auth::user()->id . '/' }}"/>
        <tutorial-page-builder
            :usercompanycategories="'{{ $companyCategoriesJSON }}'"
            :usercompanyroles="'{{ $authUser->company()->companyroles->toJson() }}'"
            :usercompanyusers="'{{ $userCompanyUsers->toJson() }}'"
            :action="'{{ route('module.tutorials.update', ['tutorial_id' => $tutorial->id]) }}'"
            :tutorials="'{{ $companyTutorials }}'"
            :publicpath="'{{ '/userfiles/companies/' . Auth::user()->company()->id . '/public/' }}'"
            :privatepath="'{{ '/userfiles/companies/' . Auth::user()->company()->id . '/private/' . Auth::user()->id . '/' }}'"
            :tutorial="'{{ $tutorial }}'"
        ></tutorial-page-builder>
    </div>
@endsection

@section('scripts')
    <style>

    </style>

    <script>

    </script>
@endsection
