<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" href="{{ asset('favicon.jpg') }}" />

<!-- font awesome library -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<script src="{{ asset('js/app.js') }}"></script>

<!-- themekit admin template asstes -->
<link rel="stylesheet" href="{{ asset('all.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">


<!-- Stack array for including inline css or head elements -->
@stack('head')
<script src="{{ asset('js/swall.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .wrapper{
        margin-top: 51px;
    }
    .wrapper .header-top {
        background-color: #ffffff;
        z-index: 1030;
        position: relative;
        padding: 15px 0;
        position: fixed;
        top: 0;
        width: 100%;
        left: 0;
        padding-left: 0;
        -webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04),
            0 1px 6px rgba(0, 0, 0, 0.04);
        -moz-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04),
            0 1px 6px rgba(0, 0, 0, 0.04);
        box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04), 0 1px 6px rgba(0, 0, 0, 0.04);
    }
    @media (min-width: 768px) {
    .modal-xl {
    width: 90%;
    max-width:1400px;
    }
    }
</style>
