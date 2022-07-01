@extends('back.layout.master')

@section('title') Klinikalar @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('klinika.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad(Klinika)</th>
                                <th>Ad(Həkim)</th>
                                <th>Rayon</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($klinikas->count() == 0)
                                <tr>
                                    <td colspan="4" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($klinikas as $item)
                            <tr>
                                <td data-label="#" >
                                    {{ $loop->iteration }}
                                </td>
                                <td data-label="Ad(Klinika)" >
                                    <div>{{ $item->ad }}</div>
                                </td>
                                <td data-label="Ad(Klinika)" >
                                    <div>{{ $item->hekim_adi }}</div>
                                </td>
                                <td data-label="Şəhər" >
                                    <div>{{ $item->rayon->ad }}</div>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('klinika.edit',$item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <div class="">
                                            <form action="{{ route('klinika.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Silmek istədiyinizdən əminsiniz?')"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
