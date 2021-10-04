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
                    <div class="col-md-12 text-center">
                        <form action="javascript:void()" method="post" enctype="multipart/form-data">
                            <input type="hide" name="fill_mark" id="fill_mark" value="fill_mark">  
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                                <br/><span class='text-info'>Profile Picture</span>
                                            </center>
                                            <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Local Education</h5>
                                            
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2"  style="font-weight:bold">Degree Name</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="local_education"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                                </div>
                                                <div class="col-md-6 certificate text-left">

                                                    <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-paperclip"></i></button> -->
                                                    <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" onclick="file_read('certificate')"><i class="fa fa-paperclip"></i></button> -->
                                                </div>
                                            </div>

                                            <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Foreign Education</h5>

                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Degree Name</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="degree_name"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Organization Name</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="org_name"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Address</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="org_address"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Email</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="org_email"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Exam Date</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="exam_date"></span>
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Exam Registration Number</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="exam_reg_no"></span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="col-md-6">
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
                                                <div class="col-md-6 nrc_front text-left">

                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">NRC Back</p>
                                                </div>
                                                <div class="col-md-6 nrc_back text-left" >

                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span  id="father_name_eng"></span> / <span  id="father_name_mm"></span>
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
                                                    <p class="ml-2" style="font-weight:bold">Office Address</p>
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
                                                    <p class="ml-2" style="font-weight:bold">Job</p>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <span id="current_job"></span>
                                                
                                                </div>
                                            </div>
                                            <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                                <div class="col-md-6 text-left">
                                                    <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                                </div>
                                                <div class="col-md-6 recommend_letter text-left">

                                                </div>
                                            </div>
                                            {{--    <div class="row m-2 mt-3 border-bottom">
                                                    <div class="col-md-6">
                                                        <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span id="registration_no"></span>
                                                    </div>
                                                </div>
                                            --}}
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    <img class="nrc-style" id="nrc_front_img"  accept="image/png,image/jpeg" alt="">
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <img class="nrc-style" id="nrc_back_img"  accept="image/png,image/jpeg" alt="">
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
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5  style="font-weight:bold;margin:auto" >အမှတ်ပေးရန်ဖြည့်သွင်းပါ</h5>
                                </div>
                                <form  method="post" action="javascript:qualifiedTestResultSubmit(this);" enctype="multipart/form-data">
                                <input type="hidden" name="result_id">
                                <input type="hidden" name="qt_id" >

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
    $('document').ready(function(){
     
        var url = location.pathname;
       var id = url.substring(url.lastIndexOf('/')+1);
        loadQualifiedTestDetail(id);
    })
</script>
@endpush
