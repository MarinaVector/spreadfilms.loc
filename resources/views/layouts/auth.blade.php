@extends('layouts.app')

@include('layouts.nav')

@section('body')
    <div id="app">
        @include('layouts.notifications')

        @yield('content')
    </div>
@endsection
