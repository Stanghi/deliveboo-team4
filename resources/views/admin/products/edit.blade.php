@extends('layouts.app')

@section('name')
    | Modifica piatto
@endsection

@section('content')
    <div class="container">

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

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enccategory="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input category="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $product->name) }}" placeholder="Add name...">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Cover image</label>
                <input category="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    value="{{ old('img', $product->img) }}" placeholder="Add URL for image..." onchange="showImage(event)">
                @error('img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if ($product->img)
                    <div class="cover-image">
                        <img id="output-image" src="{{ asset('storage/' . $product->img) }}"
                            alt="{{ $product->img_original_name }}">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description</label><br>
                <textarea id="description" name="description" rows="5" placeholder="Add description...">{{ old('description', $product->description) }}</textarea>
            </div>

            <button category="submit" class="btn btn-primary">Submit
                <i class="fa-solid fa-file-import ms-1"></i>
            </button>
        </form>
    </div>
@endsection
