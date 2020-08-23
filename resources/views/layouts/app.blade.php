<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    {{-- Icon --}}
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    {{-- Styles --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/png" >
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    <div class="loading">
        <div class="progress-container card card-body fit-content p-3 shadow">
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            <span class="text-center mt-2">Memuat data . . .</span>
        </div>
    </div>

{{-- Sweet Alert --}}
    @include('sweetalert::alert')
{{-- End Sweet Alert --}}

{{-- Content --}}
    @yield('body')
{{-- End Content --}}

</body>
</html>
