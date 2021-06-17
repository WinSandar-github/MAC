@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'papp_registration_renew'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('papp_register_renew_form1') }}
            </div>
        </div>
            <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ၏ကိုယ်ရေးအချက်အလက်(အင်္ဂလိပ်ဘာသာဖြင့်ဖြည့်စွက်ပေးပါရန်)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(က)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
	                                      <div class="col-md-7">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(ခ)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-7">
                                                <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                                    <div class="col-md-2 col-5 pr-1">
                                                        <select class="form-control" name="nrc_state_region" id="nrc_state_region" style="padding-top: 0px; margin-top: 0px !important; margin-bottom: 0px;">
                                                            @foreach($nrc_regions as $region)
                                                                <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                                    {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-7 px-1">
                                                        <select class="form-control" name="nrc_township" id="nrc_township" style="margin-top: 0px; margin-bottom: 0px;">
                                                            @foreach($nrc_townships as $township)
                                                                <option value="{{ $township['township_mm'] }}">
                                                                    {{ $township['township_mm'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 col-5 px-1">
                                                        <select class="form-control" name="nrc_citizen" id="nrc_citizen" style="margin-top: 0px; margin-bottom: 0px;">
                                                            @foreach($nrc_citizens as $citizen)
                                                            <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                                {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-5 col-7 pl-1">
                                                        <input type="text" name="nrc_number" id="nrc_number" pattern=".{6,6}" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  maxlength="6" minlength="6" placeholder="" style="height: 38px">
                                                    </div>
                                                </div>
                                            </div>
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(ဂ)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်') }}</label>
	                                      <div class="col-md-7">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(ဃ)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                      <div class="col-md-2">
                                                <input type="checkbox" name="" >
                                                <label class="form-check-label">CPA</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" name="" >
                                                <label class="form-check-label">RA</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" name="" >
                                                <label class="form-check-label">အသိအမှတ်ပြုပြည်ပဘွဲ့</label>
                                            </div>
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(င)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('CPAအပတ်စဥ် /ကိုယ်ပိုင်အမှတ်') }}</label>
	                                      <div class="col-md-7">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                          
                                          
	                                  
                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-1 col-form-label">{{ __('(စ)') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                      <div class="col-md-7">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                      </div>
	                                 
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('Fax နံပါတ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
	                                    </div></br>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-6 form-check-label">{{ __('ကျွန်ုပ်သည် အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းလုပ်ကိုင်သူအဖြစ်') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-2 col-form-label">ခုနှစ်အတွက်</label>
                                            
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                        
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="papprenew_dateone" placeholder="dd-mm-yyyy" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-2 col-form-label">ရက်စွဲပါ မှတ်ပုံတင်အမှတ်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-3 col-form-label">ဖြင့်မှတ်ပုံတင်ခဲ့ပြီးဖြစ်ပါသည်။</label>
	                                    </div>
	                                    <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-5 col-form-label">ခုနှစ်အတွက်မှတ်ပုံတင်သက်တမ်းတိုးပေးပါရန် လျှောက်ထားပါသည်။</label>
                                            <label class="col-md-3 col-form-label"></label>
                                        </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-8 col-form-label">{{ __('ကျွန်ုပ်သည်အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်ရာတွင်') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-8">
                                                    <div >
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">လုပ်ငန်းအမည် Firm Name အသုံးမပြူပါ။</label>
                                                       
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    အသုံးပြုမည့်လုပ်ငန်းအမည် Firm Name, လုပ်ငန်းအမျိုးအစားနှင့် မိမိ၏အဆင့်မှာအောက်ပါအတိုင်းဖြစ်ပါသည်
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    လုပ်ငန်းအမည်
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    လုပ်ငန်းအမျိုးအစား(တစ်ဦးတည်းပိုင်/အစုစပ်/ ကုမ္ပဏီစသည်)
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    အဆင့်(ဦးစီးပိုင်ရှင်/ဦးဆောင်အဖွဲ့ဝင်/သာမန်အစုဝင် စသည်)
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="" >
                                                    <label>ဝန်ထမ်းအနေဖြင့်ဆောင်ရွက်နေသည့်လုပ်ငန်းအမည်</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                               
                                                
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                            <label class="col-md-1 col-form-label">{{ __('၂၀') }}</label>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                            <label class="col-md-8 col-form-label">{{ __('ပြက္ခဒိန်နှစ်အတွင်း အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းကို ဦးစီးပိုင်ရှင်/ဦးဆောင်အဖွဲ့ဝင်/သာမန်အစုဝင်/အဖွဲ့') }}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-6 col-form-label">{{ __('ခေါင်းဆောင်အနေဖြင့်ကျွန်ုပ်လက်ခံဆော်ရွက်ခဲ့သည့် Statutory Audit Work စုစုပေါင်း') }}</label>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                                <label class="col-md-3 col-form-label">{{ __('ခု ရှိပါသည်။အဆိုပါ Statutory Audit ') }}</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('Work အပြည့်အစုံကို  အောက်ပါဇယားအတွင်း ထုတ်ဖော်ကြေညာပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table class="table audit_work table-bordered input-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">စဥ်</th>
                                                                        <th class="less-font-weight">လုပ်ငန်းအပ်နှံသည့်ပုဂ္ဂိုလ်/ကုမ္ပဏီ/စီးပွားရေးအဖွဲ့အစည်း/လူမှုရေးအဖွဲ့အစည်း<b>*</b></th>
                                                                        <th class="less-font-weight">စာရင်းကာလ<b>**</b></th>
                                                                        <th class="less-font-weight">တာဝန်ယူဆောင်ရွက်သည့် Principal/Managin Partner/Partner အမှုထမ်း PPA ၏အမည်<b>***</b></th>
                                                                        
                                                                        <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowAuditWork("audit_work")' value="+"></th>
                                                                    </tr>
                                                                <thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" name="audit_work_name[]" class="form-control" ></td>
                                                                        <td><input type="text" name="audit_work_list[]" class="form-control" ></td>
                                                                        <td><input type="text" name="audit_work_ppa[]" class="form-control" ></td>
                                                                        
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label"><b>* </b>{{ __(' နှစ်အတွင်း လက်ခံ/ရရှိ Statutory Audit Work လုပ်ငန်းအားလုံးကို ထည့်သွင်းရန် ဖြစ်ပါသည်။လုပ်ငန်းအပ်နှံသည့် ပုဂ္ဂိုလ်/ကုမ္ပဏီ/စီးပွားရေးအဖွဲ့အစည်း/') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('လူမှုရေးအဖွဲ့အစည်း၏မှတ်ပုံတင်အမှတ်ကိုပါဖော်ပြရန် လိုအပ်ပါသည်။နှစ်အတွင်းလုပ်ငန်းမရှိလျှင်မရှိကြောင်း ဖော်ပြရန်ဖြစ်သည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label"><b>**</b>{{ __(' ဆောင်ရွက်ပေးသည့်လုပ်ငန်း၏စာရင်းကာလဖော်ပြရန်ဖြစ်ပါသည်။ ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label"><b>***</b>{{ __(' ထို Statutory Audit Workကို ဦးဆောင်တာဝန်ယူဆောင်ရွက်သူ(Team Leader) PPA အမည်ကို ဖော်ပြရန်ဖြစ်ပါသည်။ ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ၏ဝန်ခံချက်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(က)</div>
                                                <div class="col-md-9 col-form-label">
                                                    နှစ်အတွင်း လက်ခံဆောင်ရွက်ခဲ့သည့်လုပ်ငန်းများစာရင်းကိုအပြည့်အစုံကိုမှန်ကန်စွာဖော်ပြထားပါသည်။
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(ခ)</div>
                                                <div class="col-md-9 col-form-label">
                                                    
                                                    လက်ခံဆောင်ရွက်ပေးသည့်လုပ်ငန်းအားလုံးအတွက် နှစ်အလိုက် Register ဖြင့်မှတ်တမ်းတင်ထားရှိပါသည်။ MAC မှလိုအပ်၍ တောင်းခံလျှင် တင်ပြနိုင်ပါသည်။
                                                       
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('အောက်ပါစာရွက်စာတမ်းများကို ပူးတွဲတင်ပြလျှက် လျှောက်ထားပါသည်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(က)</div>
                                                <div class="col-md-5 col-form-label">
                                                    
                                                    လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)မှတ်ပုံတင်လက်မှတ်
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(ခ)</div>
                                                <div class="col-md-9 col-form-label">
                                                    မှတ်ပုံတင်မည့် ပြက္ခဒိန်နှစ်မတိုင်မီနှစ်တွင် မြန်မာနိုင်ငံ၌ ၁၈၃ ရက်ထက်မနည်းနေထိုင်သူဖြစ်ကြောင်းဝန်ခံချက်
                                                       
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-7"></div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(ဂ)</div>
                                                <div class="col-md-9 col-form-label">
                                                    အခြားလုပ်ငန်းအဖွဲ့အစည်းတစ်ရပ်ရပ်တွင် အချိန်ပြည့် တာဝန်ထမ်းဆောင်နေသူ မဟုတ်ကြောင်းခံဝန်ချက်
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-7"></div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">(ဃ)</label>
                                            <label class="col-md-9 col-form-label">{{ __('လျှောက်ထားသည့်နှစ်အတွက် အများပြည်သူစာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းကို မိမိ၏ အဓိကအသက်မွေးဝမ်းကျောင်းလုပ်ငန်းအဖြစ်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 col-form-label"></label>
                                            <label class="col-md-5 col-form-label">{{ __(' မြန်မာနိုင်ငံအတွင်းတွင်လုပ်ကိုင်မည်ဖြစ်ကြောင်းခံဝန်ချက်') }}</label>
                                            <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(င)</div>
                                                <div class="col-md-10 col-form-label">
                                                လုပ်ငန်းဆောင်ရွက်ရာတွင် မြန်မာနိုင်ငံစာရင်းကောင်စီ၏ ၉-၈-၂၀၁၈ ရက်စွဲပါအမိန့်ကြော်ငြာစာအမှတ် ၂၇/၂၀၁၈ နောက်ဆက်တွဲတွင် 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>                                                
                                                <div class="col-md-5 col-form-label"> ဖော်ပြသည့်စည်းကမ်းချက်များနှင့်စပ်လျဥ်း ၍လိုက်နာခြင်းရှိ/မရှိ</div>
                                                <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="no"> No
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(စ)</div>
                                                <div class="col-md-9 col-form-label">
                                                စတင်လျှောက်ထားသည့်နေ့မတိုင်မီ ၁၂ လအတွင်း စဥ်ဆက်မပြတ်လေ့လာသင်ယူမှု
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>                                                
                                                <div class="col-md-5 col-form-label">(Continuous Professional Development-CPD)မှတ်တမ်း</div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">(ဆ)</div>
                                                <div class="col-md-3 col-form-label">ပြည်တွင်းအခွန်များဦးစီးဌာနသို့ </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                                <div class="col-md-4 col-form-label">
                                                ပြက္ခဒိန်နှစ်အတွက် အခွန်ပေးဆောင်မှု 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">အထောက်အထားရှိလျှင် (သို့မဟုတ်) အခွန်ကင်းရှင်းကြောင်းထောက်ခံချက်</div>
                                            <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-6 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="papprenew_datetwo" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                  
                            </div>


                            <div class="card-footer ">
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>



    <script>
         var mmnrc_regions = {!! json_encode($nrc_regions) !!};
        // get NRC Townships data from myanmarnrc.php config file
        var mmnrc_townships = {!! json_encode($nrc_townships) !!};
        // get NRC characters data from myanmarnrc.php config file
        var mmnrc_characters = {!! json_encode($nrc_characters) !!};
        // get language data from myanmarnrc.php config file
        var mmnrc_language = "{{ $nrc_language }}";
    </script>
@endsection

@push('scripts')
<script>
    
    $(document).ready(function (e) {
        createDatepicker("papprenew_dateone");
        createDatepicker("papprenew_datetwo");
        createDatepicker("papprenew_datethree");
        
    });

</script>
@endpush
