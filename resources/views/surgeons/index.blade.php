@extends('adminlte::page')
@section('title', 'Visualizar médicos')
@section('js')
    <script src="{{ asset('js/surgeons/index.js') }}"></script>
    <script src="{{ asset('js/CRUD/crud.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/surgeons/index.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Médicos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <table class="table table-responsive table-bordered dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CRM</th>
                        @can('surgeons.update')
                            <th>Editar</th>
                        @endcan
                        @can('surgeons.delete')
                            <th>Remover</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($surgeons as $surgeon)
                        <tr>
                            <td>{{ $surgeon->name }}</td>
                            <td>{{ $surgeon->crm }}</td>
                            @can('surgeons.update')
                                <td>
                                    <a href="{{ route('surgeons.edit', $surgeon->id) }}">
                                        <button class="btn btn-primary btn-block btn-sm"
                                                data-placement="top"
                                                title="Atualizar este médico"
                                                data-toogle="tooltip">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                            @endcan
                            @can('surgeons.delete')
                                <td>
                                    <button class="btn btn-danger btn-block btn-sm delete"
                                            data-id="{{ $surgeon->id }}"
                                            data-name="{{ $surgeon->name }}"
                                            data-gender="o"
                                            data-type="médico"
                                            data-placement="top"
                                            title="Remover este médico"
                                            data-toogle="tooltip"
                                            data-route="surgeons">
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
