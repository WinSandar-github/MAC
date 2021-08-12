@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_list'
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
                                <h5 class="title">{{ __('DA Two Application List') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="tbl_da_list"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    <th class="bold-font-weight" >Email</th>     
                                                    <th class="bold-font-weight" >Phone Number</th>
                                                    <th class="bold-font-weight" >NRC</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    <th class="bold-font-weight" >Detail</th>
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
    getDAList('da_2');
</script>
@endpush
