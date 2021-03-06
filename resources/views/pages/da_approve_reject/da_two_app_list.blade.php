@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'da_two_app_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        {{--<div class="col-md-12">
        {{ Breadcrumbs::render('da_list') }}
        </div>--}}
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="title">{{ __('DA Two Application List') }}</h5>
                            </div>
                        </div>
                        {{--<div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 text-left" style="font-weight:bold;">Student Name</div>
                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-4 text-left" style="font-weight:bold;">Batch Number</div>
                                    <div class="col-md-7 text-left">
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
                                    <div class="col-md-4 text-left" style="font-weight:bold;">NRC</div>
                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                        <input type="text" name="filter_by_nrc" class="form-control" placeholder="eg. ???/?????????(???????????????)??????????????????">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-round m-0" onclick="da2_reload();" id="search">Search</button>
                            </div>
                        </div>--}}
                        <ul class="nav nav-tabs mt-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
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
                                <table id="tbl_da_pending_list"class="table table-hover text-nowrap " style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight" >No</th>
                                            <th class="bold-font-weight" >Action</th>
                                            <th class="bold-font-weight" >Student Name</th>
                                            <th class="bold-font-weight" >Batch Number</th>
                                            <th class="bold-font-weight" >Email</th>
                                            <th class="bold-font-weight" >Phone Number</th>
                                            <th class="bold-font-weight" >NRC</th>
                                            <th class="bold-font-weight" >Status</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbl_da_pending_list_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="link2" aria-expanded="true">
                                <table id="tbl_da_approved_list"class="table table-hover text-nowrap " style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight" >No</th>
                                            <th class="bold-font-weight" >Action</th>
                                            <th class="bold-font-weight" >Student Name</th>
                                            <th class="bold-font-weight" >Batch Number</th>
                                            <th class="bold-font-weight" >Email</th>
                                            <th class="bold-font-weight" >Phone Number</th>
                                            <th class="bold-font-weight" >NRC</th>
                                            <th class="bold-font-weight" >Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_da_approved_list_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="link3" aria-expanded="true">
                                <table id="tbl_da_rejected_list"class="table table-hover text-nowrap " style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight" >No</th>
                                            <th class="bold-font-weight" >Action</th>
                                            <th class="bold-font-weight" >Student Name</th>
                                            <th class="bold-font-weight" >Batch Number</th>
                                            <th class="bold-font-weight" >Email</th>
                                            <th class="bold-font-weight" >Phone Number</th>
                                            <th class="bold-font-weight" >NRC</th>
                                            <th class="bold-font-weight" >Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_da_rejected_list_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
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
    // getDAList('da_2');
    //loadBatchData("da_2");
    var pending_datatable;
    var approved_datatable;
    var rejected_datatable;
    $(document).ready(function () {

        pending_datatable=$('#tbl_da_pending_list').DataTable({
            scrollX: true,
            processing: true,
            //serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_student_info",
                type : "POST" ,
                data :  function (d) {
                    d.status       = 0,
                    d.course_code = 'da_2',
                    d.name =    "",
                    d.nrc =    "",
                    d.batch="all"
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'student_info.name_mm', name: 'Student Name'},
                {data: 'batch.name', name: 'Batch Name'},
                {data: 'student_info.email', name: 'Email'},
                {data: 'student_info.phone', name: 'Phone Number'},
                {data: 'nrc', name: 'NRC'},
                {data: 'status', name: 'Status'}
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        approved_datatable=$('#tbl_da_approved_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_student_info",
                type : "POST" ,
                data :  function (d) {
                    d.status       = 1,
                    d.course_code = 'da_2',
                    d.name =    "",
                    d.nrc =    "",
                    d.batch="all"
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'student_info.name_mm', name: 'Student Name'},
                {data: 'batch.name', name: 'Batch Name'},
                {data: 'student_info.email', name: 'Email'},
                {data: 'student_info.phone', name: 'Phone Number'},
                {data: 'nrc', name: 'NRC'},
                {data: 'status', name: 'Status'}
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        rejected_datatable=$('#tbl_da_rejected_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_student_info",
                type : "POST" ,
                data :  function (d) {
                    d.status       = 2,
                    d.course_code = 'da_2',
                    d.name =    "",
                    d.nrc =    "",
                    d.batch="all"
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'student_info.name_mm', name: 'Student Name'},
                {data: 'batch.name', name: 'Batch Name'},
                {data: 'student_info.email', name: 'Email'},
                {data: 'student_info.phone', name: 'Phone Number'},
                {data: 'nrc', name: 'NRC'},
                {data: 'status', name: 'Status'}
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust();
            });
        });

    });
    function da2_reload(){
        pending_datatable.ajax.reload();
        approved_datatable.ajax.reload();
        rejected_datatable.ajax.reload();
    }
</script>
@endpush
