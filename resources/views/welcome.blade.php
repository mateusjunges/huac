@extends('adminlte::page')
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Bem vindo (a)!</h1>
        </div>
    </div>
    <div class="row h-full flex-row justify-content-lg-end">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 flex-column justify-content-end h-full">
            <div class="alert border border-dark">
                <h4 class="font-weight-light">Se precisar de ajuda para a utilização do sistema, pressione a tecla "/" para visualizar mais informações.</h4>
            </div>
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
                <div class="modal-body">
                    <h2>Olá! bem vindo(a) ao sistema de agendamento cirúrgico! Escolha uma das opções no menu lateral esquerdo para começar</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
