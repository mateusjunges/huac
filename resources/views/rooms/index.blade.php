@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rooms/index.css') }}">
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
        <h1 class="text-center">Lista de salas</h1>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-pull-1 col-md-push-1">
            <div class="row new-room-button">
                <div class="col-md-3 col-md-push-9 new-room-btn">
                    <a href="{{ route('rooms.create') }}" data-toogle="tooltip" title="Nova sala">
                        <button class="btn btn-default btn-block">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </a>
                </div>
            </div>
            <table class="table table-hover table-responsive-md text-center" id="room">
                <thead>
                    <tr>
                        <th>Nome da Sala</th>
                        <th>Disponível</th>
                        <th>Indisponível</th>
                        @can('rooms.edit')
                            <th>Editar</th>
                        @endcan
                        @can('rooms.delete')
                            <th>Remover</th>
                        @endcan
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
