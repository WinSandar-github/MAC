@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_registration_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">   
        {{ Breadcrumbs::render('cpa_ff_registration_list') }}             
        </div>
    </div>   

    <div class="row">
        <div class="col-md-12 text-center">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="title" style="padding-left: 330px;">{{ __('CPA Full Fleged Registration List') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="tbl_cpaff_list"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Action</th>
                                                    <th class="bold-font-weight" >Name</th>                                                    
                                                    <th class="bold-font-weight" >NRC</th>     
                                                    <th class="bold-font-weight" >Registration Number</th>
                                                    <th class="bold-font-weight" >Degree</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_cpaff_list_body" class="hoverTable">
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
    getCPAFFList();
</script>
@endpush
