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
                <form action="javascript:void()" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Basic Info
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Private School Name') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="school_name"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Exam Type') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="exam_type"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Remark') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_grade"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Status') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_status"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="student_id">
                                            
                                            <div class="row mt-5 justify-content-center"> 
                                                <button type="submit"  id="reject" name="save" class="btn btn-danger"  onclick="rejectDAOneExam()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                                <button type="submit" id="approve" name="save" class="btn btn-primary" onclick="approveDAOneExam()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                                
                                            </div>
                                        </div>
                                            
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
    loadDAExamData();
</script>
@endpush
