@extends('layouts.auth')

@section('title', 'Vue Test')

@section('content')
    <vuetest-component :myvariable="'{{ $myVariable }}'" :marina="'developer'"></vuetest-component>
@endsection

