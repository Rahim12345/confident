@extends('back.layout.master')

@section('title') Həkimlər @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('hekim.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('hekim.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="ad">A.S.A</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="dogum_gunu">Doğum tarixi</label>
                    <input type="date" class="form-control @error('dogum_gunu') is-invalid  @enderror" id="dogum_gunu" name="dogum_gunu" value="{{ old('dogum_gunu') }}">
                    @error('dogum_gunu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="elaqe">Əlaqə</label>
                    <textarea name="elaqe" class="form-control @error('elaqe') is-invalid  @enderror" id="elaqe" cols="30" rows="4">{{ old('elaqe') }}</textarea>
                    @error('elaqe')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="klinika_id">Klinika</label>
                    <select name="klinika_id" id="klinika_id" class="form-control @error('klinika_id') is-invalid  @enderror">
                        <option value="">Birini seçin</option>
                        @foreach($klinikas as $klinika)
                            <option value="{{ $klinika->id }}" {{ old('klinika_id') == $klinika->id ? 'selected' : '' }}>{{ $klinika->ad == '' ? $klinika->hekim_adi : $klinika->ad }}</option>
                        @endforeach
                    </select>
                    @error('klinika_id')
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
