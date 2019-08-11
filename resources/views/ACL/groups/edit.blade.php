@extends('adminlte::page')
@section('buttonTitle', 'Atualizar grupo')
@section('css')
    <style>
        .validation-error {
            border: solid 1px #ff0000;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/ACL/groups/create.js') }}"></script>
@endsection

@section('content')
    <div class="row" id="app">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <h1 class="text-center">Cadastro de grupos de permissões</h1>
            <form action="{{ route('groups.update', $group->id) }}" method="post">
                @method('PUT')
                @include('_forms.groups.groups')
            </form>
        </div>
    </div>
@endsection
