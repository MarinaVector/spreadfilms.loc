@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <div class="container admin-container">
        <h2>User Management</h2>

        @include('layouts.notifications')

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">{{ __('messages.Name') }}</th>
                <th scope="col">{{ __('messages.Email') }}</th>
                <th scope="col">{{ __('messages.Role') }}</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('user-management.edit', ['user' => $user->id]) }}" method="GET">
                                @csrf
                                <button class="btn btn-info btn-sm" title="{{ __('messages.Edit') }}">
                                    <i class="fas fa-edit"></i> {{ __('messages.Edit') }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user-management.destroy', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="{{ __('messages.Delete') }}" aria-hidden="true">
                                    <i class="fas fa-trash"></i> {{ __('messages.Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
