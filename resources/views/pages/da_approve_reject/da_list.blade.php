@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">                
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
                                <h5 class="title" style="padding-left: 330px;">{{ __('DA Application Form List') }}</h5>
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
                                                    <th class="less-font-weight" >No</th>
                                                    <th class="less-font-weight" >Name</th>
                                                    <th class="less-font-weight" >Email</th>     
                                                    <th class="less-font-weight" >Phone Number</th>
                                                    <th class="less-font-weight" >NRC</th>
                                                    <th class="less-font-weight" >Status</th>
                                                    <th class="less-font-weight" >Detail</th>
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
    getDAList();
</script>
@endpush
