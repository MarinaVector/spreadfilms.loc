@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')
    <div class="container bg-add">
        @include('layouts.notifications')


        <div>
            <a href="/elfinder">Elfinder from vendor</a>
        </div>

        <br>
        <br>
        <br>
        <br>
        <label for="feature_image">Feature Image</label>
        <input type="text" id="feature_image" name="feature_image" value="">
        <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>

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
