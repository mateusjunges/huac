@extends('adminlte::page')
@section('title', 'Cadastro de Salas')
@section('buttonTitle', 'Cadastrar sala')
    <style>
    .validation-error {
        border: solid 1px #ff0000;
    }
</style>
@section('css')

@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Cadastro de Salas</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('rooms.store') }}" method="post">
                @include('_forms.rooms.rooms')
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
                    <h2>Cadastro de salas</h2>
                    <p>
                        Esta tela é utilizada para cadastrar salas de cirurgia no sistema.
                    </p>
                    <ul>
                        <li>
                            Informe os dados solicitados e clique no botão
                            <button class="btn btn-success">
                                Cadastrar sala
                            </button>
                            para salvar as informações.
                        </li>
                        <br>

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
