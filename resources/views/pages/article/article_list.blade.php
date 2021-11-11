@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'membership',
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
                                                            <th class="bold-font-weight" style="display:none">Duty Report Date </th>
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Duty Report Date </th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
                                                            <th class="bold-font-weight"  style="display:none">Duty Report Date </th>
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" style="display:none">Duty Report Date </th>
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Duty Report Date </th>
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
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Registration Fee</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" style="display:none">Duty Report Date </th>
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
                                                            <th class="bold-font-weight" >Resign Fee</th>
                                                            <th class="bold-font-weight" >Resign Date</th>
                                                            <th class="bold-font-weight" >Net Experience</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
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
                                                            <th class="bold-font-weight" >Resign Fee</th>
                                                            <th class="bold-font-weight" >Payment Status</th>
                                                            <th class="bold-font-weight" >Resign Date</th>
                                                            <th class="bold-font-weight" >Net Experience</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
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
                                                            <th class="bold-font-weight" >Resign Fee</th>
                                                            <th class="bold-font-weight" >Resign Date</th>
                                                            <th class="bold-font-weight" >Net Experience</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
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
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#two_yrs_link2" role="tablist" aria-expanded="true" style="font-weight:bold">Government Article</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="two_yrs_link1" aria-expanded="true">
                                    <table id="tbl_two_yrs_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="bold-font-weight">No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>
                                                <th class="bold-font-weight" >Phone</th>
                                                <th class="bold-font-weight" >Registration No</th>
                                                <th class="bold-font-weight" >Form Type</th>
                                                <th class="bold-font-weight" >Contract Start Date</th>
                                                <th class="bold-font-weight" >Contract End Date</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <!-- <th class="bold-font-weight" >Check End Date</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_two_yrs_article_pending_body" class="hoverTable text-left">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="two_yrs_link2" aria-expanded="true">
                                    <table id="tbl_two_yrs_gov_article_pending" class="table table-hover text-nowrap " style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th class="bold-font-weight">No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>
                                                <th class="bold-font-weight" >Phone</th>
                                                <th class="bold-font-weight" >Registration No</th>
                                                <th class="bold-font-weight" >Form Type</th>
                                                <th class="bold-font-weight" >Contract Start Date</th>
                                                <th class="bold-font-weight" >Contract End Date</th>
                                                <th class="bold-font-weight" >Status</th>
                                                <!-- <th class="bold-font-weight" >Check End Date</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_two_yrs_gov_article_pending_body" class="hoverTable text-left">
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
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#done_link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">2yrs Article</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#done_link2" role="tablist" aria-expanded="true" style="font-weight:bold">3yrs Article</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#done_link3" role="tablist" aria-expanded="true" style="font-weight:bold">Existing Article</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="done_link1" aria-expanded="true">
                                    <div class="card-header">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#done_firm" role="tablist" aria-expanded="false" style="font-weight:bold">Firm Article</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#done_gov" role="tablist" aria-expanded="true" style="font-weight:bold">Government Article</a>
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
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Leave Days</th>
                                                            <th class="bold-font-weight" >Mentor Name</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_done_firm_article_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="done_gov" aria-expanded="true">
                                                <table id="tbl_done_gov_article_approved" class="table table-hover text-nowrap " style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight">No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Phone</th>
                                                            <th class="bold-font-weight" >Email</th>
                                                            <th class="bold-font-weight" >Registration No</th>
                                                            <th class="bold-font-weight" >Form Type</th>
                                                            <th class="bold-font-weight" >Contract Start Date</th>
                                                            <th class="bold-font-weight" >Contract End Date</th>
                                                            <th class="bold-font-weight" >Leave Days</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_done_gov_article_approved_body" class="hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="done_link2" aria-expanded="true">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <table id="tbl_done_3yrs_article" class="table table-hover text-nowrap " style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight">No</th>
                                                    <th class="bold-font-weight" >Action</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    <th class="bold-font-weight" >Phone</th>
                                                    <th class="bold-font-weight" >Email</th>
                                                    <th class="bold-font-weight" >Registration No</th>
                                                    <th class="bold-font-weight" >Form Type</th>
                                                    <th class="bold-font-weight" >Contract Start Date</th>
                                                    <th class="bold-font-weight" >Contract End Date</th>
                                                    <th class="bold-font-weight" >Leave Days</th>
                                                    <th class="bold-font-weight" >Mentor Name</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_done_3yrs_article_body" class="hoverTable text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="done_link3" aria-expanded="true">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <table id="tbl_done_exist_article" class="table table-hover text-nowrap " style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight">No</th>
                                                    <th class="bold-font-weight" >Action</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    <th class="bold-font-weight" >Phone</th>
                                                    <th class="bold-font-weight" >Registration No</th>
                                                    <th class="bold-font-weight" >Form Type</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_done_exist_article_body" class="hoverTable text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
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

    <form method="post" class="needs-validation" id="contractGovForm" action="javascript:saveGovContractDate();" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="modal fade" id="contractGovModal">
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
                        <input type="hidden" id="gov_article_id">
                        <input type="hidden" id="article_form_type">
                        <input type="text" name="contract_gov_start_date" id="contract_gov_start_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
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

