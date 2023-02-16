@extends('layouts.app')

@section('title')
    | Mosta piatto
@endsection

@section('content')
@section('content')
    <div class="container">

        @include('admin.partials.action-in-page')

        @if ($product->categories)
            <div class="mb-3">
                @foreach ($product->categories as $category)
                    <span class="badge text-bg-success">{{ $category->name }}</span>
                @endforeach
            </div>
        @endif

        @if ($product->type)
            <div class="mb-3">
                <span class="badge text-bg-success">{{ $product->type->name }}</span>
            </div>
        @endif

        <h3>€ {{ $product->price }}</h3>

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
