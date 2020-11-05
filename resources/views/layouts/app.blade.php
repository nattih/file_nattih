<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Gestion_S</title>
     {{--  general --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href=" " rel="stylesheet">
    @yield('extra-js')
    {{-- pour dashboard  --}}
     <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"> --}}

    {{-- TEMPLATE SITE WEB  --}}
 <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
        <main class="py-0">
            @include('menus.menu')
            @yield('content')
        </main>
        
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    
    <!-- Bootstrap -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
 
    <!-- PAGE SCRIPTS -->
    <script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>
    {{-- script dattable --}}
    
    {{-- <!-- DataTables -->
    <script  src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('DataTables/DataTables-1.10.22/js/dataTables.bootstrap4.min')}}"></script>
    <script src="{{asset('DataTables/DataTables-1.10.22/js/jquery.dataTables.min')}}"></script> --}}
    
    {{-- site web script --}}
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
   <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
   <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
   <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
   <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
   <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

   <!-- Template Main JS File -->
   <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>