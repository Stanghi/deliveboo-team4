@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> {{ __('Nome') }} *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> {{ __('Indirizzo E-mail') }} *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> {{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> {{ __('Conferma Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-utensils"></i> {{ __('Nome Ristorante') }} *</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name')}}" autocomplete="restaurant_name" autofocus>

                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="iva" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-utensils"></i> {{ __('P. IVA') }} *</label>

                            <div class="col-md-6">
                                <input id="iva" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="iva" value="{{ old('iva')}}" autocomplete="iva" autofocus>

                                @error('iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-utensils"></i> {{ __('Indirizzo Ristorante') }} *</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address')}}" autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-utensils"></i> {{ __('Numero di Telefono') }} *</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone')}}" autocomplete="telephone" autofocus>

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="img" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-utensils"></i> {{ __('Immagine') }} </label>

                            <div class="col-md-6">
                                <input id="img" type="file" onchange="showImage(event)" class="form-control @error('img') is-invalid @enderror" name="img" autocomplete="img" autofocus>

                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="thumb mt-2">
                                    <img id="thumb_upload" style="max-height: 150px" src="" alt="">
                                </div>
                            </div>
                        </div>


                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Image thumb function --}}
<script>
    ClassicEditor
        .create(document.querySelector('#summary'))
        .catch(error => {
            console.error(error);
        });

    function showImage(event) {
        const tagImage = document.getElementById('thumb_upload');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
