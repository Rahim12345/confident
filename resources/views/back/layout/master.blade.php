<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name')}} - @yield('title')</title>
    @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'product.create')
        <link rel="stylesheet" href="{{ asset('scalis/css/custom.css') }}">
    @endif

    <link href="{{ asset('back/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/demo.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: yellowgreen;
            color: white;
        }

        .select2-results ul li {
            background-color: #1f2936;
            color: #656d77;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    @yield('css')
</head>
<body class="antialiased theme-dark">
<input type="hidden" value="{{ env('app_url') }}" id="rootUrl">

<div class="page">
    <div class="page">

        @include('back.includes.aside')
        @include('back.includes.header')
        <div class="page-wrapper">
            @yield('content')
            @include('back.includes.footer')
        </div>
    </div>
</div>

<script src="{{ asset('back/dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('jquery.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script><script type="text/javascript">toastr.options = {"closeButton":true,"closeClass":"toast-close-button","closeDuration":300,"closeEasing":"swing","closeHtml":"<button><i class=\"icon-off\"><\/i><\/button>","closeMethod":"fadeOut","closeOnHover":true,"containerId":"toast-container","debug":false,"escapeHtml":false,"extendedTimeOut":10000,"hideDuration":1000,"hideEasing":"linear","hideMethod":"fadeOut","iconClass":"toast-info","iconClasses":{"error":"toast-error","info":"toast-info","success":"toast-success","warning":"toast-warning"},"messageClass":"toast-message","newestOnTop":false,"onHidden":null,"onShown":null,"positionClass":"toast-top-right","preventDuplicates":true,"progressBar":true,"progressClass":"toast-progress","rtl":false,"showDuration":300,"showEasing":"swing","showMethod":"fadeIn","tapToDismiss":true,"target":"body","timeOut":5000,"titleClass":"toast-title","toastClass":"toast"};</script>
@yield('js')
</body>
</html>
