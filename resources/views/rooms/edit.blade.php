@extends('adminlte::page')
@section('buttonTitle', 'Atualizar sala')
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
            <h1 class="text-center">{{ $room->name }}</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-push-2 col-md-pull-2">
            <form action="{{ route('rooms.update', $room->id) }}" method="post">
                @method('PUT')
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
                    <h2>Edição de salas</h2>
                    <p>
                        Esta tela é utilizada para cadastrar salas de cirurgia no sistema.
                    </p>
                    <ul>
                        <li>
                            Altere os dados solicitados e clique no botão
                            <button class="btn btn-success">
                                Atualizar sala
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
