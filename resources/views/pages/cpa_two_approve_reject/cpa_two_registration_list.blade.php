@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_two_registration_list'
])
@section('content')


<div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
            {{ Breadcrumbs::render('cpa_two_registration_list') }}
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
                                    <h5 class="title">{{ __('CPA 2 Registration List') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3 text-left" style="padding-left:0px;font;font-weight:bold;">Name</div>
                                                <div class="col-md-5" style="padding-right:0px;padding-left:0px;">
                                                    <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="col-md-2" style="vertical-align: top;">
                                                    <button type="button" class="btn btn-primary btn-round" onclick="getBatch()" id="search">Search</button>
                                                </div>
                                            </div>
                                            
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true" style="font-weight:bold">Registration Self Study</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Private Shool</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Registration Mac</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
	                                            <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                                    <div class="row">
                                    
                                                        <div class="col-md-12">
                                                            <table id="tbl_cpa_two_self_study" class="table table-hover text-nowrap " style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="bold-font-weight">Sr No</th>                                                                        
                                                                        <th class="bold-font-weight" >Name</th>
                                                                        <th class="bold-font-weight" >NRC</th>
                                                                        <th class="bold-font-weight">Academic Year</th>
                                                                        <th class="bold-font-weight" >Phone</th>
                                                                        <th class="bold-font-weight" >Status</th>
                                                                        <th class="bold-font-weight" >Detail</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="tbl_cpa_two_self_study_body">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    
                                            
                                        
                                                </div>
                                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                            <table id="tbl_cpa_two_private_school" class="table table-hover text-nowrap " width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="bold-font-weight">Sr No</th>                                                                        
                                                                        <th class="bold-font-weight" >Name</th>
                                                                        <th class="bold-font-weight" >NRC</th>
                                                                        <th class="bold-font-weight">Academic Year</th>
                                                                        <th class="bold-font-weight" >Phone</th>
                                                                        <th class="bold-font-weight" >Status</th>
                                                                        <th class="bold-font-weight" >Detail</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="tbl_cpa_two_private_school_body">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                            <table id="tbl_cpa_two_mac" class="table table-hover text-nowrap " width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="bold-font-weight">Sr No</th>                                                                        
                                                                        <th class="bold-font-weight" >Name</th>
                                                                        <th class="bold-font-weight" >NRC</th>
                                                                        <th class="bold-font-weight">Academic Year</th>
                                                                        <th class="bold-font-weight" >Phone</th>
                                                                        <th class="bold-font-weight" >Status</th>
                                                                        <th class="bold-font-weight" >Detail</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="tbl_cpa_two_mac_body">
                                                                    
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
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    getCPATwoSelfStudyStudent();
    getCPATwoPrivateSchoolStudent();
    getCPATwoMACStudent();
</script>
@endpush
