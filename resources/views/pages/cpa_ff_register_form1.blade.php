@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_register_form1'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa_ff_register_form1') }}
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
	                                      <label class="col-md-10 form-check-label">{{ __('လျှောက်ထားသူ၏ပညာအရည်အချင်းဆိုင်ကြေညာချက်(ဆိုင်ရာအကွက်တွင်အမှန်ခြစ်အမှတ်အသားပြု၍ဖြည့်ပေးပါ)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျွန်ုပ်သည် ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံသားတော်၏နိုင်ငံသားဖြစ်ပြီး ') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" name="" >
                                                    <label class="form-check-label">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်ဒုတိယပိုင်းစာမေးပွဲကို</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" > 
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label">ခုနှစ်တွင်ကိုယ်ပိုင်အမှတ်</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" > 
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
                                                    <input type="checkbox" name="" >
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control " > 
                                                    </div>
                                                </div>
                                                <label class="col-md-1 col-form-label">နိုင်ငံ</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" > 
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
                                                        <input type="text" name="" class="form-control" > 
                                                    </div>
                                                </div>
                                                <label class="col-md-1 col-form-label">ခုနှစ်</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" > 
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
                                                        <input type="text" name="" class="form-control" > 
                                                    </div>
                                                </div>
                                                <label class="col-md-4">ဖြင့်အောင်မြင်ခဲ့ပါသည်။</label>
                                                
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-6">အောင်လက်မှတ်မိတ္တူမှန်ပူးတွဲတင်ပြပါသည်။</label>
                                            <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile1" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
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
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile1" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
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
                                                    <div class="form-group">
                                                    (ဂ)နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် မူရင်းနှင့်မိတ္တူ
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile3" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-6 col-form-label">{{ __('(ဃ)စတင်လျှောက်ထားသည့်နေ့မတိုင်မီ ၁၂ လအတွင်း စဥ်ဆက်မပြတ်လေ့လာသင်ယူမှု(Continuous professional Development-CPD)မှတ်တမ်း') }}</label>
                                            <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile4" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                
                                                <div class="col-md-6 col-form-label">
                                                (င)ပတ်စပို့အရွယ်ဓာတ်ပုံ 
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile5" multiple>
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
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
        createDatepicker("cpaff_dateone");
        createDatepicker("cpaff_datetwo");
        createDatepicker("cpaff_datethree");
        createDatepicker("cpaff_datefour");
        
    });

</script>
@endpush