@endsection
@push('scripts')
<script src="{{ asset('js/article.js') }}"></script>
<script>
    $(document).ready(function (e) {

        $("#contractModal").on("hidden.bs.modal", function(){
            $("#contractForm")[0].reset();
        });

        $("#contractGovModal").on("hidden.bs.modal", function(){
            $("#contractGovForm")[0].reset();
        });

        $("#endModal").on("hidden.bs.modal", function(){
            $("#endForm")[0].reset();
        });

        $("#endGovModal").on("hidden.bs.modal", function(){
            $("#endGovForm")[0].reset();
        });

        $("input[name='contract_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true
        });

        $("input[name='contract_gov_start_date']").flatpickr({
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
                    d.status    = 0,
                    d.offline_user=0
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
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //$('#tbl_firm_article_pending').DataTable().column(6).visible(false);
        //$('#tbl_firm_article_pending').DataTable().column(8).visible(false);


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
                    d.status    = 1,
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'mentor_name', name: 'mentor_name'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_firm_article_approved').DataTable().column(6).visible(false);

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
                    d.status    = 2,
                    d.offline_user=0
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
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('#tbl_firm_article_rejected').DataTable().column(6).visible(false);
        //$('#tbl_firm_article_rejected').DataTable().column(8).visible(false);

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
                    d.status    = 0,
                    d.offline_user=0
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
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //$('#tbl_gov_article_pending').DataTable().column(6).visible(false);
        $('#tbl_gov_article_pending').DataTable().column(10).visible(false);

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
                    d.status    = 1,
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_gov_article_approved').DataTable().column(6).visible(false);

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
                    d.status    = 2,
                    d.offline_user=0
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
                {data: 'contract_start', name: 'contract_start'},
                {data: 'contract_end', name: 'contract_end'},
                {data: 'contract_start_date', name: 'contract_start_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        $('#tbl_gov_article_rejected').DataTable().column(6).visible(false);
        $('#tbl_gov_article_rejected').DataTable().column(10).visible(false);

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
                    d.status    = 0,
                    d.offline_user=0
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
                    d.status    = 1,
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_resign_article_approved').DataTable().column(5).visible(false);


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
                    d.status    = 2,
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });
        $('#tbl_resign_article_rejected').DataTable().column(5).visible(false);

        //Issue two yrs form list
        var table_approve =$('#tbl_two_yrs_article_pending').DataTable({
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
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
                // {data: 'check_end_date', name: 'check_end_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        var table_reject =$('#tbl_two_yrs_gov_article_pending').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_gov_done_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 0,
                    d.offline_user=0
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
                {data: 'status', name: 'status'},
                // {data: 'check_end_date', name: 'check_end_date'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //Done Firm Article
        var table_approve =$('#tbl_done_firm_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_done_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.offline_user=0
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'email', name: 'email'},
                {data: 'nrc', name: 'nrc'},
                {data: 'form_type', name: 'form_type'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'leave_days', name: 'leave_days'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //Done Gov Article
        var table_pending = $('#tbl_done_gov_article_approved').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_gov_done_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val(),
                    d.status    = 1,
                    d.offline_user=0
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'email', name: 'email'},
                {data: 'nrc', name: 'nrc'},
                {data: 'form_type', name: 'form_type'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'leave_days', name: 'leave_days'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        // 3yrs done form
        var table_reject =$('#tbl_done_3yrs_article').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url  : BACKEND_URL + "/filter_done_3yrs_article",
                type : "POST" ,
                data :  function (d) {
                    d.name      =  $("input[name=filter_by_name]").val(),
                    d.nrc       =  $("input[name=filter_by_nrc]").val()
                }

            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'name_mm', name: 'name_mm'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'email', name: 'email'},
                {data: 'nrc', name: 'nrc'},
                {data: 'form_type', name: 'form_type'},
                {data: 'contract_start_date', name: 'contract_start_date'},
                {data: 'contract_end_date', name: 'contract_end_date'},
                {data: 'leave_days', name: 'leave_days'},
                {data: 'mentor_name', name: 'mentor_name'},
                {data: 'status', name: 'status'},
            ],
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        });

        //Resign Done Form


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
