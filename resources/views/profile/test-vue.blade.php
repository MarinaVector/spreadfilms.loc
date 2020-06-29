@extends('layouts.auth')

@section('title', 'Vue Test')

@section('content')


    <vuetest-component :myvariable="'{{ $myVariable }}'" :marina="'developer8'"></vuetest-component>

    <question-dropdown :answerdropdown="'developer88'"></question-dropdown>
@endsection

