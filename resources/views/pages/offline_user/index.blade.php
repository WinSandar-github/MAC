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
                    <h5>Existing User Register</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link font-weight-bold active" id="v-pills-home-tab" data-toggle="pill"
                                    href="#v-pills-da1"
                                    role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">DA One Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-profile-tab" data-toggle="pill"
                                   href="#v-pills-da2"
                                   role="tab"
                                   aria-controls="v-pills-home" aria-selected="true">DA Two Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-profile-tab" data-toggle="pill"
                                   href="#v-pills-cpa"
                                   role="tab"
                                   aria-controls="v-pills-profile" aria-selected="false">CPA One Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-profile-tab" data-toggle="pill"
                                   href="#v-pills-cpa_two"
                                   role="tab"
                                   aria-controls="v-pills-profile" aria-selected="false">CPA Two Course Register</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"

                                   href="#v-pills-article"

                                   role="tab"

                                   aria-controls="v-pills-messages" aria-selected="false">Article</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"
                                   href="#v-pills-cpa-ff"
                                   role="tab"
                                   aria-controls="v-pills-messages" aria-selected="false">CPA (Full-Fledged) Register</a>
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
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"

                                   href="#v-pills-teacher"

                                   role="tab"

                                   aria-controls="v-pills-messages" aria-selected="false">Teacher</a>
                                <a class="nav-link font-weight-bold" id="v-pills-messages-tab" data-toggle="pill"

                                   href="#v-pills-school"

                                   role="tab"

                                   aria-controls="v-pills-messages" aria-selected="false">School</a>
                            </div>
                        </div>
                        <div class="col-10 border-left">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-da1" role="tabpanel"
                                     aria-labelledby="v-pills-home-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#da1_offline_pending_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da1_offline_approve_list" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da1_offline_reject_list" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="da1_offline_pending_list"
                                                 aria-expanded="true">
                                                <table id="tbl_da1_offline_pending_list"
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
                                                    <tbody id="tbl_da1_offline_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da1_offline_approve_list" aria-expanded="true">
                                                <table id="tbl_da1_offline_approved_list"
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
                                                    <tbody id="tbl_da1_offline_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da1_offline_reject_list" aria-expanded="true">
                                                <table id="tbl_da1_offline_rejected_list"
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
                                                    <tbody id="tbl_da1_offline_rejected_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-da2" role="tabpanel"
                                     aria-labelledby="v-pills-home-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#da2_offline_pending_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da2_offline_approve_list" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#da2_offline_reject_list" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="da2_offline_pending_list"
                                                 aria-expanded="true">
                                                <table id="tbl_da2_offline_pending_list"
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
                                                    <tbody id="tbl_da2_offline_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da2_offline_approve_list" aria-expanded="true">
                                                <table id="tbl_da2_offline_approved_list"
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
                                                    <tbody id="tbl_da2_offline_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="da2_offline_reject_list" aria-expanded="true">
                                                <table id="tbl_da2_offline_rejected_list"
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
                                                    <tbody id="tbl_da2_offline_rejected_list_body"
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
                                            <a class="nav-link active" data-toggle="tab" href="#cpa_offline_pending_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpa_offline_approved_list"
                                               role="tablist" aria-expanded="true" style="font-weight:bold">Approved
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpa_offline_rejected_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Rejected
                                                List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="cpa_offline_pending_list"
                                                 aria-expanded="true">
                                                <table id="tbl_cpa_offline_pending_list"
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
                                                    <tbody id="tbl_cpa_offline_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpa_offline_approved_list" aria-expanded="true">
                                                <table id="tbl_cpa_offline_approved_list"
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
                                                    <tbody id="tbl_cpa_offline_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpa_offline_rejected_list" aria-expanded="true">
                                                <table id="tbl_cpa_offline_rejected_list"
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
                                                    <tbody id="tbl_cpa_offline_rejected_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-cpa_two" role="tabpanel"
                                     aria-labelledby="v-pills-profile-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#cpa2_offline_pending_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpa2_offline_approved_list"
                                               role="tablist" aria-expanded="true" style="font-weight:bold">Approved
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpa2_offline_rejected_list"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Rejected
                                                List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="cpa2_offline_pending_list"
                                                 aria-expanded="true">
                                                <table id="tbl_cpa2_offline_pending_list"
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
                                                    <tbody id="tbl_cpa2_offline_pending_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpa2_offline_approved_list" aria-expanded="true">
                                                <table id="tbl_cpa2_offline_approved_list"
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
                                                    <tbody id="tbl_cpa2_offline_approved_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpa2_offline_rejected_list" aria-expanded="true">
                                                <table id="tbl_cpa2_offline_rejected_list"
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
                                                    <tbody id="tbl_cpa2_offline_rejected_list_body"
                                                           class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- CPAFF -->
                                <div class="tab-pane fade" id="v-pills-cpa-ff" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#cpaff1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpaff2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#cpaff3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="cpaff1" aria-expanded="true">
                                                <table id="tbl_cpaff_initial_pending_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <th class="bold-font-weight" >CPA(FF) Reg; No.</th>
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_initial_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpaff2" aria-expanded="true">
                                                <table id="tbl_cpaff_initial_approved_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <th class="bold-font-weight" >CPA(FF) Reg; No.</th>
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_initial_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="cpaff3" aria-expanded="true">
                                                <table id="tbl_cpaff_initial_rejected_list" class="table table-hover text-nowrap "
                                                       style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >ကိုယ်တိုင်ဝန်ခံချက်</th>
                                                        <th class="bold-font-weight" >CPA(FF) Reg; No.</th>
                                                        <th class="bold-font-weight" >Reg; Date</th>
                                                        <!-- <th class="bold-font-weight" >Payment Date</th> -->
                                                        <th class="bold-font-weight" >CPD Total Hours</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpaff_initial_rejected_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-papp" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#pappcheck1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#pappcheck2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#pappcheck3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="pappcheck1" aria-expanded="true">
                                                <table id="tbl_papp_pending_list" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_papp_pending_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="pappcheck2" aria-expanded="true">
                                                <table id="tbl_papp_approved_list" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_papp_approved_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="pappcheck3" aria-expanded="true">
                                                <table id="tbl_papp_rejected_list" class="table table-hover text-nowrap "
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
                                                    <tbody id="tbl_papp_rejected_list_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <!--school offline user-->
                                <div class="tab-pane fade" id="v-pills-school" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#school1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#school2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#school3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="school1" aria-expanded="true">
                                                <table id="tbl_school_pending_list" class="table table-hover  text-nowrap" style="width:100%;">
                                                    <thead class="text-nowrap">
                                                    <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >School No</th>
                                                                <th class="bold-font-weight" >School Name</th>
                                                                <th class="bold-font-weight" >School Founder Name</th>
                                                                <th class="bold-font-weight" >Email</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Initial Date</th>
                                                                <!-- <th class="bold-font-weight" >School Card</th> -->
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight">Reason</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_school_pending_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="school2" aria-expanded="true">
                                                <table id="tbl_school_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                    <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >School No</th>
                                                                <th class="bold-font-weight" >School Name</th>
                                                                <th class="bold-font-weight" >School Founder Name</th>
                                                                <th class="bold-font-weight" >Email</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Initial Date</th>
                                                                <!-- <th class="bold-font-weight" >School Card</th> -->
                                                                <th class="bold-font-weight" >Status</th>
                                                                <!-- <th class="bold-font-weight">Reason</th> -->
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_school_approved_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="school3" aria-expanded="true">
                                                <table id="tbl_school_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                    <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >School No</th>
                                                                <th class="bold-font-weight" >School Name</th>
                                                                <th class="bold-font-weight" >School Founder Name</th>
                                                                <th class="bold-font-weight" >Email</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Initial Date</th>
                                                                <!-- <th class="bold-font-weight" >School Card</th> -->
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight">Reason</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_school_rejected_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--teacher offline user-->
                                <div class="tab-pane fade" id="v-pills-teacher" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#teacher1"
                                               role="tablist" aria-expanded="false" style="font-weight:bold">Pending
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#teacher2" role="tablist"
                                               aria-expanded="true" style="font-weight:bold">Approved List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#teacher3" role="tablist"
                                               aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                        </li>
                                    </ul>

                                    <div class="card-body">
                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="teacher1" aria-expanded="true">
                                                <table id="tbl_teacher_pending_list" class="table table-hover  text-nowrap" style="width:100%;">
                                                    <thead class="text-nowrap">
                                                        <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Teacher No</th>
                                                                <th class="bold-font-weight" >Teacher Name</th>
                                                                <th class="bold-font-weight" >Email</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Initial Date</th>
                                                                <!-- <th class="bold-font-weight" >Teacher Card</th> -->
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight">Reason</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_pending_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="teacher2" aria-expanded="true">
                                                <table id="tbl_teacher_approved_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                    <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Teacher No</th>
                                                                <th class="bold-font-weight" >Teacher Name</th>
                                                                <th class="bold-font-weight" >Email</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Initial Date</th>
                                                                <!-- <th class="bold-font-weight" >Teacher Card</th> -->
                                                                <th class="bold-font-weight" >Status</th>
                                                                <!-- <th class="bold-font-weight">Reason</th> -->
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_approved_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="teacher3" aria-expanded="true">
                                                <table id="tbl_teacher_rejected_list" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead class="text-nowrap">
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Teacher No</th>
                                                        <th class="bold-font-weight" >Teacher Name</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >Phone</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Initial Date</th>
                                                        <!-- <th class="bold-font-weight" >Teacher Card</th> -->
                                                        <th class="bold-font-weight" >Status</th>
                                                        <th class="bold-font-weight">Reason</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tbl_teacher_rejected_list_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--article offline user-->
                                <div class="tab-pane fade" id="v-pills-article" role="tabpanel"
                                     aria-labelledby="v-pills-messages-tab">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs mt-3" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Firm Article List</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="true" style="font-weight:bold">Resign Article</a>
                                                        </li>
                                                    </ul>


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
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Registration Fee</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Status</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_firm_article_pending_body" class="hoverTable">
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="firm2" aria-expanded="true">
                                                                            <table id="tbl_firm_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                                                <thead class="text-nowrap">
                                                                                    <tr>
                                                                                        <th class="bold-font-weight">No</th>
                                                                                        <th class="bold-font-weight" >Action</th>
                                                                                        <th class="bold-font-weight" >Name</th>
                                                                                        <th class="bold-font-weight" >Phone</th>
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Registration Fee</th>
                                                                                        <th class="bold-font-weight" >Payment Status</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Status</th>
                                                                                        <th class="bold-font-weight" >Duty Report Date </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_firm_article_approved_body" class="hoverTable">
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="firm3" aria-expanded="true">
                                                                            <table id="tbl_firm_article_rejected" class="table table-hover text-nowrap " style="width:100%;">
                                                                                <thead class="text-nowrap">
                                                                                    <tr>
                                                                                        <th class="bold-font-weight">No</th>
                                                                                        <th class="bold-font-weight" >Action</th>
                                                                                        <th class="bold-font-weight" >Name</th>
                                                                                        <th class="bold-font-weight" >Phone</th>
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Registration Fee</th>
                                                                                        <th class="bold-font-weight" >Status</th>
                                                                                        <!-- <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th> -->
                                                                                        <!-- <th class="bold-font-weight" >Mentor Name</th> -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_firm_article_rejected_body" class="hoverTable">
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
                                                                                        <th class="bold-font-weight" >Resign Fee</th>
                                                                                        <th class="bold-font-weight" >Resign Date</th>
                                                                                        <th class="bold-font-weight" >Net Experience</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Status</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_resign_article_pending_body" class="hoverTable">
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
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Resign Fee</th>
                                                                                        <th class="bold-font-weight" >Payment Status</th>
                                                                                        <th class="bold-font-weight" >Resign Date</th>
                                                                                        <th class="bold-font-weight" >Net Experience</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Status</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_resign_article_approved_body" class="hoverTable">
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
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Resign Fee</th>
                                                                                        <th class="bold-font-weight" >Resign Date</th>
                                                                                        <th class="bold-font-weight" >Net Experience</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="title">{{ __('Completed Form Issue List') }}</h5>
                                                            </div>
                                                        </div>
                                                        <ul class="nav nav-tabs mt-3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#two_yrs_link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Firm Article</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                                            <div class="tab-pane fade show active" id="two_yrs_link1" aria-expanded="true">
                                                                <table id="tbl_two_yrs_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                                                    <thead class="text-nowrap">
                                                                        <tr>
                                                                            <th class="bold-font-weight">No</th>
                                                                            <th class="bold-font-weight" >Action</th>
                                                                            <th class="bold-font-weight" >Name</th>
                                                                            <th class="bold-font-weight" >Phone</th>
                                                                            <th class="bold-font-weight" >NRC</th>
                                                                            <th class="bold-font-weight" >Form Type</th>
                                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                                            <th class="bold-font-weight" >Mentor Name</th>
                                                                            <th class="bold-font-weight" >Status</th>
                                                                            <!-- <th class="bold-font-weight" >Check End Date</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tbl_two_yrs_article_pending_body" class="hoverTable text-left">
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <!-- <form action="" method="post"> -->
                                                @csrf
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="title">{{ __('Article Done Form Lists (MAC)') }}</h5>
                                                            </div>
                                                        </div>
                                                        <ul class="nav nav-tabs" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" data-toggle="tab" href="#done_firm" role="tablist" aria-expanded="false" style="font-weight:bold">Firm Article</a>
                                                                        </li>

                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                                            <div class="tab-pane fade show active" id="done_firm" aria-expanded="true">

                                                                            <table id="tbl_done_firm_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="bold-font-weight">No</th>
                                                                                        <th class="bold-font-weight" >Action</th>
                                                                                        <th class="bold-font-weight" >Name</th>
                                                                                        <th class="bold-font-weight" >Phone</th>
                                                                                        <th class="bold-font-weight" >NRC</th>
                                                                                        <th class="bold-font-weight" >Form Type</th>
                                                                                        <th class="bold-font-weight" >Contract Start Date</th>
                                                                                        <th class="bold-font-weight" >Contract End Date</th>
                                                                                        <th class="bold-font-weight" >Mentor Name</th>
                                                                                        <th class="bold-font-weight" >Leave Days</th>
                                                                                        <th class="bold-font-weight" >Status</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbl_done_firm_article_approved_body" class="hoverTable text-left">
                                                                                </tbody>
                                                                            </table>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
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
    {{-- Payment detail Modal --}}
		<div class="modal fade" id="payment_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Article Payment Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
								<ul class="list-group mb-3 sticky-top fee_list">

								</ul>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
		</div>
	{{-- Payment detail Modal End --}}
    <form method="post" class="needs-validation" id="contractForm" action="javascript:saveContractDate();" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="modal fade" id="contractModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">
                        စာရင်းကိုင်အလုပ်သင်စတင်မည့်နေ့အားရွေးချယ်ပါ။</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="article_id">
                        <input type="hidden" id="article_form_type">
                        <input type="hidden" id="student_info_id">
                        <input type="text" name="contract_start_date" id="contract_start_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" id="da2exam_btn" class="btn btn-success btn-hover-dark w-30" data-bs-toggle="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="post" class="needs-validation" id="contractForm" action="javascript:saveRenewContractDate();" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="modal fade" id="renewContractModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">
                        စာရင်းကိုင်အလုပ်သင်စတင်မည့်နေ့နှင့်ပြီးဆုံးမည့်နေ့အားရွေးချယ်ပါ။</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="article_id">
                        <input type="hidden" id="article_form_type">
                        <input type="hidden" id="student_info_id">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Start Date</label>
                                <input type="text" name="renew_start_date" id="renew_start_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
                            </div>
                            <div class="col-md-6">
                                <label>End Date</label>
                                <input type="text" name="renew_end_date" id="renew_end_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" id="da2exam_btn" class="btn btn-success btn-hover-dark w-30" data-bs-toggle="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script src="{{ asset('js/article.js') }}"></script>
    <script>
        //GetStudentRegistration("da_1");
        //loadBatchData("da_1");
        $(document).ready(function (e) {

            $("#contractModal").on("hidden.bs.modal", function(){
                $("#contractForm")[0].reset();
            });

            $("#endModal").on("hidden.bs.modal", function(){
                $("#endForm")[0].reset();
            });

            $("input[name='contract_start_date']").flatpickr({
                    enableTime: false,
                    dateFormat: "d-M-Y",
                    allowInput: true
            });

            $("input[name='renew_start_date']").flatpickr({
                    enableTime: false,
                    dateFormat: "d-M-Y",
                    allowInput: true
            });

            $("input[name='renew_end_date']").flatpickr({
                    enableTime: false,
                    dateFormat: "d-M-Y",
                    allowInput: true
            });
        });

        $(document).ready(function () {

            //da cpa offline user

            $('#tbl_da1_offline_pending_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 0,
                        d.course_type_id = 1,
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
            $('#tbl_da1_offline_approved_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 1  ,
                        d.course_type_id = 1,
                        d.course_code = 'da_1',
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
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });
            $('#tbl_da1_offline_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 2,
                        d.course_type_id = 1,
                        d.course_code = 'da_1',
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
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $('#tbl_da2_offline_pending_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 0,
                        d.course_type_id = 1,
                        d.course_code = 'da_2',
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
            $('#tbl_da2_offline_approved_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 1  ,
                        d.course_type_id = 1,
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
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });
            $('#tbl_da2_offline_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 2,
                        d.course_type_id = 1,
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
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $('#tbl_cpa_offline_pending_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 0,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_1',
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
            $('#tbl_cpa_offline_approved_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 1,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_1',
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
            $('#tbl_cpa_offline_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 2,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_1',
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

            $('#tbl_cpa2_offline_pending_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 0,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_2',
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
            $('#tbl_cpa2_offline_approved_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 1,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_2',
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
            $('#tbl_cpa2_offline_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url  : BACKEND_URL + "/filter_offline_student_info",
                    type : "POST" ,
                    data :  function (d) {
                        d.status       = 2,
                        d.course_type_id = 2,
                        d.course_code = 'cpa_2',
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

            $('#tbl_papp_pending_list').DataTable({
                processing: true,
                scrollX : true,
                // serverSide: true,
                ajax: BACKEND_URL + "/papp_offline_user_list/0/2",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Name'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'papp_reg_no', name: 'Reg; No.',className: "set-text-center"},
                    {data: 'student_info.phone', name: 'Phone'},
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $('#tbl_papp_approved_list').DataTable({
                processing: true,
                scrollX : true,
                // serverSide: true,
                ajax: BACKEND_URL + "/papp_offline_user_list/1/2",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Name'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'papp_reg_no', name: 'Reg; No.',className: "set-text-center"},
                    {data: 'student_info.phone', name: 'Phone'},
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $('#tbl_papp_rejected_list').DataTable({
                processing: true,
                scrollX : true,
                // serverSide: true,
                ajax: BACKEND_URL + "/papp_offline_user_list/2/2",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Name'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'papp_reg_no', name: 'Reg; No.',className: "set-text-center"},
                    {data: 'student_info.phone', name: 'Phone'},
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });


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
            $('#tbl_school_pending_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_school",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 0,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 's_code', name: 's_code'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    {data: 'reason', name: 'reason'},

                ],

            });

            $('#tbl_school_approved_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_school",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 1,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 's_code', name: 's_code'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    // {data: 'reason', name: 'reason'},
                ],
            });

            $('#tbl_school_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_school",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 2,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 's_code', name: 's_code'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    {data: 'reason', name: 'reason'},
                ],
            });
            //CPAFF
            $('#tbl_cpaff_initial_pending_list').DataTable({
                processing: true,
                scrollX:true,
                // serverSide: true,
                ajax: BACKEND_URL + "/cpa_ff_offline_register_list/0/1",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data:'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Name'},
                    {data: 'nrc', name: 'NRC'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'self', name: 'Self Confession'},
                    {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
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
                ajax: BACKEND_URL + "/cpa_ff_offline_register_list/1/1",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Student Name'},
                    {data: 'nrc', name: 'NRC'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'self', name: 'Self Confession'},
                    {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
                    // {data: 'degree', name: 'Degree'},
                    {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
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
                ajax: BACKEND_URL + "/cpa_ff_offline_register_list/2/1",
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'student_info.name_mm', name: 'Student Name'},
                    {data: 'nrc', name: 'NRC'},
                    {data: 'student_info.email', name: 'Email'},
                    {data: 'self', name: 'Self Confession'},
                    {data: 'cpaff_reg_no', name: 'Registration Number',className: "set-text-center"},
                    // {data: 'degree', name: 'Degree'},
                    {data: 'created_at', name: 'Reg; Date',className: "set-text-center"},
                    // {data: 'updated_at', name: 'Payment Date',className: "set-text-center"},
                    {data: 'total_hours', name: 'CPD Total Hours'},
                    {data: 'status', name: 'Status'},
                ],
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });
            //teacher
            $('#tbl_teacher_pending_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_teacher",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 0,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 't_code', name: 't_code'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    {data: 'reason', name: 'reason'},
                ],

            });

            $('#tbl_teacher_approved_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_teacher",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 1,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 't_code', name: 't_code'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    // {data: 'reason', name: 'reason'},
                ],
            });

            $('#tbl_teacher_rejected_list').DataTable({
                scrollX: true,
                processing: true,
                // serverSide: true,
                // searching: false,
                paging:true,
                ajax: {
                    url  : BACKEND_URL + "/filter_teacher",
                    type : "POST" ,
                    data :  function (d) {
                        d.name      =  $("input[name=filter_by_name]").val(),
                        d.nrc       =  $("input[name=filter_by_nrc]").val(),
                        d.status    = 2,
                        d.offline_user= true
                    }

                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 't_code', name: 't_code'},
                    {data: 'name_mm', name: 'name_mm'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'from_valid_date', name: 'from_valid_date'},
                    // {data: 'card', name: 'card'},
                    {data: 'status', name: 'status'},
                    {data: 'reason', name: 'reason'},
                ],
            });
        $('#tbl_firm_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.offline_user=1
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
                {data: 'form_type', name: 'form_type'},
                {data: 'registration_fee', name: 'registration_fee'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'status', name: 'status'},
                // {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('#tbl_firm_article_approved').DataTable({
            scrollX: true,
            processing: true,
            // serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.offline_user=1
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
                {data: 'form_type', name: 'form_type'},
                {data: 'registration_fee', name: 'registration_fee'},
                {data: 'payment_status', name: 'payment_status'},
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'status', name: 'status'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],

        });
        $('#tbl_firm_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            //serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_firm_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2,
                    d.offline_user=1
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
                {data: 'form_type', name: 'form_type'},
                {data: 'registration_fee', name: 'registration_fee'},
                {data: 'status', name: 'status'},
                // {data: 'contract_start', name: 'contract_start'},
                // {data: 'contract_end', name: 'contract_end'},
                // {data: 'mentor_name', name: 'mentor_name'},
                // {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_two_yrs_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_done_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.offline_user=1
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
                {data: 'form_type', name: 'form_type'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'status', name: 'status'},
                // {data: 'check_end_date', name: 'check_end_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_done_firm_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_offline_done_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.offline_user=1
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
                {data: 'form_type', name: 'form_type'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'leave_days', name: 'leave_days'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_resign_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.offline_user=1
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
                {data: 'resign_fee', name: 'resign_fee'},
                {data: 'resign_date', name: 'resign_date'},
                {data: 'net_experience', name: 'net_experience'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'form_type', name: 'form_type'},
                {data: 'status', name: 'status'},
            ],

        });
        $('#tbl_resign_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.offline_user=1
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
                {data: 'resign_fee', name: 'resign_fee'},
                {data: 'payment_status', name: 'payment_status'},
                {data: 'resign_date', name: 'resign_date'},
                {data: 'net_experience', name: 'net_experience'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'form_type', name: 'form_type'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_resign_article_rejected').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_resign_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 2,
                    d.offline_user=1
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
                {data: 'resign_fee', name: 'resign_fee'},
                {data: 'resign_date', name: 'resign_date'},
                {data: 'net_experience', name: 'net_experience'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'form_type', name: 'form_type'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
            // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //     $.each($.fn.dataTable.tables(true), function () {
            //         $(this).DataTable().columns.adjust();
            //     });
            // });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $.each($.fn.dataTable.tables(true), function(){
                    $(this).DataTable()
                        .columns.adjust()
                        //.responsive.recalc();
                });
            });
        });



    </script>
@endpush
