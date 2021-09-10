@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_registration_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">
        {{ Breadcrumbs::render('cpa_ff_registration_list') }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="title" style="padding-left: 330px;">{{ __('CPA Full-Fledged Registration List') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
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
                                                <table id="tbl_cpaff_pending_list"class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Registration Number</th>
                                                            <th class="bold-font-weight" >Degree</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                <table id="tbl_cpaff_approved_list"class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Registration Number</th>
                                                            <th class="bold-font-weight" >Degree</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                <table id="tbl_cpaff_rejected_list"class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Registration Number</th>
                                                            <th class="bold-font-weight" >Degree</th>
                                                            <th class="bold-font-weight" >Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_rejected_list_body" class="hoverTable text-left">
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
    </div>
</div>
@endsection
@push('scripts')
<script>
    //getCPAFFList();

    $(document).ready(function(){
      $('#tbl_cpaff_pending_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/0",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'nrc', name: 'NRC'},
              {data: 'student_info.registration_no', name: 'Registration Number',className: "set-text-center"},
              {data: 'degree', name: 'Degree'},
              {data: 'status', name: 'Status'},

          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_approved_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/1",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.registration_no', name: 'Registration Number',className: "set-text-center"},
            {data: 'degree', name: 'Degree'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_rejected_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/2",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.registration_no', name: 'Registration Number',className: "set-text-center"},
            {data: 'degree', name: 'Degree'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

    //   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    //       $.each($.fn.dataTable.tables(true), function(){
    //           $(this).DataTable()
    //               .columns.adjust()
    //               .responsive.recalc();
    //       });
    //   });

    });

</script>
@endpush
