@extends('layouts.app')

@include('layouts.nav')

@section('body')
    <div id="app" class="page-register">
        @yield('content')
    </div>
@endsection

@yield('scripts')
