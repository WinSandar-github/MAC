@extends('layouts.app', [
    'class' => '',
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
                                <h5 class="title" style="padding-left: 130px;">လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း) သင်တန်း အမှတ်စဥ်-၄၅</h5>
                                <h5 class="title" style="padding-left: 130px;">ဝင်ခွင့်စာမေးပွဲ ဖြေဆိုခွင့်လက်မှတ်</h5>
                            </div>
                            <div class="col-md-2 d-md-flex justify-content-md-end" id="print_btn">
                                <button type="button" class="btn btn-primary btn-round"  onclick="PrintExamCard()" style="height:40px; width:100px;">Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8"> </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 d-md-flex justify-content-md-end">
                                <label>စာမေးပွဲခုံနံပါတ်</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <!-- <input type="text" name="roll_no" class="form-control" placeholder="Roll No."> -->
                                <label class="col-form-label" style="border: 1px solid black;width:100px;" id="roll_no"></label>
                            </div>
                        </div>  <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <img id="student_img" alt="preview image" width="200" height="200">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">၁။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">အမည်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <!-- <input type="text" name="roll_no" id="1" class="form-control" placeholder="အမည်"> -->
                                        <label class="col-form-label" id="name"  style="border-bottom: 1px dotted black;width:300px;" ></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">၂။</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                    </div>
                                    <div class="col-md-6  text-center">
                                        <label class="col-form-label" id="nrc"  style="border-bottom: 1px dotted black;width:300px;"></label>
                                        <!-- <input type="text" name="roll_no"  id="2" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <label class="col-form-label">စာမေးပွဲကျင်းပမည့်</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(က)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">နေ့ရက် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_date"  style="border-bottom: 1px dotted black;width:300px;"></label>     
                                        <!-- <input type="text" name="roll_no" id="3" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(ခ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">အချိန် ၊</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" id="exam_time"  style="border-bottom: 1px dotted black;width:300px;"></label>  
                                        <!-- <input type="text" name="roll_no"  id="4" class="form-control" placeholder="nrc"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-left">
                                        <label class="col-form-label">(ဂ)</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                        <label class="col-form-label">နေရာ ၊</label>
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
                        </div><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">ဖြေဆိုသူလက်မှတ်</label><br/>
                                <label class="col-form-label">(သက်ဆိုင်ရာဝန်ထမ်း၏ရှေ့မှောက်တွင် ရေးထိုးရမည်။)</label>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">ညွှန်ကြားရေးမှူး</label><br/>
                                <label class="col-form-label">မြန်မာနိုင်ငံစာရင်းကောင်စီရုံး</label>
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
    loadStudentDataForExamCard();
</script>
@endpush
