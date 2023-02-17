@extends('layouts.app')

@section('title')
    | Ristorante
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach ($restaurants as $restaurant)
        <div class="container">
            <h1 class="mb-5">Riepilogo {{$restaurant->name}}</h1>
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
        @endforeach
            {{-- <div class="col-4 p-5 d-flex align-items-center justify-content-center">
                <a  class="my-card card h-75 w-75 text-decoration-none" href="#">

                    <div class="card-body d-flex align-items-center justify-content-center">
                        <i class="fs-1 text-secondary fa-solid fa-circle-plus"></i>
                    </div>
                </a>
            </div> --}}
    </div>
</div>
@endsection
