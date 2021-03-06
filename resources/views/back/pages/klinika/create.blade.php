@extends('back.layout.master')

@section('title') Klinikalar @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content" style="margin-bottom: 100px">
        <div class="mb-3 col-md-12">
            <a href="{{ route('klinika.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('klinika.store') }}" method="POST">
                @csrf
                <div class="row">
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="ad">Ad(Klinika)</label>
                    <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="hekim_adi">Ad(Həkim)</label>
                    <input type="text" class="form-control @error('hekim_adi') is-invalid  @enderror" id="hekim_adi" name="hekim_adi" value="{{ old('hekim_adi') }}">
                    @error('hekim_adi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="kuce_adi">Küçə</label>
                    <input type="text" class="form-control @error('kuce_adi') is-invalid  @enderror" id="kuce_adi" name="kuce" value="{{ old('kuce_adi') }}">
                    @error('kuce_adi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label" for="xerite">Xəritə</label>
                    <textarea name="xerite" id="xerite" class="form-control @error('xerite') is-invalid  @enderror" cols="30" rows="3">{{ old('xerite') }}</textarea>
                    @error('kuce_adi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="tel_1">Telefon 1</label>
                    <input type="text" class="form-control @error('tel_1') is-invalid  @enderror" id="tel_1" name="tel_1" value="{{ old('tel_1') }}">
                    @error('tel_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="tel_2">Telefon 2</label>
                    <input type="text" class="form-control @error('tel_2') is-invalid  @enderror" id="tel_2" name="tel_2" value="{{ old('tel_2') }}">
                    @error('tel_2')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="tel_3">Telefon 3</label>
                    <input type="text" class="form-control @error('tel_3') is-invalid  @enderror" id="tel_3" name="tel_3" value="{{ old('tel_3') }}">
                    @error('tel_3')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="fb">Facebook</label>
                    <input type="text" class="form-control @error('fb') is-invalid  @enderror" id="fb" name="fb" value="{{ old('fb') }}">
                    @error('fb')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="insta">Instagram</label>
                    <input type="text" class="form-control @error('insta') is-invalid  @enderror" id="insta" name="insta" value="{{ old('insta') }}">
                    @error('insta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="telegram">Telegram</label>
                    <input type="text" class="form-control @error('telegram') is-invalid  @enderror" id="telegram" name="telegram" value="{{ old('telegram') }}">
                    @error('telegram')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="wp">Whatsapp</label>
                    <input type="text" class="form-control @error('wp') is-invalid  @enderror" id="wp" name="wp" value="{{ old('wp') }}">
                    @error('wp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
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
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rayon_id').select2();
        });
    </script>
@endsection
