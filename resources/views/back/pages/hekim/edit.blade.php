@extends('back.layout.master')

@section('title') Həkimlər @endsection

@section('css')

@endsection

@section('content')
    <div class="content" style="margin-bottom: 100px">
        <div class="mb-3 col-md-12">
            <a href="{{ route('hekim.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('hekim.update',$hekim->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    @if(request()->has('status'))
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dolorem enim, error, explicabo incidunt, laborum nam nemo nisi obcaecati odit omnis porro possimus repellat repellendus similique soluta totam velit voluptatum.
                    @endif
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="ad">A.S.A</label>
                        <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad',$hekim->name) }}">
                        @error('ad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="dogum_gunu">Doğum tarixi</label>
                        <input type="date" class="form-control @error('dogum_gunu') is-invalid  @enderror" id="dogum_gunu" name="dogum_gunu" value="{{ old('dogum_gunu',$hekim->dogum_gunu) }}">
                        @error('dogum_gunu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="klinika_id">Klinika</label>
                        <select name="klinika_id" id="klinika_id" class="form-control @error('klinika_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($klinikas as $klinika)
                                <option value="{{ $klinika->id }}" {{ old('klinika_id',$hekim->klinika_id) == $klinika->id ? 'selected' : '' }}>{{ $klinika->ad == '' ? $klinika->hekim_adi : $klinika->ad }}</option>
                            @endforeach
                        </select>
                        @error('klinika_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="hvezife_id">Həkim vəzifə</label>
                        <select name="hvezife_id" id="hvezife_id" class="form-control @error('hvezife_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($hvezifes as $hvezife)
                                <option value="{{ $hvezife->id }}" {{ old('hvezife_id',$hekim->hekim_vezife_id) == $hvezife->id ? 'selected' : '' }}>{{ $hvezife->ad }}</option>
                            @endforeach
                        </select>
                        @error('hvezife_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_1">Telefon 1</label>
                        <input type="text" class="form-control @error('tel_1') is-invalid  @enderror" id="tel_1" name="tel_1" value="{{ old('tel_1',$hekim->tel_1) }}">
                        @error('tel_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_2">Telefon 2</label>
                        <input type="text" class="form-control @error('tel_2') is-invalid  @enderror" id="tel_2" name="tel_2" value="{{ old('tel_2',$hekim->tel_2) }}">
                        @error('tel_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tel_3">Telefon 3</label>
                        <input type="text" class="form-control @error('tel_3') is-invalid  @enderror" id="tel_3" name="tel_3" value="{{ old('tel_3',$hekim->tel_3) }}">
                        @error('tel_3')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="fb">Facebook</label>
                        <input type="text" class="form-control @error('fb') is-invalid  @enderror" id="fb" name="fb" value="{{ old('fb',$hekim->fb) }}">
                        @error('fb')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="insta">Instagram</label>
                        <input type="text" class="form-control @error('insta') is-invalid  @enderror" id="insta" name="insta" value="{{ old('insta',$hekim->insta) }}">
                        @error('insta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="telegram">Telegram</label>
                        <input type="text" class="form-control @error('telegram') is-invalid  @enderror" id="telegram" name="telegram" value="{{ old('telegram',$hekim->telegram) }}">
                        @error('telegram')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="wp">Whatsapp</label>
                        <input type="text" class="form-control @error('wp') is-invalid  @enderror" id="wp" name="wp" value="{{ old('wp',$hekim->wp) }}">
                        @error('wp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4" style="display: {{ old('status',$hekim->status) ? 'block' : 'none' }}">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email',$hekim->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4 specialAreas" style="display: {{ old('status',$hekim->status) ? 'block' : 'none' }}">
                        <label class="form-label" for="password">Şifrə</label>
                        <input type="text" class="form-control @error('password') is-invalid  @enderror" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4 specialAreas" style="display: {{ old('status',$hekim->status) ? 'block' : 'none' }}">
                        <label class="form-label" for="vezife_id">Vəzifə</label>
                        <select name="vezife_id" id="vezife_id" class="form-control @error('vezife_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($vezifes as $vezife)
                                <option value="{{ $vezife->id }}" {{ old('vezife_id',$hekim->vezife_id) == $vezife->id ? 'selected' : '' }}>{{ $vezife->ad }}</option>
                            @endforeach
                        </select>
                        @error('vezife_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4 specialAreas" style="display: {{ old('status',$hekim->status) ? 'block' : 'none' }}">
                        <label class="form-label" for="magaza_id">Mağaza</label>
                        <select name="magaza_id" id="magaza_id" class="form-control @error('magaza_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($magazas as $magaza)
                                <option value="{{ $magaza->id }}" {{ old('magaza_id',$hekim->magaza_id) == $magaza->id ? 'selected' : '' }}>{{ $magaza->ad }}</option>
                            @endforeach
                        </select>
                        @error('magaza_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group mb-3 col-md-8">
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status',$hekim->status) ? 'checked' : '' }}>
                            <span class="form-check-label">İşçi kimi də əlavə et</span>
                        </label>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-end" type="submit">Redaktə et</button>
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
