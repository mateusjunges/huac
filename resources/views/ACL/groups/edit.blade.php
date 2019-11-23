@extends('adminlte::page')
@section('buttonTitle', 'Atualizar grupo')
@section('css')
    <style>
        .validation-error {
            border: solid 1px #ff0000;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/ACL/groups/create.js') }}"></script>
@endsection

@section('content')
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <h1 class="text-center">Cadastro de grupos de permissões</h1>
            <form action="{{ route('groups.update', $group->id) }}" method="post">
                @method('PUT')
                @include('_forms.groups.groups')
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
                    <h2>Editar grupos de permissões</h2>
                    <p>
                        Esta tela é utilizada para atualizar grupos de permissões ao sistema.
                        Você precisa escolher um nome e um slug para o grupo, e selecionar as permissões que
                        deseja adicionar a este grupo.
                    </p>
                    <ul>
                        <li>
                            Clique no botão
                            <button class="btn btn-success">
                                Atualizar grupo
                            </button>
                            para salvar os dados do grupo.
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
