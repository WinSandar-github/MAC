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
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="title" style="padding-left: 330px;">{{ __('DA Exam Form (1) List') }}</h5>
                            </div>
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
                                                    <th class="less-font-weight" >No</th>
                                                    <th class="less-font-weight" >Private School Name</th>
                                                    <th class="less-font-weight" >Exam Type</th>
                                                    <th class="less-font-weight" >Grade</th>
                                                    <th class="less-font-weight" >Status</th>
                                                    <th class="less-font-weight" >Detail</th>
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
    getExam();
</script>
@endpush
