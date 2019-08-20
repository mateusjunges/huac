@extends('adminlte::page')
@section('buttonTitle', 'Atualizar')
@section('css')
@endsection
@section('js')
    <script src="{{ asset('js/surgeries/create.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Editar Cirurgia</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('surgeries.update', $surgery->id) }}" method="post">
                @method('PUT')
                @include('_forms.surgeries.surgeries')
            </form>
        </div>
    </div>
@endsection
