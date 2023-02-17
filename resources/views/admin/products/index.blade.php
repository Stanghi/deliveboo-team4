@extends('layouts.app')

@section('title')
    | Prodotti
@endsection

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-between">
            <h1 class="my-5">Prodotti</h1>
            <a href="{{ route('admin.products.create') }}" title="Crea" class="btn btn-outline-dark"><i
                    class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Visibilità</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>&euro; {{ number_format($product->price, 2, ',') }}</td>
                        <td>
                            @if ($product->is_visible)
                                <i class="fa-solid fa-circle-check"></i> Visibile
                            @else
                                <i class="fa-solid fa-circle-xmark"></i> Non visibile
                            @endif
                        </td>
                        <td>
                            <div class="actions-index d-flex">
                                <a class="btn btn-outline-dark me-2" title="Mostra"
                                    href="{{ route('admin.products.show', $product) }}"><i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-outline-dark me-2" title="Modifica"
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
                @empty
                    <tr>
                        <td colspan="6">Nessun prodotto presente</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
