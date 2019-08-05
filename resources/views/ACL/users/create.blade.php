@extends('adminlte::page')
@section('css')

@endsection
@section('js')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Novo usuário</h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('users.store') }}">

        </form>
    </div>
@endsection
