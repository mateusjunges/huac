@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
   <div id="app">
        <create-surgery></create-surgery>
   </div>
@endsection
