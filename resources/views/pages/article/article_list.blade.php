@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'article_list'
])

@section('content')
    <div class="content">
        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
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
                                    <table id="tbl_article_pending"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_article_pending_body" class="hoverTable text-left" >
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <table id="tbl_article_approved"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tbl_article_approved_body" class="hoverTable text-left">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                    <table id="tbl_article_rejected"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tbl_article_rejected_body" class="hoverTable text-left">
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
@endsection
@push('scripts')
<script src="{{ asset('js/article.js') }}"></script>
<script>
    $('document').ready(function(){
        var table_pending = $('#tbl_article_pending').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_article",
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

        });

        var table_approve =$('#tbl_article_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_article",
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

        });

        var table_reject =$('#tbl_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_article",
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

        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });
    })
</script>
@endpush
