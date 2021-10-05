@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'reporting_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-stats">
                    <h5 class="card-header">Reporting</h5><hr class="header_hr">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="cpa_papp_btn">
                                    CPA(FF) and PAPP Section
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="firm_name_btn">
                                    Firm Name Section
                                </button>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-left" id="cpa_papp_card" style="display:none; background-color:#f5f7fa; padding-bottom:10px;">
                            <h5 class="card-header">CPA(FF) and PAPP Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကနဦးမှတ်ပုံတင်ခွင့်ပြုသောရက်စွဲ (Initial Registration Date) အရ <br>PA လုပ်သက်အများအနည်းအလိုက် PA List ကိုထုတ်ကြည့်ခြင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            CPA(FF) /PA အမည်များ၏ အက္ခရာစဥ်အလိုက် List ထုတ်ကြည့်ခြင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မည်သည့်ကမ္ပဏီကို မည်သည့် pA က မည်သည့်ဘဏ္ဍာနှစ်များအတွက်<br> စစ်ဆေးခဲ့သည်ကို ကြည့်ရှုရန်။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            CPA (FF)/ PA တစ်ဦး၏ Application Form ပါ အချက်အလက်များအားလုံး<br> ပါဝင်သည့် Information အပြည့်အစုံကို Print ထုတ်ကြည့်ခြင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            CPA (FF)/ PA တစ်ဦး၏ သက်တမ်းတိုးမည့် ပြက္ခဒိန်နှစ်အပါအဝင် ကပ်လျက်ရှိသော<br> ၂ နှစ်၏ CPD နာရီမှတ်တမ်း။
                                    </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report6')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            CPA (FF)/ PA တစ်ဦးချင်းစီ၏ History<br> (Initial Registration, သက်သမ်းတိုးသည့် ပြက္ခဒိန်နှစ်၊ သက်တမ်းပြတ်ကာလ)
