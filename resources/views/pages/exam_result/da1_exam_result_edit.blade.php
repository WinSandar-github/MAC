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
                <form action="" method="get" enctype="multipart/form-data">
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
                                        <div class="card-body">
                                            <table id="tbl_exam_result"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                      <th class="bold-font-weight" >No</th>
                                                      <th class="bold-font-weight" >Student Name</th>
                                                      <th class="bold-font-weight" >Private School Name</th>
                                                      <th class="bold-font-weight" >Exam Type</th>
                                                      <th class="bold-font-weight" >Grade</th>
                                                      <th class="bold-font-weight" >Status</th>
                                                      <th class="bold-font-weight" >Batch ID</th>
                                                      <th class="bold-font-weight" >Is Full Module</th>
                                                      <th class="bold-font-weight" >Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_exam_result_body" class="hoverTable">
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
	loadStudent('da one');
</script>
@endpush
