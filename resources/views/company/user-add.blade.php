@extends('layouts.profile')

@section('title', 'Add User')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <div class="row" id="view">
                <div class="col-xl-9">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Add_user')}}</h1>
                    </div>

                    <div class="panel">
                    </div>


                    <form method="POST" action=""
                          accept-charset="UTF-8"><input name="token" type="hidden"
                                                        value="">

                        <div class="box-white">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control no-border" name="name" type="text" id="name">
                            </div>

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input class="form-control no-border" name="surnamee" type="text" id="surname">
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input class="form-control no-border" name="email" type="text" id="email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control no-border" name="pnone" type="text" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control no-border" name="password" type="text" value="" id="password">
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label><br>
                                <input id="admin" name="roles[]" type="checkbox" value="admin">
                                <label for="admin">Admin</label><br>
                                <input id="employee" name="employee" type="checkbox" value="employee">
                                <label for="employee">Employee</label><br>
                                <input id="intern" name="roles[]" type="checkbox" value="intern">
                                <label for="intern">Probationer</label><br>
                            </div>

                            <div class="form-group">
                                <input type="text" class="elfinder" value="" name="benutzerbild">
                            </div>


                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a href="{{ route('company-users.index') }}" class="btn btn-default">Cancel</a>
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
