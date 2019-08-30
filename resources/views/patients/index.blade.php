@extends('adminlte::page')
@section('title', 'Lista de pacientes')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/patients/index.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/patients/index.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Pacientes cadastrados</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        @can('patients.update')
                            <th>Editar</th>
                        @endcan
                        @can('patients.delete')
                            <th>Remover</th>
                        @endcan
                        @can('patients.view-surgeries')
                            <th>Ver cirurgias</th>
                        @endcan
                        <th>Prontuário</th>
                        <th>Gênero</th>
                        <th>Nome da mãe</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
