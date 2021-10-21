@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'membership',
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <!-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div> -->
        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <!-- <div class="row">
                                <table width="100%">
                                    <tr>
                                        <td width="90%"><h5 style="text-align: center;" class="card-title">{{ __('Mentor Lists (MAC)') }}</h5></td>
                                        <td width="10%">
                                            <button type="button" onclick="createForm()" class="btn btn-primary btn-round">Create</button>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <button type="button" onclick="createForm()" class="btn btn-primary btn-round mt-0">Create</button>
                                    </div>
                                    <h5 class="title" align="center">{{ __('Mentor Lists (MAC)') }}</h5>
                                </div>
                            </div>
                            {{--<div class="row mt-3">
                                <div class="col-md-5">
                                    <div class="row">
                                        <!-- <div class="col-md-1"></div> -->
                                        <div class="col-md-4 text-left" style="font-weight:bold;">Mentor Name</div>
                                        <div class="col-md-7 text-left" style="padding-left:0px;">
                                            <input type="text" name="filter_by_name" class="form-control" placeholder="Mentor Name">
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
                                    <button type="button" class="btn btn-primary btn-round mt-0"  id="search_mentor">Search</button>
                                </div>
                            </div>--}}
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
                                    <table id="tbl_mentor_pending"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Mentor Name</th>
                                                <th class="bold-font-weight" >Contact Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Show Article</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tbl_mentor_pending_body" class="hoverTable text-left" >
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <table id="tbl_mentor_approved"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Mentor Name</th>
                                                <th class="bold-font-weight" >Contact Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Show Article</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tbl_mentor_approved_body" class="hoverTable text-left">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                    <table id="tbl_mentor_rejected"class="table table-hover  text-center" style="width:100%;">
                                        <thead class=" text-nowrap">
                                            <tr>
                                                <th class="bold-font-weight" >No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Mentor Name</th>
                                                <th class="bold-font-weight" >Contact Email</th>
                                                <th class="bold-font-weight" >Phone Number</th>
                                                <th class="bold-font-weight" >NRC</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <th class="bold-font-weight" >Show Article</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tbl_mentor_rejected_body" class="hoverTable text-left">
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

    <!-- Show Article Model-->
    <div class="modal fade" id="showArticleModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title" id="exampleModalLabel">Article List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" id="mentor_id">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="show_article_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>ကိုယ်ပိုင်အမှတ်</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Article Form Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_article_body">
                                    </tbody>   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    $('document').ready(function(){

        $("#showArticleModel").on("hidden.bs.modal", function(){
            $("#mentor_id").val("");
            $('#show_article_table').DataTable().destroy();
        });

        var table_pending = $('#tbl_mentor_pending').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_mentor",
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
                {data: 'm_email', name: 'm_email'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},
                {data: 'show_article', name: 'show_article'},

            ],

        });
        $('#tbl_mentor_pending').DataTable().column(7).visible(false);

        var table_approve =$('#tbl_mentor_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_mentor",
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
                {data: 'm_email', name: 'm_email'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},
                {data: 'show_article', name: 'show_article'},

            ],

        });

        var table_reject =$('#tbl_mentor_rejected').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            // searching: false,
            paging:true,
            ajax: {
                url  : BACKEND_URL + "/filter_mentor",
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
                {data: 'm_email', name: 'm_email'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'nrc', name: 'nrc'},
                {data: 'status', name: 'status'},
                {data: 'show_article', name: 'show_article'},

            ],

        });
        $('#tbl_mentor_rejected').DataTable().column(7).visible(false);

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $.each($.fn.dataTable.tables(true), function(){
                $(this).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });

        $("#search_mentor").click(function(){

            table_pending.draw();
            table_approve.draw();
            table_reject.draw();


        });
    })
    // getMentorList();
</script>
@endpush
