@extends('adminlte::page')
@section('title', 'Cirurgias do paciente '. $patient->name)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/patients/surgeries/index.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/patients/surgeries/index.js') }}"></script>
@endsection
@section('content')
    <input type="hidden" value="{{ $patient->id }}" id="patient-id">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Cirurgias do paciente {{ $patient->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-responsive dataTable">
                <thead>
                    <tr>
                        @can('surgeries.update')
                            <th>Editar</th>
                        @endcan
                        @can('surgeries.delete')
                            <th>Remover</th>
                        @endcan
                        <th>Médico principal</th>
                        <th>Procedimento</th>
                        <th>Status</th>
                        <th>Agendamento</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
