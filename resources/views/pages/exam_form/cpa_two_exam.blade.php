@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_two_exam'
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
                                <h5 class="title">{{ __('CPA 2 Exam Registration List') }}</h5>
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
                                <button type="submit" onclick="getCPAExam()" class="btn btn-primary btn-hover-dark m-1" >Search</button>
                            </div>
                        </div>--}}
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
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                    <div class="col-md-7 text-left">
                                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                <!-- <div class="col-md-1"></div> -->
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Batch</div>
                                                    <div class="col-md-7 text-left">
                                                        <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                            <option value="all" selected>All Batches</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" onclick="getCPAExam('cpa_2')" class="btn btn-primary btn-hover-dark m-0" >Search</button>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs" role="tablist">
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
                                                <table id="tbl_cpa_pending_exam" class="table table-hover text-nowrap ">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->
                                                            
                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpa_pending_exam_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                <table id="tbl_cpa_approved_exam"class="table table-hover text-nowrap ">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->
                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpa_approved_exam_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                <table id="tbl_cpa_rejected_exam"class="table table-hover text-nowrap ">
                                                    <thead>
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            {{--<th class="bold-font-weight" >Batch Name</th>--}}
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Status</th>
                                                            <!-- <th class="bold-font-weight" >Batch ID</th> -->
                                                            <th class="bold-font-weight" >Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_cpa_rejected_exam_body" class="hoverTable">
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
            <!-- </form> -->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    loadBatchData("cpa_2");
    getCPAExam('cpa_2');
</script>
@endpush
