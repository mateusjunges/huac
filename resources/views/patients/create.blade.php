@extends('adminlte::page')
@section('title', 'Cadastro de pacientes')
@section('buttonTitle', 'Cadastrar')
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Cadastro de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('patients.store') }}" method="post">
                @include('_forms.patients.patients')
            </form>
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
                    <h2>Cadastrar pacientes</h2>
                    <p>
                        Esta tela é utilizada para fazer o cadastro de pacientes no sistema.
                    </p>
                    <ul>
                        <li>Todos os campos do formulário <b>são obrigatórios</b>!</li>
                        <li>
                            Preencha as informações solicitadas e clique no botão
                            <button class="btn btn-success">
                                Cadastrar
                            </button>
                            para cadastrar o paciente
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
