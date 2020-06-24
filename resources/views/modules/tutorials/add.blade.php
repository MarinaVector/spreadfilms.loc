@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container bg-add">
        @include('layouts.notifications')

        <layouts-panel></layouts-panel>

        <form class="no-bottom" method="POST" action="{{ route('module.tutorials.store') }}">
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
