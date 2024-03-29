@extends('back.layout.master')

@section('title') Əməliyyatlar @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('operation.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($operations->count() == 0)
                                <tr>
                                    <td colspan="3" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($operations as $item)
                            <tr>
                                <td data-label="#" >
                                    {{ $loop->iteration }}
                                </td>
                                <td data-label="Ad" >
                                    <div>{{ $item->name }}</div>
                                </td>
                                <td data-label="Ad" >
                                    <div>{{ $item->giris_ve_ya_cixis == 1 ? 'giriş' : 'çıxış' }}</div>
                                </td>
                                <td>
                                    @if($item->id > 5)
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('operation.edit',$item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <div class="">
                                            <form action="{{ route('operation.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Silmek istədiyinizdən əminsiniz?')"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
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
