@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_exam_one'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <!-- <form action="" method="get" enctype="multipart/form-data"> -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="title">{{ __('DA 1 Exam Registration List') }}</h5>
                            </div>
                        </div>
                        {{--<div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-2">
                                <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                    <option value="all" selected>All Batch</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" onclick="getExam()" class="btn btn-primary btn-hover-dark m-1" >Search</button>
                            </div>

                        </div>--}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-4 text-left" style="font-weight:bold;">Student Name</div>
                                                    <div class="col-md-7 text-left pl-0">
                                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Student Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-5 text-left" style="font-weight:bold;">Batch Number</div>
                                                    <div class="col-md-7 text-left pl-0">
                                                        <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                            <option value="all" selected>All Batches</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" onclick="getExam('da_1')" class="btn btn-primary btn-hover-dark m-0" >Search</button>
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
                                                <table id="tbl_da_pending_exam" class="table table-hover text-nowrap ">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>

                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Remark</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->

                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_pending_exam_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                <table id="tbl_da_approved_exam"class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>

                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Remark</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->

                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_approved_exam_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                <table id="tbl_da_rejected_exam"class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Student Name</th>
                                                            <th class="bold-font-weight" >Email</th>

                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Remark</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->
                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_rejected_exam_body" class="hoverTable text-left">
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
            <!-- </form> -->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    loadBatchData("da_1");
    // getExam("da_1");

    $(document).ready(function(){

      $('#tbl_da_pending_exam').DataTable({
          processing: true,
          // serverSide: true,
          ajax: BACKEND_URL + "/filter/0/1",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'student_info.email', name: 'Email'},
              {data: 'exam_type', name: 'Exam Type'},
              {data: 'remark', name: 'Remark'},
              {data: 'status', name: 'Status'},
              {data: 'print', name: 'Print',orderable: false, searchable: false},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_da_approved_exam').DataTable({
          processing: true,
          // serverSide: true,
          ajax: BACKEND_URL + "/filter/1/1",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'student_info.email', name: 'Email'},
              {data: 'exam_type', name: 'Exam Type'},
              {data: 'remark', name: 'Remark'},
              {data: 'status', name: 'Status'},
              {data: 'print', name: 'Print',orderable: false, searchable: false},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

      $('#tbl_da_rejected_exam').DataTable({
          processing: true,
          // serverSide: true,
          ajax: BACKEND_URL + "/filter/2/1",
          columns: [
              {data: null, render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'student_info.name_mm', name: 'Student Name'},
              {data: 'student_info.email', name: 'Email'},
              {data: 'exam_type', name: 'Exam Type'},
              {data: 'remark', name: 'Remark'},
              {data: 'status', name: 'Status'},
              {data: 'print', name: 'Print',orderable: false, searchable: false},
          ],
          "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
      });

    });
</script>
@endpush
