@extends('back.layout.master')

@section('title') Əməliyyatlar @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('operation.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('operation.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label" for="ad">Ad</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad',$item->name) }}">
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="giris_ve_ya_cixis">Status</label>
                    <select name="giris_ve_ya_cixis" id="giris_ve_ya_cixis" class="form-control @error('giris_ve_ya_cixis') is-invalid  @enderror">
                        <option value="">Birini seçin</option>
                        <option value="1" {{ $item->giris_ve_ya_cixis == 1 ? 'selected' : '' }}>Giriş</option>
                        <option value="2" {{ $item->giris_ve_ya_cixis == 2 ? 'selected' : '' }}>Çıxış</option>
                    </select>
                    @error('giris_ve_ya_cixis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="description">Təsvir</label>
                    <textarea class="form-control @error('description') is-invalid  @enderror" name="description" id="description" cols="30" rows="4">{{ $item->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
