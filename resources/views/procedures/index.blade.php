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
    <div class="modal" tabindex="-1" role="dialog" id="help-modal" data-backdrop="false">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body">
                    <h2>Gerenciar procedimentos cirúrgicos</h2>
                    <p>
                        Esta tela é utilizada para gerenciar procedimentos cirúrgicos cadastrados no sistema.
                    </p>
                    <ul>

                        <li>
                            Você pode utilizar a barra de busca para procurar por um procedimento específico.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            para editar um procedimento.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            para remover um procedimento cirúrgico do sistema.
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
