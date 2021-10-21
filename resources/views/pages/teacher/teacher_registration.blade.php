@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'membership',
    'elementActive' => 'teacher_registration'
])

@section('content')
    <div class="content">
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('teacher_registration') }}
            </div>
        </div>--}}
        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="title" align="center">{{ __('Teacher Registration Lists') }}</h5>
                                </div>
                            </div>
                            
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Initial List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Renew List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Cessation List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                   
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#study1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#study2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#study3" role="tablist" aria-expanded="false" style="font-weight:bold">Reject List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="study1" aria-expanded="true">
                                                <table id="tbl_teacher_initial_pending" class="table table-hover text-nowrap" style="width:100%;">
                                                        <thead class="text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Teacher Name</th>
                                                                <th class="bold-font-weight" >Email</th>     
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Register Date</th>
                                                                <th class="bold-font-weight" >Expire Period Time</th>
                                                                <th class="bold-font-weight" >Payment Date</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Payment Status</th>
                                                                <th class="bold-font-weight" >Teacher Card</th>
                                                                <th class="bold-font-weight" >Remark</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_teacher_initial_pending_body" class="hoverTable">
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="study2" aria-expanded="true">
                                                <table id="tbl_teacher_initial_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Teacher Name</th>
                                                            <th class="bold-font-weight" >Email</th>     
                                                            <th class="bold-font-weight" >Phone Number</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Register Date</th>
                                                            <th class="bold-font-weight" >Expire Period Time</th>
                                                            <th class="bold-font-weight" >Payment Date</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Teacher Card</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_initial_approved_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="study3" aria-expanded="true">
                                                <table id="tbl_teacher_initial_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Teacher Name</th>
                                                            <th class="bold-font-weight" >Email</th>     
                                                            <th class="bold-font-weight" >Phone Number</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Register Date</th>
                                                            <th class="bold-font-weight" >Expire Period time</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Teacher Card</th>
                                                            <th class="bold-font-weight" >Remark</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_initial_rejected_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#renew1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#renew2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#renew3" role="tablist" aria-expanded="false" style="font-weight:bold">Reject List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="renew1" aria-expanded="true">
                                                <table id="tbl_teacher_renew_pending" class="table table-hover  text-nowrap" style="width:100%;">
                                                        <thead class=" text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Teacher Name</th>
                                                                <th class="bold-font-weight" >Teacher No</th>
                                                                <th class="bold-font-weight" >Email</th>     
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Renew Date</th>
                                                                <th class="bold-font-weight" >Expire Period time</th>
                                                                <th class="bold-font-weight" >Payment Date</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Payment Status</th>
                                                                <th class="bold-font-weight" >Teacher Card</th>
                                                                <th class="bold-font-weight" >Remark</th>
                                                                <th class="bold-font-weight" >Yearly</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_teacher_renew_pending_body" class="hoverTable">
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="renew2" aria-expanded="true">
                                                <table id="tbl_teacher_renew_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Teacher Name</th>
                                                            <th class="bold-font-weight" >Teacher No</th>
                                                            <th class="bold-font-weight" >Email</th>     
                                                            <th class="bold-font-weight" >Phone Number</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Renew Date</th>
                                                            <th class="bold-font-weight" >Expire Period time</th>
                                                            <th class="bold-font-weight" >Payment Date</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Teacher Card</th>
                                                            <th class="bold-font-weight" >Yearly</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_renew_approved_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="renew3" aria-expanded="true">
                                                <table id="tbl_teacher_renew_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Teacher Name</th>
                                                            <th class="bold-font-weight" >Teacher No</th>
                                                            <th class="bold-font-weight" >Email</th>     
                                                            <th class="bold-font-weight" >Phone Number</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Renew Date</th>
                                                            <th class="bold-font-weight" >Expire Period time</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Teacher Card</th>
                                                            <th class="bold-font-weight" >Remark</th>
                                                            <th class="bold-font-weight" >Yearly</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_renew_rejected_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                  
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="initial1" aria-expanded="true">
                                                <table id="tbl_teacher_cessation_initial" class="table table-hover text-nowrap" style="width:100%;">
                                                        <thead class="text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Teacher Name</th>
                                                                <th class="bold-font-weight" >Email</th>     
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Register Date</th>
                                                                <!-- <th class="bold-font-weight" >Expire Period time</th>
                                                                <th class="bold-font-weight" >Payment Date</th>
                                                                <th class="bold-font-weight" >Payment Status</th> -->
                                                                <th class="bold-font-weight" >Teacher Card</th>
                                                                <th class="bold-font-weight" >Cessation Reason</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_teacher_cessation_initial_body" class="hoverTable">
                                                        </tbody>
                                                </table>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>



    <script>
         var mmnrc_regions = {!! json_encode($nrc_regions) !!};
        // get NRC Townships data from myanmarnrc.php config file
        var mmnrc_townships = {!! json_encode($nrc_townships) !!};
        // get NRC characters data from myanmarnrc.php config file
        var mmnrc_characters = {!! json_encode($nrc_characters) !!};
        // get language data from myanmarnrc.php config file
        var mmnrc_language = "{{ $nrc_language }}";
    </script>
@endsection

@push('scripts')
<script src="{{asset('js/teacher.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
         
        $('#tbl_teacher_initial_pending').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.initial_status= 0
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'reg_date', name: 'reg_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'reason', name: 'reason'},
            ],
            
         });
        
        $('#tbl_teacher_initial_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.initial_status= 0
                }
                

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'reg_date', name: 'reg_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
            ],
         });

        $('#tbl_teacher_initial_rejected').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2,
                    d.initial_status= 0
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'reg_date', name: 'reg_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'reason', name: 'reason'},
            ],
        });
        $('#tbl_teacher_renew_pending').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.initial_status= 1
                }
            
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 't_code', name: 't_code'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'renew_date', name: 'renew_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'reason', name: 'reason'},
                {data: 'yearly', name: 'yearly'},
            ],
            
         });
        
        $('#tbl_teacher_renew_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.initial_status= 1
                }
            
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 't_code', name: 't_code'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'renew_date', name: 'renew_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'yearly', name: 'yearly'},
            ],
         });

        $('#tbl_teacher_renew_rejected').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2,
                    d.initial_status= 1
                }
            
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 't_code', name: 't_code'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'renew_date', name: 'renew_date'},
                {data: 'payment_date', name: 'payment_date'},
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'reason', name: 'reason'},
                {data: 'yearly', name: 'yearly'},
            ],
        });
        $('#tbl_teacher_cessation_initial').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_teacher",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2,
                    d.initial_status= 2
                }
            
            },
            columns: [
                {data: 't_code', name: 't_code'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'nrc', name: 'nrc'},
                {data: 'reg_date', name: 'reg_date'},
                // {data: 'exp_date', name: 'exp_date'},
                // {data: 'payment_date', name: 'payment_date'},
                // {data: 'status', name: 'status'},
                // {data: 'payment_method', name: 'payment_method'},
                {data: 'card', name: 'card'},
                {data: 'remark', name: 'remark'},
            ],
        });
        
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    //.responsive.recalc();
            });
        });

        
    });
    </script>

@endpush
