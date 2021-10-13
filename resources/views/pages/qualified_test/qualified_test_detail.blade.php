@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
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
                <input type="hidden" id="entry_result" value="1">
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
                                            <span id="office_address"></span>
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
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Exam Type</p>
                                        </div>
                                        <div class="col-md-6 text-left">
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
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Status</p>
                                        </div>
                                        <div class="col-md-6 text-left">
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

                                    <input type="hidden" name="qt_id">


                                        <div class="row mt-5 justify-content-center approve_reject">
                                            <button type="button" id="print" class="btn btn-primary btn-round"  onclick="PrintExamCard()" style="height:40px; width:100px;">Print</button>
                                            <button type="submit"  id="reject" name="save" class="btn btn-danger"  onclick="rejectQT()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                            <button type="submit" id="approve" name="save" class="btn btn-primary" onclick="approveQT()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>

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
                            <h5 class="title" style="padding-left: 130px;font-weight:bold;" >မြန်မာနိုင်ငံစာရင်းကောင်စီ <span id="exam_batch_no"></span> </h5>

                                <h5 class="title" style="padding-left: 130px;font-weight:bold;" >လက်မှတ်ရပြည်သူ့စာရင်းကိုင်များအဖြစ် မှတ်ပုံတင်ရန် အရည်အချင်းစစ်စာမေးပွဲ <span id="exam_batch_no"></span> </h5>
                                <h5 class="title" style="padding-left: 130px;font-weight:bold;">ဖြေဆိုခွင့်ကတ်ပြား</h5>

                                

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-lg-8 col-md-8 col-sm-8"> </div> -->
                            <div class="col-lg-6 col-md col-sm-6 d-md-flex justify-content-center">
                                <label class="mr-3"   style="font-weight:bold">ခုံနံပါတ်</label>
                               ( <span class="px-2" id="exam_roll_no"></span> )
                            </div>
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6>
                                <!-- <input type="text" name="roll_no" class="form-control" placeholder="Roll No."> -->
                                <!-- <label class="col-form-label" style="border: 1px solid black;width:100px;" id="exam_roll_no"></label> -->
                            </div> -->
                        </div>  <br/>
                        <div class="row">
                            
                            <div class="col-md-10 offset-md-1">
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
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၃။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">အဖအမည်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="father_name"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                        <!-- <input type="text" name="roll_no"  id="2" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၄။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">စာစစ်ဌာန</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="exam_place"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                        <!-- <input type="text" name="roll_no"  id="2" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-5 ml-5">
                                        <img id="student_img" alt="preview image" width="200" height="200">
                                    </div>
                                    <div class="col-md-6 pull-left" style="margin-top: 130px;">
                                        <label class="col-form-label"  style="font-weight:bold">ညွှန်ကြားရေးမှူး</label><br/>
                                        <label class="col-form-label"  style="font-weight:bold">မြန်မာနိုင်ငံစာရင်းကောင်စီရုံး</label>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12 border-dark border">
                                        <h6 class="text-left py-3">ဖြေဆိုသူများသတိပြုရန်</h6>
                                        <p style="text-indent: 40px;" >
                                            နိုင်ငံသားစိစစ်ရေးကတ်ပြား(သို့မဟုတ်) အမျိုးသားမှတ်ပုံတင်ကတ်ပြားနှင့် ဤ ဖြေဆိုခွင့်ကတ်ပြား ယူဆောင်လာခြင်း 
                                            မပြုသူအား စာမေးပွဲ ဝင်ရောက်ဖြေဆိုခွင့်ပြုမည် မဟုတ်ပါ။ စာမေးပွဲစတင်ကျင်းပသည် အချိန်မှစ၍ နာရီဝက်ကျော် 
                                            နှောက်ကျပါက စာမေးပွဲ ဖြေဆိုခွင့်ပြုမည် မဟုတ်ပါ။ လက်ကိုင်ဖုန်းများးကို စာမေးပွဲခန်းအတွင်းသို့ ယူဆောင်ခွင့်မပြုပါ။
                                            ငွေကြေးနှင့် အဖိုးတန်ပစ္စည်းများ ပျောက်ဆုံးမူအတွက် မြန်မာနိုင်ငံစာရင်းကောင်စီရုံးမှ တာဝန်မယူပါ။</p>

                                    

                                    </div>
                                

                                </div>
                                                          
                              
                            </div>
                           
                        </div>  </br>
                       
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
