<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href={{url("plugins/fontawesome-free/css/all.min.css")}}>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href={{url("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
        <!-- iCheck -->
        <link rel="stylesheet" href={{url("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
        <!-- JQVMap -->
        <link rel="stylesheet" href={{url("plugins/jqvmap/jqvmap.min.css")}}>
        <!-- Theme style -->
        <link rel="stylesheet" href={{url("dist/css/adminlte.min.css")}}>
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href={{url("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
        <!-- Daterange picker -->
        <link rel="stylesheet" href={{url("plugins/daterangepicker/daterangepicker.css")}}>
        <!-- summernote -->
        <link rel="stylesheet" href={{url("plugins/summernote/summernote-bs4.css")}}>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style>
            svg.w-5.h-5 {
            width: 30px;
            }

            nav[role=navigation] {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            }

            nav[role=navigation] p {
            margin-right: 50px;
            }

            nav .hidden {
            display: flex !important;
            }

            .boxs-card {
            box-shadow: 4px 6px 8px 2px rgba(0, 0, 0, 0.3);
            }

            .invalid-error {
            border: 1px solid red;
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <!-- jQuery -->
        <script src={{url("plugins/jquery/jquery.min.js")}}></script>
        <!-- jQuery UI 1.11.4 -->
        <script src={{url("plugins/jquery-ui/jquery-ui.min.js")}}></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src={{url("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
        <!-- ChartJS -->
        <script src={{url("plugins/chart.js/Chart.min.js")}}></script>
        <!-- Sparkline -->
        <script src={{url("plugins/sparklines/sparkline.js")}}></script>
        <!-- JQVMap -->
        <script src={{url("plugins/jqvmap/jquery.vmap.min.js")}}></script>
        <script src={{url("plugins/jqvmap/maps/jquery.vmap.usa.js")}}></script>
        <!-- jQuery Knob Chart -->
        <script src={{url("plugins/jquery-knob/jquery.knob.min.js")}}></script>
        <!-- daterangepicker -->
        <script src={{url("plugins/moment/moment.min.js")}}></script>
        <script src={{url("plugins/daterangepicker/daterangepicker.js")}}></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src={{url("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
        <!-- Summernote -->
        <script src={{url("plugins/summernote/summernote-bs4.min.js")}}></script>
        <!-- overlayScrollbars -->
        <script src={{url("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
        <!-- AdminLTE App -->
        <script src={{url("dist/js/adminlte.js")}}></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src={{url("dist/js/pages/dashboard.js")}}></script>
        <!-- AdminLTE for demo purposes -->
        <script src={{url("dist/js/demo.js")}}></script>
    </body>
</html>
