@extends('adminlte::page')
@section('buttonTitle', 'Atualizar usuário')
@section('css')
    <style>
        .validation-error{
            border: solid 1px #ff0000;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $user->name }}</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-push-2 col-md-pull-2">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @method('PUT')
                @include('_forms.users.users')
            </form>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="help-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body block">
                    <h2>Editar usuários</h2>
                    <p>
                        Esta tela é utilizada para atualizar os usuários que utilizam o sistema.
                    </p>
                    <ul>
                        <li>
                            Preencha os dados do usuário que deseja editar e clique no botão
                            <button class="btn btn-success">
                                Atualizar usuário
                            </button>
                            para alterar o usuário.
                        </li>
                        <br>
                        <li>Todos os campos são obrigatórios!</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
