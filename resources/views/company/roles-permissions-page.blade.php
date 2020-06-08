@extends('layouts.profile')

@section('title', 'Admin Roles&Permissions Management')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        <div class="container bg-roles">
            <div class="row">
                <div class="col-xl-12 panel">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Roles_and_permissions')}}</h1>
                    </div>

                    <div class="btn-group group-actions mb-5" role="group">
                        <a href="{{ route('company.role.add') }}" class="btn btn-admin"><i
                                class="fas fa-plus-circle fas-admin mr-2"></i>
                            Add role</a>
                    </div>
                    <div class="box-white row table-bordered table-user">

                        <div class="col box-white table-user">

                            <div class="bg-col my-2" width="25%"></div>


                            <div class="bg-col my-2" colspan="4"><strong>Company Permissions</strong></div>

                            <div class="bg-col my-2">Admin Permissions
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2">Admin Roles
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2" colspan="4"><strong>Company Roles</strong></div>

                            <div class="bg-col my-2">admin
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2">member
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2">actor
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2" colspan="4"><strong>Site Roles</strong></div>

                            <div class="bg-col my-2">superadmin
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2">admin
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>

                            <div class="bg-col my-2">member
                                <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                            </div>
                        </div>
                        <div class="col">

                            <div width="25%" class="text-center bg-col my-2"><strong>Admin</strong></div>

                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>

                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>

                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>

                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div width="25%" class="text-center mb-2">
                                <p class="mb-2">Admin
                                <p>
                                    <a href="" class="btn btn-sm px-3 btn-sea"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>
                                </p>
                            </div>
                        </div>
                        <div class="col">

                            <div width="25%" class="text-center bg-col my-2"><strong>Employee</strong></div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center bg-col my-2">
                                <i class="fal fa-check"></i>
                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>

                            <div width="26%" class="text-center mb-2">
                                <p class="mb-2">Employee
                                <p>
                                    <a href="" class="btn btn-sm px-3 btn-sea"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>
                            </div>
                        </div>

                        <div class="col">

                            <div width="25%" class="text-center bg-col my-2"><strong>Probationer</strong></div>

                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>

                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">

                            </div>
                            <div class="text-center my-2 bg-col">
                            </div>

                            <div width="26%" class="text-center mb-2">
                                <p class="mb-2">Probationer
                                <p>
                                    <a href="" class="btn btn-sm px-3  btn-sea"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <style>


        .bg-roles {
            background-color: #f1f1f1;
            color: #424242;
            height: auto;
            width: 100%;
            background-size: cover;

        }


        .page-title {
            text-transform: uppercase;
            font-weight: normal;
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
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
            color: white !important;
        }

        .table-user {
            border-collapse: separate !important;
            border-spacing: 0 10px !important;
        }

        .table tr {
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        }

        .table thead th:first-child {
            padding-left: 10px;
        }

        .bg-col {
            background: #fff;
            min-height: 45px;
            line-height: 45px;
            margin-right: -15px;
            margin-left: -15px;
            border: 0;
            white-space: nowrap;
            padding-left: 15px;
        }

        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: 100%;
            width: 100% !important;
            background-size: contain;
        }

        .btn-admin {
            background: #fff !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
            color: #777777 !important;
            border-style: none;
        }

        .btn:not(.btn-sm) {
            font-size: 14px;
            text-transform: uppercase;
            height: 42px;
            line-height: 42px;
            padding: 0 15px;
        }

        .btn-change {
            font-size: 14px !important;
            background: #fff !important;
            color: #777777 !important;
            border-style: none;
        }

        .fas-admin {
            color: #777777 !important;
        }

        .btn-admin {
            background: #fff !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
            color: #777777 !important;
            border-style: none;
        }

        .fal {
            font-weight: 300;
        }

        .fa-check {
            margin-top: 15px;
        }

    </style>

    <script>

    </script>


@endsection
