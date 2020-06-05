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
                                <td colspan="4"><strong>Permissions</strong></td>
                            </tr>
                            <tr>
                                <td>admin permissions
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
                                <td colspan="4"><strong>Roles</strong></td>
                            </tr>
                            <tr>
                                <td>admin roles
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
                                <td colspan="4"><strong>Users</strong></td>
                            </tr>
                            <tr>
                                <td>admin users
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
                                <td>view users
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
                                <td>create users
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
                                <td>edit users
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
                                <td>delete users
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
                                <td colspan="4"><strong>Manager</strong></td>
                            </tr>
                            <tr>
                                <td>view manager
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create manager
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit manager
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Manager</strong></td>
                            </tr>
                            <tr>
                                <td>delete Manager
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Consultant</strong></td>
                            </tr>
                            <tr>
                                <td>view Consultant
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create Consultant
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit Consultant
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>delete Consultant
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>User</strong></td>
                            </tr>
                            <tr>
                                <td>view user
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create user
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit user
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>delete user
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Projects</strong></td>
                            </tr>
                            <tr>
                                <td>view projects
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create projects
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit projects
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>delete projects
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>close projects
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href="/"><i class="fal fa-trash-alt fa-fw"></i></a>
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
                                <td colspan="4"><strong>Сontacts</strong></td>
                            </tr>
                            <tr>
                                <td>view Сontacts
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create сontacts
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit сontacts
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>delete сontacts
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Pm</strong></td>
                            </tr>
                            <tr>
                                <td>view pm
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit pm
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Planning</strong></td>
                            </tr>
                            <tr>
                                <td>view planning
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Dashboard</strong></td>
                            </tr>
                            <tr>
                                <td>view dashboard
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href="/"><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Tutorials</strong></td>
                            </tr>
                            <tr>
                                <td>view tutorials
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create tutorials
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
                                <td>edit tutorials
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
                                <td>delete tutorials
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
                                <td colspan="4"><strong>Holidays</strong></td>
                            </tr>
                            <tr>
                                <td>view holidays
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>create holidays
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>edit holidays
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>delete holidays
                                    <a href=""><i class="fal fa-pencil fa-fw"></i></a>
                                    <a href=""><i class="fal fa-trash-alt fa-fw"></i></a>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fal fa-check"></i>
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td>admin holidays
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
                                <td colspan="4"><strong>Projects type</strong></td>
                            </tr>
                            <tr>
                                <td>admin projects
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
                                <td colspan="4"><strong>Sick days</strong></td>
                            </tr>
                            <tr>
                                <td>admin sick days
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
                                <td colspan="4"><strong>Calendar</strong></td>
                            </tr>
                            <tr>
                                <td>admin calendar
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
                                <td colspan="4"><strong>Groups</strong></td>
                            </tr>
                            <tr>
                                <td>admin groups
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
