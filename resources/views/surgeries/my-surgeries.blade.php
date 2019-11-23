@extends('adminlte::page')
@section('title', 'Minhas Cirurgias')
@section('js')
    <script src='{{ asset('vendor/fullcalendar/lib/moment.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/fullcalendar.min.js')}}'></script>
    <script src="{{ asset('vendor/fullcalendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('js/surgeries/my-surgeries.js') }}"></script>
@endsection
@section('css')
    <link href=' {{asset('vendor/fullcalendar/fullcalendar.min.css')}}' rel='stylesheet' />
    <link href='{{asset('vendor/fullcalendar/fullcalendar.print.min.css')}}' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="{{ asset('css/scheduling/scheduling.css') }}">
    <style>
        .custom-overflow {
            overflow-y: scroll;
            max-height: 388px;
        }
        .modal-backdrop
        {
            opacity:0.5 !important;
        }
    </style>
@endsection
@section('content')
    <div id="app">
        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-9">
                <div class="box-1">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <input type="date"
                               id="goToDate"
                               data-sala="1"
                               placeholder="Ir para data...">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-sm btn-primary" id="btnGoToDate">Ir para data</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div id="fullCalendar"></div>
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
                    <h2>Minhas cirurgias</h2>
                    <p>Esta tela mostra todas as cirurgias que estão agendadas nas quais você foi listado como o cirurgião principal ou auxiliar.</p>
                    <ul>
                        <li>
                            Você pode utilizar o botão <button class="btn btn-sm btn-primary" id="btnGoToDate">Ir para data</button> para ir para uma data específica
                        </li>
                        <br>
                        <li>Utilize os botões <div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left">Mês</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">Semana</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">Dia</button></div>
                        para alterar as views do calendário para "dia", "mês" e "semana"</li>
                        <br>
                        <li>Clique sobre uma cirurgia agendada para ver mais detalhes</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @include('_modals.surgeries.my-surgeries-event-click')


@endsection
