@extends('front.layout.master')

@section('title') Xronoliji @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    tr.proInfoSebetim > td{
        background-color: #0ca678;
        color: white;
    }

    tr.proInfo > td > input {
        width: 80px;
    }
    </style>
@endsection

@section('content')
    <div class="content" bis_skin_checked="1">
        <div class="container-xl d-flex flex-column justify-content-center" bis_skin_checked="1">
            <div class="card shadow mb-4" bis_skin_checked="1">
                <div class="card-body" bis_skin_checked="1">
                    <a href="{{ route('front.xronoliji',['id'=>\App\Models\Satis::whereId(request()->segment(3))->firstOrFail()->id]) }}" class="btn btn-{{ request()->segment(4) ? 'primary' : 'success' }}">Mövcud</a>
                    @foreach($arxivSatislari as $arxiv)
                        <a href="{{ route('front.xronoliji',['id'=>$arxiv->satis_id,'log_id'=>$arxiv->id]) }}" class="btn btn-{{ request()->segment(4) == $arxiv->id ? 'success' : 'primary' }}">{{ $arxiv->created_at }}</a>
                    @endforeach
                        <hr>
                    <table id="kredit-yaz" class="table table-light " style="width: 100%;color:white;border: 2px solid black;">
                        <thead style="color:black;text-align: center;">
                        <tr>
                            <th colspan="5">ANKET</th>
                        </tr>
                        </thead>
                        <tbody style="border: 2px solid black;color: black;">
                        <tr>
                            <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">SATICI MƏLUMATLARI</td>
                        </tr>
                        <tr>
                            <td colspan="5">{{ $cariSatis->satici->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">MÜSTƏRİ MƏLUMATLARI</td>
                        </tr>
                        <tr>
                            <td class="bg-danger">
                                <label for="alici_kateqoriya_id" style="color: #FFFFFF">Alıcı kateqoriyası : <sup>*</sup></label>
                            </td>
                            <td colspan="4">
                                <span class="form-control">
                                    @if($cariSatis->musteri_novu == 1)
                                        Həkim
                                        @php
                                        $musteri = \App\Models\User::findOrFail($cariSatis->musterinin_id);
                                        @endphp
                                    @elseif($cariSatis->musteri_novu == 2)
                                        Texnik
                                        @php
                                        $musteri = \App\Models\User::findOrFail($cariSatis->musterinin_id);
                                        @endphp
                                    @elseif($cariSatis->musteri_novu == 3)
                                        Klinika
                                        @php
                                        $musteri = \App\Models\Klinika::findOrFail($cariSatis->musterinin_id);
                                        @endphp
                                    @elseif($cariSatis->musteri_novu == 4)
                                        Firma
                                        @php
                                        $musteri = \App\Models\Partnyor::findOrFail($cariSatis->musterinin_id);
                                        @endphp
                                    @endif
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-danger">
                                <label for="musterinin_id" style="color: #FFFFFF">Müştəri :<sup>*</sup></label>
                            </td>
                            <td colspan="4">
                                <span class="form-control">
                                    @if($cariSatis->musteri_novu == 1 || $cariSatis->musteri_novu == 2)
                                        {{ $musteri->name }}
                                    @else
                                        {{ $musteri->ad }}
                                    @endif
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">SATILMIŞ MƏHSULLAR</td>
                        </tr>
                        <tr>
                            <td class="bg-danger">
                                <label for="mehsulun_adi" style="color: #FFFFFF">Məhsulun adı</label>
                            </td>
                            <td class="bg-danger">
                                <label for="mehsulun_adi" style="color: #FFFFFF">Firma</label>
                            </td>
                            <td class="bg-danger">
                                <label for="mehsulun_adi" style="color: #FFFFFF">İstehsalçı</label>
                            </td>
                            <td class="bg-danger">
                                <label for="mehsulun_adi" style="color: #FFFFFF">Say&Qiymət(Cari)</label>
                            </td>
                            <td class="bg-danger">
                                <label for="mehsulun_adi" style="color: #FFFFFF">Qiymət(Faktiki)</label>
                            </td>
                        </tr>
                        @foreach($cariSatis->details as $detail)
                        <tr>
                            <td>{{ $detail->mehsul->ad }}</td>
                            <td>{{ $detail->mehsul->firma->ad }}</td>
                            <td>{{ $detail->mehsul->istehsalci->ad }}</td>
                            <td>
                                @if($detail->mehsul->vahid_id == 1)
                                    Qutu sayı : <span class="form-control">{{ $detail->qutu_sayi }}</span>
                                @endif
                                Ədəd sayı : <span class="form-control">{{ $detail->satis_miqdari_ededle }}</span>
                                @if($detail->mehsul->vahid_id == 1)
                                    Qutusunun cari qiyməti : <span class="form-control">{{ $detail->qutusunun_cari_qiymeti }}</span>
                                @endif
                                1 ədədinin cari qiyməti : <span class="form-control">{{ $detail->bir_ededinin_cari_qiymeti }}</span>
                            </td>
                            <td>
                                @if($detail->mehsul->vahid_id == 1)
                                    <span style="visibility: hidden">Qutu sayı : <span class="form-control">{{ $detail->qutu_sayi }}</span></span>
                                @endif
                                <span style="visibility: hidden">Ədəd sayı : <span class="form-control">{{ $detail->satis_miqdari_ededle }}</span></span>
                                @if($detail->mehsul->vahid_id == 1)
                                    Qutusunun faktiki qiyməti : <span class="form-control">{{ $detail->qutusunun_faktiki_satildigi_qiymet }}</span>
                                @endif
                                1 ədədinin faktiki qiyməti : <span class="form-control">{{ $detail->bir_ededinin_faktiki_satildigi_qiymeti }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @if($cariSatis->satis_usulu_id == 3)
                            <tr>
                                <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">Ödəniş Cədvəli</td>
                            </tr>
                            @foreach($cariSatis->hisse_cedvels as $row)
                                <tr class="odenisRow">
                                    <td><input type="date" name="odenis_tarixleri[]" class="form-control" value="{{ \Carbon\Carbon::parse($row->odenis_tarixi)->format('Y-m-d') }}" disabled></td>
                                    <td><input type="number" name="edilen_odenisler[]" class="form-control" step=".01" value="{{ $row->odenilen_mebleg }}" disabled></td>
                                    <td colspan="3"><textarea name="description[]" class="form-control" cols="30" rows="1" style="height: 34px" disabled>{{ $row->serh }}</textarea></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
