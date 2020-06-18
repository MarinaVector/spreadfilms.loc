@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        This page must be like <a href="https://verovis.spreadfilms.space/tools/tutorial/create" target="_blank">https://verovis.spreadfilms.space/tools/tutorial/create</a>
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
