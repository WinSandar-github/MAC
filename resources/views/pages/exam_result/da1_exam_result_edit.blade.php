@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da1_exam_result_edit'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('exam_result_list') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{--<form action="" method="get" enctype="multipart/form-data">--}}
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('DA 1 Exam Result List') }}</h5>
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
                                                        
                                                        <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                        <div class="col-md-7 text-left">
                                                            <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                    
                                                        <div class="col-md-3 text-left" style="font-weight:bold;">Grade</div>
                                                        <div class="col-md-7 text-left">
                                                            <select class="form-control form-select" name="selected_grade_id" id="selected_grade_id">
                                                                <option value="all" selected>All</option>
                                                                <option value="0">Pending</option>
                                                                <option value="1" >Pass</option>
                                                                <option value="2">Fail</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div><br/>
                                            <div class="row">    
                                                <div class="col-md-6">
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
                                                <div class="col-md-6">
                                                    <button type="submit" onclick="loadStudent('da_1')" class="btn btn-primary btn-hover-dark m-0" >Search</button>
                                                </div>
                                            </div><br/>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Passed List</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Failed List</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                                    <table id="tbl_exam_pending_result" class="table table-hover text-nowrap ">
                                                        <thead>
                                                            <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Batch Name</th>
                                                            <th class="bold-font-weight" >Module</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_exam_pending_result_body" class="hoverTable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                    <table id="tbl_exam_approved_result" class="table table-hover text-nowrap ">
                                                        <thead>
                                                            <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Batch Name</th>
                                                            <th class="bold-font-weight" >Module</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_exam_approved_result_body" class="hoverTable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                    <table id="tbl_exam_rejected_result" class="table table-hover text-nowrap ">
                                                        <thead>
                                                            <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Exam Type</th>
                                                            <th class="bold-font-weight" >Grade</th>
                                                            <th class="bold-font-weight" >Batch Name</th>
                                                            <th class="bold-font-weight" >Module</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_exam_rejected_result_body" class="hoverTable">
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
                {{--</form>--}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
	loadStudent('da_1');
    loadBatchData("da_1");
</script>
@endpush
