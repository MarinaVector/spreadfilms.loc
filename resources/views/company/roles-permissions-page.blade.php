@extends('layouts.profile')

@section('title', 'Admin Roles&Permissions Management')

@section('content')

    <!--<div class="container-fluid bg-profile admin-container">
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
      -->


                <div class="container-fluid bg-profile admin-container">
                    <div class="container bg-roles">
            <div class="row">
                <div class="col-xl-12 panel">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Roles_and_permissions')}}</h1>
                    </div>


                    <div class="btn-group group-actions mb-2" role="group">
                        <a href="{{ route('company.role.add') }}" class="btn btn-admin"><i
                                class="fas fa-plus-circle fas-admin"></i>
                            Add the permission</a>
                    </div>



                    <div class="box-white">
                        <table class="table table-bordered table-user">
                            <thead>
                            <tr>
                                <th></th>
                                <th width="26%" class="text-center">Admin</th>
                                <th width="26%" class="text-center">Employee</th>
                                <th width="26%" class="text-center">Probationer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="4"><strong>Company Permissions</strong></td>
                            </tr>
                            <tr>
                                <td>Admin Permissions
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>Admin Roles
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Company Roles</strong></td>
                            </tr>
                            <tr>
                                <td>admin
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>

                            <tr>
                                <td>member
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>

                            <tr>
                                <td>actor
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4"><strong>Site Roles</strong></td>
                            </tr>
                            <tr>
                                <td>superadmin
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>admin
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>member
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>




                            <tr>
                                                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th width="26%" class="text-center mb-2">
                                    <p class="mb-2">Admin<p>
                                    <a href="" class="btn btn-admin btn-sm px-3"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>

                                </th>
                                <th width="26%" class="text-center mb-2">
                                    <p class="mb-2">Employee<p>
                                    <a href="" class="btn btn-admin btn-sm px-3"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>
                                </th>
                                <th width="26%" class="text-center mb-2">
                                    <p class="mb-2">Probationer<p>
                                    <a href="" class="btn btn-admin btn-sm px-3"><i class="fal fa-pencil fa-fw mr-1"></i>Edit</a>
                                </th>
                            </tr>




                            </tfoot>
                        </table>
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

        .table thead th, .table tbody tr td {
            background: #fff;
            min-height: 50px;
            line-height: 50px;
            border: 0;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            white-space: nowrap;
        }

        .bg-profile {
            background-color: #f1f1f1;
            color: #424242;
            height: auto;
            width: 100%;
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
            margin-top:15px;
        }

    </style>


    <script>

    </script>


@endsection
