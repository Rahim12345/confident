@extends('back.layout.master')

@section('title') Məhsullar @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3">
            <a href="{{ route('kassa.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('kassa.update',$kassa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="operation_type">Operation Type</label>
                        <select name="operation_type" id="operation_type"  class="form-control @error('operation_type') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            <option value="1" {{ old('operation_type',$kassa->operation_type) == 1  ? 'selected' : '' }}>PERSONAL</option>
                            <option value="2" {{ old('operation_type',$kassa->operation_type) == 2  ? 'selected' : '' }}>FİRMA</option>
                            <option value="3" {{ old('operation_type',$kassa->operation_type) == 3  ? 'selected' : '' }}>DİGƏR</option>
                        </select>
                        @error('operation_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="operation_id">Operation</label>
                        <select name="operation_id" id="operation_id"  class="form-control @error('operation_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($operations as $operation)
                                <option value="{{ $operation->id }}" {{ $operation->id == old('operation_id',$kassa->operation_id) ? 'selected' : '' }}>{{ $operation->name }}</option>
                            @endforeach
                        </select>
                        @error('operation_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="pul">Pul</label>
                        <input type="number" class="form-control @error('pul') is-invalid  @enderror"  id="pul" name="pul" value="{{ old('pul',$kassa->pul) }}" step=".01">
                        @error('pul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-12" id="firma_id_div" style="display: {{ old('operation_type',$kassa->operation_type) == 2 ? 'block' : 'none' }}">
                        <label class="form-label" for="firma_id">Firma</label>
                        <select name="firma_id" id="firma_id"  class="form-control @error('firma_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($firmas as $firma)
                                @if($kassa->operation_type == 2)
                                <option value="{{ $firma->id }}" {{ $firma->id == old('firma_id',$kassa->relational_id) ? 'selected' : '' }}>{{ $firma->ad }}</option>
                                @else
                                <option value="{{ $firma->id }}" {{ $firma->id == old('firma_id') ? 'selected' : '' }}>{{ $firma->ad }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('firma_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-12" id="personal_id_div" style="display: {{ old('operation_type',$kassa->operation_type) == 1 ? 'block' : 'none' }}">
                        <label class="form-label" for="personal_id">Personal</label>
                        <select name="personal_id" id="personal_id"  class="form-control @error('personal_id') is-invalid  @enderror">
                            <option value="">Birini seçin</option>
                            @foreach($personals as $personal)
                                @if($kassa->operation_type == 1)
                                <option value="{{ $personal->id }}" {{ $personal->id == old('personal_id',$kassa->relational_id) ? 'selected' : '' }}>{{ $personal->name }}</option>
                                @else
                                <option value="{{ $personal->id }}" {{ $personal->id == old('personal_id') ? 'selected' : '' }}>{{ $personal->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('personal_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="description">Təsvir</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid  @enderror" cols="30" rows="4">{{ old('description',$kassa->description) }}</textarea>
                        @error('description')
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#firma_id').select2({ width: '100%' });
            $('#personal_id').select2({ width: '100%' });
            $('#mehsulun_adi').select2({ width: '100%' });
            $('#operation_type').change(function () {
                let operation_type = $(this).val();
                $('#firma_id_div,#personal_id_div').css('display','none');
                if(operation_type == 1)
                {
                    $('#personal_id_div').css('display','block');
                }
                else if(operation_type == 2)
                {
                    $('#firma_id_div').css('display','block');
                }
            });

        });
    </script>
@endsection
