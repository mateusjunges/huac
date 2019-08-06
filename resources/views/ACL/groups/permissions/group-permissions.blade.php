@extends('adminlte::page')
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Lista de permissões do grupo {{ $group->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <table class="table table-responsive table-hover">
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
                                <button class="btn btn-sm btn-danger"
                                        data-route=""
                                        data-type="permissão"
                                        data-gender="a"
                                        data-name="{{ $permission->name }}"
                                        value="{{ csrf_token() }}"
                                        id="permission{{ $permission->id }}">
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
