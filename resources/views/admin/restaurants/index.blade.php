@extends('layouts.app')

@section('title')
    | Ristorante
@endsection

@section('content')
<div class="container mt-5">
    <h2>Ristoranti</h2>
    <div class="row">

        @foreach ($restaurants as $restaurant)
            <div class="col-4 p-3 d-flex align-items-center justify-content-center">

                <div class="card shadow">
                    <img src="{{ asset('storage/' . $restaurant->img) }}" class="card-img-top" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">{{$restaurant->address}}</p>
                        <a href="{{route('admin.restaurants.show', $restaurant)}}" class="btn btn-outline-dark"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.restaurants.edit', $restaurant)}}" class="btn btn-outline-dark"><i class="fa-solid fa-pen"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="col-4 p-5 d-flex align-items-center justify-content-center">
                <a  class="card h-75 w-75 text-decoration-none" href="#">

                    <div class="card-body d-flex align-items-center justify-content-center">
                        <i class="fs-1 text-secondary fa-solid fa-circle-plus"></i>
                    </div>
                </a>
            </div>
    </div>
</div>
@endsection
