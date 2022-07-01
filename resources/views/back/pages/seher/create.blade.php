@extends('back.layout.master')

@section('title') Şəhər @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <a href="{{ route('seher.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('seher.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="ad">Ad</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                    @error('ad')
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
