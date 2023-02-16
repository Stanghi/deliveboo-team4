@extends('layouts.app')

@section('title')
    | Ordini
@endsection

@section('content')
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Ordine</th>
                    <th scope="col">Cognome e Nome</th>
                    <th scope="col">Numero prodotti</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Vedi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->name }} {{ $order->surname }}</td>
                        <td>
                            @php
                                $total_quantity = 0;
                            @endphp
                            @foreach ($order->products as $product)
                                @php
                                    $total_quantity += $product->pivot->quantity;
                                @endphp
                            @endforeach
                            {{ $total_quantity }}
                        </td>
                        <td>&euro; {{ number_format($order->amount, 2, ',') }}</td>
                        <td>{{ date_format($order->created_at, 'd/m/Y') }} - {{ date_format($order->created_at, 'H:i') }}
                        </td>
                        <td>
                            <a class="btn btn-outline-dark" href="{{ route('admin.orders.show', $order) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nessun ordine presente</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
@endsection
