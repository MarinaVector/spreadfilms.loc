@extends('layouts.profile')

@section('title', 'Admin Users')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        <div id="page">
            <div class="container bg-profile admin-container">
                <div class="row" id="view">
                    <div class="col-xl-12">
                        <div class="row">
                            <h1 class="page-title">{{ __('messages.Users')}}</h1>
                        </div>

                        <div class="btn-group group-actions mb-2" role="group">
                            <a href="{{ route('company-users.add') }}" class="btn btn-admin ">
                                <i class="fas fa-plus-circle fas-admin"></i>Add user
                            </a>
                        </div>

                        <div class="box-white">
                            <div class="btn-group group-filter mb-2" role="group">
                                <div class="btn group-label">Role:</div>
                                <a href="/" class="btn btn-admin active">Spreadfilms</a>
                                <a href="/" class="btn btn-admin">Admin</a>
                                <a href="/" class="btn btn-admin">Employee</a>
                                <a href="/" class="btn btn-admin">Probationer</a>
                                <a href="/" class="btn btn-admin">No role</a>
                            </div>
                            <div>
                                <p>3 entries</p>
                            </div>
                            <table class="table table-user">
                                <thead>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Role') }}</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach ($authUserCompanyUsers as $user)
                                    <tr>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->companyrolesList() }}</td>
                                        <td>
                                            <div class="btn-group pull-right mt-2">
                                                <a href="{{ route('admin-company-user.edit', ['user_id' => $user->id]) }}"
                                                   class="btn btn-sm btn-change"><i
                                                        class="fas fa-pen fa-fw fas-admin mr-1"></i>Edit</a>
                                                <!--  <a href="/" class="btn btn-sm btn-change"><i
      class="fas fa-trash-alt fas-admin fa-fw mr-1"></i>Delete</a> -->

                                                <form action="{{ route('company-user.delete') }}" method="POST"
                                                      id="deleteUserForm" name="deleteUserForm">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{$user->id}}"/>
                                                    <a class="btn btn-sm btn-change"
                                                       onclick="event.preventDefault(); if(confirm('Delete user ?')){document.getElementsByName('deleteUserForm')[0].submit();}">
                                                        <i class="fas fa-trash-alt fas-admin fa-fw mr-1"></i>{{ __('messages.Delete') }}
                                                    </a>
                                                </form>

                                                <a href="/" class="btn btn-sm btn-change"><i
                                                        class="fas fas fa-sitemap fa-fw fas-admin mr-1"></i>Plan</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>
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

    </style>

@endsection
