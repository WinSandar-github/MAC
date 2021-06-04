@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'school_registration'
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
		                                  ကျောင်းဖွင့်လှစ်လုပ်ကိုင်ခွင့်လျှောက်လွှာ
		                                  </a>
		                              </li>
		                              
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                          သင်တန်းကျောင်းအချက်အလက်များ
                                          
		                                  </a>
		                              </li>
                                      
                                      <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                                          အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ 
		                                  </a>
		                              </li>
                                      <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
                                          ကျောင်းမှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ
		                                  </a>
		                              </li>
		                              
		                            </ul>
                            	<div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
                                    <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ၏အချက်အလက်များ') }}</label>
	                                      
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="nrc"  class="form-control  @error('name') is-invalid @enderror" autofocus>
	                                          </div>
	                                      </div>
	                                      @error('name')
	                                          <span class="invalid-feedback" role="alert">
	                                              <strong>{{ $message }}</strong>
	                                          </span>
	                                      @enderror
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('လုပ်ငန်းဖွဲ့စည်းမှုပုံစံကျောင်းကို အောက်ဖော်ပြပါလုပ်ငန်းဖွဲ့စည်းမှုပုံစံဖြင့်ဆောင်ရွက်ပါမည်(ဆိုင်ရာတွင်အမှန်ခြစ် ခြစ်ရန်)') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">တစ်ဦးတည်းပိုင်လုပ်ငန်း</label>
                                                </div>
                                                
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">နိုင်ငံသားများပိုင်အစုစပ်လုပ်ငန်း</label>
                                                </div>
                                                
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">တည်ဆဲကုမ္ပဏီများအက်ဥပဒေအရတည်ထောင်ထားသောလီမိတက်ကုမ္ပဏီ</label>
                                                </div>
                                                
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">တည်ဆဲဥပဒေတစ်ရပ်ရပ်နှင့်အညီဖွဲ့စည်းထားရှိသောလုပ်ငန်းအဖွဲ့အစည်း</label>
                                                </div>
                                                
                                                
                                        </div>
                                       
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('လျှောက်ထားသူ/အဖွဲ့အစည်း၏နောက်ခံသမိုင်း(သီးခြားစာရွက်ဖြင့်ဖော်ပြရန်)') }}</label>
                                            
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('မှတ်ချက်။လျှောက်လွှာကြေး ၁၀၀၀၀ကျပ်၊မှတ်ပုံတင်ကြေး ၅၀၀,၀၀၀ကျပ်၊နှစ်စဥ်ကြေး ၃၀၀,၀၀၀ကျပ်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-8 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
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
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ကျောင်းအမည်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('သင်ကြားမည့်သင်တန်း') }}</label>
	                                        <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">DA I</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">DA II</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">CPA I</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">CPA II</label>
	                                        </div>
	                                     
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ကျောင်းတည်နေရာလိပ်စာ') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပိုင်ဆိုင်မှုပုံစံ') }}</label>
	                                        <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">ကိုယ်ပိုင်</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">အငှား</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">တွဲဖက်သုံး</label>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ကျောင်းခွဲတည်နေရာလိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပိုင်ဆိုင်မှုပုံစံ') }}</label>
	                                        <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">ကိုယ်ပိုင်</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">အငှား</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">တွဲဖက်သုံး</label>
                                            </div>
	                                  </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းအဆောက်အဦး(အဆောက်အဦးအမျိုးအစား/အတိုင်းအတာ/အထပ်အရေအတွက်)') }}</label>
	                                        
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <div class="col-md-10">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('စာသင်ခန်း(အခန်းအရေအတွက်/အတိုင်းအတာ/ဝင်ဆန့်သင်တန်းသား/လေအေးပေးစက်)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <div class="col-md-10">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('သန့်စင်ခန်း(အမျိုးအစား/အရေအတွက်)}') }}</label>
                                            
                                        </div>
                                          
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                            
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('စီမံရုံးခန်း(အခန်းအရေအတွက်/အတိုင်းအတာ)') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-8 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
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
                                  
                                  <div class="tab-pane fade" id="link3" aria-expanded="true">
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)နှင့်ကျောင်းစီမံအုပ်ချုပ်သူများ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_founder table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">ဆက်သွယ်ရန်လိပ်စာ</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolFounder("school_founder")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="school_founder_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_founder_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_founder_passort[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_address[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_phone[]" class="form-control">
                                                                    </td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger " onclick='delRowShoolFounder("school_founder")'  value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းစီမံအုပ်ချုပ်သူများ') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_manager table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">တာဝန်</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolManager("school_manager")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="school_manager_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_manager_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_manager_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_duty[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_phone[]" class="form-control">
                                                                    </td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger " onclick='delRowShoolManager("school_manager")' value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('အဖွဲ့အစည်း၏အလုပ်အမှုဆောင်အဖွဲ့ဝင်များ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_executive table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">တာဝန်</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolExecutive("school_executive")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="school_executive_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_executive_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_executive_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_duty[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_phone[]" class="form-control">
                                                                    </td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger" onclick='delRowShoolExecutive("school_executive")'  value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('သင်တန်းဆရာများ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_teacher table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">သင်တန်းဆရာမှတ်ပုံတင်အမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">သင်ကြားမည့်ဘာသာရပ်(များ)</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolTeacher("school_teacher")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="school_teacher_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_teacher_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_teacher_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_tp[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_subject[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_phone[]" class="form-control">
                                                                    </td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger " onclick='delRowShoolTeacher("school_teacher")' value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-8 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
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
                                  <div class="tab-pane fade" id="link4" aria-expanded="true">
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="nrc"  class="form-control  @error('name') is-invalid @enderror" autofocus>
	                                          </div>
	                                      </div>
	                                      
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ကျောင်းမှတ်ပုံတင်အမှတ်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control"  >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ကျောင်းအမည်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('သင်ကြားမည့်သင်တန်း') }}</label>
	                                        <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">DA I</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">DA II</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">CPA I</label>
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">CPA II</label>
	                                        </div>
	                                     
	                                  </div>
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                            </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control"  >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control"  >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('ယခင်မှတ်ပုံတင်ထားသည့်အချက်အလက်များမှပြောင်းလဲလိုသည့်အချက်အလက်များ') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-3 col-form-label"></label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-3 col-form-label"></label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-3 col-form-label"></label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-3 col-form-label"></label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-3 col-form-label"></label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-8 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" id="date" class="form-control" >
                                                </div>
                                            </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('မှတ်ချက်။လျှောက်လွှာကြေး ၁၀၀၀၀ကျပ်၊မှတ်ပုံတင်ကြေး ၅၀၀,၀၀၀ကျပ်၊နှစ်စဥ်ကြေး ၃၀၀,၀၀၀ကျပ်၊နောက်ကျကြေး ၁,၆၀၁,၀၀၀ကျပ်၊သက်တမ်းပြတ်ကြေး ၁၀၀,၀၀၀ကျပ်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
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
