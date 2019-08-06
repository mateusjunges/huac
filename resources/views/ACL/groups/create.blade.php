@extends('adminlte::page')
@section('css')
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
<div class="row" id="app">
    <div class="col-md-12">
        <h1 class="text-center">Cadastro de grupos de permissões</h1>
        <form action="" method="">
            <create-groups></create-groups>
        </form>
    </div>
</div>
@endsection
