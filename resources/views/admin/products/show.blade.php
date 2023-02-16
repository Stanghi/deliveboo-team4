@extends('layouts.app')

@section('title')
    | Prodotto {{ $product->name }}
@endsection

@section('content')
@section('content')
    <div class="container">

        @include('admin.partials.action-in-page')

        <h3>&euro; {{ number_format($product->price, 2, ',') }}</h3>

        @if ($product->img)
            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->img_original_name }}">
            <p>{{ $product->img_original }}</p>
        @endif

        @if ($product->is_visible)
            <p>Prodotto visibile</p>
        @else
            <p>Prodotto non visibile</p>
        @endif

        <p>{!! $product->description !!}</p>
    </div>
@endsection
