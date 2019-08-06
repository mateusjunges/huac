@extends('adminlte::page')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Lista de grupos</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-pull-2 col-md-push-2">
        <table class="table table-responsive table-hover">
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
        </table>
    </div>
</div>
@endsection
