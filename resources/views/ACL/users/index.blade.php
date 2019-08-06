@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ACL/users/index.css') }}">
    <style>
        table#users {
            width: 100% !important;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/ACL/users/index.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
    <div class="row">
        <h1 class="text-center">Lista de usuários</h1>
    </div>
    <div class="row col-md-3 col-md-push-11">
        <div class="new-user text-center">
            <a href="{{ route('users.create') }}" data-toggle="tooltip" title="Novo usuário">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <table class="table table-hover table-responsive-md text-center" id="users">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Username</th>
                        @can('users.edit')
                            <th>Editar</th>
                        @endcan
                        @can('users.delete')
                            <th>Remover</th>
                        @endcan
                        @can('users.assign-group')
                            <th>Atribuir grupo</th>
                        @endcan
                        @can('users.assign-permission')
                            <th>Atribuir permissisão</th>
                        @endcan
                        @can('users.view-permissions')
                            <th>Ver permissões</th>
                        @endcan
                        @can('users.view-groups')
                            <th>Ver grupos</th>
                        @endcan
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
