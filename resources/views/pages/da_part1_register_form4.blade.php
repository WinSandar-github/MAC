@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part1_register_form4'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('da_part1_register_form4') }}
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
