@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'offline_user'
])

@section('content')
    <div class="content">
        @include('flash-message')

        <div class="row">
            <div class="col-md-12 card">

                <div class="card-header text-center">
                    <h5>Offline User Register</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link font-weight-bold active" id="v-pills-home-tab" data-toggle="pill"
                                   href="#v-pills-da"
                                   role="tab"
                                   aria-controls="v-pills-home" aria-selected="true">DA Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-profile-tab" data-toggle="pill"
                                   href="#v-pills-cpa"
                                   role="tab"
                                   aria-controls="v-pills-profile" aria-selected="false">CPA Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"
                                   href="#v-pills-cpa-ff"
                                   role="tab"
                                   aria-controls="v-pills-messages" aria-selected="false">CPA FF Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"
                                   href="#v-pills-papp"
                                   role="tab"
                                   aria-controls="v-pills-messages" aria-selected="false">PAPP Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"
                                   href="#v-pills-audit"
                                   role="tab"
                                   aria-controls="v-pills-messages" aria-selected="false">Audit Firm</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"
                                   href="#v-pills-non-audit"
                                   role="tab"
                                   aria-controls="v-pills-messages" aria-selected="false">Non-Audit Firm</a>
                            </div>
                        </div>
                        <div class="col-10 border-left">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-da" role="tabpanel"
                                     aria-labelledby="v-pills-home-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#da_offline_pending_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da_approve_list" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da_reject_list" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="da_offline_pending_list"
                                                 aria-expanded="true">
                                                <table id="tbl_da_offline_pending_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Batch Number</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">NRC</th>
                                                        <th class="bold-font-weight">Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_offline_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da_approve_list" aria-expanded="true">
                                                <table id="tbl_da_approved_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Batch Number</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">NRC</th>
                                                        <th class="bold-font-weight">Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da_reject_list" aria-expanded="true">
                                                <table id="tbl_da_rejected_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Batch Number</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">NRC</th>
                                                        <th class="bold-font-weight">Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_da_rejected_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="v-pills-cpa" role="tabpanel"
                                     aria-labelledby="v-pills-profile-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#privatecheck1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#privatecheck2"
                                               role="tablist" aria-expanded="true" style="font-weight:bold">Approved
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#privatecheck3"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Rejected
                                                List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="privatecheck1"
                                                 aria-expanded="true">
                                                <table id="tbl_private_school_pending_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="privatecheck2" aria-expanded="true">
                                                <table id="tbl_private_school_approved_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="privatecheck3" aria-expanded="true">
                                                <table id="tbl_private_school_rejected_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_private_school_rejected_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="v-pills-cpa-ff" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#maccheck1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#maccheck2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#maccheck3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="maccheck1" aria-expanded="true">
                                                <table id="tbl_mac_pending_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_mac_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="maccheck2" aria-expanded="true">
                                                <table id="tbl_mac_approved_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_mac_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="maccheck3" aria-expanded="true">
                                                <table id="tbl_mac_rejected_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Status</th>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //GetStudentRegistration("da_1");
        //loadBatchData("da_1");
        $(document).ready(function () {

            // $('#tbl_mac_pending_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //     },
            //     columns: [
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_mac_approved_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "2",
            //             "is_reg_reason": false,
            //             "status": "1"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_mac_rejected_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "2",
            //             "is_reg_reason": false,
            //             "status": "2"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_private_school_pending_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "1",
            //             "is_reg_reason": false,
            //             "status": "0"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_private_school_approved_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "1",
            //             "is_reg_reason": false,
            //             "status": "1"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_private_school_rejected_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "1",
            //             "is_reg_reason": false,
            //             "status": "2"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            $('#tbl_da_offline_pending_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 0,
                        d.course_code = 'da_1',
                        d.name =    "",
                        d.nrc =    "",
                        d.batch="all"
                    }
                },
                columns: [
                    {
                        data: null, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }, orderable: false, searchable: false
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Student Name'},
                    {data: 'batch.name', name: 'Batch Name'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'student_info.phone', name: 'Phone Number'},
                    {data: 'nrc', name: 'NRC'},
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });
            // $('#tbl_da_approved_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "0",
            //             "is_reg_reason": true,
            //             "status": "1"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'reg_reason', name: 'Registration Reason'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_da_rejected_list').DataTable({
            //     scrollX: true,
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         "url": BACKEND_URL + "/filter_registration",
            //         "method": "POST",
            //         "data": {
            //             "form_type": "1",
            //             "reg_type": "0",
            //             "is_reg_reason": true,
            //             "status": "2"
            //         }
            //     },
            //     columns: [
            //         {
            //             data: null, render: function (data, type, row, meta) {
            //                 return meta.row + meta.settings._iDisplayStart + 1;
            //             }, orderable: false, searchable: false
            //         },
            //         {data: 'action', name: 'action', orderable: false, searchable: false},
            //         {data: 'name', name: 'Student Name'},
            //         {data: 'email', name: 'Email'},
            //         {data: 'reg_no', name: 'Registration No'},
            //         {data: 'phone', name: 'Phone'},
            //         {data: 'reg_reason', name: 'Registration Reason'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.each($.fn.dataTable.tables(true), function () {
                    $(this).DataTable().columns.adjust();
                });
            });
        });
    </script>
@endpush
