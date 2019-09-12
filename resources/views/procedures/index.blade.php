@extends('adminlte::page')
@section('title', 'Visualizar procedimentos')
@section('buttonTitle', 'Cadastrar')
@section('js')
    <script src="{{ asset('js/procedures/index.js') }}"></script>
    <script src="{{ asset('js/procedures/delete-procedure.js') }}"></script>
@endsection
@section('css')
    <style>
        table {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Lista de procedimentos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-responsive dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        @can('procedures.update')
                            <th>Editar</th>
                        @endcan
                        @can('procedures.delete')
                            <th>Remover</th>
                        @endcan
                        <th>Código SUS</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
