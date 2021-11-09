@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'membership',
    'elementActive' => 'cpa_ff_registration_list'
])
@section('content')
<div class="content">
    @include('flash-message')

    {{--<div class="row">
        <div class="col-md-12">
        {{ Breadcrumbs::render('cpa_ff_registration_list') }}
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
                                <h5 class="title" align="center">{{ __('CPA(Full-Fledged) Registration List') }}</h5>
                            </div>
                        </div>
                        <ul class="nav nav-tabs mt-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#initial_state" role="tablist" aria-expanded="false" style="font-weight:bold">Initial List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#renew_state" role="tablist" aria-expanded="true" style="font-weight:bold">Renew List</a>
                            </li>
                            
                        </ul>     
                        {{--<ul class="nav nav-tabs mt-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                            </li>
                        </ul>--}}
                    </div>
                    <div class="card-body">
                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                            <div class="tab-pane fade show active" id="initial_state" aria-expanded="true">
                                <div class="card-header">
                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#link1_initial" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link2_initial" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link3_initial" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                        <div class="tab-pane fade show active" id="link1_initial" aria-expanded="true">
                                            <table id="tbl_cpaff_initial_pending_list"class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_initial_pending_list_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="link2_initial" aria-expanded="true">
                                            <table id="tbl_cpaff_initial_approved_list"class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>                                                        
                                                        <th class="bold-font-weight" >CPAFF Reg; No.</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_initial_approved_list_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="link3_initial" aria-expanded="true">
                                            <table id="tbl_cpaff_initial_rejected_list"class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_initial_rejected_list_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="renew_state" aria-expanded="true">
                                <div class="card-header">
                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#link1_renew" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link2_renew" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link3_renew" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                        <div class="tab-pane fade show active" id="link1_renew" aria-expanded="true">
                                            <table id="tbl_cpaff_renew_pending_list" class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <th class="bold-font-weight" >CPAFF Reg; No.</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_renew_pending_list_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="link2_renew" aria-expanded="true">
                                            <table id="tbl_cpaff_renew_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <th class="bold-font-weight" >CPAFF Reg; No.</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_renew_approved_list_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="link3_renew" aria-expanded="true">
                                            <table id="tbl_cpaff_renew_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <!-- <th class="bold-font-weight" >CPAFF Reg; No.</th> -->
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <th class="bold-font-weight" >CPAFF Reg; No.</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Payment Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpaff_renew_rejected_list_body" class="hoverTable text-left">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
    //getCPAFFList();

    $(document).ready(function(){

      $('#tbl_cpaff_initial_pending_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/0/0",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data:'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'nrc', name: 'NRC'},
              {data: 'student_info.email', name: 'Email'},
              {data: 'self', name: 'Self Confession'},
              // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
              {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
              // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
              {data: 'total_hours', name: 'CPD Total Hours'},
              // {data: 'degree', name: 'Degree'},
              {data: 'status', name: 'Status'},

          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_initial_approved_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/1/0",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.email', name: 'Email'},
            {data: 'self', name: 'Self Confession'},
            // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
            // {data: 'degree', name: 'Degree'},
            {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
              {data: 'cpaff_reg_no', name: 'CPAFF Reg; No.'},
            // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
            {data: 'total_hours', name: 'CPD Total Hours'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_initial_rejected_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/2/0",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.email', name: 'Email'},
            {data: 'self', name: 'Self Confession'},
            // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
            // {data: 'degree', name: 'Degree'},
            {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
            // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
            {data: 'total_hours', name: 'CPD Total Hours'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_renew_pending_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/0/1",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data:'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'nrc', name: 'NRC'},
              {data: 'student_info.email', name: 'Email'},
              {data: 'self', name: 'Self Confession'},
              // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
              {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
              {data: 'cpaff_reg_no', name: 'CPAFF Reg; No.'},
              // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
              {data: 'total_hours', name: 'CPD Total Hours'},
              // {data: 'degree', name: 'Degree'},
              {data: 'status', name: 'Status'},

          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_renew_approved_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/1/1",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.email', name: 'Email'},
            {data: 'self', name: 'Self Confession'},
            // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
            // {data: 'degree', name: 'Degree'},
            {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
              {data: 'cpaff_reg_no', name: 'CPAFF Reg; No.'},
            // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
            {data: 'total_hours', name: 'CPD Total Hours'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_cpaff_renew_rejected_list').DataTable({
          processing: true,
          scrollX:true,
          // serverSide: true,
          ajax: BACKEND_URL + "/cpa_ff_register_list/2/1",
          columns: [
            {data: null, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'student_info.name_mm', name: 'Student Name'},
            {data: 'nrc', name: 'NRC'},
            {data: 'student_info.email', name: 'Email'},
            {data: 'self', name: 'Self Confession'},
            // {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
            // {data: 'degree', name: 'Degree'},
            {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
              {data: 'cpaff_reg_no', name: 'CPAFF Reg; No.'},
            // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
            {data: 'total_hours', name: 'CPD Total Hours'},
            {data: 'status', name: 'Status'},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
          $.each($.fn.dataTable.tables(true), function(){
              $(this).DataTable()
                  .columns.adjust()
                  .responsive.recalc();
          });
      });

    });

</script>
@endpush
