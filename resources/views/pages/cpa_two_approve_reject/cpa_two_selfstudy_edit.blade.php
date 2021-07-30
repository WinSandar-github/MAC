@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_two_registration_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
            {{ Breadcrumbs::render('cpa_two_selfstudy_edit') }}
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="javascript:void()" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 ">
                                <center>
                                    <img src="" id="photo" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                </center>
                                <!-- Start CPA_FF Info -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Academic Year</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="academic_year"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Status</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="status"></span>
                                    </div>
                                </div>                                

                                <h5 class="border-bottom pb-2 mt-4" style="font-weight:bold">Registration Information</h5>
                                
                                <!-- <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Direct Access No</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="direct_access_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Entry Success No</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="entry_success_no"></span>
                                    </div>
                                </div> -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Enrol No Exam</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="enrol_no_exam"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Attendance</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="attendance"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Fail Exam</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="fail_exam"></span>
                                    </div>
                                </div>
                                
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Resigned</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="resigned"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Module</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="module_id"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Batch Session No</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="batch_session_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Entrance Part</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="entrance_part"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Entrance Exam No</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="entrance_exam_no"></span>
                                    </div>
                                </div>
                                
                                <!-- End CPA_FF Info -->                               

                            </div>
                            
                            <div class="col-md-8">
                                <h5 class="border-bottom pb-2 mt-3" style="font-weight:bold">Basic Information of Self-Study Student</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="name_en"></span> / <span id="name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">NRC</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="nrc_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="father_name_en"></span> / <span id="father_name_mm"></span>
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
                                        <p class="ml-2"style="font-weight:bold" >Religion</p>
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
                                        <span id="birth_date"></span>
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
                                        <p class="ml-2"style="font-weight:bold" >Government Staff</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="civil_servant"></span>
                                        {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                    </div>
                                </div>

                                <h5 class="border-bottom pb-2 mt-4" style="font-weight:bold">Education</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Education Level</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="education"></span> 
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Position</p>
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
                                        <p class="ml-2" style="font-weight:bold">Office Area</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="office_area"></span>
                                    </div>
                                </div>

                                <input type="hidden" name="cpa_two_student_id" >

                                <div class="row mt-5 justify-content-center"> 
                                    <button type="submit" name="save" class="btn btn-primary" onclick="approveCPATwoStudent()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>

                                    <button type="submit" name="save" class="btn btn-danger"  onclick="rejectCPATwoStudent()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
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
    loadCPATwoSelfStudyStudentData();
    

</script>
@endpush
