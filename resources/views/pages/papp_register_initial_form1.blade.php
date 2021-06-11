@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'papp_register_initial_form1'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('papp_register_initial_form1') }}
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
	                                      <label class="col-md-5 form-check-label">{{ __('ကျွန်ုပ်သည် ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံသားဖြစ်ပြီး ကျွန်ုပ်အား ') }}</label>
	                                      <div class="col-md-2">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" > 
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-form-label">ခုနှစ်အတွက်</label>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <div class="col-md-8">
                                          လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ) အဖြစ်မှတ်ပုံတင်လက်မှတ်ထုတ်ပေးပြီးဖြစ်ပါသည်။
                                          </div>
	                                    </div>
	                                    <br/>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('ကျွန်ုပ်အားအများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူအဖြစ်') }}</label>
	                                      <div class="col-md-2">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
                                                <label class="col-md-1 col-form-label">ခုနှစ်</label>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-8 col-form-label">မှတ်ပုံတင်ပေးပါရန် လျှောက်ထားပါသည်။</label>
	                                      
	                                    </div><br/>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-8 col-form-label">{{ __('ကျွန်ုပ်သည်အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်ရာတွင်') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-8">
                                                    <div >
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label col-form-label">လုပ်ငန်းအမည် Firm Name အသုံးမပြူပါ။</label>
                                                       
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-8">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label col-form-label">အသုံးပြုမည့်လုပ်ငန်းအမည် Firm Name, လုပ်ငန်းအမျိုးအစားနှင့် မိမိ၏အဆင့်မှာအောက်ပါအတိုင်းဖြစ်ပါသည်</label>
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5 col-form-label">
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
                                                    အဆင့်(Principal/Managing Partner/Partnerစသည်)
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
                                            <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('အောက်ပါစာရွက်စာတမ်းများကို ပူးတွဲတင်ပြလျှက် လျှောက်ထားပါသည်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-6 col-form-label">
                                                    (က)လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)မှတ်ပုံတင်လက်မှတ်
                                                   
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
                                                <div class="col-md-6 col-form-label">
                                                    (ခ)မှတ်ပုံတင်မည့် ပြက္ခဒိန်နှစ်မတိုင်မီနှစ်တွင် မြန်မာနိုင်ငံ၌ ၁၈၃ ရက်ထက်မနည်းနေထိုင်သူဖြစ်ကြောင်းဝန်ခံချက်
                                                       
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
                                                <div class="col-md-6 col-form-label">
                                                    (ဂ)အခြားလုပ်ငန်းအဖွဲ့အစည်းတစ်ရပ်ရပ်တွင် အချိန်ပြည့် တာဝန်ထမ်းဆောင်နေသူ မဟုတ်ကြောင်းခံဝန်ချက်
                                                   
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
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('(ဃ)လျှောက်ထားသည့်နှစ်အတွက် အများပြည်သူစာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းကို မိမိ၏ အဓိကအသက်မွေးဝမ်းကျောင်းလုပ်ငန်းအဖြစ် မြန်မာနိုင်ငံအတွင်း') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-6 col-form-label">{{ __('တွင်လုပ်ကိုင်မည်ဖြစ်ကြောင်းခံဝန်ချက်') }}</label>
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
                                                
                                                <div class="col-md-10 col-form-label">
                                                (င)လုပ်ငန်းဆောင်ရွက်ရာတွင် မြန်မာနိုင်ငံစာရင်းကောင်စီ၏ ၉-၈-၂၀၁၈ ရက်စွဲပါအမိန့်ကြော်ငြာစာအမှတ် ၂၇/၂၀၁၈ နောက်ဆက်တွဲတွင် ဖော်ပြသည့် 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                
                                                <div class="col-md-6 col-form-label">
                                                စည်းကမ်းချက်များနှင့်စပ်လျဥ်း ၍လိုက်နာခြင်းရှိ/မရှိ
                                                    
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
                                                
                                                <div class="col-md-10 col-form-label">
                                                (စ)စတင်လျှောက်ထားသည့်နေ့မတိုင်မီ ၁၂ လအတွင်း စဥ်ဆက်မပြတ်လေ့လာသင်ယူမှု(Continuous Professional Development-CPD)မှတ်တမ်း
                                                    
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
                                            <div class="col-md-6 col-form-label">(သို့မဟုတ်)အခွန်ကင်းရှင်းကြောင်းထောက်ခံချက်</div>
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
                                                    <input type="text" name="pappinitial_dateone" placeholder="dd-mm-yyyy" class="form-control" >
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
        createDatepicker("pappinitial_dateone");
        createDatepicker("pappinitial_datetwo");
        createDatepicker("pappinitial_datethree");
        
    });

    </script>
@endpush
