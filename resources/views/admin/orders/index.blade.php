@extends('layouts.app')

@section('title')
    | Ordinis
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Ordine</th>
                    <th scope="col">Cognome e Nome</th>
                    <th scope="col">Quantita</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Vedi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->name}} {{$order->surname}}</td>
                        <td>
                            @php
                                $total_quantity = 0;
                            @endphp
                            @foreach ($order->products as $product)
                                @php
                                    $total_quantity += $product->pivot->quantity;
                                @endphp
                            @endforeach
                            {{$total_quantity}}
                        </td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{route('admin.orders.show', $order)}}"><i class="fa-regular fa-eye"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">Nessun ordine presente</th>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
@endsection
