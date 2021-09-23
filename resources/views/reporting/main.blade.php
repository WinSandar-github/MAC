<!--
=========================================================

ဗုဒ္ဓံ ဓမ္မံ သံဃံ

=========================================================
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ __('MAC') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('paper/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('paper/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet"/>
    <link href="{{ asset('paper/demo/demo.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('css/treeview.css')}}" rel="stylesheet"/>
    <link href="{{ asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('EasyLoading/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{ asset('EasyLoading/css/easy-loading.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom_table.css') }}">
</head>

<body class=" ">

 
<div class="main-wrapper">

 <div class="section"> <!-- section-padding mt-n10 -->
    <div class="container mt-5"> <!-- container-fluid p-4 -->
        @yield('content')
    </div>
</div>

</div>
   
 

<!-- Sharrre libray -->
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('paper/demo/jquery.sharrre.js')}}"></script>

<!-- dataTables JS -->
<script src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables/dataTables.bootstrap5.min.js')}}"></script>

<!-- bootstrap JS -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/bootstrap/popper.min.js')}}"></script>
<script src="{{ asset('js/flatpickr/flatpickr.js')}}"></script>
<script src="{{ asset('EasyLoading/jquery-ui.min.js')}}"></script>
<script src="{{ asset('EasyLoading/js/easy-loading.js')}}"></script>
<script src="{{ asset('js/easyloading.js') }}"></script>
<script src="{{ asset('paper/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('paper/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('paper/js/paper-dashboard.min.js?v=2.0.0')}}"></script>
<script src="{{ asset('assets/myanmarnrc.js') }}"></script>
<script src="{{ asset('js/audit_firm.js')}}"></script>
<script src="{{ asset('js/course.js') }}"></script>
<script src="{{ asset('js/batch.js')}}"></script>
<script src="{{ asset('js/requirement.js')}}"></script>
<script src="{{ asset('js/description.js')}}"></script>
<script src="{{ asset('js/membership.js')}}"></script>
<script src="{{ asset('js/report.js')}}"></script>



<script src="{{ asset('js/common.js')}}"></script>
<script src="{{ asset('js/student.js')}}"></script>
<script src="{{ asset('js/da_approve_reject.js')}}"></script>
<script src="{{ asset('js/cpa_ff_approve_reject.js')}}"></script>
<script src="{{ asset('js/cpa_one_approve_reject.js')}}"></script>
<script src="{{ asset('js/cpa_two_approve_reject.js')}}"></script>
<script src="{{ asset('js/papp_approve_reject.js')}}"></script>
<script src="{{ asset('js/da_exam_one.js')}}"></script>
<script src="{{ asset('js/exam_result.js')}}"></script>
<script src="{{ asset('js/cpa_exam_one.js')}}"></script>
<script src="{{ asset('js/mentor.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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

@include('layouts.modal')

@yield('custom-javascript')

@stack('scripts')

{{-- @include('layouts.navbars.fixed-plugin-js') --}}
</body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('sweetalert::alert')
</html>
