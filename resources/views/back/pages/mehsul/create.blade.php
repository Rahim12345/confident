@extends('back.layout.master')

@section('title') Məhsullar @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3">
            <a href="{{ route('mehsul.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('mehsul.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="ad">Ad</label>
                        <input type="text" class="form-control @error('ad') is-invalid  @enderror" id="ad" name="ad" value="{{ old('ad') }}">
                        @error('ad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="firma_id">Firma</label>
                        <select name="firma_id" id="firma_id" class="form-control @error('firma_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($firms as $firm)
                                <option value="{{ $firm->id }}" {{ old('firma_id') == $firm->id ? 'selected' : '' }}>{{ $firm->ad }}</option>
                            @endforeach
                        </select>
                        @error('firma_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="istehsalci_id">İstehsalçı</label>
                        <select name="istehsalci_id" id="istehsalci_id" class="form-control @error('istehsalci_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($istehsalcis as $istehsalci)
                                <option value="{{ $istehsalci->id }}" {{ old('istehsalci_id') == $istehsalci->id ? 'selected' : '' }}>{{ $istehsalci->ad }}</option>
                            @endforeach
                        </select>
                        @error('istehsalci_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="kateqoriya_id">Kateqoriya</label>
                        <select name="kateqoriya_id" id="kateqoriya_id" class="form-control @error('kateqoriya_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($kateqoriyas as $kateqoriya)
                                <option value="{{ $kateqoriya->id }}" {{ old('kateqoriya_id') == $kateqoriya->id ? 'selected' : '' }}>{{ $kateqoriya->ad }}</option>
                            @endforeach
                        </select>
                        @error('kateqoriya_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="marka_id">Model</label>
                        <select name="marka_id" id="marka_id" class="form-control @error('marka_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($markas as $marka)
                                <option value="{{ $marka->id }}" {{ old('marka_id') == $marka->id ? 'selected' : '' }}>{{ $marka->ad }}</option>
                            @endforeach
                        </select>
                        @error('marka_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="qaime_nomresi">Qaimə nömrəsi</label>
                        <input type="text" class="form-control @error('qaime_nomresi') is-invalid  @enderror" id="qaime_nomresi" name="qaime_nomresi" value="{{ old('qaime_nomresi') }}">
                        @error('qaime_nomresi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="tarix">Tarix</label>
                        <input type="date" class="form-control @error('tarix') is-invalid  @enderror" id="tarix" name="tarix" value="{{ old('tarix') }}">
                        @error('tarix')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="say">Say</label>
                        <input type="number" class="form-control @error('say') is-invalid  @enderror" id="say" name="say" value="{{ old('say','1') }}" min="1">
                        @error('say')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="vahid_id">Vahid</label>
                        <select name="vahid_id" id="vahid_id" class="form-control @error('vahid_id') is-invalid  @enderror" onchange="$(this).val() == 1 ? $('#additionalBlock').css('display','contents') : $('#additionalBlock').css('display','none') ">
                            <option value="">Birini seçin</option>
                            @foreach($vahids as $vahid)
                                <option value="{{ $vahid->id }}" {{ old('vahid_id') == $vahid->id ? 'selected' : '' }}>{{ $vahid->ad }}</option>
                            @endforeach
                        </select>
                        @error('vahid_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="maya_deyeri">Maya dəyəri</label>
                        <input type="number" class="form-control @error('maya_deyeri') is-invalid  @enderror" id="maya_deyeri" name="maya_deyeri" value="{{ old('maya_deyeri','0.01') }}" step=".01" min="0.01">
                        @error('maya_deyeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="topdan_deyeri">Topdan dəyəri</label>
                        <input type="number" class="form-control @error('topdan_deyeri') is-invalid  @enderror" id="topdan_deyeri" name="topdan_deyeri" value="{{ old('topdan_deyeri','0.01') }}" step=".01" min="0.01">
                        @error('topdan_deyeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="nagd_deyeri">Nağd dəyəri</label>
                        <input type="number" class="form-control @error('nagd_deyeri') is-invalid  @enderror" id="nagd_deyeri" name="nagd_deyeri" value="{{ old('nagd_deyeri','0.01') }}" step=".01" min="0.01">
                        @error('nagd_deyeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="kredit_deyeri">Kredit dəyəri</label>
                        <input type="number" class="form-control @error('kredit_deyeri') is-invalid  @enderror" id="kredit_deyeri" name="kredit_deyeri" value="{{ old('kredit_deyeri','0.01') }}" step=".01" min="0.01">
                        @error('kredit_deyeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row" id="additionalBlock" style="display: {{ old('vahid_id') == 1 ? 'flex' : 'none' }}">
                        <hr>
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="bir_qutusundaki_say">Bir qutusundakı say</label>
                            <input type="number" class="form-control @error('bir_qutusundaki_say') is-invalid  @enderror" id="bir_qutusundaki_say" name="bir_qutusundaki_say" value="{{ old('bir_qutusundaki_say','1') }}" min="1">
                            @error('bir_qutusundaki_say')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="qutudaki_1_malin_maya_deyeri">Qutudakı 1 malın maya dəyəri</label>
                            <input type="number" class="form-control @error('qutudaki_1_malin_maya_deyeri') is-invalid  @enderror" id="qutudaki_1_malin_maya_deyeri" name="qutudaki_1_malin_maya_deyeri" value="{{ old('qutudaki_1_malin_maya_deyeri','0.01') }}" step=".01" min="0.01">
                            @error('qutudaki_1_malin_maya_deyeri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="qutudaki_1_malin_topdan_deyeri">Qutudakı 1 malın topdan dəyəri</label>
                            <input type="number" class="form-control @error('qutudaki_1_malin_topdan_deyeri') is-invalid  @enderror" id="qutudaki_1_malin_topdan_deyeri" name="qutudaki_1_malin_topdan_deyeri" value="{{ old('qutudaki_1_malin_topdan_deyeri','0.01') }}" step=".01" min="0.01">
                            @error('qutudaki_1_malin_topdan_deyeri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="qutudaki_1_malin_nagd_deyeri">Qutudakı 1 malın nağd dəyəri</label>
                            <input type="number" class="form-control @error('qutudaki_1_malin_nagd_deyeri') is-invalid  @enderror" id="qutudaki_1_malin_nagd_deyeri" name="qutudaki_1_malin_nagd_deyeri" value="{{ old('qutudaki_1_malin_nagd_deyeri','0.01') }}" step=".01" min="0.01">
                            @error('qutudaki_1_malin_nagd_deyeri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="qutudaki_1_malin_kredit_deyeri">Qutudakı 1 malın kredit dəyəri</label>
                            <input type="number" class="form-control @error('qutudaki_1_malin_kredit_deyeri') is-invalid  @enderror" id="qutudaki_1_malin_kredit_deyeri" name="qutudaki_1_malin_kredit_deyeri" value="{{ old('qutudaki_1_malin_kredit_deyeri','0.01') }}" step=".01" min="0.01">
                            @error('qutudaki_1_malin_kredit_deyeri')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-end" type="submit">Əlavə et</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#firma_id').select2();

            $('#istehsalci_id').select2();

            $('#kateqoriya_id').select2();

            $('#marka_id').select2();

            $('#vahid_id').select2();
        });
    </script>
@endsection
