@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/rooms/index.css') }}">
    <style>
        table#rooms {
            width: 100% !important;
        }
        .new-room-btn {
            padding-bottom: 1em;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/rooms/index.js') }}"></script>
    <script src="{{ asset('js/rooms/status.js') }}"></script>
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
            <table class="table table-hover table-responsive-md text-center dataTable" id="rooms">
                <thead>
                    <tr>
                        <th>Nome da Sala</th>
                        @can('rooms.change-status')
                            <th>Disponível</th>
                        @endcan
                        @can('rooms.update')
                            <th>Editar</th>
                        @endcan
                        @can('rooms.delete')
                            <th>Remover</th>
                        @endcan
                        <th>Cor da sala</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surgicalRooms as $room)
                        <tr>
                            <td>{{ $room->name }}</td>
                            @can('rooms.change-status')
                                <td>
                                    <button class="btn btn-{{ $room->available ? 'success' : 'danger' }} lock"
                                            data-id="{{ $room->id }}">
                                        @if($room->available)
                                            <i class="fa fa-check" id="icon-{{ $room->id }}"></i>
                                        @else
                                            <i class="fa fa-times" id="icon-{{ $room->id }}"></i>
                                        @endif
                                    </button>
                                </td>
                            @endcan
                            @can('rooms.update')
                                <td>
                                    <a href="{{ route('rooms.edit', $room->id) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                            @endcan
                            @can('rooms.delete')
                                <td>
                                    <button class="btn btn-danger delete"
                                            data-type="sala"
                                            data-name="{{ $room->name }}"
                                            value="{{ csrf_token() }}"
                                            data-id="{{ $room->id }}"
                                            data-gender="a">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endcan
                            <td class="text-center">
                                <div class=""
                                     style="background: {{ $room->color }};
                                         margin: 0 auto;
                                         width: 100px; height: 10px;">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
