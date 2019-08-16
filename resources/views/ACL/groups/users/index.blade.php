@extends('adminlte::page')
@section('css')
    <style>
        table#group-users {
            width: 100% !important;
        }
    </style>

@endsection
@section('js')
    <script src="{{ asset('js/ACL/groups/users/index.js') }}"></script>
    <script src="{{ asset('js/ACL/groups/users/remove-user.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Lista de usuários no grupo {{ $group->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <table class="table table-responsive table-hover dataTable" id="group-users">
                <thead>
                <th>Nome</th>
                <th>Username</th>
                <th>Email</th>
                @can('groups.remove-user')
                    <th>Remover do grupo</th>
                @endcan
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        @can('groups.remove-user')
                            <td>
                                <button class="btn btn-sm btn-danger delete"
                                        data-type="usuário"
                                        data-gender="o"
                                        data-user="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-group="{{ $group->name }}"
                                        data-group-id="{{ $group->id }}"
                                        data-id="{{ $user->id }}"
                                        value="{{ csrf_token() }}"
                                        id="{{ $user->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
