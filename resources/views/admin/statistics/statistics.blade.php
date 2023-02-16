@extends('layouts.app')

@section('title')
    | Statistiche
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center my-5">Statistiche Ristorante</h2>
        <div style="width: 900px; margin: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection

<script src="{{ mix('../../../js/app.js') }}"></script>
