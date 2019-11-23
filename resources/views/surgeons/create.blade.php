@extends('adminlte::page')
@section('title', 'Cadastro de médicos')
@section('buttonTitle', 'Cadastrar médico')
<style>
    .validation-error {
        border: solid 1px #ff0000;
    }
</style>
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Cadastro de médicos</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('surgeons.store') }}" method="post">
                @include('_forms.surgeons.surgeons')
            </form>
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
                    <h2>Cadastro de médicos</h2>
                    <p>
                        Esta tela é utilizada para cadastrar cirurgiões no sistema.
                    </p>
                    <ul>
                        <li>Você deve cadastrar um usuário para o médico antes de adicioná-lo como médico no sistema.</li>
                        <li>
                            Selecione o usuário para o médico e digite seu CRM.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <buttton class="btn btn-success">Cadastrar médico</buttton>
                            para adicionar o médico ao sistema.
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
