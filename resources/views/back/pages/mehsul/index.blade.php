@extends('back.layout.master')

@section('title') Məhsullar @endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
        table.theme-dark tr td{
            color: #656d77;
            /*background-color: #232e3c;*/
        }

        table tr td {
            width: max-content !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #FFFFFF !important;
        }
        div#mehsullar_length, div#mehsullar_filter, div#mehsullar_info, span.ellipsis{
            color: #656d77 !important;
        }

        table.dataTable {
            margin: 0 0 !important;
        }
        .card {
            word-wrap: normal;
        }

        .table-mobile-md td {
            color: #656d77 !important;
        }

        #mehsullar_wrapper{
            /*overflow: hidden;*/
            padding: 10px;
        }

        iframe{
            width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('mehsul.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table id="mehsullar"
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>Ad</th>
                                <th>Firma</th>
                                <th>İstehsalçı</th>
                                <th>Kateqoriya</th>
                                <th>Model</th>
                                <th>Qaimə No</th>
                                <th>Say</th>
                                <th>Vahid</th>
                                <th>Maya dəyəri</th>
                                <th>Topdan dəyəri</th>
                                <th>Nağd dəyəri</th>
                                <th>Kredit dəyəri</th>
                                <th>Bir qutusundakı say</th>
                                <th>Qutudakı 1 malın maya dəyəri</th>
                                <th>Qutudakı 1 malın topdan dəyəri</th>
                                <th>Qutudakı 1 malın nağd dəyəri</th>
                                <th>Qutudakı 1 malın kredit dəyəri</th>
                                <th>Tarix</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#mehsullar');

            var today = new Date();
            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
            var time = today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
            var fileName = date+'-'+time;

            table.DataTable({
                processing: true,
                serverSide: true,
                select: true,
                "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100,'Bütün']],
                // dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend:'excel',
                        title:'Mehsullar-'+fileName,
                        exportOptions:{
                            columns:[0,1,2,3]
                        },
                    },
                    'print'
                ],
                ajax: {
                    url: "{{ route('mehsul.index') }}",
                },
                columns: [
                    {data: 'ad', name: 'ad'},
                    {data: 'firma_id', name: 'firma_id'},
                    {data: 'istehsalci_id', name: 'istehsalci_id'},
                    {data: 'kateqoriya_id', name: 'kateqoriya_id'},
                    {data: 'marka_id', name: 'marka_id'},
                    {data: 'qaime_nomresi', name: 'qaime_nomresi'},
                    {data: 'say', name: 'say'},
                    {data: 'vahid_id', name: 'vahid_id'},
                    {data: 'maya_deyeri', name: 'maya_deyeri'},
                    {data: 'topdan_deyeri', name: 'topdan_deyeri'},
                    {data: 'nagd_deyeri', name: 'nagd_deyeri'},
                    {data: 'kredit_deyeri', name: 'kredit_deyeri'},
                    {data: 'bir_qutusundaki_say', name: 'bir_qutusundaki_say'},
                    {data: 'qutudaki_1_malin_maya_deyeri', name: 'qutudaki_1_malin_maya_deyeri'},
                    {data: 'qutudaki_1_malin_topdan_deyeri', name: 'qutudaki_1_malin_topdan_deyeri'},
                    {data: 'qutudaki_1_malin_nagd_deyeri', name: 'qutudaki_1_malin_nagd_deyeri'},
                    {data: 'qutudaki_1_malin_kredit_deyeri', name: 'qutudaki_1_malin_kredit_deyeri'},
                    {data: 'tarix', name: 'tarix'},
                    {data: 'action', name: 'action',searchable:false,orderable: false},
                ],
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'Ad');
                    $( row ).find('td:eq(1)').attr('data-label', 'Firma');
                    $( row ).find('td:eq(2)').attr('data-label', 'İstehsalçı');
                    $( row ).find('td:eq(3)').attr('data-label', 'Kateqoriya');
                    $( row ).find('td:eq(4)').attr('data-label', 'Model');
                    $( row ).find('td:eq(5)').attr('data-label', 'Qaimə No');
                    $( row ).find('td:eq(6)').attr('data-label', 'Tarix');
                    $( row ).find('td:eq(7)').attr('data-label', 'Say');
                    $( row ).find('td:eq(8)').attr('data-label', 'Vahid');
                    $( row ).find('td:eq(9)').attr('data-label', 'Maya dəyəri');
                    $( row ).find('td:eq(10)').attr('data-label', 'Topdan dəyəri');
                    $( row ).find('td:eq(11)').attr('data-label', 'Nağd dəyəri');
                    $( row ).find('td:eq(12)').attr('data-label', 'Kredit dəyəri');
                    $( row ).find('td:eq(13)').attr('data-label', 'Bir qutusundakı say');
                    $( row ).find('td:eq(14)').attr('data-label', 'Qutudakı 1 malın maya dəyəri');
                    $( row ).find('td:eq(15)').attr('data-label', 'Qutudakı 1 malın topdan dəyəri');
                    $( row ).find('td:eq(16)').attr('data-label', 'Qutudakı 1 malın nağd dəyəri');
                    $( row ).find('td:eq(17)').attr('data-label', 'Qutudakı 1 malın kredit dəyəri');
                    $( row ).find('td:eq(18)').attr('data-label', 'Action');
                },
                "language": {
                    "emptyTable": "Cədvəldə heç bir məlumat yoxdur",
                    "infoEmpty": "Nəticə Yoxdur",
                    "infoFiltered": "( _MAX_ Nəticə İçindən Tapılanlar)",
                    "lengthMenu": "Səhifədə _MENU_ Nəticə Göstər",
                    "loadingRecords": "Yüklənir...",
                    "processing": "Gözləyin...",
                    "search": "Axtarış:",
                    "zeroRecords": "Nəticə Tapılmadı.",
                    "paginate": {
                        "first": "İlk",
                        "last": "Axırıncı",
                        "previous": "Öncəki",
                        "next": "Sonrakı"
                    },
                    "aria": {
                        "sortDescending": ": sütunu azalma sırası üzərə aktiv etmək",
                        "sortAscending": ": sütunu artma sırası üzərə aktiv etməkr"
                    },
                    "autoFill": {
                        "cancel": "Ləğv Et",
                        "fill": "Bütün hücrələri <i>%d<\/i> ile doldur",
                        "fillHorizontal": "Hücrələri üfiqi olaraq doldur",
                        "fillVertical": "Hücrələri şaquli olara1 doldur"
                    },
                    "buttons": {
                        "collection": "Kolleksiya <span class=\"\\\"><\/span>",
                        "colvis": "Sütun baxışı",
                        "colvisRestore": "Baxışı əvvəlki vəziyyətinə gətir",
                        "copy": "Kopyala",
                        "copyKeys": "Cədvəldəki qeydi kopyalamaq üçün CTRL və ya u2318 + C düymələrinə basın. Ləğv etmək üçün bu mesajı vurun və ya ESC düyməsini vurun.",
                        "copySuccess": {
                            "1": "1 sətir panoya kopyalandı",
                            "_": "%ds sətir panoya kopyalandı"
                        },
                        "copyTitle": "Panoya kopyala",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Bütün sətirlari göstər",
                            "_": "%d sətir göstər"
                        },
                        "pdf": "PDF",
                        "print": "Çap Et"
                    },
                    "decimal": ",",
                    "info": "_TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
                    "infoThousands": ".",
                    "searchBuilder": {
                        "add": "Koşul Ekle",
                        "button": {
                            "0": "Axtarış Yaradıcı",
                            "_": "Axtarış Yaradıcı (%d)"
                        },
                        "clearAll": "Filtrləri Təmizlə",
                        "condition": "Şərt",
                        "conditions": {
                            "date": {
                                "after": "Növbəti",
                                "before": "Öncəki",
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Bərabərdir",
                                "not": "Deyildir",
                                "notBetween": "Xaricində",
                                "notEmpty": "Dolu"
                            },
                            "number": {
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Bərabərdir",
                                "gt": "Böyükdür",
                                "gte": "Böyük bərabərdir",
                                "lt": "Kiçikdir",
                                "lte": "Kiçik bərabərdir",
                                "not": "Deyildir",
                                "notBetween": "Xaricində",
                                "notEmpty": "Dolu"
                            },
                            "string": {
                                "contains": "Tərkibində",
                                "empty": "Boş",
                                "endsWith": "İlə bitər",
                                "equals": "Bərabərdir",
                                "not": "Deyildir",
                                "notEmpty": "Dolu",
                                "startsWith": "İlə başlayar"
                            },
                            "array": {
                                "equals": "Bərabərdir",
                                "empty": "Boş",
                                "contains": "Tərkibində",
                                "not": "Deyildir",
                                "notEmpty": "Dolu",
                                "without": "Xaric"
                            }
                        },
                        "data": "Qeyd",
                        "deleteTitle": "Filtrləmə qaydasını silin",
                        "leftTitle": "Meyarı xaricə çıxarmaq",
                        "logicAnd": "və",
                        "logicOr": "vəya",
                        "rightTitle": "Meyarı içəri al",
                        "title": {
                            "0": "Axtarış Yaradıcı",
                            "_": "Axtarış Yaradıcı (%d)"
                        },
                        "value": "Değer"
                    },
                    "searchPanes": {
                        "clearMessage": "Hamısını Təmizlə",
                        "collapse": {
                            "0": "Axtarış Bölməsi",
                            "_": "Axtarış Bölməsi (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown}\/{total}",
                        "emptyPanes": "Axtarış Bölməsi yoxdur",
                        "loadMessage": "Axtarış Bölməsi yüklənir ...",
                        "title": "Aktiv filtrlər - %d"
                    },
                    "searchPlaceholder": "Axtarış",
                    "select": {
                        "1": "%d sətir seçildi",
                        "_": "%d sətir seçildi",
                        "cells": {
                            "1": "1 hücrə seçildi",
                            "_": "%d hücrə seçildi"
                        },
                        "columns": {
                            "1": "1 sütun seçildi",
                            "_": "%d sütun seçildi"
                        },
                        "rows": {
                            "1": "1 qeyd seçildi",
                            "_": "%d qeyd seçildi"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Öncəki",
                        "next": "Növbəti",
                        "hours": "Saat",
                        "minutes": "Dəqiqə",
                        "seconds": "Saniyə",
                        "unknown": "Naməlum",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Bağla",
                        "create": {
                            "button": "Təzə",
                            "title": "Yeni qeyd yarat",
                            "submit": "Qeyd Et"
                        },
                        "edit": {
                            "button": "Redaktə Et",
                            "title": "Qeydi Redaktə Et",
                            "submit": "Yeniləyin"
                        },
                        "remove": {
                            "button": "Sil",
                            "title": "Qeydləri sil",
                            "submit": "Sil",
                            "confirm": {
                                "_": "%d ədəd qeydi silmək istədiyinizə əminsiniz?",
                                "1": "Bu qeydi silmək istədiyinizə əminsiniz?"
                            }
                        },
                        "error": {
                            "system": "Sistem xətası baş verdi (Ətraflı Məlumat)"
                        },
                        "multi": {
                            "title": "Çox dəyər",
                            "info": "Seçilmiş qeydlər bu sahədə fərqli dəyərlər ehtiva edir. Bütün seçilmiş qeydlər üçün bu sahəyə eyni dəyəri təyin etmək üçün buraya vurun; əks halda hər qeyd öz dəyərini saxlayacaqdır.",
                            "restore": "Dəyişiklikləri geri qaytarın",
                            "noMulti": "Bu sahə qrup şəklində deyil, ayrı-ayrılıqda təşkil edilə bilər."
                        }
                    }
                },
                stateSave: true,
            });
        });

    </script>
@endsection
