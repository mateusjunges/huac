@extends('adminlte::page')
@section('title', 'Cirurgias')
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('css')
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-12">
            <surgeries-report :finished-surgeries="{{ $finished }}"
                              :surgeries-with-complications="{{ $withComplications }}"
                              :surgeries-to-be-scheduled="{{ $toBeScheduled }}"
                              :scheduled-surgeries="{{ $scheduled }}">
            </surgeries-report>
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
                    <h2>Relatório de cirurgias</h2>
                    <p>
                        Esta tela é utilizada para mostrar dados referentes as cirurgias no sistema.
                    </p>
                    <ul>

                        <li>
                            Você pode filtrar os dados por um período específico no tempo utilizando os campos
                            <div >
                                <label>Início em:</label>
                                <input type="date"class="form-control">
                                e
                                <label>Término em:</label>
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
