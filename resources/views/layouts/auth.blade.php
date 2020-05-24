@extends('layouts.app')

@include('layouts.nav')

@section('body')
    <div id="app">
        @yield('content')
    </div>
@endsection
