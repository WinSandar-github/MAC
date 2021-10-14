<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ __('DPRMS') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="{{ asset('css/bootstrap/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('paper/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('paper/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2/select2.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/treeview.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <h5>Report</h5>
        <!-- Sharrre libray -->
        <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
        <script src="{{ asset('paper/demo/jquery.sharrre.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    </body>
</html>