@extends('layouts.app')

@section('title')
    | Statistiche
@endsection

@section('content')
    <div class="container">
        <h2 class="my-5">Statistiche Ristorante</h2>
        <div class="chart-box"> {{-- style="width: 900px; margin: auto;" --}}
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection

@section('script')
<script>
    const labels = {{ Js::from($labels) }};

    const sales = {{ Js::from($data) }};

</script>
@endsection
