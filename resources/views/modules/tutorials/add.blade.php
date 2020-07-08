@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container bg-add">
        @include('layouts.notifications')


        <div>
            <a href="/elfinder">Elfinder from vendor</a>
        </div>

        <form class="no-bottom" method="POST" action="{{ route('module.tutorials.store') }}">
            @csrf
            <tutorial-page-builder></tutorial-page-builder>
        </form>
    </div>
@endsection

@section('scripts')
    <style>

    </style>

    <script>

    </script>
@endsection
