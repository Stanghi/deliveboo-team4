@extends('layouts.app')

@section('title')
    | Lista piatti
@endsection

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-between">
            <h1 class="my-5">Products</h1>
            <a href="{{ route('admin.products.create') }}" title="Create" class="btn btn-outline-dark"><i
                    class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Is visible</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>€ {{ $product->price }}</td>
                        <td>
                            @if ($product->is_visible)
                                <i class="fa-solid fa-circle-check"></i>
                            @else
                                <i class="fa-solid fa-circle-x"></i>
                            @endif
                        </td>
                        <td>
                            <div class="actions-index d-flex">
                                <a class="btn btn-outline-dark me-2" title="Show"
                                    href="{{ route('admin.products.show', $product) }}"><i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-outline-dark me-2" title="Edit"
                                    href="{{ route('admin.products.edit', $product) }}"><i class="fa-solid fa-pen"></i>
                                </a>
                                @include('admin.partials.form-delete', [
                                    'route' => 'products',
                                    'message' => "Confermi l'eliminatione di $product->title ?",
                                    'entity' => $product,
                                ])
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
