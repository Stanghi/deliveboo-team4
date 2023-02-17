@extends('layouts.app')

@section('title')
    | Crea prodotto
@endsection

@section('content')
    <div class="container">

        @include('admin.partials.action-in-page')

        @if ($errors->any())
            <div class="alert alert-danger m-5" role="alert">
                <h2><i class="fa-solid fa-triangle-exclamation"></i>Error</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Add name..." value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo *</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" placeholder="Add price..." value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    placeholder="Add image..." onchange="showImage(event)" value="{{ old('img') }}">

                <div class="cover-image mt-3">
                    <img class="w-25" id="output-image" src="" alt="">
                </div>

                @error('img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_visible" class="form-label">Visibilità *</label>
                <select class="form-select" name="is_visible" class="@error('is_visible') is-invalid @enderror"
                    id="is_visible">
                    <option value="1" default>Il prodotto sarà visibile sul sito</option>
                    <option value="0">Il prodotto NON sarà visibile sul sito</option>
                </select>
                @error('is_visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description') }}" rows="5" placeholder="Add description..."></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Invia
                <i class="fa-solid fa-file-import ms-1"></i>
            </button>
        </form>

    </div>

    <script>
        function showImage(event) {
            const tagImage = document.getElementById('output-image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
