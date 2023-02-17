@extends('layouts.app')

@section('title')
    | Show {{$restaurant->name}}
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="my-5">Riepilogo {{$restaurant->name}}</h1>
        <div class="d-flex">

            <div class="img-box me-5">
                @if ($restaurant->img)
                    <img src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->img_original_name }}">
                    <p>{{ $restaurant->img_original }}</p>
                @endif
            </div>

            <div class="info">
                <h3>Indirizzo</h3>
                <p>{{ $restaurant->address}}</p>
                <h3>Telefono</h3>
                <p>{{ $restaurant->telephone}}</p>
                <h3>Partita IVA</h3>
                <p>{{ $restaurant->iva}}</p>
            </div>
        </div>
    </div>
@endsection
