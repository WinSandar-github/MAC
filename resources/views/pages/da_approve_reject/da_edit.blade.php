@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_list'
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
                            <div class="col-md-4 ">
                                <center>
                                    <img width="30%" class="rounded-circle" style="width: 100px;height : 100px" src="#">
                                </center>
                                <h5 class="border-bottom pb-2 mt-3">Education</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Universtry Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_education_histroy->university_name}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Degree Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_education_histroy->degree_name}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_education_histroy->qualified_date}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Roll Number</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_education_histroy->roll_number}}</p>--}}
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
                                        {{--<p>{{ $user->student_job->name}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        {{--<p class="ml-2">Job Position</p>--}}
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->position}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Department</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->department}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Organization</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->organization}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Company Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->company_name}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Salary</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->salary}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        {{--<p>{{ $user->student_job->office_address}}</p>--}}
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
                                        <span id="name_eng"></span> / <span id="name_mm"></span>
                                        {{--<p>{{ $user->name_eng }} / {{ $user->name_mm }}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">NRC</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="nrc"></span>
                                        {{--<p>{{ $user->nrc}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="father_name_mm"></span> / <span id="father_name_eng"></span>
                                        {{--<p>{{ $user->father_name_mm}} / {{ $user->father_name_eng}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Race</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="race"></span>
                                        {{--<p>{{ $user->race}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Religion</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="religion"></span>
                                        {{--<p>{{ $user->religion}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Date of Birth</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="date_of_birth"></span>
                                        {{--<p>{{ $user->date_of_birth}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="address"></span>
                                        {{--<p>{{ $user->address}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Current Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="current_address"></span>
                                        {{--<p>{{ $user->current_address}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Phone</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="phone"></span>
                                        {{--<p>{{ $user->phone}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="email"></span>
                                        {{--<p>{{ $user->email}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">Government Staff</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="gov_staff"></span>
                                        {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2">ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="registration_no"></span>
                                        {{--<p>{{ $user->registration_no}}</p>--}}
                                    </div>
                                </div>
                                <div class="row mt-5 justify-content-center">                    
                                    <a href="#" data-toggle="modal" data-url="#" data-target="#ApprovalModal" style="width : 20%" class="btn btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Approve</a>

                                    <a href="#" data-toggle="modal" data-url="#" data-target="#RejectModal" style="width : 20%" class="btn btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Reject</a>
                                </div>
                                <!-- Attached Certificate -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="#" class="img-responsive" style="height:5%;">
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
    loadData();
</script>
@endpush
