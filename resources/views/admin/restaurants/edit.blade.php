@extends('layouts.app')

@section('title')
    | Edit {{$restaurant->name}}
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="my-5">
            Modifica {{$restaurant->name}}
        </h1>
        <div class="container">

            {{-- @include('admin.partials.action-in-page') --}}

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

            <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome *</label>
                    <input category="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $restaurant->name) }}" placeholder="Add name..." required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo *</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $restaurant->address) }}" placeholder="Add address..." required>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                        value="{{ old('img', $restaurant->img) }}" placeholder="Add URL for image..." onchange="showImage(event)">
                    @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if ($restaurant->img)
                        <div class="cover-image mt-3">
                            <img class="w-25" id="output-image" src="{{ asset('storage/' . $restaurant->img) }}"
                                alt="{{ $restaurant->img_original_name }}">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefono *</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                        name="telephone" value="{{ old('telephone', $restaurant->telephone) }}" placeholder="Add telephone..." required>
                    @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="iva" class="form-label">Partita IVA *</label>
                    <input type="text" class="form-control @error('iva') is-invalid @enderror" id="iva"
                        name="iva" value="{{ old('iva', $restaurant->iva) }}" placeholder="Add IVA..." required>
                    @error('iva')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button category="submit" class="btn btn-dark">Invia
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
    </div>
@endsection
