<div class="d-flex align-items-center justify-content-between my-5 debug">
    <a href="{{ route('admin.products.index') }}" title="Go back" class="btn btn-outline-primary me-3">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <h1>
        @if (Route::currentRouteName() === 'admin.products.create')
            Create new product
        @elseif (Route::currentRouteName() === 'admin.products.edit')
            Edit {{ $product->name }}
        @elseif (Route::currentRouteName() === 'admin.products.show')
            {{ $product->name }}
        @endif
    </h1>

    <div class="d-flex align-items-center">
        @if (Route::currentRouteName() != 'admin.products.create')
            @if (Route::currentRouteName() != 'admin.products.edit')
                <a href="{{ route('admin.products.edit', $product) }}" title="Edit" class="btn btn-outline-primary me-3">
                    <i class="fa-solid fa-pen"></i>
                </a>
            @endif

            {{-- @include('admin.partials.form-delete', [
                'route' => 'products',
                'message' => "Confermi l'eliminatione di $product->title ?",
                'entity' => $product,
            ]) --}}

        @endif
    </div>
</div>
