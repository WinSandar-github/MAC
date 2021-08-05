@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_two_index'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
            {{ Breadcrumbs::render('DA 2 Registration List') }}
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            
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
                                                            <table id="da_two_self_study" class="table table-hover text-nowrap " style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr No</th>
                                                                        <th class="less-font-weight" >Name</th>
                                                                        <th class="less-font-weight" >Email</th>                                        
                                                                        <th class="less-font-weight" >Registration No</th>
                                                                        <th class="less-font-weight" >Phone</th>
                                                                        <th class="less-font-weight" >Registration Reason</th>
                                                                        <th class="less-font-weight" >Status</th>
                                                                        <th class="less-font-weight" >Detail</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="da_two_self_study_body">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    
                                            
                                        
                                                </div>
                                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                            <table id="da_two_private_school" class="table table-hover text-nowrap " width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" >Sr No</th>
                                                                        <th class="less-font-weight" >Name</th>
                                                                        <th class="less-font-weight" >Email</th>                                        
                                                                        <th class="less-font-weight" >Registration No</th>
                                                                        <th class="less-font-weight" >Phone</th>
                                                                        <th class="less-font-weight" >Status</th>
                                                                        <th class="less-font-weight" >Action</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="da_two_private_school_body">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                            <table id="da_two_mac" class="table table-hover text-nowrap " width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr No</th>
                                                                        <th class="less-font-weight" >Name</th>
                                                                        <th class="less-font-weight" >Email</th>                                        
                                                                        <th class="less-font-weight" >Registration No</th>
                                                                        <th class="less-font-weight" >Phone</th>
                                                                        <th class="less-font-weight" >Status</th>
                                                                        <th class="less-font-weight" >Action</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="da_two_mac_body">
                                                                    
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
    getStudentSelfStudy();
    getStudentPrivateSchool();
    getStudentMac();

</script>
@endpush
