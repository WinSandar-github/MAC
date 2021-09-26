@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_exam_one'
])


@prepend('styles')

    <style>

        @media print {
        body * {
            visibility: hidden;
        }
        #section-to-print, #section-to-print * {
            visibility: visible;
        }
        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }
        }
    </style>
@endprepend


@section('content')




    <div class="content">
        @include('flash-message')

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
                                        <br/><span class='text-info'>Profile Picture</span>
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
                                            <p class="ml-2" style="font-weight:bold">နိုင်ငံ့ဝန်ထမ်း</p>
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
                                        <div class="col-md-6">
                                            <img class="nrc-style" id="nrc_front_img"  accept="image/png,image/jpeg" alt=""> 
                                        </div>
                                        <div class="col-md-6">
                                            <img class="nrc-style" id="nrc_back_img"  accept="image/png,image/jpeg" alt="">                            
                                        </div>                  
                                    </div>
                                    <input type="hidden" name="student_course_id" >
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="border-bottom pb-2" style="font-weight:bold">Basic Info</h5>
                                </div>
                                <div class="card-body pt-0">
                                    {{-- <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Private School Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="school_name"></span>
                                        </div>
                                    </div> --}}
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Exam Type</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="exam_type"></span>
                                        </div>
                                    </div>
                                    {{--  <div class="row m-2 mt-3 border-bottom">
                                            <div class="col-md-6">
                                                <p class="ml-2" style="font-weight:bold">Remark</p>
                                            </div>
                                            <div class="col-md-6">
                                                <span id="student_grade"></span>
                                            </div>
                                        </div>
                                    --}}    
                                        <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">Status</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="student_status"></span>
                                        </div>
                                    </div>
                                  {{--  <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6">
                                            <p class="ml-2" style="font-weight:bold">စာဖြေဌာန</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="exam_department"></span>
                                        </div>
                                    </div> --}}

                                    <input type="hidden" name="student_id">
                                    
                                  
                                        <div class="row mt-5 justify-content-center approve_reject"> 
                                            <button type="button" id="print" class="btn btn-primary btn-round"  onclick="PrintExamCard()" style="height:40px; width:100px;">Print</button>
                                            <button type="submit"  id="reject" name="save" class="btn btn-danger"  onclick="rejectEntryExam()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                            <button type="submit" id="approve" name="save" class="btn btn-primary" onclick="approveEntryExam()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                            
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

        <div class="row" id="printdiv" style="display:none;">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="title" style="padding-left: 130px;font-weight:bold;" >လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း) သင်တန်း အမှတ်စဥ်- <span id="exam_batch_no"></span> </h5>
                                <h5 class="title" style="padding-left: 130px;font-weight:bold;">ဝင်ခွင့်စာမေးပွဲ ဖြေဆိုခွင့်လက်မှတ်</h5>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8"> </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 d-md-flex justify-content-md-end">
                                <label   style="font-weight:bold">စာမေးပွဲခုံနံပါတ်</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <!-- <input type="text" name="roll_no" class="form-control" placeholder="Roll No."> -->
                                <label class="col-form-label" style="border: 1px solid black;width:100px;" id="exam_roll_no"></label>
                            </div>
                        </div>  <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <img id="student_img" alt="preview image" width="200" height="200">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၁။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">အမည်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <!-- <input type="text" name="roll_no" id="1" class="form-control" placeholder="အမည်"> -->
                                        <label class="col-form-label" id="exam_student_name"  style="border-bottom: 1px dotted black;width:300px;" ></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၂။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="exam_student_nrc"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                        <!-- <input type="text" name="roll_no"  id="2" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">စာမေးပွဲကျင်းပမည့်</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">(က)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">နေ့ရက် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_date"  style="border-bottom: 1px dotted black;width:300px;"></label>     
                                        <!-- <input type="text" name="roll_no" id="3" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">(ခ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">အချိန် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_time"  style="border-bottom: 1px dotted black;width:300px;"></label>  
                                        <!-- <input type="text" name="roll_no"  id="4" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">(ဂ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">နေရာ ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_place"  style="border-bottom: 1px dotted black;width:300px;"></label>  
                                        <!-- <input type="text" name="roll_no"  id="5" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                            </div>
                        </div>  </br>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="col-form-label"  style="font-weight:bold">မှတ်ချက် ။</label>
                            </div>
                            <div class="col-md-10 text-left">
                                <label class="col-form-label"  style="font-weight:bold">(၁) ဤလက်မှတ်နှင့် နိုင်ငံသားစိစစ်ရေးကတ်ပြားပါရှိမှသာလျှင် စာမေးပွဲဖြေဆိုခွင့်ပြုမည်။</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 text-left">
                                <label class="col-form-label"  style="font-weight:bold">(၂) စာမေးပွဲစတင်ကျင်းပသည့်အချိန်မှစ၍ နာရီဝက်ကျော်နောက်ကျပါက စာမေးပွဲဖြေဆိုခွင့်ပြုမည်မဟုတ်ပါ။ စာမေးပွဲစည်းကမ်း အကျဥ်းချုပ်ကို ကျောဖက်တွင်ဖော်ပြထားပါသည်။</label>
                            </div>
                        </div><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label"  style="font-weight:bold">ဖြေဆိုသူလက်မှတ်</label><br/>
                                <label class="col-form-label"  style="font-weight:bold">(သက်ဆိုင်ရာဝန်ထမ်း၏ရှေ့မှောက်တွင် ရေးထိုးရမည်။)</label>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label"  style="font-weight:bold">ညွှန်ကြားရေးမှူး</label><br/>
                                <label class="col-form-label"  style="font-weight:bold">မြန်မာနိုင်ငံစာရင်းကောင်စီရုံး</label>
                            </div>
                        </div><br/><br/>
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
         
        loadEntryDetail(id);
       

       
       
})

</script>
@endpush
