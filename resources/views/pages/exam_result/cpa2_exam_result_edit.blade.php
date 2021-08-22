@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa2_exam_result_edit'
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
                                    <h5 class="title" style="padding-left: 330px;">{{ __('CPA 2 Exam Result List') }}</h5>
                                </div>
                            </div>
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
                                                        <div class="col-md-3 text-left" style="font-weight:bold;">Grade</div>
                                                        <div class="col-md-7 text-left">
                                                            <select class="form-control form-select" name="selected_grade_id" id="selected_grade_id">
                                                                <option value="all" selected>All</option>
                                                                <option value="0">Pending</option>
                                                                <option value="1">Pass</option>
                                                                <option value="2" >Fail</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" onclick="loadCPAStudent('cpa_2')" class="btn btn-primary btn-hover-dark m-0" >Search</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="tbl_cpa_exam_result"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                      <th class="bold-font-weight" >No</th>
                                                      <th class="bold-font-weight" >Actijon</th>
                                                      <th class="bold-font-weight" >Name</th>
                                                      {{--<th class="bold-font-weight" >Private School Name</th>--}}
                                                      <th class="bold-font-weight" >Exam Type</th>
                                                      <th class="bold-font-weight" >Grade</th>
                                                      {{--<th class="bold-font-weight" >Status</th>--}}
                                                      {{--<th class="bold-font-weight" >Batch ID</th>--}}
                                                      <th class="bold-font-weight" >Is Full Module</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_cpa_exam_result_body" class="hoverTable">
                                                </tbody>
                                            </table>
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
	loadCPAStudent('cpa_2');
</script>
@endpush
