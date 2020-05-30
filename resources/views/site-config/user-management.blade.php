@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <div class="container admin-container">
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

                                <form action="{{ route('user-management.edit', ['user' => $user->id]) }}" method="GET">
                                    @csrf
                                   <!-- <button class="btn btn-info btn-sm" title="{{ __('messages.Edit') }}">
                                        <i class="fas fa-edit"></i> {{ __('messages.Edit') }}
                                    </button> -->
                                        <button type="button" class="btn-men btn-men-inverse btn-men-custom waves-effect waves-light m-b-5"><i class="fas fa-edit mx-4 my-2"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('user-management.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <button class="btn btn-danger btn-sm" title="{{ __('messages.Delete') }}" aria-hidden="true">
                                        <i class="fas fa-trash"></i> {{ __('messages.Delete') }}
                                    </button> -->
                                        <button type="button" class="btn-men btn-men-danger btn-men-custom waves-effect waves-light m-b-5"> <i class="fas fa-trash mx-4 my-2"></i></button>
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
