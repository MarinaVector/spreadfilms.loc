@extends('layouts.profile')

@section('title', 'Admin Users')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid bg-profile admin-container">
        <h1 class="page-title mb-3 mt-5">{{ __('messages.Users')}}</h1>

        Show list of users with search form and filters and a button to add new users
        @include('layouts.notifications')
    </div>
@endsection

@section('scripts')

@endsection
