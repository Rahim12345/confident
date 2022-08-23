@extends('back.layout.master')

@section('title') Partnyorlar @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-8 offset-md-2">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('partnyor.index') }}" class="btn btn-primary w-100">GERİ</a>
                        <table
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th colspan="4" style="text-align: center;background-color: #0ca678;color: white">
                                    <b>{{ $firma->ad }}</b> firmasına edilən ödənişlərin siyahısı
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Pul</th>
                                <th>Təsvir</th>
                                <th>Tarix</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($firma->count() == 0)
                                <tr>
                                    <td colspan="3" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($firma->kassa as $item)
                                <tr>
                                    <td data-label="#" >
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-label="Pul" >
                                        <div>{{ $item->pul }}</div>
                                    </td>
                                    <td data-label="Təsvir" >
                                        <div>{{ $item->description }}</div>
                                    </td>
                                    <td>
                                        {{ $item->updated_at }}
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
