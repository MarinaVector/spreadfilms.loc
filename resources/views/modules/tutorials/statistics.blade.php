@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')

    <div class="container bg-add">
        @include('layouts.notifications')

        <layouts-panel></layouts-panel>

        <form method="POST" action="{{ route('module.tutorials.store') }}">

            <div class="container group">
                <label for="name">Name</label>
                <input class="input-hidden" type="text" required placeholder="New Tutorial">
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>


        </form>


        <div class="container form-group paragraph-form-group">

            <input type="hidden" name="ideas">


            <div class="panel panel-default">

                <h2 class="empty-paragraphs-message">Currently the Tutorial is still without content, modules can be
                    selected above or a template can be loaded</h2>
            </div>


        </div>











































        @endsection
