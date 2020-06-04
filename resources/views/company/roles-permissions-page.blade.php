@extends('layouts.profile')

@section('title', 'Admin Roles&Permissions Management')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid bg-profile admin-container">
        <h1 class="page-title mb-3 mt-5">{{ __('messages.Roles_and_permissions')}}</h1>

        Show all roles that exist in a company with their permissions
        @include('layouts.notifications')
    </div>
@endsection

@section('scripts')

@endsection
