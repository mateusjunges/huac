@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/ACL/groups/index.js') }}"></script>
    <script src="{{ asset('js/CRUD/crud.js') }}"></script>
    <script src="{{ asset('js/ACL/groups/permissions/assign-permissions.js') }}"></script>
    <script src="{{ asset('js/ACL/groups/users/assign-to-user.js') }}"></script>
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
        <table class="table table-responsive table-hover dataTable" id="groups">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Slug</th>
                    @can('groups.view-permissions')
                        <th>Ver permissões</th>
                    @endcan
                    @can('groups.attach-user')
                        <th>Atribuir a usuário</th>
                    @endcan
                    @can('group.view-users')
                        <th>Ver usuários</th>
                    @endcan
                    @can('groups.assign-permission')
                        <th>Atribuir permissão</th>
                    @endcan
                    @can('groups.update')
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
                    @can('groups.attach-user')
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
                    @can('group.view-users')
                        <td>
                            <a href="{{ route('groups.users', $group->id) }}">
                                <button class="btn btn-sm"
                                        data-placement="top"
                                        title="Ver usuários pertencentes ao grupo"
                                        data-toggle="tooltip">
                                    <i class="fa fa-group"></i>
                                </button>
                            </a>
                        </td>
                    @endcan
                    @can('groups.assign-permission')
                        <td>
                            <button class="btn btn-sm btn-default assign-permission"
                                    data-placement="top"
                                    data-id="{{ $group->id }}"
                                    title="Atribuir permissão ao grupo"
                                    data-toggle="tooltip">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </td>
                    @endcan
                    @can('groups.update')
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

<div class="modal" tabindex="-1" role="dialog" id="help-modal" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ajuda</h4>
            </div>
            <div class="modal-body block">
                <h2>Gerenciar grupo de permissões</h2>
                <p>
                    Esta tela é utilizada para gerenciar os grupos de permissões do sistema.
                </p>
                <ul>
                    <li>
                       Você pode utilizar o campo "Buscar" para procurar por um grupo específico.
                    </li>
                    <br>
                    @can('groups.view-permissions')
                        <li>
                            Utilize o botão
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            para ver as permissões atribuídas a um grupo.
                        </li>
                        <br>
                    @endcan
                    @can('groups.attach-user')
                        <li>
                            Utilize o botão
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </button>
                            para atribuir um grupo a um usuário.
                        </li>
                        <br>
                    @endcan
                    @can('group.view-users')
                        <li>
                            Utilize o botão
                            <button class="btn btn-sm">
                                <i class="fa fa-group" aria-hidden="true"></i>
                            </button>
                            para ver os usuários que possuem um grupo.
                        </li>
                        <br>
                    @endcan
                    @can('groups.assign-permission')
                        <li>
                            Utilize o botão
                            <button class="btn btn-sm btn-default">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                            para atribuir permissões a um grupo.
                        </li>
                        <br>
                    @endcan
                    @can('groups.update')
                        <li>
                            Utilize o botão
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            para atualizar as informações de um grupo.
                        </li>
                        <br>
                    @endcan
                    @can('groups.delete')
                        <li>
                            Utilize o botão
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            para remover um grupo de permissões do sistema.
                        </li>
                        <br>
                    @endcan
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    @include('_modals.groups.assign-permissions')
    @include('_modals.groups.attach-user')
@endsection
