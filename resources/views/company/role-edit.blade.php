@extends('layouts.profile')

@section('title', 'Edit Role')

@section('content')

    <div class="container-fluid bg-profile admin-container">
        @include('layouts.notifications')
        <div class="container bg-profile">
            <div class="row" id="view">
                <div class="col-xl-9">
                    <div class="row">
                        <h1 class="page-title">{{ __('messages.Edit_role')}}</h1>
                    </div>

                    <div class="panel">
                    </div>


                    <form method="POST" action="{{ route('company.role.update', ['role_id' => $role->id]) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="box-white">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control no-border" name="name" type="text" id="name" value="{{ $role->name }}">
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            @foreach ($allCompanyPermissions as $permission)
                                <li class="list-group-item">
                                    <!-- Default checked -->
                                    <div class="custom-control custom-checkbox">
                                        <input name="permissions[{{ $permission->id }}]" type="checkbox" class="custom-control-input" id="permission{{ $permission->id }}"
                                            @if ($role->permissions->contains($permission))
                                            checked
                                            @endif
                                        >
                                        <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </li>

                                <div class="text-center bg-col my-2">

                                </div>
                            @endforeach
                        </ul>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a href="{{ route('company.roles-permissions-page') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>


                </div>
                <div class="col-xl-3">
                </div>
            </div>
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
