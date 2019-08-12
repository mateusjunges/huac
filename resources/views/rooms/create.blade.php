@extends('adminlte::page')
@section('title', 'Cadastro de Salas')
@section('buttonTitle', 'Cadastrar sala')
    <style>
    .validation-error {
        border: solid 1px #ff0000;
    }
</style>
@section('css')

@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Cadastro de Salas</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('rooms.store') }}" method="post">
                @include('_forms.rooms.rooms')
            </form>
        </div>
    </div>
@endsection
