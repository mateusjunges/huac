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
        <on-going-surgery></on-going-surgery>
    </div>
@endsection