</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report7')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ပြက္ခဒိန်နှစ်အလိုက် မှတ်ပုံတင်သူများစာရင်း၊ ရပ်နားစာရင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_ff_report8')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း။
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-right" id="firm_name_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">Firm Name Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <ul class="nav nav-tabs mt-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Audit Firm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Non-Audit Service</a>
                                    </li>
                                </ul><br>
                                <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                    <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">From</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">To</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('audit_firm_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    PA တစ်ဦးသည် မည်သည့် Audit Firm တွင် လက်မှတ်ရေးထိုးခွင့်ရှိသူအဖြစ် ပါဝင်နေပြီး<br> အခြား Audit Firm များတွင် လက်မှတ်ရေးထိုးခွင့်မရှိသူအနေဖြင့် <br>Partners/ Shareholders/ Directors/ Officers <br>အဖြစ်ပါဝင်နေမှုအခြေအနေ။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('audit_firm_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Audit Firm တစ်ခု၏ Application Form ပါ <br>အချက်အလက်များအားလုံးပါဝင်သည့် Information အပြည့်အစုံ။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('audit_firm_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Audit Firm တစ်ဦးချင်းစီ၏ History<br> (Initial Registration, သက်သမ်းတိုးသည့် ပြက္ခဒိန်နှစ်၊ သက်တမ်းပြတ်ကာလ)
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('audit_firm_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    ပြက္ခဒိန်နှစ်အလိုက်မှတ်ပုံတင်လုပ်ငန်းများစာရင်း၊ ရပ်နားစာရင်း။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('audit_firm_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း။
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="link2" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">From</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">To</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Non - Audit Service လုပ်ငန်းတစ်ခု၏ Application Form ပါ <br>အချက်အလက်များအားလုံး ပါဝင်သည့် Information အပြည့်အစုံ။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Non - Audit Service (Foreign) လုပ်ငန်းတွင်<br> MD/ Partners/ Shareholders/ Directors/ Officers/ Staff <br>အဖြစ် ပါဝင်ပတ်သက်နေသည့် PA များစာရင်း။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Types of Services provided အလိုက် ဝန်ဆောင်မှုပေးနေသည့်<br> လုပ်ငန်းများစာရင်း။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    Non - Audit Service လုပ်ငန်းတစ်ခုချင်းစီ၏ History <br>(Initial Registration, သက်သမ်းတိုးသည့် ပြက္ခဒိန်နှစ်၊ သက်တမ်းပြတ်ကာလ)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    ပြက္ခဒိန်နှစ်အလိုက်မှတ်ပုံတင်လုပ်ငန်းများစာရင်း၊ ရပ်နားစာရင်း။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('naudit_firm_report6')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း။
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="cpa_btn">
                                    CPA Section
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="article_btn">
                                    Article Section
                                </button>
                            </div>
                        </div>

                        <div class="card card-stats arrow-up-left" id="cpa_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">CPA Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ဝင်ခွင့်ဖြေဆိုခွင့်ရရှိသူစာရင်း၊/ ဝင်ခွင့်အောင်မြင်သူစာရင်း။<br>(Batch အလိုက်၊ အက္ခရာစဥ်အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            သင်တန်းတက်ရောက်ခွင့်ရသူစာရင်း။ (တိုက်ရိုက်နှင့်ဝင်ခွင့်)
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း။ <br>(ကျောင်းသားအမျိုးအစားအလိုက်၊ Module အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            MAC ကျောင်းသားများ အတွက် ကျောင်းခေါ်ချိန် ၆၀% တွက်ချက်မှုအစီရင်ခံစာများ။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းခေါ်ချိန် ပြည့်မီသူစာရင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report6')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း။<br> (ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်)
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report7')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲအောင်မြင်စာရင်း နှင့် ကျရှုံးစာရင်း။<br> (ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်/ ကျောင်းအလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report8')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းသားတစ်ဦးချင်းစီ၏ သမိုင်းကြောင်းအားဖော်ပြသည့် Report များ။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report9')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းသားကတ်များ၊ စာမေးပွဲဖြေဆိုခွင့်ကတ်ပြား၊ အမှတ်စာရင်းထုတ်ယူသည့်ပုံစံ၊<br> အောင်မြင်လက်မှတ်ကတ်ပြားများ။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('cpa_report10')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲကြိမ်ရေ (၅)ကြိမ် ဖြေဆိုပြီးသော်လည်း Module နှစ်ခုလုံး<br> အောင်မြင်မှုမရှိသေးသူများစာရင်း၊ Module (၂)ခုအနက် (၁)ခု အောင်မြင်မှု <br>မရှိသေးသူများစာရင်း၊ တဆက်တည်း စာမေးပွဲဝင်ရောက်ဖြေဆိုမှုမရှိသူများစာရင်း။ <br>(ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်/ ကျောင်းအလိုက်)
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-right" id="article_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">Article Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <ul class="nav nav-tabs mt-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Firm Article</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link4" role="tablist" aria-expanded="true" style="font-weight:bold">Article Section (Government)</a>
                                    </li>
                                </ul><br>
                                <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                    <div class="tab-pane fade show active" id="link3" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">From</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">To</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('firm_article_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်အသားတင်(ရေတွက်ခွင့်မရှိသောခွင့်ကာလနုတ်ပြီး)<br> လုပ်သက် ၂ နှစ်(CPA မအောင်သေးသူများ) ၊ ၁နှစ် နှင့် ၃နှစ် (CPA အောင်ပြီးသူများ)‌ <br>ပြည့်သူများစာရင်း။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('firm_article_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်နုတ်ထွက်သူများစာရင်း။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('firm_article_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှု ပေးသူတစ်ဦးချင်း <br>(သို့မဟုတ်) Audit Firm Name အောက်တွင် အလုပ်သင်ဆင်းနေသူများစာရင်း။<br> ( CPA I, CPA II , CPA Pass, CPA QT အလိုက်/ အလုပ်သင် ကာလ <br>သတ်မှတ်ချက်အလိုက်-ကိုယ်ပိုင်အမှတ်/နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် အပါအဝင်)
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('firm_article_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('firm_article_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်မှတ်တမ်း- ၂ နှစ်ပြည့်၊ ၃ နှစ်ပြည့်။
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="link4" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">From</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3" align="center">To</div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('gov_article_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    စာရင်းကိုင်အလုက်သင်ခန့်အပ်စာရင်း၊ အလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)၊<br> အလုက်သင်တစ်ဦးချင်းစီ၏ History Report များထုတ်ယူနိုင်ရန်။
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('gov_article_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်အသားတင် (ရေတွက်ခွင့်မရှိသောခွင့်ကာလနုတ်ပြီး) လုပ်သက် ၂ နှစ်<br>ပြည့်သူများစာရင်း။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('gov_article_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်နုတ်ထွက်သူများစာရင်း Report ထုတ်ယူနိုင်ရန်၊
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('gov_article_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ။
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a target="_blank" href="{{url('gov_article_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                                    အလုပ်သင်မှတ်တမ်း- ၂ နှစ်ပြည့်။
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="artical_mentor_btn">
                                    Article Section (Mentor)
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="teacher_school_btn">
                                    Teacher / School
                                </button>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-left" id="artical_mentor_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">Article Section (Mentor)</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မှတ်ပုံတင်ထားသောအလုပ်သင်ကြားပေးသူစာရင်း။ <br>(လုပ်ငန်းအမျိုးအစားအလိုက်/ Status အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            PA သက်တမ်းပြတ်တောက်နေသည့် mentor များစာရင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            Mentor ရပ်နားတင်ထားသူများစာရင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            အလုပ်သင်ကြားပေးသူနှစ်စဥ်စစ်ဆေးခဲ့သည့် Company စာရင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            အလုပ်သင်ကြားပေးသူထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း။ <br>(ကျောင်းသား Status အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('mentor_report6')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            Mentor တစ်ဦးချင်းစီ၏ History<br> (Initial Registration, သက်တမ်းပြတ်ကာလ၊ Renew ပြန်လုပ်သည့်ကာလ)
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-right" id="teacher_school_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">Teacher / School</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('s_t_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကနဦးမှတ်ပုံတင်၊သက်တမ်းတိုး၊သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('s_t_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မြန်မာနိုင်ငံစာရင်းကောင်စီသင်တန်းကျောင်းနှင့် ကိုယ်ပိုင်သင်တန်းကျောင်းများတွင်<br> သင်ကြားနေသော သင်တန်းဆရာများစာရင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('s_t_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            Teacher/ School အတွက် မှတ်ပုံတင်ကတ်များ။
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="da_btn">
                                    DA Section
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="cpa_qulified_test_btn">
                                    CPA (Qualified Test) Section
                                </button>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-left" id="da_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">DA Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report1')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            သင်တန်းတက်ရောက်ခွင့်ရသူစာရင်း။ (ကျောင်းသားအမျိုးအစားအလိုက်၊ အက္ခရာစဥ်အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report2')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း။ <br>(ကျောင်းသားအမျိုးအစားအလိုက်၊ Moduleအလိုက်)
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report3')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            MAC ကျောင်းသားများအတွက် ကျောင်းခေါ်ချိန် ၆၀% တွက်ချက်မှုအစီရင်ခံစာများ။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report4')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းခေါ်ချိန် ပြည့်မီသူစာရင်း။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report5')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း။ <br>(ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်)
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report6')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲအောင်မြင်စာရင်း နှင့် ကျရှုံးစာရင်း။ <br>(ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်/ ကျောင်းအလိုက်)
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report7')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းသားတစ်ဦးချင်းစီ၏ သမိုင်းကြောင်းအားဖော်ပြသည့် Report များ။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report8')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            ကျောင်းသားကတ်များ၊ စာမေးပွဲဖြေဆိုခွင့်ကတ်ပြား၊ အမှတ်စာရင်းထုတ်ယူသည့်ပုံစံ၊<br> အောင်မြင်လက်မှတ်ကတ်ပြားများ။
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('da_report9')}}" class="btn btn-block sub-btn-col  btn-flat p-3" name="">
                                            စာမေးပွဲကြိမ်ရေ (၅)ကြိမ် ဖြေဆိုပြီးသော်လည်း Module နှစ်ခုလုံး <br>အောင်မြင်မှုမရှိသေးသူများစာရင်း၊ Module (၂)ခုအနက် (၁)ခု အောင်မြင်မှု <br>မရှိသေးသူများစာရင်း၊ တဆက်တည်း စာမေးပွဲဝင်ရောက်ဖြေဆိုမှုမရှိသူများစာရင်း <br>(ကျောင်းသားအမျိုးအစားအလိုက်/ စာဖြေဌာနအလိုက်/ Module အလိုက်/ ကျောင်းအလိုက်)
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-right" id="cpa_qulified_test_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">CPA (Qualified Test) Section</h5><hr class="header_hr">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('qualified_report1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက် လျှောက်ထားသူများစာရင်း၊<br> ဖြေဆိုခွင့်ရရှိသူများစာရင်း၊ ဖြေဆိုသူများစာရင်း၊ <br>အောင်မြင်သူများစာရင်း နှင့် ကျရှုံးသူများစာရင်း။
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('qualified_report2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            ကျောင်းသားတစ်ဦး၏ Application Form ပါအချက်အလက်များနှင့် သမိုင်းကြောင်း။
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="sr_personal_btn">
                                    တက်ရောက်ခွင့်ရသူများနှင့်ကိုယ်ပိုင်နံပါတ် ထုတ်ပြန့်ခြင်း
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="exam_btn">
                                    စာမေးပွဲဖြေဆိုခွင့်ရသူများ ထုတ်ပြန့်ခြင်း
                                </button>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-left" id="generate_sr_personal_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">တက်ရောက်ခွင့်ရသူများနှင့်ကိုယ်ပိုင်နံပါတ် ထုတ်ပြန့်ခြင်း</h5><hr class="header_hr">
                            <div class="card-body ">
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_app_list/da_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da One တက်ရောက်ခွင့်ရသူများ စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_app_list/da_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da Two တက်ရောက်ခွင့်ရသူများ စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_app_list/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One တက်ရောက်ခွင့်ရသူများ စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_app_list/cpa_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa Two တက်ရောက်ခွင့်ရသူများ စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card card-stats arrow-up-right" id="generate_exam_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း ထုတ်ပြန့်ခြင်း</h5><hr class="header_hr">
                            <div class="card-body ">
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/da_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da One စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/da_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da Two စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/cpa_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa Two စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('attend_exam_list/cpa_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa Two စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('publishes_entrance_exam_list/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One ဝင်ခွင့်စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('publishes_qualifiedtest_list')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            အရည်အချင်းစစ် စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-color btn-flat p-3" name="exam_result_btn">
                                    စာမေးပွဲအောင်စာရင်း ထုတ်ပြန်ခြင်း
                                </button>
                            </div>

                        </div>
                        <div class="card card-stats arrow-up-right" id="generate_exam_result_card" style="display:none; background-color:#f0f1f2; padding-bottom:10px;">
                            <h5 class="card-header">စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း ထုတ်ပြန့်ခြင်း</h5><hr class="header_hr">
                            <div class="card-body ">
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">From</div>
                                            <div class="col-md-6">
                                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3" align="center">To</div>
                                            <div class="col-md-6">
                                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('exam_result_list/da_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da One စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('exam_result_list/da_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Da Two စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('exam_result_list/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('exam_result_list/cpa_2')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa Two စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('publishes_entrance_exam_result/cpa_1')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            Cpa One ဝင်ခွင့်စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a target="_blank" href="{{url('publishes_qualifiedtest_result')}}" class="btn btn-block sub-btn-col btn-flat p-3" name="">
                                            အရည်အချင်းစစ် စာမေးပွဲဖြေဆိုအောင်မြင်သူများစာရင်း စာရင်းထုတ်ပြန်ရန်
                                        </a>
                                    </div>

                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-color{
            background-color: #6c767d;
        }
        .sub-btn-col{
            background-color: #2d4759;
        }
        .header_hr{
            margin-bottom: 0rem !important;
        }

        .arrow-up-left {
            display: block;
            position: relative;
            background: #FFFFFF;
            /* padding: 15px; */
            border: 1px solid #DDDDDD;
            margin-top: 20px;
        }
        .arrow-up-left:before, .arrow-up-left:after {
            content: '';
            display: block;
            position: absolute;
            bottom: 100%;
            width: 0;
            height: 0;
        }
        .arrow-up-left:before {
            left: 230px;
            border: 11px solid transparent;
            border-bottom-color: #000;
        }
        .arrow-up-left:after {
            left: 230px;
            border: 10px solid transparent;
            border-bottom-color: #000;
        }

        .arrow-up-right {
            display: block;
            position: relative;
            background: #FFFFFF;
            /* padding: 15px; */
            border: 1px solid #DDDDDD;
            margin-top: 20px;
        }
        .arrow-up-right:before, .arrow-up-right:after {
            content: '';
            display: block;
            position: absolute;
            bottom: 100%;
            width: 0;
            height: 0;
        }
        .arrow-up-right:before {
            right: 230px;
            border: 11px solid transparent;
            border-bottom-color: #000;
        }
        .arrow-up-right:after {
            right: 230px;
            border: 10px solid transparent;
            border-bottom-color: #000;
        }
    </style>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("input[name='start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });

            var clicks=0;
            $("button[name=cpa_papp_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#cpa_papp_card").show();
                }
                else{
                    $("#cpa_papp_card").hide();
                }
                clicks++;
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();


            })

            $("button[name=firm_name_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#firm_name_card").show();
                }
                else{
                    $("#firm_name_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=cpa_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#cpa_card").show();
                }
                else{
                    $("#cpa_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=article_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#article_card").show();
                }
                else{
                    $("#article_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=artical_mentor_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#artical_mentor_card").show();
                }
                else{
                    $("#artical_mentor_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=teacher_school_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#teacher_school_card").show();
                }
                else{
                    $("#teacher_school_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=da_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#da_card").show();
                }
                else{
                    $("#da_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })

            $("button[name=cpa_qulified_test_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#cpa_qulified_test_card").show();
                }
                else{
                    $("#cpa_qulified_test_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $('#generate_sr_personal_card').hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })
            $("button[name=sr_personal_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#generate_sr_personal_card").show();
                }
                else{
                    $("#generate_sr_personal_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_exam_card').hide();
                $("#generate_exam_result_card").hide();



            })
            $("button[name=exam_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#generate_exam_card").show();
                }
                else{
                    $("#generate_exam_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_sr_personal_card').hide();
                $("#generate_exam_result_card").hide();



            })
            $("button[name=exam_result_btn]").click( function(){
                if(clicks % 2 == 0){
                    $("#generate_exam_result_card").show();
                }
                else{
                    $("#generate_exam_result_card").hide();
                }
                clicks++;
                $("#cpa_papp_card").hide();
                $("#firm_name_card").hide();
                $("#cpa_card").hide();
                $("#article_card").hide();
                $("#artical_mentor_card").hide();
                $("#teacher_school_card").hide();
                $("#da_card").hide();
                $("#cpa_qulified_test_card").hide();
                $('#generate_exam_card').hide();


            })

        });

    </script>
@endpush
