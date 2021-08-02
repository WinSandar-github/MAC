@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam_result_list'
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
                {!! Form::open(array('route' => 'exam_result.store','method'=>'POST','files' => 'true')) !!}
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
                                                <label class="col-md-3 form-label text-left">{{ __('Student Name') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="std_name"></span>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <label class="col-md-3 form-label text-left">{{ __('Grade') }}</label>
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
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Module') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="is_full_module"></span>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <input type="hidden" name="batch_id">
                                            <h5 style="font-weight:bold" align="center">အမှတ်ပေးရန်ဖြည့်သွင်းပါ</h3>
                                            <div class="row">
                                                <table class="table mark table-bordered input-table" width="100%" style="margin: 3% 3% 0 3%;">
                                                    <tr>
                                                        <th width="10%">စဉ်</th>
                                                        <th width="40%">Subject Name</th>
                                                        <th width="30%">အမှတ်ပေးရန်</th>
                                                        <th width="20%">Grade</th>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">1</td>
                                                        <td width="40%">
                                                            {!! Form::text('subject_name[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="30%">
                                                            {!! Form::text('mark[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="20%">
                                                            {!! Form::text('grade[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">2</td>
                                                        <td width="40%">
                                                            {!! Form::text('subject_name[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="30%">
                                                            {!! Form::text('mark[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="20%">
                                                            {!! Form::text('grade[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">3</td>
                                                        <td width="40%">
                                                            {!! Form::text('subject_name[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="30%">
                                                            {!! Form::text('mark[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="20%">
                                                            {!! Form::text('grade[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">4</td>
                                                        <td width="40%">
                                                            {!! Form::text('subject_name[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="30%">
                                                            {!! Form::text('mark[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="20%">
                                                            {!! Form::text('grade[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">5</td>
                                                        <td width="40%">
                                                            {!! Form::text('subject_name[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="30%">
                                                            {!! Form::text('mark[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                        <td width="20%">
                                                            {!! Form::text('grade[]', null, ['class' => 'form-control']) !!}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>  
                                        <div class="card-footer"> 
                                            <div class="modal-footer">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    getModuleStd();
</script>
@endpush
