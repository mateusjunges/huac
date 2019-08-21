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
    </style>

@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='{{ asset('vendor/fullcalendar/lib/moment.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/fullcalendar.min.js')}}'></script>
    <script src="{{ asset('js/scheduling/scheduling.js') }}"></script>
@endsection

@section('content')

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
                <h1 class="text-center" id="current-room">Sala 1</h1>
            </div>
        </div>
        <br>
{{--        @if(\App\Sala::find(1)->disponivel == false--}}
{{--            && \App\Sala::find(2)->disponivel == false--}}
{{--            && \App\Sala::find(3)->disponivel == false--}}
{{--            && \App\Sala::find(4)->disponivel == false)--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="alert alert-danger box box-danger">--}}
{{--                        Não existem salas disponíveis para agendamento!--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="row" id="escolhaSalas">--}}
        <div class="row">
            @for($i = 1; $i <= count($surgicalRooms); $i++)
                @if($i%4 == 0)
                    <div class="row">
                @endif
                    <div class="col-md-3">
                        <button type="button"
                                class="btn btn-block"
                                id="surgical-room-{{$surgicalRooms[$i-1]->id}}"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="{{ $surgicalRooms[$i-1]->name }}">
                            {{ $surgicalRooms[$i-1]->name }}
                        </button>
                    </div>
                @if($i%4 == 0)
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <hr>
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-default btn-block emergency" id="emergency-schedule">
                    Adicionar cirurgia de emergência
                </button>
                {{-- Vue component --}}
                <surgeries-to-be-scheduled
                    :surgeries-without-materials="{{ $surgeriesWithDeniedMaterials }}"
                    :surgeries="{{ $surgeries }}"
                    :surgeries-waiting-list="{{ $surgeriesInWaitingList }}"
                ></surgeries-to-be-scheduled>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-title">Lista de Espera</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events" class="listaEspera custom-overflow">
                            @foreach($surgeriesInWaitingList as $cirurgia_e)
                                <div class="fc-event newCirurgia external-event
                                        bg-blue ui-draggable
                                        ui-draggable-handle"
                                     style="border: none"
                                     data-id="{{ $cirurgia_e->id }}"
                                     data-title="{{ \HUAC\Models\Patient::where('id', '=', $cirurgia_e->paciente_id)->first()->nome }}"
                                     data-color="#ff0000"
                                     data-start="{{ $cirurgia_e->hora_inicio != null ? $cirurgia_e->hora_inicio : null }}"
                                     data-estimado="{{ $cirurgia_e->tempo_estimado }}"
                                     id="cirurgia{{ $cirurgia_e->id }}">
                                    {{ \HUAC\Models\Patient::where('id', '=', $cirurgia_e->paciente_id)->first()->nome}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div id="fullcalendar"></div>
            </div>
        </div>
    </div>
@endsection
