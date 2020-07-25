@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <div class="container-fluid bg-profile admin-container">
        <h2 class="mt-5 ml-3">User Management</h2>
        <div class="row">


            @include('layouts.notifications')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{ __('messages.Name') }}</th>
                            <th scope="col">{{ __('messages.Email') }}</th>
                            <th scope="col">{{ __('messages.Role') }}</th>
                            <th scope="col">{{ __('messages.Edit') }}</th>
                            <th scope="col">{{ __('messages.Delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ ($user->email) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    <form action="{{ route('user-management.edit', ['user' => $user->id]) }}"
                                          method="GET">
                                    @csrf
                                    <!-- <button class="btn btn-info btn-sm" title="{{ __('messages.Edit') }}">
                                        <i class="fas fa-edit"></i> {{ __('messages.Edit') }}
                                        </button> -->
                                        <button type="button"
                                                class="btn-men btn-men-inverse btn-men-custom waves-effect waves-light m-b-5">
                                            <i class="fas fa-edit mx-4 my-2"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('user-management.destroy', ['user' => $user->id]) }}"
                                          method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <button class="btn btn-danger btn-sm" title="{{ __('messages.Delete') }}" aria-hidden="true">
                                        <i class="fas fa-trash"></i> {{ __('messages.Delete') }}
                                        </button> -->
                                        <button type="button"
                                                class="btn-men btn-men-danger btn-men-custom waves-effect waves-light m-b-5"
                                                data-toggle="modal" data-target="#modal-info">
                                            <i class="fas fa-trash mx-4 my-2"></i></button>


                                        <!--Info Modal Template-->
                                        <div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <i class="fas fa-trash-alt trash-user fa-3x mx-auto my-3"></i>
                                                    </div>
                                                    <div class="modal-title">Delete this User ?</div>

                                                    <div class="modal-body">Are you sure ?</div>
                                                    <div class="modal-footer mx-auto">
                                                        <button type="button" class="btn button-modal button-chancel" data-dismiss="modal">Chancel</button>
                                                        <button type="button" class="btn button-modal button-ok" data-dismiss="modal">OK</button>
                                                    </div>
                                                </div> <!-- / .modal-content -->
                                            </div> <!-- / .modal-dialog -->
                                        </div>
                                        <!--End Info Modal Templates-->

                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
