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
                <form action="javascript:void()" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                    </center>
                                    <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Education</h5>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Universtry Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="university_name"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2"  style="font-weight:bold">Degree Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="degree_name"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="qualified_date"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="roll_number"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                        </div>
                                        <div class="col-md-6 certificate">
                                            
                                            <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-paperclip"></i></button> -->
                                            <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" onclick="file_read('certificate')"><i class="fa fa-paperclip"></i></button> -->
                                        </div>
                                    </div>             
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="border-bottom pb-2"  style="font-weight:bold">Job</h5>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Job Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="name"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Job Position</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="position"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Department</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="department"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Organization</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="organization"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Company Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="company_name"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Salary</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="salary"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Address</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="office_address"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="border-bottom pb-2" style="font-weight:bold">Student Information</h5>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="name_eng"></span> / <span id="name_mm"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">NRC</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="nrc"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">NRC Front</p>
                                        </div>
                                        <div class="col-md-6 nrc_front">
                                            
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">NRC Back</p>
                                        </div>
                                        <div class="col-md-6 nrc_back">
                                            
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="father_name_mm"></span> / <span id="father_name_eng"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Race</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="race"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Religion</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="religion"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="date_of_birth"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Address</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="address"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Current Address</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="current_address"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Phone</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="phone"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Email</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="email"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Government Staff</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="gov_staff"></span>
                                            {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">အထက်လူကြီး၏ထောက်ခံစာ</p>
                                        </div>
                                        <div class="col-md-6 recommend_letter">
                                            
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="registration_no"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="border-bottom pb-2" style="font-weight:bold">Basic Info</h5>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Registration No</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="student_registration_no"></span>
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Registration Reason</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="student_registration_reason"></span>
                                        </div>
                                    </div>

                                    <input type="hidden" name="student_id">
                                    <input type="hidden" name="student_register_id">
                                    <div class="row mt-5 justify-content-center"> 
                                        <button type="submit" name="save" class="btn btn-danger"  onclick="rejectStudent()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                        <button type="submit" name="save" class="btn btn-primary" onclick="approveStudent()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                        
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
    loadStudentSelfStudy();
    

</script>
@endpush
