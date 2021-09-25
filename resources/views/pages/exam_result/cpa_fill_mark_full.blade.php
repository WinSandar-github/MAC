@extends('layouts.app', [
    'class' => '',
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
                                        <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
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
                                <div class="row m-2 mt-3 border-bottom is_private_row">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Private School Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="school_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Exam Type</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="exam_type"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Remark</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="student_grade"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Status</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="student_status"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Module</p>
                                    </div>
                                    <div class="col-md-6">
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
                                    <h5  style="font-weight:bold;margin:auto" >အမှတ်ပေးရန်ဖြည့်သွင်းပါ</h5>
                                    
                                </div>
                                <!-- {!! Form::close() !!} -->
                                <form  method="post" action="javascript:Exam_Result_Submit();" enctype="multipart/form-data">    

                                    <input type="hidden" name="result_id">
                                    <div class="row">
                                        <table class="table mark table-bordered input-table" id="tbl_fillmarks" width="100%" style="margin: 3% 3% 0 3%;">
                                            <thead>    
                                                <tr>
                                                    <th width="10%">စဉ်</th>
                                                    <th width="40%">Subject Name</th>
                                                    <th width="30%">အမှတ်ပေးရန်</th>
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
                                            
                                        <button type="submit" class=" btn  btn-danger" onClick="javascript:failExam();">Fail</button>
                                        <button type="submit" class=" btn btn-primary" onClick="javascript:passExam();">Pass</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     

        {{--<div class="row">
            <div class="col-md-12 text-center">
                <!-- {!! Form::open(array('route' => 'exam_result.store','method'=>'POST','files' => 'true')) !!} -->
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
                                            <div class="row">
                                                <h5  style="font-weight:bold;margin:auto" >အမှတ်ပေးရန်ဖြည့်သွင်းပါ</h3>
                                                
                                            </div>
                                            <form  method="post" action="javascript:Exam_Result_Submit();" enctype="multipart/form-data">    

                                                
                                                <input type="hidden" name="result_id">
                                            
                                                <div class="row">
                                                    <table class="table mark table-bordered input-table" id="tbl_fillmarks" width="100%" style="margin: 3% 3% 0 3%;">
                                                        <tr>
                                                            <th width="10%">စဉ်</th>
                                                            <th width="40%">Subject Name</th>
                                                            <th width="30%">အမှတ်ပေးရန်</th>
                                                            <th width="20%">Grade</th>
                                                        </tr>
                                                        <tr>
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
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">4</td>
                                                            <td width="40%">
                                                                <input type="text" name="subject4" id="subject4" class="form-control" value="Subject Four" readonly>
                                                            </td>
                                                            <td width="30%">
                                                                <input type="text" name="mark4" id="mark4" class="form-control" value="{{ old('mark4') }}" required>
                                                            </td>
                                                            <td width="20%">
                                                                <input type="text" name="grade4" id="grade4" class="form-control" value="{{ old('grade4') }}" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">5</td>
                                                            <td width="40%">
                                                                <input type="text" name="subject5" id="subject5" class="form-control" value="Subject Five" readonly>
                                                            </td>
                                                            <td width="30%">
                                                                <input type="text" name="mark5" id="mark5" class="form-control" value="{{ old('mark5') }}" required>
                                                            </td>
                                                            <td width="20%">
                                                                <input type="text" name="grade5" id="grade5" class="form-control" value="{{ old('grade5') }}" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">6</td>
                                                            <td width="40%">
                                                                <input type="text" name="subject6" id="subject6" class="form-control" value="Subject Six" readonly>
                                                            </td>
                                                            <td width="30%">
                                                                <input type="text" name="mark6" id="mark6" class="form-control" value="{{ old('mark6') }}" required>
                                                            </td>
                                                            <td width="20%">
                                                                <input type="text" name="grade6" id="grade6" class="form-control" value="{{ old('grade6') }}" required>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>  
                                        <div class="card-footer"> 
                                            <div class="modal-footer">
                                                <button type="submit" name="save" class="btn btn-primary ex_res_btn">Submit</button>
                                            
                                            </form>

                                                <div class="pass_fail_btn" style="display:none;">
                                                    
                                                    <button class=" btn  btn-danger " onClick="javascript:failExam();">Fail</button>
                                                    <button  class=" btn btn-primary" onClick="javascript:passExam();">Pass</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                <!-- {!! Form::close() !!} -->
                
            </div>
        </div>--}}
    </div>
@endsection
@push('scripts')
<script>
    getCPAModuleStd();
</script>
@endpush
