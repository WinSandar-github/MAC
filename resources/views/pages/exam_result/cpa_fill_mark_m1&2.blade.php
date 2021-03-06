@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'exam_result_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                </center>
                                <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Education</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">University Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="university_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2"  style="font-weight:bold">Degree Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="degree_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="qualified_date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="roll_number"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                    </div>
                                    <div class="col-md-6 text-left certificate">

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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Position</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="position"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Department</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="department"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Organization</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="organization"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Company Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="company_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Salary</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="salary"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name_eng"></span> / <span id="name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Front</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_front">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Back</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_back">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="father_name_eng"></span> / <span id="father_name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">????????????/??? (Gender)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gender"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Race</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="race"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Religion</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="religion"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="date_of_birth"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Current Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="current_address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Phone</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Email</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Government Staff</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gov_staff"></span>
                                        {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">?????????????????????????????????????????????????????????????????????????????????????????????</p>
                                    </div>
                                    <div class="col-md-6 text-left recommend_letter">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">?????????????????????????????????????????????</p>
                                    </div>
                                    <div class="col-md-6 text-left">
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
                                <div class="row m-2 mt-3 border-bottom is_private_row">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Private School Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="school_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Exam Type</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="exam_type"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Grade</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="student_grade"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Status</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="student_status"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Module</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="is_full_module"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5  style="font-weight:bold;margin:auto" >?????????????????????????????????????????????????????????????????????</h5>

                                </div>
                                <!-- {!! Form::close() !!} -->
                                <form  method="post" action="javascript:examResultSubmit();" enctype="multipart/form-data">

                                    <input type="hidden" name="result_id">
                                    <div class="row">
                                        <table class="table mark table-bordered input-table" id="tbl_fillmarks" width="100%" style="margin: 3% 3% 0 3%;">
                                            <thead>
                                                <tr>
                                                    <th width="10%">?????????</th>
                                                    <th width="40%">Subject Name</th>
                                                    <th width="30%">?????????????????????????????????</th>
                                                    <th width="20%">Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbl_fillmarks_body"></tbody>
                                            <!-- <tr>
                                                <td width="10%">1</td>
                                                <td width="40%">
                                                    <input type="text" name="subject1" id="subject1" class="form-control" value="Subject One" readonly>
                                                </td>
                                                <td width="30%">
                                                    <input type="text" name="mark1" id="mark1" class="form-control" value="{{ old('mark1') }}" required>
                                                </td>
                                                <td width="20%">
                                                    <input type="text" name="grade1" id="grade1" class="form-control" value="{{ old('grade1') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%">2</td>
                                                <td width="40%">
                                                    <input type="text" name="subject2" id="subject2" class="form-control" value="Subject Two" readonly>
                                                </td>
                                                <td width="30%">
                                                    <input type="text" name="mark2" id="mark2" class="form-control" value="{{ old('mark2') }}" required>
                                                </td>
                                                <td width="20%">
                                                    <input type="text" name="grade2" id="grade2" class="form-control" value="{{ old('grade2') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%">3</td>
                                                <td width="40%">
                                                    <input type="text" name="subject3" id="subject3" class="form-control" value="Subject Three" readonly>
                                                </td>
                                                <td width="30%">
                                                    <input type="text" name="mark3" id="mark3" class="form-control" value="{{ old('mark3') }}" required>
                                                </td>
                                                <td width="20%">
                                                    <input type="text" name="grade3" id="grade3" class="form-control" value="{{ old('grade3') }}" required>
                                                </td>
                                            </tr> -->
                                        </table>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <div class="modal-footer ">
                                    <!-- <button type="submit" name="save" class="btn btn-primary ex_res_btn">Submit</button> -->

                                    <div class="pass_fail_btn">

                                        <button type="submit" class=" btn  btn-danger " value="fail">Fail</button>
                                        <button type="submit" class=" btn btn-primary" value="pass">Pass</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    getCPAModuleStd();
</script>
@endpush
