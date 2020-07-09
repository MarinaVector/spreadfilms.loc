@extends('layouts.app')

@section('body')
    <nav-component :authuser="'{{ $authUser }}'"></nav-component>
    @yield('content')

@endsection

@yield('scripts')
