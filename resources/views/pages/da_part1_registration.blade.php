@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part1_registration'
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
		                                  သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                          မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ)
		                                  </a>
		                              </li>
                                      <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                                          မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
                                            သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ
		                                  </a>
		                              </li><li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link5" role="tablist" aria-expanded="false">
                                            သင်တန်းပြီးဆုံး(အောင်/ကျရှုံး)ကြောင်း အထောက်အထားတောင်းခံမှူပုံစံ
		                                  </a>
		                              </li>

		                            </ul>
                            	
                                <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
                                    <div class="tab-pane fade show active m-3" id="link1" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2">
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-2 col-form-label">{{ __('အမှတ်စဥ်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                            <div class="col-md-2"></div>
                                            <label class="col-md-2 col-form-label">{{ __('ပညာသင်နှစ်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                        </div>
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control">
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
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="daone_birthone" placeholder="dd-mm-yyyy" class="form-control" >
                                                    </div>
                                                </div>
	                                      </div>
                                          <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လက်ရှိအလုပ်အကိုင်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဌာန/အဖွဲ့အစည်း/ကုမဏီအမည်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လစာ/လစာနှုန်း') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရုံးလိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('မိမိသည်နိုင်ငံ့ဝန်ထမ်း ဟုတ်/ မဟုတ်ပါ') }}</label>
	                                      <div class="col-md-2">
                                                        <input type="radio" name="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" value="no"> No
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ/ဖုန်းနံပါတ်/အီးမေးလ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အသိမှတ်ပြုတက္ကသိုလ် တစ်ခုမှ အောင်မြင်ပြီးခဲ့သော') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                    (က)တက္ကသိုလ် အမည်
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        (ခ)ဘွဲ့အမည်
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                    (ဂ)အဓိကဘာသာ
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                    (ဃ)နှစ်၊လ
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                    (င)ခုံအမှတ်
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၆။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('သင်တန်းတက်ရောက်လိုသည့်နေရာ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div >
                                                        <input type="radio" name="class">
                                                        <label class="form-check-label">ပြည်ထောင်စုစာရင်းစစ်ချုပ်ရုံး၊ရန်ကုန်သင်တန်းကျောင်း</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div>
                                                        <input type="radio" name="class" >
                                                        <label class="form-check-label">ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div >
                                                        <input type="radio" name="class" >
                                                        <label class="form-check-label">ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၈။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('မှတ်ပုံတင်ရသည့်အကြောင်းအရင်း') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-4">
                                                    
                                                    <label class="form-check-label">(က)ယခုနှစ်</label>
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="checkbox" value="ယခုနှစ်">
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <label>(၁)တိုက်ရိုက်တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်</label>
                                            </div>
                                            <div class="col-md-3">
                                                   <div class="form-group">
                                                        
                                                        <input type="text" class="form-control">
                                                   </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                   <label>(ခ)သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း</label>
                                                   
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" value="သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                   <label>(ဂ)သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း</label>
                                                   
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" value="သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                   <label>(ဃ)စာမေးပွဲကျရှုံးခြင်း</label>
                                                   
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" value="စာမေးပွဲကျရှုံးခြင်း">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                   <label>(င)သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း</label>
                                                   
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" value="သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၉။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('အပိုဒ် ၁၁ ပါ(ခ)/(ဂ)/(ဃ)/(င) အတွက်') }}</label>
                                            
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-5 col-form-label">{{ __('တက်ရောက်ခွင့်ရရှိသည့်သင်တန်းအမှတ်စဥ် /အပိုင်း/ကိုယ်ပိုင်အမှတ်') }}</label>
	                                      <div class="col-md-5">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၀။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('လျှောက်လွှာကြေး ၁၀၀၀ကျပ်၊မှတ်ပုံတင်ကြေး ၈၀၀၀ကျပ်၊သင်တန်းကြေး ၃၀၀၀၀ကျပ်၊စုစုပေါင်းသင့်ငွေ ၃၉၀၀၀ကို ပေးသွင်းပြီးသည့်ပြေစာအမှတ်') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-md-1 col-form-label">နှင့်နေ့စွဲ</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_dateone" placeholder="dd-mm-yyyy" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၂၁။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-8 col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_datetwo" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
	                                    
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
	                                </div>
                                    <div class="tab-pane fade m-3" id="link2" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအမည်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                            <div class="col-md-2"></div>
                                            <label class="col-md-2 text-right">{{ __('အမှတ်စဥ်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                        </div>
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
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
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="daone_birthtwo" placeholder="dd-mm-yyyy" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                  
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/ မဟုတ်ပါ') }}</label>
	                                      <div class="col-md-2">
                                                        <input type="radio" name="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" value="no"> No
                                            </div>
	                                    </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ/ဖုန်းနံပါတ်/အီးမေးလ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('တိုက်ရိုက်တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-8 col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_datetwo" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade m-3" id="link3" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအမည်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                            <div class="col-md-2"></div>
                                            <label class="col-md-2 text-right">{{ __('အမှတ်စဥ်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                      </div>
                                        </div>
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
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
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control"  >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text"name="daone_birththree" placeholder="dd-mm-yyyy" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                  
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/ မဟုတ်ပါ') }}</label>
	                                      <div class="col-md-2">
                                                        <input type="radio" name="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" value="no"> No
                                            </div>
	                                    </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ/ဖုန်းနံပါတ်/အီးမေးလ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('မှတ်ပုံတင်ရသည့်အကြောင်းအရင်း{အမှန်ခြစ်အမှတ်အသားပြုရန်}') }}</label>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း">
                                                   <label>သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း</label>
                                                   
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း">
                                                   <label>သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း</label>
                                                   
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            
                                            <div class="col-md-4">
                                                <input type="checkbox" value="စာမေးပွဲကျရှုံးခြင်း">
                                                   <label>စာမေးပွဲကျရှုံးခြင်း</label>
                                                   
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            
                                            <div class="col-md-4">
                                                <input type="checkbox" value="သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း">
                                                   <label>သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း</label>
                                                   
                                            </div>
                                            
                                        </div>
                                         
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
	                                      <label class="col-md-5 col-form-label">{{ __('တက်ရောက်ခွင့်ရရှိသည့်သင်တန်းအမှတ်စဥ် /အပိုင်း/ကိုယ်ပိုင်အမှတ်') }}</label>
	                                      <div class="col-md-5">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
                                        
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-8 col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_datethree" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="tab-pane fade m-3" id="link4" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div><br>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-2 col-form-label">{{ __('ဖြေဆိုမည့်စာဖြေဌာန') }}</label>
                                            <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                      </div>
                                        </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
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
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control"  >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('သင်တန်းသားကိုယ်ပိုင်အမှတ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control"  >
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="daone_birthfour" placeholder="dd-mm-yyyy" class="form-control"  >
                                                    </div>
                                                </div>
	                                    </div>
	                                  
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ/ဖုန်းနံပါတ်/အီးမေးလ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('သင်တန်းတက်ရောက်သည့်နေရာ') }}</label>
                                          <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">စာရင်းကောင်စီ</label> 
                                            </div>
                                            <div class="col-md-3">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">ကိုယ်ပိုင်သင်တန်းကျောင်း</label> 
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">ကိုယ်ပိုင်လေ့လာသူ</label> 
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                            <label class="col-md-3 col-form-label">{{ __('ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအမည်') }}</label>
                                            <div class="col-md-7">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('စာမေးပွဲပြန်လည်ဖြေဆိုသူများဖြည့်သွင်းရန်') }}</label>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <label class="col-md-3">(က)နောက်ဆုံးဖြေဆိုခဲ့သည့်စာမေးပွဲအမှတ်စဥ်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-md-2 text-right">ကျင်းပသည့်ခုနှစ်/လ</label>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <label class="col-md-8">(ခ)အဆိုပါစာမေးပွဲတွင်အောင်မြင်ခဲ့သည့် Module ရှိပါကဆိုင်ရာအကွက်တွင်အမှန်ခြစ်အမှတ်အသားပြုရန်</label>
                                            
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2">
                                                <input type="checkbox" value="Module 1">
                                                <label class="form-check-label">Module 1</label>
                                            </div>
                                            <div class="col-md-2">
                                            <input type="checkbox" value="Module 2">
                                                <label class="form-check-label">Module 2</label>
                                            </div>
                                        </div><br/>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <label class="col-md-2 col-form-label">{{ __('(ဂ)ဖြေဆိုမည့် Module') }}</label>
                                            
                                            <div class="col-md-2">
                                                    <input type="checkbox" value="Module 1">
                                                    <label class="form-check-label">Module 1 </label>
	                                        </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" value="Module 2">
                                                    <label class="form-check-label">Module 2 </label>
	                                        </div>
                                            <div class="col-md-2">
                                                    <input type="checkbox" value="All Module">
                                                    <label class="form-check-label">All Module</label>
	                                        </div>
                                            
                                        </div>
                                        
                                         
                                        <div class="row">
	                                        <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                        <label class="col-md-4 col-form-label">{{ __('စာမေးပွဲကြေးပေးသွင်းပြီးသည့် ပြေစာအမှတ်') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
                                            <label class="col-md-2 text-right">{{ __('ရက်စွဲ') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                        <input type="text" name="daone_datefour" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                            
	                                    </div>
                                        
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_datefive" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                           
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-11 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade m-3" id="link5" aria-expanded="true">
                                            <div class="row">
                                                <label class="col-md-12 col-form-label text-center" style="font-size:17px; font-weight:bold;">{{ __('လက်မှတ်ရပြည့်သူ့စာရင်းကိုင် /ဒီပလိုမာစာရင်းကိုင် စာမေးပွဲ အောင်လက်မှတ် /အောင်မြင်ကြောင်း ထောက်ခံချက် /အမှတ်စာရင်း(အောင်မြင် /ကျရှုံး)တောင်းခံမှူပုံစံ') }}</label>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4"></div>  
                                                <div class="col-md-4"></div>                                    
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                                            </div>
                                                        </div>
                                                    </div>                                    
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('တောင်းခံသူအမည် (မြန်မာ)') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="name_two" class="form-control" placeholder="တောင်းခံသူအမည်(မြန်မာ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('တောင်းခံသူအမည် (အင်္ဂလိပ်)') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="name_two" class="form-control" placeholder="တောင်းခံသူအမည်(အင်္ဂလိပ်)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                                <div class="col-md-9">
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
                                                <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းသားမှတ်ပုံတင်အမှတ်အမှတ်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="သင်တန်းသားမှတ်ပုံတင်အမှတ်အမှတ်" >
                                                        </div>
                                                    </div>
                                            </div>
                                            <label class="col-md-2 text-right">{{ __('ရက်စွဲ') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                        <input type="text" name="daone_datefour" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်(အင်္ဂလိပ်)') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်(အင်္ဂလိပ်)">
                                                    </div>
                                                </div>
                                                
                                            </div>                                           
                                            
                                        
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('စာမေးပွဲအမည်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="စာမေးပွဲအမည်" >
                                                            </div>
                                                        </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ကျင်းပပြုလုပ်သည့် ခုနှစ် ၊ လ') }}</label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="ခုနှစ်" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="လ" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('အောင်မြင်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">   
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="all_modules">All Modules</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="all_modules"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module1">Module 1</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module1"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module2">Module 2</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module2"/>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ပြန်လည်ဖြေဆိုအောင်မြင်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">   
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="all_modules">All Modules</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="all_modules"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module1">Module 1</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module1"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module2">Module 2</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module2"/>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('အောင်မြင်သည့်အဆင့်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="အောင်မြင်သည့်အဆင့်" >
                                                            </div>
                                                        </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ကျရှုံး') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">   
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="all_modules">All Modules</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="all_modules"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module1">Module 1</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module1"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-md-8 form-check-label" for="module2">Module 2</label>
                                                                <input class="col-md-2 form-check-input" type="checkbox" value="" id="module2"/>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ဖြေဆိုခွင့်အမှတ်စဉ်') }}</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="ဖြေဆိုခွင့်အမှတ်စဉ်" >
                                                            </div>
                                                        </div>
                                            </div></br>
                                        
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                                    <input type="text" name="" class="form-control" placeholder="ဖုန်းနံပါတ်">
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('နေရပ်လိပ်စာ') }}</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                        <textarea class="form-control " name="" rows="3" placeholder="နေရပ်လိပ်စာ" required></textarea>
                                                        </div>
                                                    </div>
                                            </div></br>                                           
                                            
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="daone_datefive" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-12 col-form-label">{{ __('အထက်ဖော်ပြပါအမှတ်စဉ် ၁ မှ ၁၁ တို့တွင် ဖော်ပြထားချက်များအားစိစစ်ပြီးမှန်ကန်ကြောင်း တွေ့ရပါသည်။') }}</label>                                                
                                            </div>
                                           
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
<script>
    
    $(document).ready(function (e) {
        createDatepicker("daone_birthone");
        createDatepicker("daone_birthtwo");
        createDatepicker("daone_birththree");
        createDatepicker("daone_birthfour");
        createDatepicker("daone_dateone");
        createDatepicker("daone_datetwo");
        createDatepicker("daone_datethree");
        createDatepicker("daone_datefour");
        createDatepicker("daone_datefive");
        
    });

    </script>
@endpush
