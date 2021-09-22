@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_list'
])
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset("assets/css/plugins/bootstrap/bootstrap.min.css") }}">
<style>
    .label{
        text-align: right;
    }
</style>
@section('content')
    <div class="content">
        <!-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div> -->
            <form method="post" id="mentor_register_form" action="javascript:createMentor();" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-success mb-3" style="padding:3% 5% 3% 5%;">

                        <div class="row mb-5">
                            <h5 class="card-title text-center" style="font-weight:bold; font-size:20px;">
                                မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                                စာရင်းကိုင်အလုပ်သင်များလက်ခံသင်ကြားပေးမည့်အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းလုပ်ကိုင်သူ<br>
                                (Professional Accountant in Public Practice - PAPP)၏အချက်အလက်များ
                            </h5>
                        </div>

                        <div class="row">

                            <div class="col-md-8">
                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span class="pull-left">{{ __('၁။') }}</span>အီးမေးလ်</label>
                                    <div class="col-md-7">
                                        <input type="email" placeholder="အီးမေးလ်လိပ်စာထည့်ပါ" name="email" class="form-control" id="email">
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span class="pull-left">{{ __('၂။') }}</span>လျို့ဝှက်နံပါတ်</label>
                                    <div class="col-md-7">
                                        <input type="password" placeholder="လျို့ဝှက်နံပါတ်ထည့်ပါ" name="password" class="form-control" id="password">
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span class="pull-left">{{ __('၃။') }}</span>လျို့ဝှက်နံပါတ်အတည်ပြုခြင်း</label>
                                    <div class="col-md-7">
                                        <input type="password" placeholder="လျို့ဝှက်နံပါတ်အတည်ပြုခြင်း" name="confirm_password" class="form-control" id="confirm_password">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-center">
                                {{--User Photo--}}
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle shadow">
                                        <img src="{{ asset('assets/images/blank-profile-picture-2.png') }}" id="previewImg"
                                            alt="Upload Photo">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div class="d-flex justify-content-center">
                                        <span class="btn btn-round btn-secondary btn-file">
                                        <span class="fileinput-new">ဓာတ်ပုံ</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*"></span>
                                        <br>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                                {{--User Photo--}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" placeholder="အမည်(မြန်မာ)" name="name_mm" id="name_mm" class="form-control" value="{{ old('name_mm') }}" >
                                </div>
                                <div class="col-md-6">
                                <input type="text" placeholder="အမည်(အင်္ဂလိပ်)" name="name_eng" id="name_eng" class="form-control" value="{{ old('name_eng') }}" >
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၅။') }}</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" placeholder="အဘအမည်(မြန်မာ)" name="father_name_mm" id="father_name_mm" class="form-control" value="{{ old('father_name_mm') }}" >
                                </div>
                                <div class="col-md-6">
                                <input type="text" placeholder="အဘအမည်(အင်္ဂလိပ်)" name="father_name_eng" id="father_name_eng" class="form-control" value="{{ old('father_name_eng') }}" >
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၆။') }}</span>လူမျိူး/ကိုးကွယ်သည့်ဘာသာ</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" placeholder="လူမျိုး" name="race" id="race" class="form-control" value="{{ old('race') }}" >
                                </div>
                                <div class="col-md-6">
                                <input type="text" placeholder="ကိုးကွယ်သည့်ဘာသာ" name="religion" id="religion" class="form-control" value="{{ old('religion') }}" >
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၇။') }}</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                            <div class="col-md-8">
                                <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                    <div class="col-md-2 col-5 pr-1">
                                        <select class="form-control" name="nrc_state_region"
                                                id="nrc_state_region"
                                                style="margin-top: 0px; margin-bottom: 0px;">
                                            <option value="" disabled selected>ရွေးပါ</option>
                                            @foreach($nrc_regions as $region)
                                                <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                    {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-7 px-1">
                                        <select class="form-control" name="nrc_township" id="nrc_township"
                                                style="margin-top: 0px; margin-bottom: 0px;">
                                            <option value="" disabled selected>ရွေးပါ</option>
                                            @foreach($nrc_townships as $township)
                                                <option value="{{ $township['township_mm'] }}">
                                                    {{ $township['township_mm'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-5 px-1">
                                        <select class="form-control" name="nrc_citizen" id="nrc_citizen"
                                                style="margin-top: 0px; margin-bottom: 0px;">
                                            <option value="" disabled selected>ရွေးပါ</option>
                                            @foreach($nrc_citizens as $citizen)
                                                <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                    {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-5 col-7 pl-1">
                                        <input type="text" name="nrc_number" placeholder="၁၂၃၄၅၆"
                                                id="nrc_number" pattern=".{6,6}" class="form-control"
                                                oninput="this.value= en2mm(this.value);"
                                                maxlength="6" minlength="6" placeholder=""
                                                style="height: 38px" value="{{ old('nrc_number') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 text-center">
                                <div class="fileinput fileinput-new text-center mt-4" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail shadow">
                                        <img src="{{ asset('assets/images/image_placeholder.png') }}" id="previewNRCFrontImg" alt="Upload Photo">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                        <span class="btn btn-secondary btn-round btn-file">
                                            <span class="fileinput-new">နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အရှေ့)</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="hidden" value="">
                                            <input type="file" id="nrc_front" name="nrc_front" value="{{ old('nrc_front') }}" accept="image/*">
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    <span class="form-text text-danger">Allowed Jpeg and Png Image.</span>
                                </div>
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="fileinput fileinput-new text-center mt-4" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail shadow">
                                        <img src="{{ asset('assets/images/image_placeholder.png') }}" id="previewNRCBackImg"
                                            alt="Upload Photo">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                        <span class="btn btn-secondary btn-round btn-file">
                                            <span class="fileinput-new">နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အနောက်)</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="hidden" value=""><input type="file" id="nrc_back" name="nrc_back" value="{{ old('nrc_back') }}" accept="image/*">
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    <span class="form-text text-danger">Allowed Jpeg and Png Image.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၈။') }}</span>မွေးသက္ကရာဇ်</label>
                            <div class="col-md-8">
                                <input type="text" name="date_of_birth" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)" value="{{ old('date_of_birth') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၉။') }}</span>ပညာအရည်အချင်း</label>
                            <div class="col-md-8">
                                <input type="text" name="education" class="form-control" placeholder="ပညာအရည်အချင်း">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၀။') }}</span>RA/CPA အောင်မြင်သောနှစ်/ကိုယ်ပိုင်အမှတ်</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="ra_cpa_success_year" id="ra_cpa_success_year" class="form-control" placeholder="RA/CPA အောင်မြင်သောနှစ်">
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="ra_cpa_personal_no" id="ra_cpa_personal_no" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်">
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၁။') }}</span>CPA မှတ်ပုံတင်အမှတ်/ရက်စွဲ</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="cpa_reg_no" id="cpa_reg_no" class="form-control" placeholder="CPA မှတ်ပုံတင်အမှတ်">
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="cpa_reg_date" id="cpa_reg_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)" autocomplete='off'>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၂။') }}</span>PAPP မှတ်ပုံတင်အမှတ်/ရက်စွဲ</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="papp_reg_no" id="papp_reg_no" class="form-control" placeholder="PAPP မှတ်ပုံတင်အမှတ်">
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="papp_reg_date" id="papp_reg_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</label>
                            <div class="col-md-8">
                            <input type="file" class="form-control" id="papp_attachment" name="papp_attachment">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၃။') }}</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                            <div class="col-md-8">
                                <textarea placeholder="ဆက်သွယ်ရန်လိပ်စာ" name="address" class="form-control" rows="3" style="resize:none;" ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>Phone Number/Fax Number</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="fax_no" id="fax_no" class="form-control" placeholder="FAX Number">
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>Contact Email</label>
                            <div class="col-md-8">
                                <input type="email" placeholder="Contact Email" name="m_email" id="m_email" class="form-control" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၄။') }}</span>Audit Firm အမည်</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Audit Firm အမည်" name="audit_firm_name" id="audit_firm_name" class="form-control" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၅။') }}</span>စတင်တည်ထောင်သည့်နေ့</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)" name="audit_started_date" id="audit_started_date" class="form-control" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၆။') }}</span>Audit Firm ၏ဖွဲ့စည်းပုံနှင့်ဝန်ထမ်းအင်အား</label>
                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="number" name="audit_structure" id="audit_structure" class="form-control"  placeholder="0" value="{{ old('audit_structure') }}" >
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="audit_staff_no" id="audit_staff_no" class="form-control" placeholder="0" value="{{ old('audit_staff_no') }}" >
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label">
                                <span class="pull-left">၁၇။</span>လက်ရှိလက်ခံဆောင်ရွက်စစ်ဆေးပေးရသည့်လုပ်ငန်းများ
                            </label>
                            <div class="col-md-8">
                            <div class="form-group">
                                <select name="current_check_service_id[]" id="selected_service_id"
                                    class="form-control form-select" multiple="multiple"
                                    style="width:100%">
                                </select>
                            </div>
                            </div>
                        </div>
                        
                        <div id="check_service_other" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" id="other_service" name="current_check_services_other" class="form-control" placeholder="other" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>လွန်ခဲ့သော၃နှစ်ကနှစ်အလိုက်စစ်ဆေးခဲ့သောလုပ်ငန်းများ</label>
                            <div class="col-md-8">
                            <input type="file" class="form-control" id="attachment_file" name="attachment_file">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၈။') }}</span>ယခင်အလုပ်သင်ကြားပေးမှုအတွေ့အကြုံ ရှိ/မရှိ</label>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="radio" class="form-check-input mr-3" value="1" id="experience_yes" name="experience" >
                                            <label class="form-check-label " for="">ရှိ</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="form-check-input mr-3" value="0" id="experience_no" name="experience" >
                                            <label class="form-check-label " for="">မရှိ</label>
                                        </div>
                                        <label  class="error attend_place_error" style="display:none;" for="experience">Please select one</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="started_teaching" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>စာရင်းကိုင်အလုပ်သင်များအား အလုပ်သင်ကြားပေးမှု စတင်ခဲ့သည့်ခုနှစ်</label>
                                <div class="col-md-8">
                                    <input type="text"  name="started_teaching_year" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)" class="form-control" value="{{ old('started_teaching_year') }}">
                                </div>
                            </div>
                        </div>

                        <div id="internship_accept" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>အလုပ်သင်ဦးရေလက်ခံနိုင်သည့်အရေအတွက်</label>
                                <div class="col-md-8">
                                    <input type="number" name="internship_accept_no" class="form-control" placeholder="0" value="{{ old('internship_accept_no') }}">
                                </div>
                            </div>
                        </div>

                        <div id="current_accept" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>လက်ရှိလက်ခံသင်ကြားပေးသော အလုပ်သင်ဦးရေ</label>
                                <div class="col-md-8">
                                    <input type="number" name="current_accept_no" class="form-control" placeholder="0" value="{{ old('current_accept_no') }}">
                                </div>
                            </div>
                        </div>

                        <div id="trained_trainees" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>မွေးထုတ်ပေးခဲ့သည့် အလုပ်သင်ဦးရေ</label>
                                <div class="col-md-8">
                                    <input type="number" name="trained_trainees_no" class="form-control" placeholder="0" value="{{ old('trained_trainees_no') }}">
                                </div>
                            </div>
                        </div>

                        <div id="repeat_yearly" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>နှစ်စဥ်ဆက်တိုက်အလုပ်သင်ကြားနိုင်ခြင်း ရှိ/မရှိ</label>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" class="form-check-input mr-3" id="yes" value="1" name="repeat_yearly" >
                                                <label class="form-check-label " for="">ရှိ</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" class="form-check-input mr-3" id="no" value="0" name="repeat_yearly" >
                                                <label class="form-check-label " for="">မရှိ</label>
                                                <!-- <div class="invalid-feedback">အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ ရွေးချယ်ပါ</div> -->
                                            </div>
                                            <label  class="error attend_place_error" style="display:none;" for="repeat_yearly">Please select one</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="training_absent" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ</label>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" class="form-check-input mr-3" id="training_absent_yes" value="1" name="training_absent" >
                                                <label class="form-check-label " for="">ရှိ</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" class="form-check-input mr-3" id="training_absent_no" value="0" name="training_absent" >
                                                <label class="form-check-label " for="">မရှိ</label>
                                                <!-- <div class="invalid-feedback">အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ ရွေးချယ်ပါ</div> -->
                                            </div>
                                            <label  class="error attend_place_error" style="display:none;" for="training_absent">Please select one</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="absent_reason" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('') }}</span>ရှိပါက ပြတ်တောက်ခဲ့ရသည့် အကြောင်းအရင်း</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="training_absent_reason" id="exampleFormControlTextarea1" rows="3" style="resize:none;"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="mentor_declare" onchange="$('#submit_btn').prop('disabled', !this.checked)">
                                    <span class="form-check-sign"></span>
                                    <p class="fw-bolder">
                                        * အထက်ဖော်ပြပါအချက်အလက်များအားလုံးမှန်ကန်စွာရေးသွင်းထားပါသည်။၊<br>
                                    </p>
                                </label>

                            </div>
                        </div>

                            <input type="hidden" name="type" value="Student" class="form-control" placeholder="" autocomplete="off" >
                            <input type="hidden" name="status" value="0" class="form-control" placeholder="" autocomplete="off" >

                            <div class="row justify-content-center">
                            <button type="submit" id="submit_btn" class="btn btn-success btn-hover-dark w-25" disabled>
                                Submit
                            </button>
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
<script src="{{ asset("js/form_validation/mentor_validation.js") }}"></script>
<script>
    loadService();
