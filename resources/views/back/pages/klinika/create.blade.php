@extends('back.layout.master')

@section('title') Klinikalar @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('rayon.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('klinika.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="ad">Ad(Klinika)</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="hekim_adi">Ad(Həkim)</label>
                    <input type="text" class="form-control @error('hekim_adi') is-invalid  @enderror" id="hekim_adi" name="hekim_adi" value="{{ old('hekim_adi') }}">
                    @error('hekim_adi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="rayon_id">Rayon</label>
                    <select name="rayon_id" id="rayon_id" class="form-control @error('rayon_id') is-invalid  @enderror">
                        <option value="">Birini seçin</option>
                        @foreach($rayons as $rayon)
                            <option value="{{ $rayon->id }}" {{ old('rayon_id') == $rayon->id ? 'selected' : '' }}>{{ $rayon->ad }}</option>
                        @endforeach
                    </select>
                    @error('rayon_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-end" type="submit">Əlavə et</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
