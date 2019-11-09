@extends('adminlte::page')
@section('title', 'Atualizar médicos')
@section('buttonTitle', 'Atualizar médico')
<style>
    .validation-error {
        border: solid 1px #ff0000;
    }
</style>
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-pull-3 col-md-push-3 text-center">
            <h1>Atualizar médico {{ $surgeon->name }}</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('surgeons.update', $surgeon->id) }}" method="post">
                @method('PUT')
                @include('_forms.surgeons.surgeons')
            </form>
        </div>
    </div>
@endsection
