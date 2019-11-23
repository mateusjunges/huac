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
    <div class="modal" tabindex="-1" role="dialog" id="help-modal" data-backdrop="false">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body">
                    <h2>Gerencimanto de médicos</h2>
                    <p>
                        Esta tela é utilizada para gerenciar os cirurgiões cadastrados no sistema.
                    </p>
                    <ul>
                        <li>Você pode utilizar a barra de busca para procurar por um médico específico.</li>
                        <br>
                        <li>
                            Utilize o botão
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            para editar os dados de um médico.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            para remover um médico do sistema.
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
