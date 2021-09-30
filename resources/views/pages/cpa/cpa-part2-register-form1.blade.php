@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'cpa_part2_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa-part2-register-form1') }}
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
                                            <div class="col-md-3 text-center">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class=" mt-3 mb-3 col-auto">
                                                    <input type="file" class="form-control" />
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမှတ်စဥ်') }}</label>
	                                      <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" >
	                                          </div>
	                                      </div>
                                          <div class="col-md-2"></div>
                                          <label class="col-md-2 col-form-label">{{ __('ပညာသင်နှစ်') }}</label>
	                                      <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" placeholder="အမည်" >
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
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
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
                                                    <input type="text" name="" class="form-control" placeholder="လူမျိူး/ဘာသာ" >
                                                </div>
                                            </div>
	                                  </div>

	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" class="form-control" name="cpatwo_birthone" placeholder="dd-mm-yyyy">
                                                    </div>
                                                </div>
	                                    </div>


                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" placeholder="ပညာအရည်အချင်း" >
                                                </div>
                                            </div>
	                                    </div>

                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" >
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
	                                      <label class="col-md-5 col-form-label">{{ __('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမ)ပိုင်းစာမေးပွဲအောင်မြင်သည့်နှစ်/လ') }}</label>
	                                        <div class="col-md-5">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-3 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်နှင့်အဆင့်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('မှတ်ပုံတင်ရသည့်အကြောင်းအရင်း{အမှန်ခြစ်အမှတ်အသားပြုရန်}') }}</label>

                                        </div>
                                        <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <input type="checkbox" value="ယခုနှစ်တက်ရောက်ရရှိခြင်း">
                                                    <label class="form-check-label">ယခုနှစ်တက်ရောက်ရရှိခြင်း</label>

                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း">
                                                   <label>သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း</label>

                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း">
                                                   <label>သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း</label>

                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="စာမေးပွဲကျရှုံးခြင်း">
                                                   <label>စာမေးပွဲကျရှုံးခြင်း</label>

                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                    <input type="checkbox" value="သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း">
                                                   <label>သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း</label>

                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                            <label class="col-md-8 col-form-label">{{ __('အပိုဒ် ၁၁ ပါ(က)/(င) အတွက်') }}</label>

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
                                            <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
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
                                                    <input type="text"  name="cpatwo_dateone" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>

	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('မှတ်ချက်။	သင်တန်းတက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်(လျှောက်လွှာကြေး ၁၀၀၀ကျပ်၊မှတ်ပုံတင်ကြေး ၁၀၀၀၀ကျပ်၊သင်တန်းကြေး ၃၅၀၀၀ကျပ်)') }}</label>

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
        createDatepicker("cpatwo_dateone");
        createDatepicker("cpatwo_datetwo");
        createDatepicker("cpatwo_datethree");
        createDatepicker("cpatwo_datefour");
        createDatepicker("cpatwo_datefive");
        createDatepicker("cpatwo_datesix");
        createDatepicker("cpatwo_birthone");
        createDatepicker("cpatwo_birthtwo");
        createDatepicker("cpatwo_birththree");
        createDatepicker("cpatwo_birthfour");

    });

</script>
@endpush
