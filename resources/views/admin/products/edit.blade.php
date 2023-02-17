@extends('layouts.app')

@section('title')
    | Modifica prodotto {{ $product->name }}
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

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name', $product->name) }}" placeholder="Modifica nome..."
                    oninvalid="this.setCustomValidity('Campo obbligatorio')" oninput="this.setCustomValidity('')" />
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo *</label>
                <input type="number" required min="0.01" max="999.99" step=0.01
                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $product->price) }}" placeholder="Modifica prezzo..."
                    oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    value="{{ old('img', $product->img) }}" placeholder="Modifica immagine..." onchange="showImage(event)">
                @error('img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if ($product->img)
                    <div class="cover-image mt-3">
                        <img class="w-25" id="output-image" src="{{ asset('storage/' . $product->img) }}"
                            alt="{{ $product->img_original_name }}">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <p for="date" class="form-label">Visibilità *</p>
                <select required class="form-select" name="is_visible" class="@error('is_visible') is-invalid @enderror"
                    id="is_visible" oninvalid="this.setCustomValidity('Campo obbligatorio')"
                    oninput="this.setCustomValidity('')">
                    <option value="1" default>Il prodotto sarà visibile sul sito</option>
                    <option value="0">Il prodotto NON sarà visibile sul sito</option>
                </select>
                @error('is_visible')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione *</label><br>
                <textarea required class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="5" placeholder="Modifica descrizione..." oninvalid="this.setCustomValidity('Campo obbligatorio')"
                    oninput="this.setCustomValidity('')">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button category="submit" class="btn btn-dark mb-5">Invia
                <i class="fa-solid fa-file-import"></i>
            </button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .catch(error => {
                console.error(error);
            });

        function showImage(event) {
            const tagImage = document.getElementById('output-image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }

        function InvalidMsg(textbox) {
            if (textbox.value === '') textbox.setCustomValidity('Campo obbligatorio');
            else if (textbox.validity.rangeOverflow) textbox.setCustomValidity(
                'Il prezzo deve essere al massimo di 999.99');
            else if (textbox.validity.rangeUnderflow) textbox.setCustomValidity(
                'Il prezzo deve essere minimo di 0.01');
            else textbox.setCustomValidity('');

            return true;
        }
    </script>
@endsection
