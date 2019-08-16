@extends('adminlte::page')
@section('title', 'Pré agendamento de cirurgias')
@section('buttonTitle', 'Cadastrar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/surgeries/create.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Pré agendamento de cirurgia</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-12">
            <form action="{{ route('surgeries.store') }}" method="post">
                @include('_forms.surgeries.surgeries')
            </form>
        </div>
    </div>
@endsection
