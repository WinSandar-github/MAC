@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_registration'
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
									
                            <div >
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" placeholder="" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="nrc"  class="form-control  @error('name') is-invalid @enderror" placeholder="" autofocus>
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
	                                              <input type="text" name="father_name" class="form-control" placeholder="" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="mentor_birthone" placeholder="dd-mm-yyyy" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                  
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('RA/CPA အောင်မြင်သောနှစ်/ ကိုယ်ပိုင်အမှတ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                    </div>
                                                </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('CPA PAPP	မှတ်ပုံတင်အမှတ်/ရက်စွဲ') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="mentor_dateone" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('PAPP မှတ်ပုံတင်အမှတ်/ရက်စွဲ') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="mentor_datetwo" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Postal Address') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Telephone No') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Fax No') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Email') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Audit Firm အမည်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('စတင်တည်ထောင်သည့်နေ့') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                        <input type="text" name="mentor_datethree" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၇။') }}</label>
	                                      <label class="col-md-4 col-form-label">{{ __('Audit Firm ၏ဖွဲ့စည်းပုံနှင့်ဝန်ထမ်းအင်အား') }}</label>
	                                        <div class="col-md-6">
                                                <div class="form-group">
                                                            <input type="number" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၈။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('လက်ရှိလက်ခံဆောင်ရွက်စစ်ဆေးပေးရသည့်လုပ်ငန်းများ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5 col-form-label">
                                                    <div class="form-group">
                                                    (က)အများပိုင်ကုမ္ပဏီ
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(ခ)လူနည်းစုပိုင်ကုမ္ပဏီ</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(ဂ)တစ်ဦးတည်းပိုင်နှင့်အစုစပ်လုပ်ငန်း</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(ဃ) အစိုးရ၏အရင်းအနှီးပါဝင်သည့်ဖက်စပ်လုပ်ငန်းများ</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(င) ပုဂ္ဂလိကဘဏ်နှင့်အာမခံလုပ်ငန်းများ</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(စ) Non Goverment Organization</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(ဆ) Non Statutory Audit-Management Audit,Environmental Audit etc</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 col-form-label">
                                                   <label>(ဇ) အခြား</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၉။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('ယခင်အလုပ်သင်ကြားပေးမှုအတွေ့အကြုံ ရှိ/မရှိ') }}</label>
                                          <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="no"> No
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၀။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('စာရင်းကိုင်အလုပ်သင်များအား အလုပ်သင်ကြားပေးမှု စတင်ခဲ့သည့်ခုနှစ်') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <input type="text" name="mentor_datefour" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၁။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('အလုပ်သင်ဦးရေလက်ခံနိုင်သည့်အရေအတွက်') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                            <input type="number" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၂။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('လက်ရှိလက်ခံသင်ကြားပေးသော အလုပ်သင်ဦးရေ') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                            <input type="number" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၃။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('မွေးထုတ်ပေးခဲ့သည့် အလုပ်သင်ဦးရေ') }}</label>
	                                        <div class="col-md-4">
                                                <div class="form-group">
                                                            <input type="number" name="" class="form-control" placeholder="" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၄။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('နှစ်စဥ်ဆက်တိုက်အလုပ်သင်ကြားနိုင်ခြင်း ရှိ/မရှိ') }}</label>
                                          <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" class="" value="no"> No
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂၅။') }}</label>
	                                      <label class="col-md-6 col-form-label">{{ __('အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ') }}</label>
                                            <div class="col-md-2">
                                                    <input type="radio" name="" class="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                    <input type="radio" name="" class="" value="no"> No
                                            </div>
	                                        
	                                    </div>
                                        <div class="row">
                                        <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-6 col-form-label">{{ __('ရှိပါက ပြတ်တောက်ခဲ့ရသည့် အကြောင်းအရင်း') }}</label>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၂၆။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
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
        createDatepicker("mentor_birthone");
        createDatepicker("mentor_dateone");
        createDatepicker("mentor_datetwo");
        createDatepicker("mentor_datethree");
        createDatepicker("mentor_datefour");
        
    });

</script>
@endpush
