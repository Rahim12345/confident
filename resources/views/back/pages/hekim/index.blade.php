@extends('back.layout.master')

@section('title') Həkimlər @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('hekim.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>A.S.A</th>
                                <th>Klinika</th>
                                <th>Doğum tarixi</th>
                                <th>Əlaqə</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($hekims->count() == 0)
                                <tr>
                                    <td colspan="6" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($hekims as $item)
                            <tr>
                                <td data-label="#" >
                                    {{ $loop->iteration }}
                                </td>
                                <td data-label="A.S.A" >
                                    <div>{{ $item->ad }}</div>
                                </td>
                                <td data-label="Klinika" >
                                    <div>{{ $item->klinika->ad }}</div>
                                </td>
                                <td data-label="Doğum tarixi" >
                                    <div>{{ $item->dogum_gunu }}</div>
                                </td>
                                <td data-label="Əlaqə" >
                                    <div>{{ $item->elaqe }}</div>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('hekim.edit',$item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <div class="">
                                            <form action="{{ route('hekim.destroy',$item->id) }}" method="POST">
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
