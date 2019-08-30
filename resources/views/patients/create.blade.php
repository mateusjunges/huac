@extends('adminlte::page')
@section('title', 'Cadastro de pacientes')
@section('buttonTitle', 'Cadastrar')
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Cadastro de pacientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('patients.store') }}" method="post">
                @include('_forms.patients.patients')
            </form>
        </div>
    </div>
@endsection
