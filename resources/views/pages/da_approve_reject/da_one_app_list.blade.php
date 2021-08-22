@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_one_app_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12"> 
        {{ Breadcrumbs::render('da_list') }}               
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
                                <h5 class="title">{{ __('DA One Application List') }}</h5>
                            </div>
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
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">                                                    
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">NRC</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="filter_by_nrc" class="form-control" placeholder="eg. ၁/ကမတ(နိုင်)၁၂၃၄၅၆">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="vertical-align: top;">
                                                <button type="button" class="btn btn-primary btn-round m-0" onclick="getDAList('da_1')" id="search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    <hr size="5" width="98%" color="#F5F5F5"> 
                                        <table id="tbl_da_list"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Action</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    <th class="bold-font-weight" >Email</th>     
                                                    <th class="bold-font-weight" >Phone Number</th>
                                                    <th class="bold-font-weight" >NRC</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_da_list_body" class="hoverTable">
                                            </tbody>
                                        </table>
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
    getDAList('da_1');
</script>
@endpush
