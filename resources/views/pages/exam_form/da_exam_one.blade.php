@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_exam_one'
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
            <form action="" method="get" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <table width="100%">
                                <tr>
                                    <td width="50%"><h5 class="title" style="padding-left: 330px;">{{ __('DA Exam Form (1) List') }}</h5></td>
                                    <td width="25%">
                                        <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id" style="margin-left: 75%; width: 70%;">
                                            <option value="selected_batch_id" disabled selected>Select Batch</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <button type="submit" onclick="SearchByID()" class="btn btn-primary btn-hover-dark" style="margin-left: 63%;">Search</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="tbl_da_exam_one"class="table table-hover text-nowrap ">
                                            <thead>
                                                <tr>
                                                    <th class="bold-font-weight" >No</th>
                                                    <th class="bold-font-weight" >Private School Name</th>
                                                    <th class="bold-font-weight" >Exam Type</th>
                                                    <th class="bold-font-weight" >Grade</th>
                                                    <th class="bold-font-weight" >Status</th>
                                                    <th class="bold-font-weight" >Batch ID</th>
                                                    <th class="bold-font-weight" >Detail</th>
                                                    <th class="bold-font-weight" >Print</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_da_exam_one_body" class="hoverTable">
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
    loadBatchData();
    getExam();
</script>
@endpush
