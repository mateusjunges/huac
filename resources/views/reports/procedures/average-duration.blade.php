@extends('adminlte::page')
@section('title', 'Tempo de duração médio de procedimentos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reports/reports.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/reports/procedures/average-duration.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Tempo de duração médio para cada procedimento</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <label for="starting-at">Selecione o início:</label>
                    <input type="date"
                           id="starting-at"
                           placeholder="Selecione o início" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="ending-at">Selecione o fim:</label>
                    <input type="date"
                           id="ending-at"
                           placeholder="Selecione o fim:" class="form-control">
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-12">
            <table class="table table-responsive table-hover dataTable">
                <thead>
                    <tr>
                        <th>Procedimento</th>
                        <th>Duração média</th>
                    </tr>
                </thead>
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
                    <h2>Tempo médio de duração de cirurgias</h2>
                    <p>
                        Esta tela é utilizada para mostrar dados referentes ao tempo médio de execução de um procedimento.
                    </p>
                    <ul>

                        <li>
                            Você pode filtrar os dados por um período específico no tempo utilizando os campos
                            <div >
                                <label>Selecione o início:</label>
                                <input type="date"class="form-control">
                                e
                                <label>Selecione o fim::</label>
                                <input type="date"class="form-control">
                            </div>
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
