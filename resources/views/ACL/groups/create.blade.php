@extends('adminlte::page')
@section('buttonTitle', 'Cadastrar grupo')
@section('css')
    <style>
    .validation-error {
        border: solid 1px #ff0000;
    }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/ACL/groups/create.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
@endsection

@section('content')
<div class="row" id="app">
    <div class="col-md-8 col-md-pull-2 col-md-push-2">
        <h1 class="text-center">Cadastro de grupos de permissões</h1>
        <form action="{{ route('groups.store') }}" method="post">
            @include('_forms.groups.groups')
        </form>
    </div>
</div>
@endsection
