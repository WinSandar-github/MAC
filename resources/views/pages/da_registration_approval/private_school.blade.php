@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'index'
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
                                                <label class="col-md-3 form-label text-left">{{ __('Name(Eng)/(Myan)') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_name"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Registration No') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_registration_no"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('NRC') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_nrc"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('DOB') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_dob"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Father Name') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_father"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Email') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_email"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Phone') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span id="student_phone"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                    <div class="col-md-8"></div>
                                                    <div class="col-md-2 d-md-flex justify-content-md-end">
                                                        <button type="button" class="btn btn-primary btn-round">{{ __('Approval') }}</button>
                                                    </div>
                                                    <div class="col-md-1 d-md-flex justify-content-md-end">
                                                        <button type="button" class="btn btn-info btn-round">{{ __('Reject') }}</button>
                                                    </div>
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
    loadStudentPrivateSchool();
    

</script>
@endpush
