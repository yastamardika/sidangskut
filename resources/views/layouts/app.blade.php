<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    @yield('body')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#table').DataTable( {
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            bProcessing: true,
            oLanguage: {
                sSearch: "Pencarian:",
                sLengthMenu: "Menampilkan data: _MENU_",
                sEmptyTable: "Tidak ada data. :(",
                sZeroRecords: "Data tidak ditemukan. :("
            },
            responsive: {
                details: {
                    type: 'column',
                    target: -1
                }
            },
            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets:   -1
            } ]
        } );
        } );
    </script>

</body>

</html>