</script>
<script>
    
    $(document).ready(function (e) {

        $('#selected_service_id').select2({
            placeholder: "Select Current Service"
        });

        $("input[name=training_absent]").on("click", function(evt) {
            var checkedValue = $("input[name='training_absent']:checked").val();
            if(checkedValue == '1'){
            $("#absent_reason").css('display','block');
            }
            else if(checkedValue == '0'){
            $("#absent_reason").css('display','none');
            }
        });

        $("input[name=experience]").on("click", function(evt) {
            var checkedValue = $("input[name='experience']:checked").val();
            if(checkedValue == '1'){
                $("#started_teaching,#internship_accept,#current_accept,#trained_trainees,#repeat_yearly,#training_absent").css('display','block');
            }
            else if(checkedValue == '0'){
                $("#internship_accept,#repeat_yearly").css('display','block');
                $("#started_teaching,#trained_trainees,#current_accept,#training_absent,#absent_reason").css('display','none');
            }
        });

        $("#selected_service_id").on("select2:select select2:unselect", function (e) {

            var items= $(this).val();
            for (var i = 0; i <= items.length-1; i++) {
                if(items[i] == 9){
                    $("#check_service_other").show();
                }
            }

        })

        $("input[name='cpa_reg_date']").flatpickr({
              enableTime: false,
              dateFormat: "d-M-Y",
              allowInput: true
        });
        $("input[name='papp_reg_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true
        });
        $("input[name='audit_started_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true
        });
        $("input[name='started_teaching_year']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true
        });

        $("input[name='date_of_birth']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true
        });
        
        
        $("input[id*='nrc_number'], text[id*='nrc_number']").change(function(e) {
            myanmarLetterOnly($(this));
        });

        $(document).on('keydown', '#nrc_number', function () {
            myanmarLetterOnly($(this));
        });

        $("input[id*='name_mm'], text[id*='name_mm']").change(function(e) {
            myanmarLetterOnly($(this));
        });

        $(document).on('keydown', '#name_mm', function () {
            myanmarLetterOnly($(this));
        });

        $("input[id*='father_name_mm'], text[id*='father_name_mm']").change(function(e) {
            myanmarLetterOnly($(this));
        });

        $(document).on('keydown', '#father_name_mm', function () {
            myanmarLetterOnly($(this));
        });

        function myanmarLetterOnly( self )
        {
            val = self.val();
            if ( /[a-zA-Z0-9]+$/.test( val ) ) {
              self.val( val.replace(/[a-zA-Z0-9]+$/, '') );
            }
        }
    });

</script>
@endpush
