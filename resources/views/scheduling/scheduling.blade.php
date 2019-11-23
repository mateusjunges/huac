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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='{{ asset('vendor/fullcalendar/lib/moment.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/fullcalendar.min.js')}}'></script>
    <script src="{{ asset('js/scheduling/scheduling.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('js/scheduling/make-events-draggable.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" id="surgical-rooms-json" value="{{ $surgicalRoomsJSON }}">
    <div id="app">
        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
        {{-- Events config --}}
        <input id="event-config" type="hidden"
               data-color="#24872c"
               data-room="{{ $surgicalRooms[0]->id }}">
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
                <div class="botao">
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
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" id="current-room">Sala {{ $surgicalRooms[0]->id }}</h1>
            </div>
        </div>
        <br>
        @if(count($surgicalRooms) == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger box box-danger">
                        Não existem salas disponíveis para agendamento
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 col-md-push-3 col-md-pull-3">
                <label for="surgical-rooms">Selecione a sala de cirurgia</label>
                <select name="" id="surgical-rooms" class="form-control">
                    @foreach($surgicalRooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
{{--            @for($i = 1; $i <= count($surgicalRooms); $i++)--}}
{{--                @if($i%5 == 0)--}}
{{--                    <div class="row">--}}
{{--                @endif--}}
{{--                    <div class="col-md-3">--}}
{{--                        <button type="button"--}}
{{--                                class="btn btn-block"--}}
{{--                                id="surgical-room-{{ $surgicalRooms[$i-1]->id }}"--}}
{{--                                data-toggle="tooltip"--}}
{{--                                data-id="{{ $surgicalRooms[$i-1]->id }}"--}}
{{--                                data-placement="top"--}}
{{--                                title="{{ $surgicalRooms[$i-1]->name }}">--}}
{{--                            {{ $surgicalRooms[$i-1]->name }}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                @if($i%5 == 0)--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endfor--}}
        </div>
    <hr>
        <div class="row">
            @can('events.create')
                <div class="col-md-3">
                    <schedule-surgeries
                        :surgeries-with-denied-materials="{{ $surgeriesWithDeniedMaterials }}"
                        :surgeries="{{ $surgeries }}"
                        :surgeries-in-waiting-list="{{ $surgeriesInWaitingList }}"
                    ></schedule-surgeries>

                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h4 class="box-title">Lista de Espera</h4>
                        </div>
                        <div class="box-body">
                            <!-- the events -->
                            <div id="external-events-waiting-list" class="listaEspera custom-overflow">
                                @foreach($surgeriesInWaitingList as $surgeryInWaitingList)
                                    <div class="fc-event newCirurgia external-event
                                        bg-blue ui-draggable
                                        ui-draggable-handle"
                                         style="border: none"
                                         data-estimated="{{$surgeryInWaitingList->estimated_duration_time }}"
                                         data-id="{{ $surgeryInWaitingList->id }}"
                                         data-title="{{ $surgeryInWaitingList->patient->name  }}"
                                         data-color="#ff0000"
                                         id="surgery{{ $surgeryInWaitingList->id }}">
                                        {{ $surgeryInWaitingList->patient->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="@can('events.create') col-md-9 @endcan @cannot('events.create') col-md-12 @endcannot">
                <div id="fullCalendar"></div>
            </div>
        </div>
    </div>
    @include('_modals.scheduling.event-click-modal')
    @include('_modals.scheduling.change-room-modal')
    @include('_modals.scheduling.change-status-modal')
    @include('_modals.scheduling.change-event-date-modal')
    @include('_modals.scheduling.history-modal')
    <div class="modal" tabindex="-1" role="dialog" id="help-modal">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Ajuda</h4>
                </div>
                <div class="modal-body block">
                    <h2>Agendar cirurgias</h2>
                    <p>Esta tela mostra todas as cirurgias que estão na fila para serem agendadas.
                        Se ela aparece em vermelho, os materiais foram negados, e está aqui para ser reagendada.
                        Se aparece em azul, significa que está na lista de espera.
                    </p>
                    <ul>
                        <li>
                            Você pode utilizar o botão <button class="btn btn-sm btn-primary">Ir para data</button> para ir para uma data específica
                        </li>
                        <br>
                        <li>
                            Você pode utilizar o botão <button class="btn btn-sm btn-primary">Pesquisar</button> para procurar um paciente já agendado pelo número do prontuário
                        </li>
                        <br>
                        <li>Utilize os botões
                            <div class="fc-button-group">
                                <button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left">
                                    Mês
                                </button>
                                <button type="button" class="fc-agendaWeek-button fc-button fc-state-default">
                                    Semana
                                </button>
                                <button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">
                                    Dia
                                </button>
                            </div>
                            para alterar as views do calendário para "dia", "mês" e "semana"</li>
                        <br>
                        <li>Clique sobre uma cirurgia agendada para ver mais detalhes e mostrar as opções disponíveis para cada cirurgia.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection
