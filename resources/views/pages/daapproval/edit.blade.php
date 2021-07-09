@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_approval'
])
@section('content')    
    <div class="content">
        <div class="pull-right">
            <span class="breadcrumb"><a href='{{ route("da_approval.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To List</a></span>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name(MM)</label>
                        <p>{{ $user->name_mm }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name(Eng)</label>
                        <p>{{ $user->name_eng }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Father Name(MM)</label>
                        <p>{{ $user->father_name_mm }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Father Name(Eng)</label>
                        <p>{{ $user->father_name_eng }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>NRC</label>
                        <p>{{ $user->nrc }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Race</label>
                        <p>{{ $user->race }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Religion</label>
                        <p>{{ $user->religion }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <p>{{ $user->date_of_birth }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <p>{{ $user->address }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Current Address</label>
                        <p>{{ $user->current_address }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Applied Date</label>
                        <p>{{ $user->date }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Job Name</label>
                        <p>{{ $user->student_job->name }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Position</label>
                        <p>{{ $user->student_job->position }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Department</label>
                        <p>{{ $user->student_job->department }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Organization</label>
                        <p>{{ $user->student_job->organization }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Company Name</label>
                        <p>{{ $user->student_job->company_name }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Salary</label>
                        <p>{{ $user->student_job->salary }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Company Address</label>
                        <p>{{ $user->student_job->address }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Government Staff</label>
                        <p>{{ $user->gov_staff }}</p>
                    </div> 
                    <div class="form-group col-md-6">
                        <label>University Name</label>
                        <p>{{ $user->education_histroy->university_name }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Degree Name</label>
                        <p>{{ $user->education_histroy->degree_name }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Main Subject(Document)</label>
                        <p>{{ $user->education_histroy->document }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Qualified Date</label>
                        <p>{{ $user->education_histroy->qualified_date }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Roll Number</label>
                        <p>{{ $user->education_histroy->roll_number }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Image</label>
                        <img src="<?php echo asset("$user->image")?>"></img>
                    </div>
               </div>
            </div>
            <div class="form-group col-md-6 pull-right">
                <a href="#" data-toggle="modal" data-url="{{ url($user->id.'/daapproval') }}" class='btn btn-success' data-target="#ApprovalModal">Approve</a>
                <a href="{!! route('da_approval.index') !!}" class="btn btn-default">Reject</a>
            </div>
        </div>
    </div>
@endsection