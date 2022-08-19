@extends('front.layout.master')

@section('title') Ödəniş @endsection
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
                                <td class="bg-danger"><label for="ilkin_odenis" style="color: #FFFFFF">İlkin ödəniş</label></td>
                                <td colspan="4"><input type="number" name="ilkin_odenis" id="ilkin_odenis" value="{{ $cariSatis->ilkin_odenis }}" min="0" max="999999" step=".01" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeypress="return isNumberKey(event);" onkeyup="this.value.trim() == '' ? (this.value = 1) : (this.value = this.value) " disabled></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">Ödəniş Cədvəli</td>
                            </tr>
                            @foreach($cariSatis->hisse_cedvels as $row)
                                <tr class="odenisRow">
                                    <td><input type="date" name="odenis_tarixleri[]" class="form-control" value="{{ \Carbon\Carbon::parse($row->odenis_tarixi)->format('Y-m-d') }}" disabled></td>
                                    <td><input type="number" name="edilen_odenisler[]" class="form-control" step=".01" value="{{ $row->odenilen_mebleg }}" ></td>
                                    <td colspan="3"><textarea name="description[]" class="form-control" cols="30" rows="1" style="height: 34px" >{{ $row->serh }}</textarea></td>
                                </tr>
                            @endforeach
                        @endif

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">
                                <button type="button" id="satis-et" class="btn btn-primary">Ödəniş et <img id="satis-et-loader" style="width: 35px;padding-left: 10px;display: none" src="{{ asset('avatars/loading.jpg') }}" alt="satış et loader"></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#satis-et').click(function () {
            $(this).prop('disabled',true);
            $('#satis-et-loader').css('display','block');
            let edilen_odenisler    = [];
            let description         = [];
            $("input[name='edilen_odenisler[]']").each(function() {
                edilen_odenisler.push($(this).val());
            });

            $("textarea[name='description[]']").each(function() {
                description.push($(this).val());
            });
            $.ajax({
                type : 'POST',
                data : {
                    satis_id            : '{!! $cariSatis->id !!}',
                    edilen_odenisler    : edilen_odenisler,
                    description         : description,
                },
                url  : '{!! route('front.pay.store') !!}',
                success : function (response) {
                    // $('#satis-et').prop('disabled',false);
                    $('#satis-et-loader').css('display','none');

                    if(response.message)
                    {
                        toastr.success(response.message);
                    }

                    setTimeout(function () {
                        window.location.href = '{!! route('muqavileler.index') !!}';
                    },1000);
                },
                error : function (myErrors) {
                    $.each(myErrors.responseJSON.errors, function (key, error) {
                        toastr.error(error);
                    });
                    $('#satis-et').prop('disabled',false);
                    $('#satis-et-loader').css('display','none');
                }
            });
        });
    </script>
@endsection
