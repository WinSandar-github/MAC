@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'index'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <!-- <div class="col-md-12">
            {{ Breadcrumbs::render('index') }}
            </div> -->
        </div>

        <div class="row" id="printdiv">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="title" style="padding-left: 130px;">မြန်မာနိုင်ငံစာရင်းကောင်စီ</h5>
                                <h5 class="title" style="padding-left: 130px;">လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ဒုတိယပိုင်း) သင်တန်း အမှတ်စဉ် - <span id="batch_no"></span> </h5>
                                <h5 class="title" style="padding-left: 130px;">စာမေးပွဲ ဖြေဆိုခွင့်ကတ်ပြား </h5>
                            </div>
                            <div class="col-md-2 d-md-flex justify-content-md-end" id="print_btn">
                                <button type="button" class="btn btn-primary btn-round"  onclick="PrintExamCard()" style="height:40px; width:100px;">Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <label  style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</label> (<label class="col-form-label" style="border-bottom: 1px dotted black;width:100px;" id="cpa_roll_no"></label>)
                            </div>
                            <div>

                            </div>
                        </div>  <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <img id="student_img" alt="preview image" width="200" height="200">
                            </div>
                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၁။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">အမည်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <!-- <input type="text" name="roll_no" id="1" class="form-control" placeholder="အမည်"> -->
                                        <label class="col-form-label" id="name"  style="border-bottom: 1px dotted black;width:300px;" ></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၂။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="nrc"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                        <!-- <input type="text" name="roll_no"  id="2" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၃။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">အဘအမည်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="father_name"  style="border-bottom: 1px dotted black;width:300px;"></label>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">၄။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label"  style="font-weight:bold">စာစစ်ဌာန </label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="exam_department"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-6 col-form-label label" style="font-weight:bold; padding-right: 100px;">အခန်းအမှတ်</label>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="room_no"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-6 col-form-label label" style="font-weight:bold; padding-right: 85px;">အဆောင်အမှတ်</label>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="hall_no"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                    </div>
                                </div>
                                {{--<div class="row mb-4">
                                    <label class="col-md-6 col-form-label label" style="font-weight:bold; padding-right: 115px;">တည်နေရာ</label>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="exam_place"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                    </div>
                                </div>--}}
                                <!-- <div class="row">
                                    <div class="col-md-12 text-left">
                                        <label class="col-form-label">စာမေးပွဲကျင်းပမည့်</label>
                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(က)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">နေ့ရက် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_date"  style="border-bottom: 1px dotted black;width:300px;"></label>

                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(ခ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">အချိန် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_time"  style="border-bottom: 1px dotted black;width:300px;"></label>

                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(ဂ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">နေရာ ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_place"  style="border-bottom: 1px dotted black;width:300px;"></label>

                                    </div>
                                </div>
                            </div>
                        </div>  </br> -->
                        <!-- <div class="row">
                            <div class="col-md-2">
                                <label class="col-form-label">မှတ်ချက် ။</label>
                            </div>
                            <div class="col-md-10 text-left">
                                <label class="col-form-label">(၁) ဤလက်မှတ်နှင့် နိုင်ငံသားစိစစ်ရေးကတ်ပြားပါရှိမှသာလျှင် စာမေးပွဲဖြေဆိုခွင့်ပြုမည်။</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 text-left">
                                <label class="col-form-label">(၂) စာမေးပွဲစတင်ကျင်းပသည့်အချိန်မှစ၍ နာရီဝက်ကျော်နောက်ကျပါက စာမေးပွဲဖြေဆိုခွင့်ပြုမည်မဟုတ်ပါ။ စာမေးပွဲစည်းကမ်း အကျဥ်းချုပ်ကို ကျောဖက်တွင်ဖော်ပြထားပါသည်။</label>
                            </div>
                        </div><br/><br/><br/><br/><br/><br/> -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <label class="col-form-label">ဖြေဆိုသူလက်မှတ်</label><br/>
                                <label class="col-form-label">(သက်ဆိုင်ရာဝန်ထမ်း၏ရှေ့မှောက်တွင် ရေးထိုးရမည်။)</label> -->
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
    function PrintExamCard(){
        var backup=document.body.innerHTML;
        document.getElementById("print_btn").remove();
        var divcontent=document.getElementById("printdiv").innerHTML;
        document.body.innerHTML=divcontent;
        window.print();
        document.body.innerHTML=backup;
    }
    loadCPAStudentDataForExamCard();
</script>
@endpush
