@extends('adminlte::page')
@section('buttonTitle', 'Atualizar sala')
@section('css')
    <style>
        .validation-error{
            border: solid 1px #ff0000;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $room->name }}</h1>
        </div>
    </div>
    <div class="row" id="app">
        <div class="col-md-8 col-md-push-2 col-md-pull-2">
            <form action="{{ route('rooms.update', $room->id) }}" method="post">
                @method('PUT')
                @include('_forms.rooms.rooms')
            </form>
        </div>
    </div>
@endsection
