@extends('adminlte::page')
@section('title', 'Editar paciente')
@section('buttonTitle', 'Atualizar')
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Atualizar dados do paciente {{ $patient->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('patients.update', $patient->id) }}" method="post">
                @method('PUT')
                @include('_forms.patients.patients')
            </form>
        </div>
    </div>
@endsection
