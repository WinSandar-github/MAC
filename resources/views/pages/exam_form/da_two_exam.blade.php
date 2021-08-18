@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_two_exam'
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
            <!-- <form action="" method="get" enctype="multipart/form-data"> -->
                <div class="card">
                <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="title">{{ __('DA 2 Exam Registration List') }}</h5>
                            </div>
                        </div>
                        {{--<div class="row">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-2">
                                <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                    <option value="all" selected>All Batch</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" onclick="getExam()" class="btn btn-primary btn-hover-dark m-1" >Search</button>
                            </div>
                            
                        </div>--}}
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                    <div class="col-md-7 text-left">
                                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Batch</div>
                                                    <div class="col-md-7 text-left">
                                                        <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                            <option value="all" selected>All Batches</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" onclick="getExam()" class="btn btn-primary btn-hover-dark m-1" >Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="tbl_da_exam_two"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Name</th>
                                                    {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                    <th class="bold-font-weight" >Exam Type</th>
                                                    <th class="bold-font-weight" >Grade</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    <th class="bold-font-weight" >Batch ID</th>
                                                    <th class="bold-font-weight" >Detail</th>
                                                    <th class="bold-font-weight" >Print</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_da_exam_two_body" class="hoverTable">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    loadBatchData("da_2");
    getExam();
</script>
@endpush
