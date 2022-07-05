@extends('back.layout.master')

@section('title') Həkimlər @endsection

@section('css')

@endsection

@section('content')
    <div class="content" style="margin-bottom: 100px">
        <div class="mb-3 col-md-12">
            <a href="{{ route('hekim.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('hekim.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="ad">A.S.A</label>
                        <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                        @error('ad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="dogum_gunu">Doğum tarixi</label>
                        <input type="date" class="form-control @error('dogum_gunu') is-invalid  @enderror" id="dogum_gunu" name="dogum_gunu" value="{{ old('dogum_gunu') }}">
                        @error('dogum_gunu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
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
                    <div class="form-group mb-3 col-md-4 specialAreas" style="display: {{ old('status') ? 'block' : 'none' }}">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4 specialAreas" style="display: {{ old('status') ? 'block' : 'none' }}">
                        <label class="form-label" for="password">Şifrə</label>
                        <input type="text" class="form-control @error('password') is-invalid  @enderror" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group mb-3 col-md-8">
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status') ? 'checked' : '' }}>
                            <span class="form-check-label">İşçi kimi də əlavə et</span>
                        </label>
                        @error('status')
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
    <script>
        $(document).ready(function () {
            $('#status').change(function () {
                if($(this).is(':checked')){
                    $('.specialAreas').css('display','block');
                }
                else{
                    $('.specialAreas').css('display','none');
                }
            });
        });
    </script>
@endsection
