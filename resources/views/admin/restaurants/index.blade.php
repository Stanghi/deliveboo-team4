@extends('layouts.app')

@section('title')
    | Ristorante
@endsection

@section('content')
    <h2>Ristoranti</h2>
    @foreach ($restaurants as $restaurant)
        <img src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}">
        <h2>{{ $restaurant->name }}</h2>
    @endforeach
@endsection
