@extends('layouts.app', [
'class' => '',
'elementActive' => 'cpa1_exam_result_edit'
])

@section('content')
    <div class="content">

        {{-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('exam_result_list') }}
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                {{-- <form action="" method="get" enctype="multipart/form-data"> --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">{{ __('CPA 1 Exam Result List') }}</h5>
                        {{-- <div class="row">
                                <div class="col-md-5">
                                    <div class="row">

                                        <div class="col-md-4 text-left" style="font-weight:bold;">Student Name</div>
                                        <div class="col-md-7 text-left">
                                            <input type="text" name="filter_by_name" class="form-control" placeholder="Student Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-4 text-left" style="font-weight:bold;">Batch Number</div>
                                        <div class="col-md-7 text-left">
                                            <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                <option value="all" selected>All Batches</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" onclick="cpa1_reload()" class="btn btn-primary btn-round m-0" >Search</button>
                                </div>
                            </div><br/> --}}
                        <ul class="nav nav-tabs mt-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist"
                                    aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist"
                                    aria-expanded="true" style="font-weight:bold">Passed List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist"
                                    aria-expanded="false" style="font-weight:bold">Failed List</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                            
                            <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                <table id="tbl_cpa_exam_pending_result" class="table table-hover text-nowrap "
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight">No</th>
                                            <th class="bold-font-weight">Action</th>
                                            <th class="bold-font-weight">Student Name</th>
                                            <th class="bold-font-weight">Course Name</th>
                                            <th class="bold-font-weight">Batch</th>
                                            <th class="bold-font-weight">Module</th>
                                            <th class="bold-font-weight">Grade</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbl_cpa_exam_pending_result_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                <table id="tbl_cpa_exam_approved_result" class="table table-hover text-nowrap "
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight">No</th>
                                            <th class="bold-font-weight">Action</th>
                                            <th class="bold-font-weight">Student Name</th>
                                            <th class="bold-font-weight">Course Name</th>
                                            <th class="bold-font-weight">Batch</th>
                                            <th class="bold-font-weight">Module</th>
                                            <th class="bold-font-weight">Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_cpa_exam_approved_result_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                <table id="tbl_cpa_exam_rejected_result" class="table table-hover text-nowrap "
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight">No</th>
                                            <th class="bold-font-weight">Action</th>
                                            <th class="bold-font-weight">Student Name</th>
                                            <th class="bold-font-weight">Course Name</th>
                                            <th class="bold-font-weight">Batch</th>
                                            <th class="bold-font-weight">Module</th>
                                            <th class="bold-font-weight">Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_cpa_exam_rejected_result_body" class="hoverTable text-left">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //loadCPAStudent('cpa_1');
        //loadBatchData("cpa_1");
        var pending_datatable;
        var approved_datatable;
        var rejected_datatable;
        $(document).ready(function() {
            pending_datatable = $('#tbl_cpa_exam_pending_result').DataTable({
                processing: true,
                scrollX: true,
                // serverSide: true,
                ajax: {
                    url: BACKEND_URL + "/filter_exam_register",
                    type: "POST",
                    data: function(d) {
                        d.grade = 0,
                        d.course_code = '3',
                        d.name = "",
                        d.batch = "all"
                    }

                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'student_info.name_mm',
                        name: 'Student Name'
                    },
                    {
                        data: 'course.name_mm',
                        name: 'Course Name'
                    },
                    {
                        data: 'batch.name_mm',
                        name: 'Batch'
                    },
                    {
                        data: 'module',
                        name: 'Module'
                    },
                    {
                        data: 'remark',
                        name: 'Grade'
                    },
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            approved_datatable = $('#tbl_cpa_exam_approved_result').DataTable({
                processing: true,
                scrollX: true,
                // serverSide: true,
                ajax: {
                    url: BACKEND_URL + "/filter_exam_register",
                    type: "POST",
                    data: function(d) {
                        d.grade = 1,
                        d.course_code = '3',
                        d.name = "",
                        d.batch = "all"
                    }

                },
                columns: [
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'student_info.name_mm',
                        name: 'Student Name'
                    },
                    {
                        data: 'course.name_mm',
                        name: 'Course Name'
                    },
                    {
                        data: 'batch.name_mm',
                        name: 'Batch'
                    },
                    {
                        data: 'module',
                        name: 'Module'
                    },
                    {
                        data: 'remark',
                        name: 'Grade'
                    },
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            rejected_datatable = $('#tbl_cpa_exam_rejected_result').DataTable({
                processing: true,
                scrollX: true,
                // serverSide: true,
                ajax: {
                    url: BACKEND_URL + "/filter_exam_register",
                    type: "POST",
                    data: function(d) {
                        d.grade = 2,
                        d.course_code = '3',
                        d.name = "",
                        d.batch = "all"
                    }

                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'student_info.name_mm',
                        name: 'Student Name'
                    },
                    {
                        data: 'course.name_mm',
                        name: 'Course Name'
                    },
                    {
                        data: 'batch.name_mm',
                        name: 'Batch'
                    },
                    {
                        data: 'module',
                        name: 'Module'
                    },
                    {
                        data: 'remark',
                        name: 'Grade'
                    },
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $.each($.fn.dataTable.tables(true), function() {
                    $(this).DataTable()
                        .columns.adjust();
                });
            });

        });

        function cpa1_reload() {
            pending_datatable.ajax.reload();
            approved_datatable.ajax.reload();
            rejected_datatable.ajax.reload();
        }
    </script>
@endpush
