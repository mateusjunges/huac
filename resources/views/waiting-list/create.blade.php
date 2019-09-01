@extends('adminlte::page')
@section('title', 'Adicionar cirurgia a lista de espera')
@section('buttonTitle', 'Cadastrar')
@section('css')
@endsection
@section('js')
    <script src="{{ asset('js/waiting-list/create.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Adicionar cirurgia a lista de espera
            </h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-12">
            <form action="{{ route('waiting-list.store') }}" method="post">
                @include('_forms.surgeries.surgeries')
            </form>
        </div>
    </div>
@endsection
