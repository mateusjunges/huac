@extends('adminlte::page')
@section('title', 'Confirmar materiais - CME')
@section('js')
    <script src="{{ asset('js/CME/confirm-materials/index.js') }}"></script>
    <script src="{{ asset('js/CME/confirm-materials/confirm.js') }}"></script>
    <script src="{{ asset('js/CME/confirm-materials/deny.js') }}"></script>
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
                    <h2>Cirurgias cadastradas</h2>
                    <p>
                        Esta tela mostra todas as cirurgias cadastradas no sistema.
                    </p>
                    <ul>
                        <li>
                            Você pode utilizar o campo "buscar" para procurar por uma cirurgia específica
                        </li>
                        <br>
                        @can('surgeries.edit')
                            <li>
                                Utilize o botão
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                para editar os dados de uma cirurgia
                            </li>
                            <br>
                        @endcan
                        @can('surgeries.delete')
                            <li>
                                Utilize o botão
                                <button class="btn btn-danger btn-sm delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                para remover uma cirurgia
                            </li>
                        @endcan
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @include('_modals.CME.deny-materials-modal')
@endsection
