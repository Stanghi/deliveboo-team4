@extends('layouts.app')

@section('title')
    | Lista piatti
@endsection

@section('content')
    <div class="container">
        <h1>Lista piatti</h1>

        @foreach ($products as $product)
            <div>
                <h3>{{ $product->name }}</h3>
                <button class="btn btn-outline-dark"><a href="{{ route('admin.products.show', $product) }}">show</a></button>
                <button class="btn btn-outline-dark"><a href="{{ route('admin.products.edit', $product) }}">edit</a></button>
                <button class="btn btn-outline-dark"><a href="#">delete</a></button>
            </div>
            <img class="mb-5" src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}">
        @endforeach
    </div>
@endsection
