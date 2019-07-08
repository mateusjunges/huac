@extends('adminlte::page')
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
   <div id="app">
       <form action="">
           <create-surgery></create-surgery>
       </form>
   </div>
@endsection
