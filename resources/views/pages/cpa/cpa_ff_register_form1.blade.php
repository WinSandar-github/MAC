@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa_ff_register_form1') }}
 
            </div>
        </div>
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <form enctype="multipart/form-data" action="javascript:registerForm()" id="register_form">
                            @csrf
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
                                                  <input type="text" name="name" class="form-control"  id="name">
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
                                                          <input type="text" name="nrc_number" id="nrc_number" pattern=".{6,6}" class="form-control" oninput="this.value=this.value.replace(/[^၀-၉]/g,'');"  maxlength="6" minlength="6" placeholder="" style="height: 38px">
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
                                                  <input type="text" name="father_name" class="form-control" id="father_name" >
                                              </div>
                                          </div>
                                            
                                      </div>
                                        
                                      <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('(ဃ)') }}</label>
                                          <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
                                            @foreach($education_level as $education)
                                              <div class="col-md-2">
                                                  <input type="checkbox" name="edu_lvl" class="education_lvl" value={{$education->id}}>
                                                  <label class="form-check-label">{{$education->name}}</label>
                                              </div>
                                            @endforeach  

                                              
                                      </div>
                                      <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('(င)') }}</label>
                                          <label class="col-md-2 col-form-label">{{ __('CPAအပတ်စဥ် /ကိုယ်ပိုင်အမှတ်') }}</label>
                                          <div class="col-md-7">
                                              <div class="form-group">
                                                          <input type="text" name="cpa_no" class="form-control" id="cpa_no">
                                                      </div>
                                                  </div>
                                        </div>
                                            
                                            
                                      
                        
                                      <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('(စ)') }}</label>
                                          <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                          <div class="col-md-7">
                                              <div class="form-group">
                                                          <input type="text" name="address" class="form-control" id="address">
                                                      </div>
                                                  </div>
                                          </div>
                                      
                                          
                                          <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }} ၊ {{ __('Fax နံပါတ်') }}</label>
                                            <div class="col-md-8">
                                                  <div class="form-group">
                                                      <input type="text" name="phone" class="form-control" id="phone">
                                                  </div>
                                              </div>
                                        </div>
                                        
                                       
                                        
                                          <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                          <input type="text" name="email" class="form-control" id="email">
                                                      </div>
                                                  </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                          <label class="col-md-10 form-check-label">{{ __('လျှောက်ထားသူ၏ပညာအရည်အချင်းဆိုင်ကြေညာချက်(ဆိုင်ရာအကွက်တွင်အမှန်ခြစ်အမှတ်အသားပြု၍ဖြည့်ပေးပါ)') }}</label>
                                          
                                        </div>
                                          <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                          <label class="col-md-10 col-form-label">{{ __('ကျွန်ုပ်သည် ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံသားတော်၏နိုင်ငံသားဖြစ်ပြီး ') }}</label>
                                          
                                        </div>
                                          <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-4">
                                                      <input type="checkbox" name="local_degree" id="local_degree" value="1">
                                                      <label class="form-check-label">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်ဒုတိယပိုင်းစာမေးပွဲကို</label>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="lyear" class="form-control" id="lyear"> 
                                                      </div>
                                                  </div>
                                                  <label class="col-md-2 col-form-label">ခုနှစ်တွင်ကိုယ်ပိုင်အမှတ်</label>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="personal_no" class="form-control" id="personal_no" > 
                                                      </div>
                                                  </div>
                                          </div>
                                          <div class="row">
                                          <label class="col-md-1 col-form-label"></label>
                                          <div class="col-md-8">
                                              ဖြင့်အောင်မြင်ပါသည်။
                                            </div>
                                        </div>
                                          <br/>
                                        <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-1">
                                                      <input type="checkbox" name="foreign_degree" id="foreign_degree" value="1">
                                                      
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="country" class="form-control " id="country" > 
                                                      </div>
                                                  </div>
                                                  <label class="col-md-1 col-form-label">နိုင်ငံ</label>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="organization" class="form-control" id="organization" > 
                                                      </div>
                                                  </div>
                                                  <label class="col-md-4 col-form-label">အဖွဲ့အစည်းကပေးအပ်သည့် စာရင်းပညာဆိုင်ရာဘွဲ့/</label>
                                          </div>
                                          <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-4">
                                                      <label class="form-check-label col-form-label">လက်မှတ်ရရရှိခဲ့ပြီးမြန်မာနိုင်ငံစာရင်းကောင်စီက</label>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="fyear" class="form-control" id="fyear" > 
                                                      </div>
                                                  </div>
                                                  <label class="col-md-1 col-form-label">ခုနှစ်</label>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="month" class="form-control" id="month" > 
                                                      </div>
                                                  </div>
                                                  <label class="col-form-label">လတွင်</label>
                                          </div>
                                          <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-4">
                                                      <label class="col-form-label">ကျင်းပခဲ့သည့် အရည်အချင်းစစ်စာမေးပွဲကို ခုံအမှတ်</label>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="form-group">
                                                          <input type="text" name="seat_num" class="form-control" id="seat_num" > 
                                                      </div>
                                                  </div>
                                                  <label class="col-md-4">ဖြင့်အောင်မြင်ခဲ့ပါသည်။</label>
                                                  
                                          </div>
                                          <div class="row">
                                              <div class="col-md-1"></div>
                                              <label class="col-md-6">အောင်လက်မှတ်မိတ္တူမှန်ပူးတွဲတင်ပြပါသည်။</label>
                                              <div class="col-md-4">
                                                  <div class=" mt-3 mb-3 col-auto">
                                                  <input type='file' id="" name="certificate" class="form-control">
                                         
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                          <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                          <label class="col-md-10 col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၆၆ နှင့် ၆၈ ပါပြဌာန်းချက်များကို လိုက်နာမည်ဖြစ်ကြောင်းဝန်ခံပါသည်။') }}</label>
                                          
                                        </div>
                                        
                                          <div class="row">
                                              <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                              <label class="col-md-8 col-form-label">{{ __('အောက်ပါစာရွက်စာတမ်းများကို ပူးတွဲတင်ပြလျှက် လျှောက်ထားပါသည်') }}</label>
                                              
                                          </div>
                                          <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-6 col-form-label">
                                                      
                                                      (က)လက်မှတ်ရပြည်သူ့စာရင်းကိုင်စာမေးပွဲအောင်လက်မှတ်မူရင်းနှင့်မိတ္တူ
                                                          
                                                      
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class=" mt-3 mb-3 col-auto">
                                                          <input type="file" class="form-control" name="cpa"/>                                            
                                                      </div>
                                                  </div>
                                          </div>
                                              <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-6 col-form-label">
                                                      <div class="form-group">
                                                      (ခ)မြန်မာနိုင်ငံလက်မှတ်ရပြည်သူ့စာရင်းကိုင်များအသင်းဝင်ကတ်ပြား မူရင်းနှင့်မိတ္တူ
                                                          
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class=" mt-3 mb-3 col-auto">
                                                          <input type="file" class="form-control"name="mpa_mem_card"/>                                            
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-6 col-form-label">
                                                      <div class="form-group">
                                                      (ဂ)နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် မူရင်းနှင့်မိတ္တူ
                                                          
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class=" mt-3 mb-3 col-auto">
                                                          <input type="file" name="nrc" class="form-control" />                                            
                                                      </div>
                                                  </div>
                                              </div>
                                          <div class="row">
                                              <label class="col-md-1 col-form-label"></label>
                                              <label class="col-md-6 col-form-label">{{ __('(ဃ)စတင်လျှောက်ထားသည့်နေ့မတိုင်မီ ၁၂ လအတွင်း စဥ်ဆက်မပြတ်လေ့လာသင်ယူမှု(Continuous professional Development-CPD)မှတ်တမ်း') }}</label>
                                              <div class="col-md-4">
                                                  <div class=" mt-3 mb-3 col-auto">
                                                      <input type="file" class="form-control" name="cdp_record" />                                            
                                                  </div>
                                              </div>
                                          </div>
                                              <div class="row">
                                                  <div class="col-md-1"></div>
                                                  
                                                  <div class="col-md-6 col-form-label">
                                                  (င)ပတ်စပို့အရွယ်ဓာတ်ပုံ 
                                                      
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class=" mt-3 mb-3 col-auto">
                                                          <input type="file" class="form-control" name="passport_photo" />                                            
                                                      </div>
                                                  </div>
                                              </div>
                                          
                                          <div class="row">
                                              <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                              <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                              
                                          </div>
                                          
                                          <div class="row">
                                              <label class="col-md-1 col-form-label"></label>
                                              <label class="col-md-6 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <input type="text" name="cpaff_dateone" placeholder="dd-mm-yyyy" class="form-control" >
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <div class="row">
                                              <div class="col-md-11 d-md-flex justify-content-md-end">
                                                  <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                              </div>
                                          </div>	
                                  
                              </div>
                            </form>


                            <div class="card-footer ">
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
 
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
    
    $(document).ready(function(){
         createDatepicker("cpaff_dateone");
        createDatepicker("cpaff_datetwo");
        createDatepicker("cpaff_datethree");
        createDatepicker("cpaff_datefour");

   
        $('#register_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
       $.ajax({
        type: "POST",
        url: "http://localhost:8000/api/cpa_full_form",
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
           alert("Successfully")
        },
        error:function (message){
        }
      });
    })

       
 
        
    });
   

</script>
@endpush
