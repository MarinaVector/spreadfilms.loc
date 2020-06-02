@extends('layouts.profile')

@section('title', 'User Info Change')

@section('content')
    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <h1 class="page-title mb-3 mt-5">Profile | Info Change</h1>

            @include('layouts.notifications')
            <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="">
                @csrf
                <div class="box-white">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control no-border" name="name" type="text"
                                       value="{{ $authUser->firstname }}" id="name">
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input class="form-control no-border" name="email" type="text"
                                       value="{{ $authUser->email }}"
                                       id="email">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control no-border" name="gender">
                                    <option value="Male" selected="selected">Male</option>
                                    <option value="Femail">Femail</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="language">Native Language</label>
                                <select class="form-control no-border" name="language">
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
                                <label for="homepage">Homepage</label>
                                <input class="form-control no-border" name="homepage" type="text"
                                       value="http://www.site.de" id="homepage">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control no-border" name="phone" type="text" value="0861 90 15 0000">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="sername">Serhname</label>
                                <input class="form-control no-border" name="sername" type="text" value="Doe"
                                       id="sername">
                            </div>

                            <div class="form-group">
                                <label for="adress">Adress</label>
                                <input class="form-control no-border" name="adress" type="text" value="Green 27"
                                       id="adress">
                            </div>

                            <div class="form-group">
                                <label for="zip">ZIP code</label>
                                <input class="form-control no-border" name="zip" type="text" value="83278" id="zip">
                            </div>

                            <div class="form-group">
                                <label for="ort">City</label>
                                <input class="form-control no-border" name="city" type="text" value="Paris" id="city">
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input class="form-control no-border" name="country" type="text" value="Deutschland"
                                       id="country">
                            </div>

                            <div class="form-group">
                                <label for="year">Birth year</label>
                                <input class="form-control no-border" name="year" type="text" value="2000"
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


