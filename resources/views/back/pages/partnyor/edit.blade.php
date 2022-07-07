@extends('back.layout.master')

@section('title') Vəzifə @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('partnyor.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('partnyor.update',$partnyor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group mb-3">
                        <label class="form-label" for="ad">Ad</label>
                        <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad',$partnyor->ad) }}">
                        @error('ad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_1">Telefon 1</label>
                        <input type="text" class="form-control @error('tel_1') is-invalid  @enderror" id="tel_1" name="tel_1" value="{{ old('tel_1',$partnyor->tel_1) }}">
                        @error('tel_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_2">Telefon 2</label>
                        <input type="text" class="form-control @error('tel_2') is-invalid  @enderror" id="tel_2" name="tel_2" value="{{ old('tel_2',$partnyor->tel_2) }}">
                        @error('tel_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_3">Telefon 3</label>
                        <input type="text" class="form-control @error('tel_3') is-invalid  @enderror" id="tel_3" name="tel_3" value="{{ old('tel_3',$partnyor->tel_3) }}">
                        @error('tel_3')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="fb">Facebook</label>
                        <input type="text" class="form-control @error('fb') is-invalid  @enderror" id="fb" name="fb" value="{{ old('fb',$partnyor->fb) }}">
                        @error('fb')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="insta">Instagram</label>
                        <input type="text" class="form-control @error('insta') is-invalid  @enderror" id="insta" name="insta" value="{{ old('insta',$partnyor->insta) }}">
                        @error('insta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="telegram">Telegram</label>
                        <input type="text" class="form-control @error('telegram') is-invalid  @enderror" id="telegram" name="telegram" value="{{ old('telegram',$partnyor->telegram) }}">
                        @error('telegram')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="wp">Whatsapp</label>
                        <input type="text" class="form-control @error('wp') is-invalid  @enderror" id="wp" name="wp" value="{{ old('wp',$partnyor->wp) }}">
                        @error('wp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email',$partnyor->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="unvan">Ünvan</label>
                        <input type="text" class="form-control @error('unvan') is-invalid  @enderror" id="unvan" name="unvan" value="{{ old('unvan',$partnyor->unvan) }}">
                        @error('unvan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-end" type="submit">Redaktə et</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
