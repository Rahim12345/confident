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
                    <div class="form-group mb-3 col-md-6">
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
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label" for="pul">Pul</label>
                        <input type="number" class="form-control @error('pul') is-invalid  @enderror"  id="pul" name="pul" value="{{ old('pul',$kassa->pul) }}" step=".01">
                        @error('pul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="description">Təsvir</label>
                        <textarea name="description" id="description" class="form-control @error('pul') is-invalid  @enderror" cols="30" rows="4">{{ old('description',$kassa->description) }}</textarea>
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
        $(document).ready(function() {
            $('#firma_id').select2();

            $('#istehsalci_id').select2();

            $('#kateqoriya_id').select2();

            $('#marka_id').select2();

            $('#vahid_id').select2();
        });
    </script>
@endsection
