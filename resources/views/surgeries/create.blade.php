@extends('adminlte::page')
@section('title', 'Pré agendamento de cirurgias')
@section('buttonTitle', 'Cadastrar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/surgeries/create.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/surgeries/create.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Pré agendamento de cirurgia</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-12">
            <form action="{{ route('surgeries.store') }}" method="post">
                @include('_forms.surgeries.surgeries')
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
                    <h2>Pré agendar cirurgia</h2>
                    <p>
                        Esta tela é utilizada para fazer o pré cadastro de cirurgias no sistema.
                    </p>
                    <ul>
                        <li>
                            Preencha as informações solicitadas e clique no botão
                            <button class="btn btn-success">
                                Cadastrar
                            </button>
                            para salvar os dados da cirurgia.
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
