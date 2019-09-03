@extends('adminlte::page')
@section('title', 'Iniciar cirurgia')
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Controle de andamento da cirurgia
            </h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-11 col-md-offset-2">
            <div class="col-md-9">
                <on-going-surgery :event-id="{{ $surgery->events()->latest()->first()->id }}"></on-going-surgery>

                <current-surgery-info
                    :surgery="{{ $surgery }}"
                    :patient="{{  $surgery->patient }}">
                </current-surgery-info>
            </div>
        </div>
    </div>
@endsection
