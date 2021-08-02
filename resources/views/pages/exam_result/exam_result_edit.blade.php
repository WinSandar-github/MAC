@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam_result_list'
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
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Student List') }}</h5>
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
                                                      <th class="less-font-weight" >No</th>
                                                      <th class="less-font-weight" >Student Name</th>
                                                      <th class="less-font-weight" >Private School Name</th>
                                                      <th class="less-font-weight" >Exam Type</th>
                                                      <th class="less-font-weight" >Grade</th>
                                                      <th class="less-font-weight" >Status</th>
                                                      <th class="less-font-weight" >Batch ID</th>
                                                      <th class="less-font-weight" >Is Full Module</th>
                                                      <th class="less-font-weight" >Detail</th>
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
	loadStudent();
</script>
@endpush
