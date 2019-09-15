@extends('adminlte::page')
@section('title', 'Tempo de duração médio de procedimentos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reports/reports.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/reports/procedures/average-duration.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Tempo de duração médio para cada procedimento</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive table-hover dataTable">
                <thead>
                    <tr>
                        <th>Procedimento</th>
                        <th>Duração média</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
