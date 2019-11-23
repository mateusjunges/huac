@extends('adminlte::page')
@section('title', 'Agendamento de cirurgias')
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
@section('js')
    <script>
        json = document.getElementById('surgical-rooms-json');
        window.surgicalRooms = JSON.parse(json.value);
    </script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src='{{ asset('vendor/fullcalendar/lib/moment.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/fullcalendar.min.js')}}'></script>
    <script src="{{ asset('js/schedule/confirmed-materials.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/locale/pt-br.js') }}"></script>

@endsection

@section('content')
    <input type="hidden" id="surgical-rooms-json" value="{{ $surgicalRoomsJSON }}">
    <div id="app">
        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
        {{-- Events config --}}
        <input id="event-config" type="hidden"
               data-color="#24872c"
               data-room="1">
        {{-- End event config --}}
        <div class="row" id="search-row">
            <div class="col-md-9">
                <div class="box-1">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search"
                               data-id=""
                               id="search"
                               placeholder="Digite o número do prontuário ou o nome do paciente..." />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <button class="btn btn-sm btn-primary" data-id="1" id="search-button">Pesquisar</button>
                </div>
            </div>
        </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body">
                    <h2>Agendamentos com mateirais confirmados</h2>
                    <p>
                        Esta tela é utilizada para mostrar as cirurgias agendadas que já possuem os materiais confirmados
                        pelo CME e centro cirúrgico.
                    </p>
                    <ul>
                        <li>
                            Clique no nome de um paciente para ver mais opções.
                        </li>
                        <br>
                        <li>
                            Utilize o botão
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-play-circle" aria-hidden="true"></i> Iniciar cirurgia
                            </button>
                            para dar início a uma cirurgia.
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

    @include('_modals.schedule.event-click-modal')
    @include('_modals.scheduling.change-room-modal')
    @include('_modals.scheduling.change-status-modal')
    @include('_modals.scheduling.change-event-date-modal')
    @include('_modals.scheduling.history-modal')
@endsection
