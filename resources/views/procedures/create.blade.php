@extends('adminlte::page')
@section('title', 'Cadastrar procedimentos')
@section('buttonTitle', 'Cadastrar')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Cadastrar procedimento cirúrgico
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="{{ route('procedures.store') }}" method="post">
                @include('_forms.procedures.procedures')
            </form>
        </div>
    </div>
@endsection
