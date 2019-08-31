@extends('adminlte::page')
@section('title', 'Confirmar materiais - CME')
@section('js')
    <script src="{{ asset('js/CME/confirm-materials/index.js') }}"></script>
@endsection
@section('css')
    <style>
        .dataTable {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Verifique os materiais para as cirurgias abaixo:
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-centered table-responsive dataTable">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Prontuário</th>
                        @can('surgeries.update')
                            <th>Editar</th>
                        @endcan
                        @can('cme.confirm-materials')
                            <th>Confirmar</th>
                        @endcan
                        @can('cme.deny-materials')
                            <th>Negar</th>
                        @endcan
                        <th>Materiais</th>
                        <th>Procedimento</th>
                        <th>Status</th>
                        <th>Agendamento</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
