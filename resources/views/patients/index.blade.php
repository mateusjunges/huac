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
    <div class="modal fade" tabindex="-1" role="dialog" id="help-modal">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body block">
                    <h2>Pacientes cadastrados</h2>
                    <p>
                        Esta tela mostra todos os pacientes já cadastrados no sistema.
                    </p>
                    <ul>
                        @can('patients.delete')
                            <li>Utilize o botão
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                para inativar este paciente.
                            </li>
                        @endcan
                        <br>
                        @can('patients.update')
                            <li>
                                Utilize o botão
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                para editar os dados de um paciente.
                            </li>
                            <br>
                        @endcan
                        @can('patients.view-surgeries')
                            <li>
                                Utilize o botão
                                <button class="btn btn-default btn-sm" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                                para ver as cirurgias cadastradas para este paciente.
                            </li>
                            <br>
                        @endcan
                        <li>Você pode utilizar o campo "buscar" para procurar por um paciente cadastrado.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
