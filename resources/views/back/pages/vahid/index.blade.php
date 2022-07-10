@extends('back.layout.master')

@section('title') Vahidlər @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('vahid.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($vahids->count() == 0)
                                <tr>
                                    <td colspan="3" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($vahids as $item)
                            <tr>
                                <td data-label="#" >
                                    {{ $loop->iteration }}
                                </td>
                                <td data-label="Ad" >
                                    <div>{{ $item->ad }}</div>
                                </td>
                                <td>
                                    @if($item->id != 1)
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('vahid.edit',$item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <div class="">
                                            <form action="{{ route('vahid.destroy',$item->id) }}" method="POST">
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
