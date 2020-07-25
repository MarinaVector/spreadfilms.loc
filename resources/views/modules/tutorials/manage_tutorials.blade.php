@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        <h1 class="page-title">{{ __('messages.Tutorials')}}</h1>

        <div class="btn-group group-actions mb-2" role="group">
            <a href="{{ route('module.tutorials.add') }}" class="btn btn-admin ">
                <i class="fas fa-plus-circle fas-admin mr-2"></i>Add tutorial
            </a>
        </div>
    </div>
@endsection

@section('scripts')

    <style>

        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: 100%;
            width: 100%;
        }

        .page-title {
            text-transform: uppercase;
            font-weight: normal;
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
        }

        .btn-admin {
            background: #fff !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
            color: #777777 !important;
            border-style: none;
        }

        .fas-admin {
            color: #777777 !important;
        }

    </style>

    <script>

    </script>


@endsection
