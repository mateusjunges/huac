@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/ACL/groups/index.js') }}"></script>
    <script src="{{ asset('js/CRUD/crud.js') }}"></script>
@endsection
@section('css')
    <style>
        table#groups {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Lista de grupos</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-pull-1 col-md-push-1">
        <table class="table table-responsive table-hover" id="groups">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Slug</th>
                    @can('groups.view-permissions')
                        <th>Ver permissões</th>
                    @endcan
                    @can('groups.assign-user')
                        <th>Atribuir a usuário</th>
                    @endcan
                    @can('groups.edit')
                        <th>Editar</th>
                    @endcan
                    @can('groups.delete')
                        <th>Remover</th>
                    @endcan
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->slug }}</td>
                    @can('groups.view-permissions')
                        <td>
                            <a href="{{ route('groups.permissions', $group->id) }}">
                                <button class="btn btn-success btn-sm view-group-permissions"
                                        data-toggle="tooltip"
                                        title="Ver as permissões deste grupo"
                                        data-placement="top">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </td>
                    @endcan
                    @can('groups.assign-user')
                        <td>
                            <button class="btn btn-warning btn-sm assign-user-to-group"
                                    value="{{ csrf_token() }}"
                                    data-type="grupo"
                                    data-gender="o"
                                    data-route="groups"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Atribuir um usuário a este grupo"
                                    data-name="{{ $group->name }}"
                                    data-id="{{ $group->id }}"
                                    id="group{{$group->id}}">
                                <i class="fa fa-check-circle"></i>
                            </button>
                        </td>
                    @endcan
                    @can('groups.edit')
                        <td>
                            <a href="{{ route('groups.edit', $group->id) }}">
                                <button class="btn btn-primary btn-sm edit-group"
                                        data-placement="top"
                                        title="Editar este grupo"
                                        data-toggle="tooltip">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                    @endcan
                    @can('groups.delete')
                        <td>
                            <button class="btn btn-danger btn-sm delete"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Remover este grupo"
                                    value="{{ csrf_token() }}"
                                    data-route="groups"
                                    data-gender="o"
                                    data-type="grupo"
                                    data-name="{{ $group->name }}"
                                    data-id="{{ $group->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
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
