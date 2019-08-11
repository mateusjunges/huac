@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/ACL/users/groups/index.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ACL/users/groups/user-groups.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Grupos atribuídos ao usuário {{ $user->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <table class="table table-hover table-responsive dataTable" id="user-groups">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Slug</th>
                        @can('users.revoke-group')
                            <th>Remover grupo</th>
                        @endcan
                        @can('groups.view-permissions')
                            <th>Ver permissões</th>
                        @endcan
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->slug }}</td>
                            @can('users.revoke-group')
                                <td>
                                    <button class="btn btn-danger btn-sm"
                                            data-placement="top"
                                            data-route=""
                                            data-id="{{ $group->id }}"
                                            data-name="{{ $group->name }}"
                                            data-type="grupo"
                                            data-gender="o"
                                            title="Remover grupo do usuário {{ $user->name }}"
                                            data-toggle="tooltip">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endcan
                            @can('groups.view-permissions')
                                <td>
                                    <a href="{{ route('groups.permissions', $group->id) }}">
                                        <button class="btn btn-warning btn-sm"
                                                data-placement="top"
                                                title="Ver permissões do grupo {{ $group->name }}"
                                                data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                </td>
                            @endcan
                            <td>{{ $group->description != null ? $group->description : 'Não informado.' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
