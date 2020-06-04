@extends('layouts.profile')

@section('title', 'Edit Personal Info')

@section('content')
    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <h1 class="page-title mb-3 mt-5">Profile | Edit Personal Info</h1>

            @include('layouts.notifications')
            <form method="POST" action="{{ route('profile.personal-info.update') }}" accept-charset="UTF-8">
                @csrf
                <div class="box-white">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">{{ __('messages.Firstname') }}</label>
                                <input class="form-control no-border" name="firstname" type="text"
                                       value="{{ $authUser->firstname }}" id="firstname">
                            </div>

                            <div class="form-group">
                                <label for="gender">{{ __('messages.Email') }}</label>
                                <input class="form-control no-border" name="email" type="text"
                                       value="{{ $authUser->email }}" id="email" disabled>
                            </div>

                            <div class="form-group">
                                <label for="language">{{ __('messages.Native_Language') }}</label>
                                <select class="form-control no-border" name="native_language">
                                    <option value="1" selected="selected">Deutsch GER</option>
                                    <option value="2">English UK</option>
                                    <option value="3">English USA</option>
                                    <option value="4">French FRA</option>
                                    <option value="5">Italian ITA</option>
                                    <option value="6">Russian RUS</option>
                                    <option value="7">Spanish ESP</option>
                                    <option value="8">Dutch NE</option>
                                    <option value="9">Polish PL</option>
                                    <option value="10">Arabic</option>
                                    <option value="11">Chinese</option>
                                    <option value="12">Danish</option>
                                    <option value="13">Greek</option>
                                    <option value="14">Portuguese</option>
                                    <option value="15">Swedish</option>
                                    <option value="16">German CHE</option>
                                    <option value="17">Czech</option>
                                    <option value="18">Turkish</option>
                                    <option value="19">French CHE</option>
                                    <option value="20">Spanish ESP-LAM</option>
                                    <option value="21">Bulgarian</option>
                                    <option value="22">English OFF</option>
                                    <option value="23">Estonian</option>
                                    <option value="24">Korean</option>
                                    <option value="25">Japanese</option>
                                    <option value="26">Hungarian</option>
                                    <option value="27">French FRA-CAN</option>
                                    <option value="28">Romanian</option>
                                    <option value="29">German AUT</option>
                                    <option value="30">Norwegian NOR</option>
                                    <option value="31">Slovenian SVN</option>
                                    <option value="32">Slovak SVK</option>
                                    <option value="33">Croatian HRV</option>
                                    <option value="34">Finnish FIN</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sername">{{ __('messages.Postcode') }}</label>
                                <input class="form-control no-border" name="postcode" type="text" value="{{ $authUser->postcode }}" id="zip">
                            </div>

                            <div class="form-group">
                                <label for="zip">{{ __('messages.Street') }}</label>
                                <input class="form-control no-border" name="street" type="text" value="{{ $authUser->street }}"
                                       id="adress">
                            </div>

                            <div class="form-group">
                                <label for="country">{{ __('messages.Phone') }}</label>
                                <input class="form-control no-border" name="phone" type="text" value="{{ $authUser->phone }}">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="email">{{ __('messages.Surname') }}</label>
                                <input class="form-control no-border" name="surname" type="text" value="{{ $authUser->surname }}"
                                       id="surname">
                            </div>

                            <div class="form-group">
                                <label for="homepage">{{ __('messages.Gender') }}</label>
                                <select class="form-control no-border" name="gender">
                                    <option value="0" {{ in_array($authUser->gender, array(0, null), true ) ? 'selected' : '' }}>{{ __('messages.Select_gender') }}</option>
                                    <option value="Male" {{ $authUser->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $authUser->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('messages.Country') }}</label>
                                <input class="form-control no-border" name="country" type="text" value="{{ $authUser->country }}"
                                       id="country">
                            </div>

                            <div class="form-group">
                                <label for="adress">{{ __('messages.Location') }}</label>
                                <input class="form-control no-border" name="location" type="text" value="{{ $authUser->location }}" id="city">
                            </div>

                            <div class="form-group">
                                <label for="ort">{{ __('messages.Homepage') }}</label>
                                <input class="form-control no-border" name="homepage" type="text"
                                       value="{{ $authUser->homepage }}" id="homepage">
                            </div>

                            <div class="form-group">
                                <label for="year">{{ __('messages.Birth_Year') }}</label>
                                <input class="form-control no-border" name="birth_year" type="text" value="{{ $authUser->birth_year }}"
                                       id="year">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <input class="btn btn-primary btn-sea mr-1" type="submit" value="Save">
                    <a href="{{ route('profile.personal-info') }}" class="btn btn-cancel">Cancel</a>
                </div>

            </form>


        </div>
    </div>
@endsection

@section('scripts')
    <style>


        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: 100%;
            width: 100%;
        }


        .page-title {
            text-transform: uppercase;
            font-weight: normal;
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
        }

        .no-border {
            border-style: none !important;
            font-size: 14px;
            background: #fff;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
            color: #777777;
            border: 0;
            padding: 0 15px;
        }

        .btn-cancel {
            background: white !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
            color: #777777 !important;
        }

        .btn:not(.btn-sm) {
            font-size: 14px;
            text-transform: uppercase;
            height: 42px;
            line-height: 42px;
            padding: 0 15px;
            border-style: none;
        }

        .btn-sea {
            background: #00bff9;
            background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
            border-width: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        }

    </style>


    <script>

    </script>
@endsection


