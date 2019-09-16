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
    @include('_modals.surgeries.my-surgeries-event-click')
@endsection
