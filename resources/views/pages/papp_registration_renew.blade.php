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
            <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
									<ul class="nav nav-tabs nav-justified pl-0 active_tab col-md-12 no-gutters" role="tablist">
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link active pl-0 pr-2" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
		                                  အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူအဖြစ်သက်တမ်းတိုးရန်လျှောက်ထားခြင်း
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                          အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူများ ဖြည့်သွင်းပေးရန်အချက်များ
		                                  </a>
		                              </li>
                                      
		                              
		                            </ul>
                            	<div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
                                    <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ၏ကိုယ်ရေးအချက်အလက်(အင်္ဂလိပ်ဘာသာဖြင့်ဖြည့်စွက်ပေးပါရန်)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('(က)အမည်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('(ခ)နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="nrc"  class="form-control  @error('name') is-invalid @enderror"  autofocus>
	                                          </div>
	                                      </div>
	                                      @error('name')
	                                          <span class="invalid-feedback" role="alert">
	                                              <strong>{{ $message }}</strong>
	                                          </span>
	                                      @enderror
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('(ဂ)အဘအမည်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('(ဃ)ပညာအရည်အချင်း') }}</label>
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
	                                      <label class="col-md-2 col-form-label">{{ __('(င)CPAအပတ်စဥ် /ကိုယ်ပိုင်အမှတ်)') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                          
                                          
	                                  
                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('(စ)ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                      </div>
	                                 
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်၊Fax ဖုန်းနံပါတ်') }}</label>
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
	                                    </div>
	                                    
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
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-2 col-form-label">ခုနှစ်အတွက်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
                                            <label class="col-md-2 col-form-label">ရက်စွဲပါမှတ်ပုံတင်အမှတ်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-3 col-form-label">ဖြင့်မှတ်ပုံတင်ခဲ့ပြီးဖြစ်ပါသည်။</label>
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
                                                                        <th class="less-font-weight">လုပ်ငန်းအပ်နှံသည့်ပုဂ္ဂိုလ်/ကုမ္ပဏီ/စီးပွားရေးအဖွဲ့အစည်း/လူမှုရေးအဖွဲ့အစည်း*</th>
                                                                        <th class="less-font-weight">စာရင်းကာလ**</th>
                                                                        <th class="less-font-weight">တာဝန်ယူဆောင်ရွက်သည့် Principal/Managin Partner/Partner အမှုထမ်း PPA ၏အမည်***</th>
                                                                        
                                                                        <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowAuditWork("audit_work")' value="+"></th>
                                                                    </tr>
                                                                <thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input type="text" name="audit_work_sr[]" class="form-control" ></td>
                                                                        <td><input type="text" name="audit_work_name[]" class="form-control" ></td>
                                                                        <td><input type="text" name="audit_work_list[]" class="form-control" ></td>
                                                                        <td><input type="text" name="audit_work_ppa[]" class="form-control" ></td>
                                                                        
                                                                        <td><input type="button" class="delete btn btn-sm btn-danger" onclick='delRowAuditWork("audit_work")'  value="X"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('* နှစ်အတွင်း လက်ခံ/ရရှိ Statutory Audit Work လုပ်ငန်းအားလုံးကို ထည့်သွင်းရန် ဖြစ်ပါသည်။လုပ်ငန်းအပ်နှံသည့် ပုဂ္ဂိုလ်/ကုမ္ပဏီ/စီးပွားရေးအဖွဲ့အစည်း/') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('လူမှုရေးအဖွဲ့အစည်း၏မှတ်ပုံတင်အမှတ်ကိုပါဖော်ပြရန် လိုအပ်ပါသည်။နှစ်အတွင်းလုပ်ငန်းမရှိလျှင်မရှိကြောင်း ဖော်ပြရန်ဖြစ်သည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('** ဆောင်ရွက်ပေးသည့်လုပ်ငန်း၏စာရင်းကာလဖော်ပြရန်ဖြစ်ပါသည်။ ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('*** ထို Statutory Audit Workကို ဦးဆောင်တာဝန်ယူဆောင်ရွက်သူ(Team Leader) PPA အမည်ကို ဖော်ပြရန်ဖြစ်ပါသည်။ ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ၏ဝန်ခံချက်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10 col-form-label">
                                                    (က)နှစ်အတွင်း လက်ခံဆောင်ရွက်ခဲ့သည့်လုပ်ငန်းများစာရင်းကိုအပြည့်အစုံကိုမှန်ကန်စွာဖော်ပြထားပါသည်။
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10 col-form-label">
                                                    
                                                    (ခ)လက်ခံဆောင်ရွက်ပေးသည့်လုပ်ငန်းအားလုံးအတွက် နှစ်အလိုက် Register ဖြင့်မှတ်တမ်းတင်ထားရှိပါသည်။ MAC မှလိုအပ်၍ တောင်းခံလျှင် တင်ပြနိုင်ပါသည်။
                                                       
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('အောက်ပါစာရွက်စာတမ်းများကို ပူးတွဲတင်ပြလျှက် လျှောက်ထားပါသည်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10 col-form-label">
                                                    
                                                    (က)လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)မှတ်ပုံတင်လက်မှတ်
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10 col-form-label">
                                                    (ခ)မှတ်ပုံတင်မည့် ပြက္ခဒိန်နှစ်မတိုင်မီနှစ်တွင် မြန်မာနိုင်ငံ၌ ၁၈၃ ရက်ထက်မနည်းနေထိုင်သူဖြစ်ကြောင်းဝန်ခံချက်
                                                       
                                                </div>
                                        </div>
                                        
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-8 col-form-label">
                                                    (ဂ)အခြားလုပ်ငန်းအဖွဲ့အစည်းတစ်ရပ်ရပ်တွင် အချိန်ပြည့် တာဝန်ထမ်းဆောင်နေသူ မဟုတ်ကြောင်းခံဝန်ချက်
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('(ဃ)လျှောက်ထားသည့်နှစ်အတွက် အများပြည်သူစာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းကို မိမိ၏ အဓိကအသက်မွေးဝမ်းကျောင်းလုပ်ငန်းအဖြစ် မြန်မာနိုင်ငံအတွင်း') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('တွင်လုပ်ကိုင်မည်ဖြစ်ကြောင်းခံဝန်ချက်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                
                                                <div class="col-md-10 col-form-label">
                                                (င)လုပ်ငန်းဆောင်ရွက်ရာတွင် မြန်မာနိုင်ငံစာရင်းကောင်စီ၏ ၉-၈-၂၀၁၈ ရက်စွဲပါအမိန့်ကြော်ငြာစာအမှတ် ၂၇/၂၀၁၈ နောက်ဆက်တွဲတွင် ဖော်ပြသည့် 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                
                                                <div class="col-md-10 col-form-label">
                                                စည်းကမ်းချက်များနှင့်စပ်လျဥ်း ၍လိုက်နာခြင်းရှိ/မရှိ
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                
                                                <div class="col-md-10 col-form-label">
                                                (စ)စတင်လျှောက်ထားသည့်နေ့မတိုင်မီ ၁၂ လအတွင်း စဥ်ဆက်မပြတ်လေ့လာသင်ယူမှု(Continuous Professional Development-CPD)မှတ်တမ်း
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3 col-form-label">(ဆ)ပြည်တွင်းအခွန်များဦးစီးဌာနသို့ </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                                <div class="col-md-5 col-form-label">
                                                ပြက္ခဒိန်နှစ်အတွက် အခွန်ပေးဆောင်မှု အထောက်အထား(ရှိလျှင်)
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-8 col-form-label">(သို့မဟုတ်)အခွန်ကင်းရှင်းကြောင်းထောက်ခံချက်</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" id="date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
	                                    <div class="row">
                                            <label class="col-md-5 col-form-label"></label>
                                            <label class="col-md-4 col-form-label">{{ __(' မြန်မာနိုင်ငံစာရင်းကောင်စီရေးသွင်းရန်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-6 col-form-label">{{ __('ဤလျှောက်လွှာနှင့်ပူးတွဲပါပုံစံ/စာရွက်စာတမ်းများကို စိစစ်ပြီးလက်ခံပါသည်။ လက်ခံအမှတ် ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text"class="form-control" >
                                                </div></div>
                                                
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-4 col-form-label">{{ __('ပူးတွဲပါပုံစံ/စာရွက်စာတမ်းများ') }}</label>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text"class="form-control" >
                                                </div></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" id="date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
 
	                              </div>
                                  <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table profile table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                        <th class="less-font-weight" rowspan="2">‌အကြောင်းအရာ</th>
                                                                        <th class="less-font-weight" colspan="2"></th>
                                                                        
                                                                        
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>၁။</td>
                                                                        <td>မိမိ၏စာရင်းလုပ်ငန်းအတွက် အများသိရှိစေရန်ကြော်ငြာရာတွင် မိမိကိုယ်တိုင်တာဝန်ခံဆောင်ရွက်ပေးနိုင်သည်ထက် သို့မဟုတ် အတွေ့အကြုံထက် ပိုမိုထုတ်ဖော်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂။</td>
                                                                        <td>အခြားစာရင်းလုပ်ငန်းလုပ်ကိုင်သူအား ထိခိုက်နစ်နာစေသည့် အချက်အလက်ဖြင့် မိမိလုပ်ငန်းကို ကြော်ငြာခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၃။</td>
                                                                        <td>Global network/ Association name အသုံးပြု၍ စာရင်းစစ်လုပ်ငန်းများအတွက် ကြော်ငြာခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၄။</td>
                                                                        <td>မိမိဝန်ဆောင်မှုမပေးသည့်အခြား Client များ အမည်စာရင်းများအား ထည့်သွင်း ကြော်ငြာခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၅။</td>
                                                                        <td>လုပ်ငန်းအပ်နှံသူ၏ အမြတ်/ ဝင်ငွေပေါ်တွင် အခြေတည်၍ လုပ်ခငွေ/အခကြေးငွေတောင်းယူခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၆။</td>
                                                                        <td>ကောင်စီကလိုအပ်၍ တောင်းဆိုသည့် စာရင်းများနှင့်စပ်လျဥ်းသည့် အချက်အလက်များကို တင်ပြပေးရန် ပျက်ကွက်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၇။</td>
                                                                        <td>မိမိတစ်ဦးတည်းသာ သိရှိစေသော အကြောင်းအချက်များကို အလုပ်ရှင် ခွင့်ပြုချက်မရဘဲ သို့မဟုတ် တည်ဆဲဥပဒေတစ်ရပ်အရ မဟုတ်ဘဲ အခြားသူထံထုတ်ဖော်အသိပေးခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၈။</td>
                                                                        <td>မိမိအားပေးအပ်သည့် စာရင်းပညာဆိုင်ရာ အလုပ်ဝတ္တရားများကို ဆောင်ရွက်ရာတွင် ထိုက်သင့်သော သတိပြုခြင်းမရှိဘဲ ဆောင်ရွက်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၉။</td>
                                                                        <td>မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၂(ဍ) ပါ သတ်မှတ်ပြဌာန်းသည့် စာရင်းလုပ်ငန်းများ၊Statutory Audit(including component auditor performance),Forensic Audit,Review Engagement,Assurance Engagement, Agreed upon Audit Procedures(including Independent Internal Audit)စာရင်းလုပ်ငန်းများနှင့် မြန်မာနိုင်ငံစာရင်းကောင်စီက အခါအားလျော်စွာ သတ်မှတ်သည့်လုပ်ငန်းများကို အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူမဟုတ်သူများနှင့် တွဲဖက်ဖွဲ့စည်းဆောင်ရွက်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၀။</td>
                                                                        <td>စာရင်းဖော်ပြချက်၊ ကြေညာချက်၊ လုပ်ငန်းအလားအလာညွှန်းတမ်း၊ ရှင်းတမ်း၊ အစီရင်ခံစာငွေစာရင်းစာအုပ်၊ လက်မှတ် သို့မဟုတ် ပုံစံတွင် ပြင်ပစာရင်းစစ်အဖြစ် ထောက်ခံလက်မှတ်ရေးထိုးခြင်းများ</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၁။</td>
                                                                        <td>စဥ်(၉)နှင့်(၁၀)ပါ စာရင်းလုပ်ငန်းအမျိုးအစားများအား သက်တမ်းရှိသည့် အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်မရှိဘဲ လုပ်ကိုင်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၂။</td>
                                                                        <td>စာရင်းစစ်လုပ်ငန်းအမည်ဖြင့် မှတ်ပုံတင်ထားသည့် စာရင်းစစ်လုပ်ငန်းအဖွဲ့ဝင်ဖြစ်သူသည် အခြားစာရင်းစစ်လုပ်ငန်းတစ်ခု၌ အဖွဲ့ဝင်အဖြစ်သော်လည်းကောင်း၊ မိမိကိုယ်ပိုင်စာရင်းစစ်လုပ်ငန်းအဖြစ်သော်လည်းကောင်း ဆောင်ရွက်ခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၃။</td>
                                                                        <td>စာရင်းစစ်အစီရင်ခံစာတွင်လက်မှတ်ရေးထိုးရာ၌ အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူတစ်ဦးသည် အများပြည်သူပေးသို့ စာရင်းဝန်ဆောင်မှုပေးသည့် စာရင်းလုပ်ငန်းအဖွဲ့တစ်ခုထက်ပို၍ လက်မှတ်ထိုးခြင်း</td>
                                                                        
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၄။</td>
                                                                        <td>အကျိုးစီးပွားပါဝင်ပတ်သက်မှု၊ အကျိုးစီးပွားချင်း ပဋိပက္ ဖြစ်မှု၊ ဆန့်ကျင်ဖက်ဖြစ်မှု၊လွတ်လပ်မှုကို ထိခိုက်စေမှု ဖြစ်စေသော လုပ်ငန်းများကို လက်ခံဆောင်ရွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၅။</td>
                                                                        <td>ယခင်စာရင်းစစ်အဖြစ်ဆောင်ရွက်ခဲ့သူနှင့် ဆက်သွယ်ဆောင်ရွက်ခြင်းမပြုဘဲ ထိုစာရင်းစစ် ရာထူးကို လက်ခံခြင်း သို့မဟုတ် အခြားသူတစ်ဦးဆောင်ရွက်နေသည့် စာရင်းလုပ်ငန်းကို မိမိအတွက် တောင်းယူခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၆။</td>
                                                                        <td>စာရင်းစစ်များခန့်ထားခြင်းကိစ္ နှင့်စပ်လျဥ်း ၍မြန်မာနိုင်ငံ ကုမ္ပဏီများအက်ဥပဒေ သို့မဟုတ် သက်ဆိုင်ရာအခြားဥပဒေပါပြဌာန်းချက်များနှင့်ကိုက်ညီခြင်းမရှိသည့်ခန့်ထားမှုများကို လက်ခံဆောင်ရွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၇။</td>
                                                                        <td>ကုမ္ပဏီညွှန်းတမ်းတွင်သော်လည်းကောင်း၊ အခြားတစ်နည်းနည်းဖြင့်သော်လည်းကောင်း ပုံနှိပ်ထုတ်ဝေရန် အနာဂတ်အမြတ်ငွေကို ခန့်မှန်းတွက်ချက်အတည်ပြုပေးခြင်း သို့မဟုတ် တစ်နှစ်စီအတွက် အရှုံးအမြတ်များကို သီးခြားဖော်ပြခြင်းမပြုဘဲ တစ်နှစ်ထက်ပိုသောနှစ်များအတွက် ပျှမ်းမျှအမြတ်ငွေရှင်းတမ်းများကို ပုံနှိပ်ထုတ်ဝေရန်အတည်ပြုပေးခြင်း၊ သို့ရာတွင် လုပ်ငန်းလိုအပ်ချက်အရ ရေးဆွဲတင်ပြမည့် ကိစ္ ရပ်များနှင့်သက်ဆိုင်ခြင်း မရှိစေရ</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၈။</td>
                                                                        <td>လုပ်ငန်းရှင်ကယုံမှတ်အပ်နှံထားသည့် ငွေကြေးများကို ကိုင်တွယ်ခန့်ခွဲရပါက ယင်းငွေကြေးများကို စနစ်တကျ သုံးစွဲခန့်ခွဲကြောင်း သိသာပေါ်လွင်စေရေးအတွက် လိုအပ်သော စာရင်းမှတ်တမ်းများ၊သီးခြားဘဏ်စာရင်းများ ဖွင့်လှစ်ထိန်းသိမ်းရန် ပျက်ကွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၁၉။</td>
                                                                        <td>လုပ်ငန်း၏အမြတ် သို့မဟုတ် အရှုံးကို မမှန်မကန်ဖော်ပြထားခြင်းကို သိလျှက်နှင့် ထုတ်ဖော်တင်ပြရန် ပျက်ကွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၀။</td>
                                                                        <td>စာရင်းပညာရှင်ဆိုင်ရာ ကျင့်ဝတ်သိက္ာ နှင့်စာရင်းလုပ်ငန်းဆိုင်ရာကျင့်ဝတ်စည်းကမ်းများ၊စံများကို လိုက်နာကျင့်သုံးမှုမရှိခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၁။</td>
                                                                        <td>စာရင်းလုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်ကို ကာလသတ်မှတ်၍ ရုပ်သိမ်းခြင်းခံရသူ သို့မဟုတ် ပယ်ဖျက်ခြင်းခံရသူသည် စည်းကမ်းထိန်းသိမ်းရေးကော်မတီက ဆုံးဖြတ်ချက်ချသည့်နေ့မှ ရက်ပေါင်း ၃၀အတွင်း စာရင်းလုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်ကို ကောင်စီထံပြန်လည်အပ်နှံရန် ပျက်ကွက်ခြင်း၊(ရှိလျှင်)</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၂။</td>
                                                                        <td>မည်သည့်စာရင်းဖော်ပြချက်၊ကြေညာချက်၊ရှင်းတမ်း၊အစီရင်ခံစာ၊ငွေစာရင်းစာအုပ်၊လက်မှတ်သို့မဟုတ် ပုံစံတွင်မဆို မဟုတ်မမှန်သည့်အချက်ကို သိလျှက်နှင့်ထည့်သွင်းဖော်ပြခြင်း သို့မဟုတ် ထောက်ခံလက်မှတ်ရေးထိုးခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၃။</td>
                                                                        <td>မိမိကိုယ်တိုင်သော်လည်းကောင်း၊မိမိလုပ်ငန်း၏ အစုဝင်ကသော်လည်းကောင်း၊မိမိ၏ဝန်ထမ်းကသော်လည်းကောင်း၊ကြီးကြပ်ကွပ်ကဲ၍ ပြည့်စုံစွာ စစ်ဆေးထားခြင်းမရှိသော လက်ကျန်ရှင်းတမ်းအရှုံး/အမြတ်စာရင်း သို့မဟုတ် မည်သည့်စာရင်းဇယားကိုမဆို အတည်ပြုပေးခြင်း သို့မဟုတ် မိမိကိုယ်စား လက်မှတ်ရေးထိုးစေခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၄။</td>
                                                                        <td>စာရင်းစစ်လုပ်ငန်းအမည်တွင် နိုင်ငံခြားအဖွဲ့အစည်း၏အမည်ကို တိုက်ရိုက်သော်လည်းကောင်း၊ဆင်တူရိုးမှားသော်လည်းကောင်း၊တစ်စိတ်တစ်ဒေသသော်လည်းကောင်းသုံးစွဲခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၅။</td>
                                                                        <td>မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့်အညီ မြန်မာနိုင်ငံစာရင်းကောင်စီက ထုတ်ပြန်ထားသော အမိန့်ကြော်ငြာစာများအရ နိုင်ငံခြားသားများလုပ်ကိုင်ခွင့်မရှိသော စာရင်းလုပ်ငန်းများကို မိမိအမည်ခံ၍ နိုင်ငံခြားသားများအတွက် ဆောင်ရွက်ပေးခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၆။</td>
                                                                        <td>လက်မှတ်ရပြည်သူ့စာရင်းကိုင် မဟုတ်သူအတွက် သို့မဟုတ်လက်မှတ်ရပြည်သူ့စာရင်းကိုင်မဟုတ်သူနှင့် ပူးပေါင်းလုပ်ကိုင်၍ စာရင်းစစ်အနေဖြင့် ရေးရှင်းတမ်းများအား လက်မှတ်ရေးထိုးပေးခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၇။</td>
                                                                        <td>ငွေကြေးခဝါချမှု၊ အကြမ်းဖက်မှုအား ငွေကြေးထောက်ပံ့မှု၊ပြစ်မှုတစ်ရပ်ရပ်နှင့် စပ်ဆိုင်နိုင်သည်ဟု သံသယဖြစ်ရမှု ဥပဒေတစ်ရပ်ရပ်ကို ချိုးဖောက်ရာရောက်သည်ဟု မှတ်ယူရမှု(Suspicipus and unusual transaction/ events) စသည်တို့ကို တွေ့ရှိရပါက တရားမဝင်နည်းလမ်းဖြင့် ရရှိသည့်ငွေကြေးနှင့်ပစ္စည်းများ ဗဟိုထိန်းချုပ်ရေးအဖွဲ့ထံ ချက်ချင်း လျှို့ဝှက်သတင်းပေးပို့ရန် ပျက်ကွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၈။</td>
                                                                        <td>Public Listed Companies နှင့် Public Interest ပါဝင်သော Companies (ဥပမာ-Banking,Insurance Company, Real Estate Developer) များတွင် စာရင်းစစ်အဖြစ် ဆောင်ရွက်ပေးသူများသည် ယင်းလုပ်ငန်းများနှင့်သက်ဆိုင်သော အခြားဝန်ဆောင်မှုများကိုဆောင်ရွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>၂၉။</td>
                                                                        <td>မြန်မာနိုင်ငံစာရင်းစစ်စံ/ နိုင်ငံတကာစာရင်းစစ်စံပြဌာန်းချက်များနှင့် မညီညွတ်သောကိစ္စရပ်များဆောင်ရွက်ခြင်း</td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">ရှိ</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">မရှိ</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                </div>
                                    <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('PPA မှတ်ပုံတင်အမှတ်') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                </div>
                                    <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('Firm Name') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                </div>
                                    <div class="row">
                                        <div class="col-md-11 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
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
    
@endpush
