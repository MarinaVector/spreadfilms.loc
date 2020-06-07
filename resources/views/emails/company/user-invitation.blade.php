@extends('layouts.email')

@section('title', 'Invitation to join a company')

@section('body')
    <div>
        <center><h2>{{ env('APP_NAME') }}</h2></center>
        <h2>Hello!</h2>
        <center><a href="{{ env('APP_URL') }}accept-invitation/{{ $data['id'] }}"><button>ACCEPT INVITATION</button></a></center>
        <br/>
        <p>If you did not create an account, no further action is required.</p>
        <p>Regards,</p>
        <p>{{ env('APP_NAME') }}</p>
    </div>
@endsection
