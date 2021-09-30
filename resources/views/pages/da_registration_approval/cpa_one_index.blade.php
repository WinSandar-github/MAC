@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'cpa_one_reg'
])

@section('content')
    <div class="content">
        @include('flash-message')
       {{-- <div class="row">
            <div class="col-md-12">
            {{ Breadcrumbs::render('cpa_one_registration_list') }}
            </div>
        </div>--}}

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="title">{{ __('CPA 1 Registration List') }}</h5>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4 text-left" style="padding-left:20px;font-weight:bold;">Student Name</div>
                                        <div class="col-md-7" style="padding-right:0px;padding-left:0px;">
                                            <input type="text" name="filter_by_name_ss" class="form-control" placeholder="Student Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4 text-left" style="padding-left:20px;font-weight:bold;">Batch Number</div>
                                        <div class="col-md-7 text-left"  style="padding-right:0px;padding-left:0px;">
                                            <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                <option value="all" selected>All Batches</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4 text-left" style="padding-left:20px;font-weight:bold;">Status</div>
                                        <div class="col-md-7 text-left"  style="padding-right:0px;padding-left:0px;">
                                            <select class="form-control form-select" name="selected_status" id="selected_status">
                                                <option value="all" selected>All</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Approved</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="vertical-align: top;">
                                    <button type="button" class="btn btn-primary btn-round" onclick="GetStudentRegistration('cpa_1');" id="search">Search</button>
                                </div>
                            </div>--}}
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Mac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true" style="font-weight:bold">Registration Self Study</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Private Shool</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade" id="link1" aria-expanded="true">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#study1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#study2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#study3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="study1" aria-expanded="true">
                                                <table id="tbl_self_study_pending_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration Reason</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="study2" aria-expanded="true">
                                                <table id="tbl_self_study_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration Reason</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="study3" aria-expanded="true">
                                                <table id="tbl_self_study_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration Reason</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_rejected_list_body" class="hoverTable text-left">
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
                                                <a class="nav-link active" data-toggle="tab" href="#private1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#private2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#private3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="private1" aria-expanded="true">
                                                <table id="tbl_private_school_pending_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="private2" aria-expanded="true">
                                                <table id="tbl_private_school_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="private3" aria-expanded="true">
                                                <table id="tbl_private_school_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_rejected_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="link3" aria-expanded="true">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#maccheck1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#maccheck2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#maccheck3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="maccheck1" aria-expanded="true">
                                                <table id="tbl_mac_pending_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_mac_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="maccheck2" aria-expanded="true">
                                                <table id="tbl_mac_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_mac_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="maccheck3" aria-expanded="true">
                                                <table id="tbl_mac_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_mac_rejected_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@push('scripts')
<script>
    //GetStudentRegistration("cpa_1");
    //loadBatchData("cpa_1");
     $(document).ready(function () {

        $('#tbl_mac_pending_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
                ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"2",
                    "is_reg_reason":false,
                    "status":"0"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_mac_approved_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"2",
                    "is_reg_reason":false,
                    "status":"1"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_mac_rejected_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
             ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"2",
                    "is_reg_reason":false,
                    "status":"2"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_private_school_pending_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"1",
                    "is_reg_reason":false,
                    "status":"0"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_private_school_approved_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"1",
                    "is_reg_reason":false,
                    "status":"1"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_private_school_rejected_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"1",
                    "is_reg_reason":false,
                    "status":"2"
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('#tbl_self_study_pending_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
                ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"0",
                    "is_reg_reason":true,
                    "status":"0"
                }
            },
                columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'reg_reason', name: 'Registration Reason'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_self_study_approved_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
                ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"0",
                    "is_reg_reason":true,
                    "status":"1"
                }
            },
                columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'reg_reason', name: 'Registration Reason'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('#tbl_self_study_rejected_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            responsive: true,
                ajax:{
                "url":BACKEND_URL + "/filter_registration",
                "method":"POST",
                "data":{
                    "form_type":"3",
                    "reg_type":"0",
                    "is_reg_reason":true,
                    "status":"2"
                }
            },
                columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name', name: 'Student Name'},
                {data: 'email', name: 'Email'},
                {data: 'reg_no', name: 'Registration No'},
                {data: 'phone', name: 'Phone'},
                {data: 'reg_reason', name: 'Registration Reason'},
                {data: 'status', name: 'Status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    //.responsive.recalc()

            });
        });

    })
</script>
@endpush
