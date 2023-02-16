@extends('layouts.app')

@section('title')
    | show order #{{ $order->id }}
@endsection

@section('content')
    <div class="container mt-5">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark mb-3"><i
                class="fa-solid fa-arrow-left"></i></a>
        <div class="card">
            <div class="card-header">
                <h4>Ordine #{{ $order->id }}</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Nome e Cognome:</span>
                    <span class="ms-3"><b>{{ $order->name }} {{ $order->surname }}</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Indirizzo:</span>
                    <span class="ms-3"><b>{{ $order->address }}</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Telefono:</span>
                    <span class="ms-3"><b>{{ $order->telephone }}</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Data e ora:</span>
                    <span><b>{{ date_format($order->created_at, 'd/m/Y') }} -
                            {{ date_format($order->created_at, 'H:i') }}</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Note:</span>
                    @if ($order->note)
                        <span class="ms-3">
                            <b>
                                {{ $order->note }}
                            </b>
                        </span>
                    @else
                        <span class="ms-3">
                            <b>
                                Non sono presenti note...
                            </b>
                        </span>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID Prodotto</th>
                                <th scope="col">Nome Prodotto</th>
                                <th scope="col" class="text-end">Quantità</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                                <tr>
                                    <td>{{ $product->pivot->product_id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-end">{{ $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Totale:</span>
                    <span><b>{{ number_format($order->amount, 2, ',') }} &euro;</b></span>
                </li>

            </ul>

        </div>
    </div>
@endsection
