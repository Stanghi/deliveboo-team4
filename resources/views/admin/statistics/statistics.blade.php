@extends('layouts.app')

@section('title')
    | Statistiche
@endsection

@section('content')
    <div class="container">
        <h2 class="my-5">Statistiche Ristorante</h2>
        <div class="chart-box p-1 w-50">
            <canvas class="my-5" id="chartOrders"></canvas>
            <canvas class="my-5" id="chartSales"></canvas>
        </div>
    </div>
@endsection

@section('script')
<script>
    const ordersByMonth = {{ Js::from($statistics_data['numb_orders_by_month']) }};
    const salesByMonth = {{ Js::from($statistics_data['$sales_by_month']) }};
</script>
@endsection
