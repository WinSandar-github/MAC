@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'papp_registration_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">   
        {{ Breadcrumbs::render('papp_registration_list') }}             
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
                                <h5 class="title" style="padding-left: 330px;">{{ __('PAPP Registration List') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="tbl_papp_list"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    <th class="bold-font-weight" >NRC</th>     
                                                    <th class="bold-font-weight" >Registration Number</th>
                                                    <th class="bold-font-weight" >PAPP Date</th>
                                                    <th class="bold-font-weight" >No Use Firm Name</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    <th class="bold-font-weight" >Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_papp_list_body" class="hoverTable">
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
    getPAPPList();
</script>
@endpush
