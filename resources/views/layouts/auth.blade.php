@extends('layouts.app')

@include('layouts.nav')

@section('body')
    <div id="app" class="page-register">
        @include('layouts.notifications')

        @yield('content')
    </div>
@endsection
