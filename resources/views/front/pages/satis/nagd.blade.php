@extends('front.layout.master')

@section('title') Nağd Satış @endsection
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
                    <form action="" method="POST" onsubmit="return false">
                        <table id="kredit-yaz" class="table table-light " style="width: 100%;color:white;border: 2px solid black;">
                            <thead style="color:black;text-align: center;">
                            <tr>
                                <th colspan="5">ANKET</th>
                            </tr>
                            </thead>
                            <tbody style="border: 2px solid black;color: black;">
                            <tr>
                                <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">MÜSTƏRİ MƏLUMATLARI</td>
                            </tr>
                            <tr>
                                <td class="bg-danger">
                                    <label for="alici_kateqoriya_id" style="color: #FFFFFF">Alıcı kateqoriyası seçin : <sup>*</sup></label>
                                </td>
                                <td colspan="4">
                                    <select name="alici_kateqoriya_id" id="alici_kateqoriya_id" class="form-control">
                                        <option value="">Birini seçin</option>
                                        <option value="1">Həkim</option>
                                        <option value="2">Texnik</option>
                                        <option value="3">Klinika</option>
                                        <option value="4">Firma</option>
                                    </select>
                                    <small id="alici_kateqoriya_id-js" class="form-text text-danger"></small>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-danger">
                                    <label for="alinin_unvani" style="color: #FFFFFF">Müştəri seçin :<sup>*</sup></label>
                                </td>
                                <td colspan="4">
                                    <select name="musterinin_id" id="musterinin_id" class="form-control w-100 float-end">
                                        <option value="">Birini seçin</option>
                                    </select>
                                    <small id="musterinin_id-js" class="form-text text-danger"></small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="background-color: green !important;font-weight: bold;color: #FFFFFF !important;">MƏHSUL VƏ QİYMƏT</td>
                            </tr>
                            <tr>
                                <td class="bg-danger">
                                    <label for="mehsulun_adi" style="color: #FFFFFF">Məhsulun adı <sup>*</sup></label>
                                </td>
                                <td colspan="4">
                                    <select class="form-control" id="mehsulun_adi">
                                        <option value="">Birini seçin</option>
                                        @foreach($mehsullar as $mehsul)
                                        <option value="{{ $mehsul->ad }}">{{ $mehsul->ad }}</option>
                                        @endforeach
                                    </select>
                                    <small id="satis_usulu-js" class="form-text text-danger"></small>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-danger">
                                    <label for="firma_id" style="color: #FFFFFF">Firma<sup>*</sup></label>
                                </td>
                                <td colspan="4">
                                    <select class="form-control" id="firma_id">
                                        <option value="">Birini seçin</option>
                                    </select>
                                    <small id="firma_id-js" class="form-text text-danger"></small>
                                </td>
                            </tr>
                            <tr id="istehsalciRow">
                                <td class="bg-danger">
                                    <label for="istehsalci_id" style="color: #FFFFFF">İstehsalçı<sup>*</sup></label>
                                </td>
                                <td colspan="4">
                                    <select class="form-control" id="istehsalci_id">
                                        <option value="">Birini seçin</option>
                                    </select>
                                    <small id="istehsalci_id-js" class="form-text text-danger"></small>
                                </td>
                            </tr>
                            <tr></tr>
                            <tr class="sebetim"></tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;">
                                    <button type="button" id="satis-et" class="btn btn-primary">Satış et <img id="satis-et-loader" style="width: 35px;padding-left: 10px;display: none" src="http://barcode_v2.test/assets/loaders/loading-icon-transparent-background-12.jpg" alt="satış et loader"></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#musterinin_id').select2({ width: '100%' });
            $('#mehsulun_adi').select2({ width: '100%' });
            $('#firma_id').select2({ width: '100%' });
            $('#istehsalci_id').select2({ width: '100%' });

            $('#alici_kateqoriya_id').change(function () {
               let  alici_kateqoriya_id = $(this).val();

                $('#musterinin_id').html('').select2({
                    data: [
                        {id: "", text: 'Birini seçin'}
                    ],
                    width: '100%'
                });

                $.ajax({
                    type : 'POST',
                    data : { alici_kateqoriya_id : alici_kateqoriya_id },
                    url  : '{!! route('satis.customers') !!}',
                    success : function (response) {
                        $('#musterinin_id').html('').select2({
                            data: response,
                            width: '100%'
                        });
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        })
                    }
                });
            });

            $('#mehsulun_adi').change(function () {
                $('.proInfo').remove();
                sebetiCagir();
                let mehsulun_adi = $(this).val();

                $('#firma_id').html('').select2({
                    data: [
                        {id: "", text: 'Birini seçin'}
                    ],
                    width: '100%'
                });

                $('#istehsalci_id').html('').select2({
                    data: [
                        {id: "", text: 'Birini seçin'}
                    ],
                    width: '100%'
                });

                $.ajax({
                    type : 'POST',
                    data : { mehsulun_adi : mehsulun_adi },
                    url  : '{!! route('satis.firmas') !!}',
                    success : function (response) {
                        $('#firma_id').html('').select2({
                            data: response.firmas,
                            width: '100%'
                        });

                        // $('#istehsalci_id').html('').select2({
                        //     data: response.istehsalcis,
                        //     width: '100%'
                        // });
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        })
                    }
                });
            });

            $('#firma_id').change(function () {
                $('.proInfo').remove();
                sebetiCagir();
                let firma_id        = $(this).val();
                let mehsulun_adi    = $('#mehsulun_adi').val();
                let istehsalci_id   = $('#istehsalci_id').val();

                $('#istehsalci_id').html('').select2({
                    data: [
                        {id: "", text: 'Birini seçin'}
                    ],
                    width: '100%'
                });

                $.ajax({
                    type : 'POST',
                    data : {
                        mehsulun_adi    : mehsulun_adi,
                        firma_id        : firma_id,
                    },
                    url  : '{!! route('satis.istehsalcis') !!}',
                    success : function (response) {
                        $('#istehsalci_id').html('').select2({
                            data: response.istehsalcis,
                            width: '100%'
                        });
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        })
                    }
                });
            });

            $('#istehsalci_id').change(function () {
                let istehsalci_id   = $(this).val();
                let firma_id        = $('#firma_id').val();
                let mehsulun_adi    = $('#mehsulun_adi').val();
                // console.log('firma_id :'+firma_id+";mehsulun_adi :"+mehsulun_adi+";istehsalci_id : "+istehsalci_id)
                $('.proInfo').remove();
                if(firma_id != '' && mehsulun_adi != '' && istehsalci_id != '')
                {
                    getMehsuls(firma_id, mehsulun_adi, istehsalci_id);
                }
            });

            function getMehsuls(firma_id, mehsulun_adi, istehsalci_id) {
                $.ajax({
                    type : 'POST',
                    data : {
                        firma_id         : firma_id,
                        mehsulun_adi     : mehsulun_adi,
                        istehsalci_id    : istehsalci_id,
                        satis_usulu_id   : '{!! request()->segment(3) !!}',
                    } ,
                    url : '{!! route('satis.mehsuls') !!}',
                    success : function (response) {
                        $('.proInfo').remove();
                        $('#istehsalciRow').after(response);
                        sebetiCagir();
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        })
                    }
                });
            }
        });

        $(document).on('click','.proListBtn',function () {
            let action                  = $(this).attr('data-action');
            if(action == 1)
            {
                let mehsul_id               = $(this).attr('data-id');
                let qutu_sayi               = $('.proListQutuSayi[data-id="'+mehsul_id+'"]').val();
                let qutusunun_qiymeti       = $('.proListBirQutununQiymeti[data-id="'+mehsul_id+'"]').val();
                let ededle_sayi             = $('.proListEdedLeSay[data-id="'+mehsul_id+'"]').val();
                let bir_ededinin_qiymeti    = $('.proListBirEdedininQiymeti[data-id="'+mehsul_id+'"]').val();
                if(
                    isNaN(qutu_sayi) ||
                    isNaN(qutusunun_qiymeti) ||
                    isNaN(ededle_sayi) ||
                    isNaN(bir_ededinin_qiymeti) ||
                    qutu_sayi == '' ||
                    qutusunun_qiymeti == '' ||
                    ededle_sayi == '' ||
                    bir_ededinin_qiymeti == ''
                )
                {
                    toastr.error('Yalnız ədəd daxil edə bilərsiniz');
                    return;
                }
                else
                {
                    if(qutu_sayi % 1 != 0)
                    {
                        toastr.error('Qutu sayı yalnız tam ədədlər ola bilər');
                        return;
                    }

                    if(ededle_sayi % 1 != 0)
                    {
                        toastr.error('Ədəd sayı yalnız tam ədədlər ola bilər');
                        return;
                    }

                    if(qutu_sayi == 0 && ededle_sayi == 0)
                    {
                        toastr.error('Qutu və ya Ədəd sayı daxil edin');
                        return;
                    }
                }

                $.ajax({
                    type : 'POST',
                    data : {
                        action               : action,
                        mehsul_id            : mehsul_id,
                        qutu_sayi            : qutu_sayi,
                        qutusunun_qiymeti    : qutusunun_qiymeti,
                        ededle_sayi          : ededle_sayi,
                        bir_ededinin_qiymeti : bir_ededinin_qiymeti,
                        satis_usulu_id       : '{!! request()->segment(3) !!}',
                    } ,
                    url : '{!! route('satis.sebete.at') !!}',
                    success : function (response) {
                        $('.proInfo[data-id="'+mehsul_id+'"]').remove();
                        sebetiCagir();
                        toastr.success(response.message);
                        // console.log(response)
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        });
                    }
                });
            }
            else
            {
                let mehsul_id               = $(this).attr('data-id');
                let ededle_sayi             = $('.proListEdedLeSay[data-id="'+mehsul_id+'"]').val();
                let bir_ededinin_qiymeti    = $('.proListBirEdedininQiymeti[data-id="'+mehsul_id+'"]').val();

                if(
                    isNaN(ededle_sayi) ||
                    isNaN(bir_ededinin_qiymeti) ||
                    ededle_sayi == '' ||
                    bir_ededinin_qiymeti == ''
                )
                {
                    toastr.error('Yalnız ədəd daxil edə bilərsiniz');
                    return;
                }
                else
                {
                    if(ededle_sayi % 1 != 0)
                    {
                        toastr.error('Ədəd sayı yalnız tam ədədlər ola bilər');
                        return;
                    }

                    if(ededle_sayi == 0)
                    {
                        toastr.error('Ədəd sayı daxil edin');
                        return;
                    }
                }

                $.ajax({
                    type : 'POST',
                    data : {
                        action               : action,
                        mehsul_id            : mehsul_id,
                        ededle_sayi          : ededle_sayi,
                        bir_ededinin_qiymeti : bir_ededinin_qiymeti,
                        satis_usulu_id       : '{!! request()->segment(3) !!}',
                    } ,
                    url : '{!! route('satis.sebete.at') !!}',
                    success : function (response) {
                        $('.proInfo[data-id="'+mehsul_id+'"]').remove();
                        sebetiCagir();
                        toastr.success(response.message);
                        // console.log(response)
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, error) {
                            toastr.error(error);
                        });
                    }
                });
            }

            //
            //
            // console.log('mehsul_id -'+mehsul_id);
            // console.log('qutu_sayi -'+qutu_sayi);
            // console.log('qutusunun_qiymeti -'+qutusunun_qiymeti);
            // console.log('ededle_sayi -'+ededle_sayi);
            // console.log('bir_ededinin_qiymeti -'+bir_ededinin_qiymeti);
        });

        $(document).on('click', '.proListDeleterBtn', function () {
            let deleting_mehsul_id = $(this).attr('data-id');

            $.ajax({
                type : 'POST',
                url  : '{!! route('front.product.removal') !!}',
                data : { deleting_mehsul_id : deleting_mehsul_id },
                success: function (response) {
                    toastr.success(response.message);
                    sebetiCagir();
                },
                error : function (myErrors) {
                    $.each(myErrors.responseJSON.errors, function (key, error) {
                        toastr.error(error);
                    });
                }
            })
        });

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        sebetiCagir()
        function sebetiCagir() {
            $('.proInfoSebetim').remove();
            $.ajax({
                type : 'POST',
                url  : '{!! route('satis.sebeti.cagir') !!}',
                success : function (response) {
                    $('.sebetim').after(response);
                }
            });
        }
    </script>
@endsection
