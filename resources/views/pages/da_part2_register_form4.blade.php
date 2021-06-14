@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part2_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('da_part2_register_form4') }}
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
                                                            <input type="file" class="custom-file-input" id="inputfile2" accept="image/*">
                                                            <label class="custom-file-label" >Choose Image</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
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
	                                              <input type="text" name="name_two" class="form-control" placeholder="မြန်မာ/အင်္ဂလိပ်" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-8">
                                                <div class="row" >
                                                    <div class="col-md-2 col-5 pr-1">
                                                        <select class="form-control" name="nrc_state_region" id="nrc_state_region" >
                                                            @foreach($nrc_regions as $region)
                                                                <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                                    {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-7 px-1">
                                                        <select class="form-control" name="nrc_township" id="nrc_township" >
                                                            @foreach($nrc_townships as $township)
                                                                <option value="{{ $township['township_mm'] }}">
                                                                    {{ $township['township_mm'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 col-5 px-1">
                                                        <select class="form-control" name="nrc_citizen" id="nrc_citizen" >
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
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" placeholder="မြန်မာ/အင်္ဂလိပ်" >
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
                                                        <input type="text" name="birth4" class="form-control"  placeholder="dd-mm-yyy">
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
	                                              <input type="text" name="name_two" class="form-control" >
	                                          </div>
	                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('စာမေးပွဲပြန်လည်ဖြေဆိုသူများဖြည့်သွင်းရန်') }}</label>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <label class="col-md-3 ">(က)နောက်ဆုံးဖြေဆိုခဲ့သည့်စာမေးပွဲအမှတ်စဥ်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-md-2 text-right">ကျင်းပသည့်ခုနှစ်/လ</label>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" >
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
                                            
                                        </div><br/>
                                        
                                         
                                        <div class="row">
	                                        <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                        <label class="col-md-4 ">{{ __('စာမေးပွဲကြေးပေးသွင်းပြီးသည့် ပြေစာအမှတ်') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                        <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
                                            <label class="col-md-2 text-right">{{ __('ရက်စွဲ') }}</label>
	                                        <div class="col-md-2">
                                                <div class="form-group">
                                                        <input type="text" name="date5" class="form-control" placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
	                                    </div>
                                        
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="date6" class="form-control" placeholder="dd-mm-yyyy">
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
        $("input[name='register_date']").flatpickr({
                    enableTime: false,
                    dateFormat: "d-m-Y",
            });
    $(document).ready(function (e) {
        createDatepicker("birth1");
        createDatepicker("birth2");
        createDatepicker("birth3");
        createDatepicker("birth4");
        createDatepicker("date1");
        createDatepicker("date2");
        createDatepicker("date3");
        createDatepicker("date4");
        createDatepicker("date5");
        createDatepicker("date6");
    });

    </script>
@endpush
