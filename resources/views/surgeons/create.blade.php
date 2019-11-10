@extends('adminlte::page')
@section('title', 'Cadastro de médicos')
@section('buttonTitle', 'Cadastrar médico')
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
            <h1>Cadastro de médicos</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('surgeons.store') }}" method="post">
                @include('_forms.surgeons.surgeons')
            </form>
        </div>
    </div>
@endsection
