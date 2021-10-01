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
    'elementActive' => 'school_registration'
])

@section('content')
    <div class="content">
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('school_registration') }}
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
                                    <h5 class="title" align="center">{{ __('School Registration Lists') }}</h5>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-5">
                                    <div class="row">
                                        <!-- <div class="col-md-1"></div> -->
                                        <div class="col-md-4 text-left" style="font-weight:bold;">School Name</div>
                                        <div class="col-md-7 text-left" style="padding-left:0px;">
                                            <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <!-- <div class="col-md-1"></div> -->
                                        <div class="col-md-3 text-left" style="font-weight:bold;">NRC</div>
                                        <div class="col-md-7 text-left" style="padding-left:0px;">
                                            <input type="text" name="filter_by_nrc" class="form-control" placeholder="eg. ၁/ကမတ(နိုင်)၁၂၃၄၅၆">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="vertical-align: top;">
                                    <button type="button" class="btn btn-primary btn-round mt-0"  id="search_school">Search</button>
                                </div>
                            </div>
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                    <table id="tbl_school_pending"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >School Name</th>
                                                <th class="bold-font-weight" >Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_school_pending_body" class="hoverTable text-left" style="width:100%;">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <table id="tbl_school_approved"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >School Name</th>
                                                <th class="bold-font-weight" >Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_school_approved_body" class="hoverTable text-left">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                    <table id="tbl_school_rejected"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >School Name</th>
                                                <th class="bold-font-weight" >Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_school_rejected_body" class="hoverTable text-left">
                                        </tbody>
                                    </table>
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
<script src="{{asset('js/school.js')}}"></script>
<script>

    $(document).ready(function (e) {
        // createDatepicker("school_birthone");
        // getSchoolRegisterList();
        var stable_pending = $('#tbl_school_pending').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_school",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0
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
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},

            ],
         });

        var stable_approve =$('#tbl_school_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_school",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1
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
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
            ],
         });

        var stable_reject =$('#tbl_school_rejected').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_school",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2
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
                {data: 'status', name: 'status'},
                {data: 'payment_method', name: 'payment_method'},
            ],

        });

	    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    //.responsive.recalc();
            });
        });

        $("#search_school").click(function(){

            stable_pending.draw();
            stable_approve.draw();
            stable_reject.draw();


        });
    });

</script>
@endpush
