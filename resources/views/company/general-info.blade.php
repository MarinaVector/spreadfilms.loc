@extends('layouts.profile')

@section('title', 'Company Settings')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid">
        <div class="row">
            <div class="offset-lg-2 col-xl-4 col-xl-3 px-5 mt-md-5 col-12 from_menu_margin">
                <div class="form-bg">
                    @include('layouts.notifications')

                    <div>
                        Company info here, same as <a href="{{ route('profile.personal-info') }}">profile personal info</a> but only about the company
                    </div>
                    <div class="box-line"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>

    </style>
@endsection
