@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_part1_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa-part1-register-form1') }}
            </div>
        </div>
        <form id="non-audit-form" method="post" action="javascript:createAuditFirm();" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3 text-center">
                                        <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                        <div class=" mt-3 mb-3 col-auto">
                                            <input type="file" class="form-control" name="photo"/>                                            
                                        </div>
                                    </div>
                                </div><br>
	                                    <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                            <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="အမည်" >
                                                </div>
                                            </div>
	                                    </div>
                                        
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                            <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                            <div class="col-md-8">
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
                                            <label class="col-md-2 col-form-label">{{ __('အဘအမည်') }}</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်" >
                                                </div>
                                            </div>                                            
                                        </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="race_religion" class="form-control" placeholder="လူမျိူး/ဘာသာ" >
                                                </div>
                                            </div>
	                                  </div> 	                                  
                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="birth_date" placeholder="dd-mm-yyyy" class="form-control" >
                                                    </div>
                                                </div>
	                                      </div>
	                                 
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="address" class="form-control" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" >
                                                </div>
                                            </div>
	                                    </div>                                   
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်နေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="contact_address" class="form-control" placeholder="ဆက်သွယ်ရန်နေရပ်လိပ်စာ" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="phone" class="form-control" placeholder="ဖုန်းနံပါတ်" >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="အီးမေးလ်" >
                                                    </div>
                                                </div>
	                                    </div>	 

                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လက်ရှိအလုပ်အကိုင်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="occupation" class="form-control" placeholder="လက်ရှိအလုပ်အကိုင်" >
                                                    </div>
                                                </div>
	                                    </div>                                   
                                        
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="position" class="form-control" placeholder="ရာထူး" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဌာန/အဖွဲ့အစည်း/ကုမဏီအမည်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="organization" class="form-control" placeholder="ဌာန/အဖွဲ့အစည်း/ကုမဏီအမည်" >
                                                    </div>
                                                </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လစာ/လစာနှုန်း') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="salary" class="form-control" placeholder="လစာ/လစာနှုန်း" >
                                                    </div>
                                                </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရုံးလိပ်စာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="office_address" class="form-control" placeholder="ရုံးလိပ်စာ" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မိမိသည်နိုင်ငံ့ဝန်ထမ်း ဟုတ်/ မဟုတ်ပါ') }}</label>
	                                      
                                            <div class="col-md-2">
                                                        <input type="radio" name="civil_servant" class="" value="1"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="civil_servant" class="" value="0"> No
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၆။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အသိမှတ်ပြုတက္ကသိုလ် တစ်ခုမှ အောင်မြင်ပြီးခဲ့သော') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <div class="form-group">(က)တက္ကသိုလ် အမည်</div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="university" class="form-control" placeholder="တက္ကသိုလ် အမည်" >
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
                                                        <input type="text" name="degree" class="form-control" placeholder="ဘွဲ့အမည်" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(ဂ)အဓိကဘာသာ</div></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="major" class="form-control" placeholder="အဓိကဘာသာ" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(ဃ)နှစ်၊လ</div></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="graduation_time" class="form-control" placeholder="နှစ်၊လ" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(င)ခုံအမှတ်</div></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="seat_no" class="form-control" placeholder="ခုံအမှတ်" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၇။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)စာမေးပွဲအောင်မြင်ခဲ့သည့်') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(က)ခုနှစ်/လ</div></div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="diplo_sec_pass_year" class="form-control" placeholder="ခုနှစ်" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="diplo_sec_pass_month" class="form-control" placeholder="လ" >
                                                            </div>
                                                        </div>
                                                    </div>                                                 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(ခ)ခုံအမှတ်</div></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="diplo_sec_pass_seat_no" class="form-control" placeholder="ခုံအမှတ်" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၈။') }}</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                            <input type="checkbox" name="acca" class="" value="1"> ACCA
                                                    </div>
                                                    <div class="col-md-2">
                                                            <input type="checkbox" name="cima" class="" value="0"> CIMA
                                                    </div>
                                                    <div class="col-md-8 col-form-label">{{ __('ACCA/ CIMA(မလိုသည်ကိုခြစ်ရန်) တက်ရောက်နေသူ') }}</div>

                                                </div>                                               
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(က)အောင်မြင်ထားသည့်အဆင့်</div></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="acca_cima_pass_level" class="form-control" placeholder="အောင်မြင်ထားသည့်အဆင့်" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2"><div class="form-group">(ခ)စာမေးပွဲကာလ(နှစ်/လ)</div></div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="acca_cima_exam_year" class="form-control" placeholder="ခုနှစ်" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="acca_cima_exam_month" class="form-control" placeholder="လ" >
                                                            </div>
                                                        </div>
                                                    </div>                                                 
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                    (ဂ)မှတ်ပုံတင်အမှတ်
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="acca_cima_reg_no" class="form-control" placeholder="မှတ်ပုံတင်အမှတ်" >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၉။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('သင်တန်းတက်ရောက်လိုသည့်နေရာ') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div >
                                                        <input type="radio" name="training_ground_id" value="0">
                                                        <label class="form-check-label">ပြည်ထောင်စုစာရင်းစစ်ချုပ်ရုံး၊ရန်ကုန်သင်တန်းကျောင်း</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div>
                                                        <input type="radio" name="training_ground_id" value="1">
                                                        <label class="form-check-label">ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3"></div>
                                                
                                                <div class="col-md-8">
                                                    <div >
                                                        <input type="radio" name="training_ground_id" value="2">
                                                        <label class="form-check-label">ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ</label>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၂၀။') }}</label>
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
                                                    <input type="text" name="cpaone_dateone" placeholder="dd-mm-yyyy" class="form-control" >
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
        createDatepicker("birth_date");
        createDatepicker("cpaone_datetwo");
        createDatepicker("cpaone_datethree");
        createDatepicker("cpaone_datefour");
        createDatepicker("cpaone_datefive");
        createDatepicker("cpaone_datesix");
        createDatepicker("cpaone_birthone");
        createDatepicker("cpaone_birthtwo");
        createDatepicker("cpaone_birththree");
        createDatepicker("cpaone_birthfour");
        createDatepicker("cpaone_birthfive");
    });

</script>
@endpush
