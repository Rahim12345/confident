@extends('back.layout.master')

@section('title') Rayon @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('rayon.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('rayon.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="ad">Ad</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="seher_id">Şəhər</label>
                    <select name="seher_id" id="seher_id" class="form-control @error('seher_id') is-invalid  @enderror">
                        <option value="">Birini seçin</option>
                        @foreach($sehers as $seher)
                            <option value="{{ $seher->id }}" {{ old('seher_id') == $seher->id ? 'selected' : '' }}>{{ $seher->ad }}</option>
                        @endforeach
                    </select>
                    @error('seher_id')
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
