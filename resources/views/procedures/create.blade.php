@extends('adminlte::page')
@section('title', 'Cadastrar procedimentos')
@section('buttonTitle', 'Cadastrar')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Cadastrar procedimento cirúrgico
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('procedures.store') }}" method="post">
                @include('_forms.procedures.procedures')
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
                    <h2>Adicionar procedimentos cirúrgicos</h2>
                    <p>
                        Esta tela é utilizada para adicionar procedimentos cirúrgicos ao sistema.
                    </p>
                    <ul>

                        <li>
                            Todos os campos são obrigatórios.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <buttton class="btn btn-success">Cadastrar</buttton>
                            para salvar o novo procedimento.
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
