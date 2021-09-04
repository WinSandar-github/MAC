<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    {{-- <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon.png"> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-laravel" />

    <!--  Social tags      -->
    <meta name="keywords" content="design system, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, paper, paper dashboard, creative tim, updivision, html dashboard, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap dashboard, responsive dashboard, laravel, laravel php, laravel php framework, free laravel admin template, free laravel admin, free laravel admin template + Front End + CRUD, crud laravel php, crud laravel, laravel backend admin dashboard">
    <meta name="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard Laravel by Creative Tim">
    <meta itemprop="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">

    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg">


    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard Laravel by Creative Tim">

    <meta name="twitter:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg">


    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Paper Dashboard Laravel by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/paper-dashboard-laravel" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg"/>
    <meta property="og:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up." />
    <meta property="og:site_name" content="Creative Tim" />

    <title>
        {{ __('MAC') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href="{{ asset('css/bootstrap/') }}/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/') }}/font_family.css" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <!-- <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />

    <!--bootstrap 5-->
    {{-- <link href="{{ asset('plugins/bootstrap-5') }}/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- Custom CSS -->
    <link href="{{ asset('css') }}/custom.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" />

    <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->

    <!-- <script src="{{ asset('plugins/select2/css') }}/select2.min.css"></script> -->

    <!--treeview css-->
    <link href="{{ asset('css') }}/treeview.css" rel="stylesheet" />

    <!--toastr-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/toastr') }}/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <!-- dataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.bootstrap5.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css"> -->

    <!-- DataTables -->
    <!-- {{-- <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-select/css/select.bootstrap4.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css"><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> --}} -->

    <!-- Google Tag Manager -->

    
    <link rel="stylesheet" href="{{ asset('EasyLoading/jquery-ui.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('EasyLoading/css/easy-loading.css')}}">

    {{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script> --}}
    <!-- End Google Tag Manager -->
</head>

<body class="{{ $class }}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @auth()
        @include('layouts.page_templates.auth')
        {{-- @include('layouts.navbars.fixed-plugin') --}}
    @endauth

    @guest
        @include('layouts.page_templates.guest')
    @endguest

    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->

    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script> --}}


    <!-- Sharrre libray -->
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script> --}}
    <script src="{{ asset('paper') }}/demo/jquery.sharrre.js"></script>

    <!-- bootstrap JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/bootstrap') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap') }}/popper.min.js"></script>

    <!-- dataTables JS -->
    <script src="{{ asset('js/dataTables') }}/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/dataTables') }}/dataTables.bootstrap5.min.js"></script>
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"> -->

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr') }}/flatpickr.js"></script>

    <!-- select2 -->
    <!-- <script src="{{ asset('js/select2') }}/select2.min.js"></script> -->

    <!-- <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->

    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

      <!-- EasyLoading -->

    <script src="{{ asset('EasyLoading/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('EasyLoading/js/easy-loading.js')}}"></script>
    <script src="{{ asset('js/easyloading.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    {{-- <script src="{{ asset('plugins/bootstrap-5') }}/js/bootstrap.min.js"></script> --}}
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <script src="{{ asset('assets/myanmarnrc.js') }}"></script>
    <script src="{{ asset('js') }}/audit_firm.js"></script>
    <script src="{{ asset('js') }}/course.js"></script>
    <script src="{{ asset('js') }}/batch.js"></script>
    <script src="{{ asset('js') }}/requirement.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
    <script src="{{ asset('js') }}/common.js"></script>
    <script src="{{ asset('js') }}/student.js"></script>
    <script src="{{ asset('js') }}/da_approve_reject.js"></script>
    <script src="{{ asset('js') }}/cpa_ff_approve_reject.js"></script>
    <script src="{{ asset('js') }}/cpa_one_approve_reject.js"></script>
    <script src="{{ asset('js') }}/cpa_two_approve_reject.js"></script>
    <script src="{{ asset('js') }}/papp_approve_reject.js"></script>
    <script src="{{ asset('js') }}/da_exam_one.js"></script>
    <script src="{{ asset('js') }}/exam_result.js"></script>
    <script src="{{ asset('js') }}/cpa_exam_one.js"></script>
    <script src="{{ asset('js') }}/mentor.js"></script>
    <script src="{{ asset('js') }}/chart.js"></script>
    <!--toastr-->
    <script src="{{ asset('plugins/toastr') }}/toastr.min.js"></script>

    <!-- select2 -->
    <!-- <script src="{{ asset('plugins/select2/js') }}/select2.min.js"></script> --> -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <!-- DataTables -->
    <!-- {{-- <script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script src="{{ asset('plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
    {{-- <script src="{{ asset('plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script> --}} -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('show.bs.modal', '#ApprovalModal', function (e) {
                var button = $(e.relatedTarget);
                $('#update_id').val(button.data('id'));
                var url = button.data('url');
                $('#deleteDAApprovalFormAction').attr('action', url);
            });
            $(document).on('show.bs.modal', '#RejectModal', function (e) {
                var button = $(e.relatedTarget);
                $('#update_id').val(button.data('id'));
                var url = button.data('url');
                $('#deleteRejectFormAction').attr('action', url);
            });
            function centerModal() {
                $(this).css('display', 'block');
                var $dialog = $(this).find(".modal-dialog");
                var offset = ($(window).height() - $dialog.height()) / 3;
                // Center modal vertically in window
                $dialog.css("margin-top", offset);
            }

            $('.modal').on('show.bs.modal', centerModal);
            $(window).on("resize", function () {
                $('.modal:visible').each(centerModal);
            });
        });
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>

    
        <!-- <script>
            alert("hello")
    show_loader()
    setTimeout(() => {
        alert("Easy Loading")
        EasyLoading.hide();
        
    }, 3000);
        </script> -->

    @include('layouts.modal')
    @yield('custom-javascript')
    @stack('scripts')

    {{-- @include('layouts.navbars.fixed-plugin-js') --}}
</body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('sweetalert::alert')
</html>
