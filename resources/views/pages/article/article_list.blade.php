@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'article_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="title">{{ __('Article Lists (MAC)') }}</h5>
                                </div>
                            </div>
                        
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Firm Article</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Government Article</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="true" style="font-weight:bold">Resign Article</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                    <div class="card-header">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#firm1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#firm2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#firm3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="firm1" aria-expanded="true">
                                                <table id="tbl_firm_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_firm_article_pending_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="firm2" aria-expanded="true">
                                                <table id="tbl_firm_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_firm_article_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="firm3" aria-expanded="true">
                                                <table id="tbl_firm_article_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_firm_article_rejected_body" class="hoverTable text-left">
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
                                                <a class="nav-link active" data-toggle="tab" href="#gov1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#gov2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#gov3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="gov1" aria-expanded="true">
                                                <table id="tbl_gov_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_gov_article_pending_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="gov2" aria-expanded="true">
                                                <table id="tbl_gov_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_gov_article_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="gov3" aria-expanded="true">
                                                <table id="tbl_gov_article_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_gov_article_rejected_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#resign1" role="tablist" aria-expanded="false" style="font-weight:bold">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#resign2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#resign3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="resign1" aria-expanded="true">
                                                <table id="tbl_resign_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_resign_article_pending_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="resign2" aria-expanded="true">
                                                <table id="tbl_resign_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_resign_article_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="resign3" aria-expanded="true">
                                                <table id="tbl_resign_article_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_resign_article_rejected_body" class="hoverTable text-left">
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
<script src="{{ asset('js/article.js') }}"></script>
<script>
    $('document').ready(function(){
        //firm article
        var table_pending = $('#tbl_firm_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_approve =$('#tbl_firm_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_reject =$('#tbl_firm_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //Gov Article
        var table_pending = $('#tbl_gov_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_gov_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_approve =$('#tbl_gov_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_gov_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_reject =$('#tbl_gov_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_gov_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //Resign Article
        var table_pending = $('#tbl_resign_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_approve =$('#tbl_resign_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_reject =$('#tbl_resign_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
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
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},

            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    //.responsive.recalc();
            });
        });
    })
</script>
@endpush
