@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ACL/users/index.css') }}">
    <style>
        table#users {
            width: 100% !important;
        }
        .new-user-btn {
            padding-bottom: 1em;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/ACL/users/index.js') }}"></script>
    <script src="{{ asset('js/ACL/users/permissions/assign-permissions.js') }}"></script>
    <script src="{{ asset('js/ACL/users/groups/assign-groups.js') }}"></script>
    <script src="{{ asset('js/CRUD/crud.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
    <div class="row">
        <h1 class="text-center">Lista de usuários</h1>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <div class="row new-user-button">
                <div class="col-md-3 col-md-push-9 new-user-btn">
                    <a href="{{ route('users.create') }}" data-toogle="tooltip" title="Novo usuário">
                        <button class="btn btn-default btn-block">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </a>
                </div>
            </div>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="help-modal">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body block">
                    <h2>Usuários cadastrados</h2>
                    <p>
                        Esta tela é utilizada para gerenciar os usuários que utilizam o sistema.
                    </p>
                    <ul>
                        <li>
                            Você pode utilizar o campo "buscar" para procurar por um usuário específico
                        </li>
                        <br>
                        @can('users.edit')
                            <li>
                                Utilize o botão
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                para editar os dados de um usuário
                            </li>
                            <br>
                        @endcan
                        @can('users.delete')
                            <li>
                                Utilize o botão
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                para remover um usuário do sistema.
                            </li>
                            <br>
                        @endcan
                        @can('users.assign-group')
                            <li>
                                Utilize o botão
                                <button class="btn btn-sm btn-default">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                da coluna "Atribuir grupo" para adicionar um grupo de permissões aos usuários.
                            </li>
                            <br>
                        @endcan
                        @can('users.assign-permission')
                            <li>
                                Utilize o botão
                                <button class="btn btn-sm btn-default">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                da coluna "Atribuir permissão" para atribuir uma permissão a os usuários.
                            </li>
                            <br>
                        @endcan
                        @can('users.view-permissions')
                            <li>
                                Utilize o botão
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </button>
                                para ver as permissões atribuídas aos usuários
                            </li>
                            <br>
                        @endcan
                        @can('users.view-groups')
                            <li>
                                Utilize o botão
                                <button class="btn btn-sm btn-info">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                </button>
                                para ver os grupos atribuídos aos usuários
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
    @include('_modals.users.assign-permission')
    @include('_modals.users.assign-groups')
@endsection
