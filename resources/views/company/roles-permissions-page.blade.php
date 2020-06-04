@extends('layouts.profile')

@section('title', 'Admin Roles&Permissions Management')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <div class="row" id="view">
                <div class="col-xl-9">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Roles_and_permissions')}}</h1>
                    </div>

                    <div class="btn-group group-actions mb-2" role="group">
                        <a href="{{ route('company.role.add') }}" class="btn btn-admin "><i
                                class="fas fa-plus-circle fas-admin"></i>
                            Add role</a>
                    </div>

                    Roles and permissions like here <a href="https://verovis.spreadfilms.space/admin/permissions">
                        https://verovis.spreadfilms.space/admin/permissions
                    </a>
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
