@extends('back.layout.master')

@section('title') Rayon @endsection

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
        div#rayonlar_length, div#rayonlar_filter, div#rayonlar_info, span.ellipsis{
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

        #rayonlar_wrapper{
            overflow: hidden;
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
        <div class="mb-3 col-md-12">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <a href="{{ route('rayon.create') }}" class="btn btn-primary w-100">Əlavə et</a>
                        <table id="rayonlar"
                            class="table table-vcenter table-mobile-md card-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad</th>
                                <th>Şəhər</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rayons->count() == 0)
                                <tr>
                                    <td colspan="4" align="center">Məlumat tapılmadı</td>
                                </tr>
                            @endif
                            @foreach($rayons as $item)
                            <tr>
                                <td data-label="#" >
                                    {{ $loop->iteration }}
                                </td>
                                <td data-label="Ad" >
                                    <div>{{ $item->ad }}</div>
                                </td>
                                <td data-label="Şəhər" >
                                    <div>{{ $item->seher ? $item->seher->ad : '' }}</div>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('rayon.edit',$item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <div class="">
                                            <form action="{{ route('rayon.destroy',$item->id) }}" method="POST">
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
            var table = $('#rayonlar');

            table.DataTable({
                "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100,'Bütün']],
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
            });
        });
    </script>
@endsection
