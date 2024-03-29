@extends("adminlte::page")
@section("title", "Cirurgias cadastradas na lista de espera")
@section('css')
    <style>
        .table {
            width: 100% !important;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/waiting-list/index.js') }}"></script>
    <script src="{{ asset('js/CRUD/crud.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Cirurgias cadastradas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-responsive dataTable">
                <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Prontuário</th>
                    @can('waiting-list.edit')
                        <th>Editar</th>
                    @endcan
                    @can('waiting-list.delete')
                        <th>Excluir</th>
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
