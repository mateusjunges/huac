@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/groups/index.js') }}"></script>
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
    <div class="col-md-8 col-md-pull-2 col-md-push-2">
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
                </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->slug }}</td>
                    @can('groups.view-permissions')
                        <td>
                            <button class="btn btn-success btn-sm view-group-permissions">
                                <i class="fa fa-check-circle"></i>
                            </button>
                        </td>
                    @endcan
                    @can('groups.assign-user')
                        <td>
                            <button class="btn btn-warning btn-sm assign-user-to-group"
                                    data-type="grupo"
                                    data-gender="o"
                                    data-route="groups"
                                    data-name="{{ $group->name }}"
                                    data-id="{{ $group->id }}"
                                    id="group{{$group->id}}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    @endcan
                    @can('groups.edit')
                        <td>
                            <a href="{{ route('groups.edit', $group->id) }}">
                                <button class="btn btn-primary btn-sm edit-group">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                    @endcan
                    @can('groups.delete')
                        <td>
                            <button class="btn btn-danger btn-sm delete"
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
