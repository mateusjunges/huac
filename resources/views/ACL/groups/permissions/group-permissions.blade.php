@extends('adminlte::page')
@section('css')
    <style>
        table#group-permissions {
            width: 100% !important;
        }
    </style>

@endsection
@section('js')
    <script src="{{ asset('js/ACL/groups/permissions/index.js') }}"></script>
    <script src="{{ asset('js/ACL/groups/permissions/revoke-permissions.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Lista de permissões do grupo {{ $group->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <table class="table table-responsive table-hover" id="group-permissions">
                <thead>
                    <th>Nome</th>
                    <th>Slug</th>
                    @can('groups.remove-permission')
                        <th>Remover permissão</th>
                    @endcan
                    <th>Descrição</th>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->slug }}</td>
                        @can('groups.remove-permission')
                            <td>
                                <button class="btn btn-sm btn-danger delete"
                                        data-type="permissão"
                                        data-gender="a"
                                        data-permission="{{ $permission->id }}"
                                        data-group="{{ $group->id }}"
                                        data-name="{{ $permission->name }}"
                                        value="{{ csrf_token() }}"
                                        id="permission{{ $permission->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        @endcan
                        <td>{{ $permission->description != null ? $permission->description : 'Não informado.' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
