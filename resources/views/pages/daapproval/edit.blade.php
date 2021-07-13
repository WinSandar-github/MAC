@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_approval'
])
<style type="text/css">
    p {
        margin-left: 7%;
    }
    label {
        margin-bottom: 2%;
    }
</style>
@section('content')    
    <div class="content">
        {{-- <div class="pull-right">
            <span class="breadcrumb"><a href='{{ route("da_approval.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To List</a></span>
        </div> --}}
        {{-- <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
            
                        Name(MM) {{ $user->name_mm }}
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
               </div>
            </div>
            <div class="form-group col-md-6 pull-right">
                <a href="#" data-toggle="modal" data-url="{{ url($user->id.'/daapproval') }}" class='btn btn-success' data-target="#ApprovalModal">Approve</a>
                <a href="{!! route('da_approval.index') !!}" class="btn btn-default">Reject</a>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-4 ">
                <center><img src="{{ asset('img/user_profile/vIqzOHXj.jpeg') }}" class="rounded-circle" style="width: 100px;height : 100px"></center>
                
                <h5 class="border-bottom pb-2 mt-3">Education</h5>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Universtry Name</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->education_histroy->university_name}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Degree Name</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->education_histroy->degree_name}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Qualified Date</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->education_histroy->qualified_date}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Roll Number</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->education_histroy->roll_number}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Attched Certificate</p>
                    </div>
                    <div class="col-md-6">
                        <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-paperclip"></i></button>
                    </div>
                </div>

                <h5 class="border-bottom pb-2 mt-3">Job</h5>
        
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Job Name</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->name}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Job Position</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->position}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Department</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->department}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Organization</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->organization}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Company Name</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->company_name}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Salary</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->salary}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Address</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->student_job->address}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="border-bottom pb-2">Basic Info</h5>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2 text-bold">Name(Eng) / Name(Myanmar)</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->name_eng }} / {{ $user->name_mm }}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">NRC</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->nrc}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Father Name(Eng) / Father Name(Myanmar)</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->father_name_mm}} / {{ $user->father_name_eng}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Race</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->race}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Religion</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->religion}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Date of Birth</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->date_of_birth}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Address</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->address}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Current Address</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->current_address}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Phone</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->phone}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Email</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->email}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">Government Staff</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>
                    </div>
                </div>
                <div class="row m-2 mt-3 border-bottom">
                    <div class="col-md-6">
                        <p class="ml-2">ကိုယ်ပိုင်အမှတ်</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $user->registration_no}}</p>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">                    
                    <a href="#" data-toggle="modal" data-url="{{ url($user->id.'/daapproval') }}" data-target="#ApprovalModal" style="width : 20%" class="btn btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Approve</a>

                    <a href="#" data-toggle="modal" data-url="{{ url($user->id.'/da_approval') }}" data-target="#RejectModal" style="width : 20%" class="btn btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Reject</a>
                </div>
            </div>
        </div>
    </div>
@endsection