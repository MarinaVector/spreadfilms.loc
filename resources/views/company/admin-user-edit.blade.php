@extends('layouts.profile')

@section('title', 'Add User')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        <div class="container bg-profile">
            <div class="row" id="view">
                <div class="col-xl-9">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Add_user')}}</h1>
                    </div>

                    <div class="panel">
                    </div>

                    <form method="POST" action="{{ route('company-user.edit') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="box-white">
                            <div class="form-group">
                                <label for="email">{{ __('messages.Email') }} ({{ __('messages.Required') }})</label>
                                <input class="form-control no-border" name="email" type="text"
                                       value="{{ $user->email }}" id="email" disabled>
                            </div>


                            <div class="form-group">
                                <label for="firstname">{{ __('messages.Firstname') }}</label>
                                <input class="form-control no-border" name="firstname" type="text" id="firstname"  value="{{ $user->firstname}}">
                            </div>

                            <div class="form-group">
                                <label for="surname">{{ __('messages.Surname') }}</label>
                                <input class="form-control no-border" name="surname" type="text" id="surname">  value="{{ $user->surname }}"
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('messages.Phone') }}</label>
                                <input class="form-control no-border" name="phone" type="text" id="phone"  value="{{ $user->phone }}" disabled>


                             <div class="form-group">
                                <label for="password">{{ __('messages.Password') }}</label>
                                <input class="form-control no-border" name="password" type="password" value=""
                                       id="password" disabled>
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('messages.Role') }}</label><br>
                                @foreach ($user as $role)
                                    <input id="{{ $role->name }}" name="roles[]" type="checkbox"
                                           value="{{ $role->name }}">
                                    <label for="{{ $role->name }}">{{ $role->name }}</label><br>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a href="{{ route('company-users.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                        </div>

                    </form>


                </div>
                <div class="col-xl-3">
                </div>
            </div>
        </div>

        <div>
            <v-dialog/>
        </div>
        <div>
            <modals-container/>
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
