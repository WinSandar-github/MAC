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
                                            <a class="nav-link active" data-toggle="tab" href="#studycheck1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#studycheck2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#studycheck3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="studycheck1"
                                                 aria-expanded="true">
                                                <table id="tbl_self_study_pending_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Registration Reason</th>
                                                        <th class="bold-font-weight">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="studycheck2" aria-expanded="true">
                                                <table id="tbl_self_study_approved_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Registration Reason</th>
                                                        <th class="bold-font-weight">Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="studycheck3" aria-expanded="true">
                                                <table id="tbl_self_study_rejected_list"
                                                       class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">No</th>
                                                        <th class="bold-font-weight">Action</th>
                                                        <th class="bold-font-weight">Student Name</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Registration No</th>
                                                        <th class="bold-font-weight">Phone</th>
                                                        <th class="bold-font-weight">Registration Reason</th>
                                                        <th class="bold-font-weight">Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_self_study_rejected_list_body"
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
                                {{--Audit Firm--}}
                                <div class="tab-pane fade" id="v-pills-audit" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#audit_check1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#audit_check2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#audit_check3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="audit_check1" aria-expanded="true">
                                              <table id="tbl_audit_offline_pending" class="table table-hover text-nowrap"
                                                    style="width:100%;"   >
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
                                                    <tbody id="tbl_audit_offline_pending_body" class="hoverTable">
                                                    </tbody>
                                              </table>
                                            </div>
                                            <div class="tab-pane fade show" id="audit_check2" aria-expanded="true">
                                                <table id="tbl_audit_offline_approved" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_audit_offline_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="audit_check3" aria-expanded="true">
                                                <table id="tbl_audit_offline_rejected" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_audit_offline_rejected_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Non-Audit Firm--}}
                                <div class="tab-pane fade" id="v-pills-non-audit" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#non_audit_check1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#non_audit_check2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#non_audit_check3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="non_audit_check1" aria-expanded="true">
                                              <table id="tbl_non_audit_offline_pending" class="table table-hover text-nowrap"
                                                    style="width:100%;"   >
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
                                                    <tbody id="tbl_non_audit_offline_pending_body" class="hoverTable">
                                                    </tbody>
                                              </table>
                                            </div>
                                            <div class="tab-pane fade show" id="non_audit_check2" aria-expanded="true">
                                                <table id="tbl_non_audit_offline_approved" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_non_audit_offline_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="non_audit_check3" aria-expanded="true">
                                                <table id="tbl_non_audit_offline_rejected" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_non_audit_offline_rejected_body" class="hoverTable text-left">
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
            // $('#tbl_self_study_pending_list').DataTable({
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
            //         {data: 'reg_reason', name: 'Registration Reason'},
            //         {data: 'status', name: 'Status'},
            //     ],
            //     "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            // });
            // $('#tbl_self_study_approved_list').DataTable({
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
            // $('#tbl_self_study_rejected_list').DataTable({
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

            $('#tbl_audit_offline_pending').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/0/1",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            $('#tbl_non_audit_offline_pending').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/0/2",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            $('#tbl_audit_offline_approved').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/1/1",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            $('#tbl_non_audit_offline_approved').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/1/2",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            $('#tbl_audit_offline_rejected').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/2/1",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            $('#tbl_non_audit_offline_rejected').DataTable({
          			processing: true,
          			scrollX:true,
          			serverSide: true,
          			ajax: BACKEND_URL + "/audit_offline_list/2/2",
          			columns: [
          				{data: null, render: function (data, type, row, meta) {
          						return meta.row + meta.settings._iDisplayStart + 1;
          				}},
          				{data: 'action', name: 'action', orderable: false, searchable: false},
          				{data: 'accountancy_firm_name', name: 'Student Name'},
                  {data: 'email', name: 'Email'},
          				{data: 'accountancy_firm_reg_no', name: 'Reg No.'},
                  {data: 'phone', name: 'Phone'},
          				{data: 'status', name: 'Status'},
          			],
          			"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
          	});

            // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //     $.each($.fn.dataTable.tables(true), function () {
            //         $(this).DataTable().columns.adjust();
            //     });
            // });


        });
    </script>
@endpush