@extends('layouts.app')

@section('body')
    <nav-component :authuser="'{{ $authUser }}'"></nav-component>
    @yield('content')

    @yield('scripts')
@endsection
