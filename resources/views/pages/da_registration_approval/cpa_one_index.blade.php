@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_one_index'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
            {{ Breadcrumbs::render('cpa_one_registration_list') }}
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="title">{{ __('CPA 1 Registration List') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3 text-left" style="padding-left:20px;font-weight:bold;">Name</div>
                                                        <div class="col-md-7" style="padding-right:0px;padding-left:0px;">
                                                            <input type="text" name="filter_by_name_ss" class="form-control" placeholder="Name">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3 text-left" style="padding-left:20px;font-weight:bold;">Batch</div>
                                                        <div class="col-md-7 text-left"  style="padding-right:0px;padding-left:0px;">
                                                            <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                                <option value="all" selected>All Batches</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3 text-left" style="padding-left:20px;font-weight:bold;">Status</div>
                                                        <div class="col-md-7 text-left"  style="padding-right:0px;padding-left:0px;">
                                                            <select class="form-control form-select" name="selected_status" id="selected_status">
                                                                <option value="all" selected>All</option>
                                                                <option value="0">Pending</option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="vertical-align: top;">
                                                    <button type="button" class="btn btn-primary btn-round" onclick="GetStudentRegistration('cpa_1');" id="search">Search</button>
                                                </div>
                                            </div>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Mac</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true" style="font-weight:bold">Registration Self Study</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Private Shool</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
	                                            <div class="tab-pane fade" id="link1" aria-expanded="true">
                                                    <table id="tbl_student_self_study" class="table table-hover text-nowrap " style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight">Sr No</th>
                                                                <th class="bold-font-weight" >Name</th>
                                                                <th class="bold-font-weight" >Email</th>                                        
                                                                <th class="bold-font-weight" >Registration No</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >Registration Reason</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Detail</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_student_self_study_body"  class="hoverTable">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                    <table id="tbl_student_private_school" class="table table-hover text-nowrap " width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight" >Sr No</th>
                                                                <th class="bold-font-weight" >Name</th>
                                                                <th class="bold-font-weight" >Email</th>                                        
                                                                <th class="bold-font-weight" >Registration No</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_student_private_school_body"  class="hoverTable">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade show active" id="link3" aria-expanded="true">
                                                    <table id="tbl_student_mac" class="table table-hover text-nowrap " width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight">Sr No</th>
                                                                <th class="bold-font-weight" >Name</th>
                                                                <th class="bold-font-weight" >Email</th>                                        
                                                                <th class="bold-font-weight" >Registration No</th>
                                                                <th class="bold-font-weight" >Phone</th>
                                                                <th class="bold-font-weight" >Status</th>
                                                                <th class="bold-font-weight" >Action</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_student_mac_body"  class="hoverTable">
                                                            
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
    GetStudentRegistration("cpa_1");
    loadBatchData("cpa_1");
</script>
@endpush
