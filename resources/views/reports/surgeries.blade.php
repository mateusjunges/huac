@extends('adminlte::page')
@section('title', 'Cirurgias')
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('css')
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-12">
            <surgeries-report :finished-surgeries="{{ $finished }}"
                              :surgeries-with-complications="{{ $withComplications }}"
                              :scheduled-surgeries="{{ $scheduled }}">
            </surgeries-report>
        </div>
    </div>
@endsection
