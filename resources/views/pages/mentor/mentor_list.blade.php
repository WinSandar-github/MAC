@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div>
        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <table width="100%">
                                    <tr>
                                        <td width="90%"><h5 style="text-align: center;" class="card-title">{{ __('Mentor Lists (MAC)') }}</h5></td>
                                        <td width="10%">
                                            <button type="button" onclick="createForm()" class="btn btn-primary btn-round">Create</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
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
                                                    <button type="button" class="btn btn-primary btn-round mt-0" onclick="getMentorList()" id="search">Search</button>
                                                </div>
                                            </div>
                                            <br/>
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
                                                    <table id="tbl_mentor_pending"class="table table-hover  text-center">
                                                        <thead class=" text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Mentor Name</th>
                                                                <th class="bold-font-weight" >Contact Email</th>
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Type</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_mentor_pending_body" class="hoverTable text-left">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                    <table id="tbl_mentor_approved"class="table table-hover  text-center">
                                                        <thead class=" text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Mentor Name</th>
                                                                <th class="bold-font-weight" >Contact Email</th>
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Type</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_mentor_approved_body" class="hoverTable text-left">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                    <table id="tbl_mentor_rejected"class="table table-hover  text-center">
                                                        <thead class=" text-nowrap">
                                                            <tr>
                                                                <th class="bold-font-weight" >No</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                                <th class="bold-font-weight" >Mentor Name</th>
                                                                <th class="bold-font-weight" >Contact Email</th>
                                                                <th class="bold-font-weight" >Phone Number</th>
                                                                <th class="bold-font-weight" >NRC</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Type</th>
                                                                
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
                        </div>

                        <div class="card-footer ">

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
<script>
    getMentorList();
</script>
@endpush
