@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part2_register_form5'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('da_part2_register_form5') }}
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
                                                <label class="col-md-12 col-form-label text-center" style="font-size:17px; font-weight:bold;">{{ __('လက်မှတ်ရပြည့်သူ့စာရင်းကိုင် /ဒီပလိုမာစာရင်းကိုင် စာမေးပွဲ အောင်လက်မှတ် /အောင်မြင်ကြောင်း ထောက်ခံချက် /အမှတ်စာရင်း(အောင်မြင် /ကျရှုံး)တောင်းခံမှူပုံစံ') }}</label>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4"></div>  
                                                <div class="col-md-4"></div>                                    
                                                <div class="col-md-3">
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
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="name_two" class="form-control" placeholder="တောင်းခံသူအမည်(မြန်မာ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('တောင်းခံသူအမည် (အင်္ဂလိပ်)') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="name_two" class="form-control" placeholder="တောင်းခံသူအမည်(အင်္ဂလိပ်)">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
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
                                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းသားမှတ်ပုံတင်အမှတ်') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="သင်တန်းသားမှတ်ပုံတင်အမှတ်" >
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ)') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်(မြန်မာ)" >
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်(အင်္ဂလိပ်)') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်(အင်္ဂလိပ်)">
                                                    </div>
                                                </div>
                                                
                                            </div>                                           
                                            
                                        
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('စာမေးပွဲအမည်') }}</label>
                                                <div class="col-md-8">
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
                                                <div class="col-md-8">
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
                                                <div class="col-md-8">
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
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="အောင်မြင်သည့်အဆင့်" >
                                                            </div>
                                                        </div>
                                            </div></br>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ကျရှုံး') }}</label>
                                                <div class="col-md-8">
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
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                                <input type="text" name="" class="form-control" placeholder="ဖြေဆိုခွင့်အမှတ်စဉ်" >
                                                            </div>
                                                        </div>
                                            </div></br>
                                        
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                                    <input type="text" name="" class="form-control" placeholder="ဖုန်းနံပါတ်">
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('နေရပ်လိပ်စာ') }}</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <textarea class="form-control " name="" rows="3" placeholder="နေရပ်လိပ်စာ" required></textarea>
                                                        </div>
                                                    </div>
                                            </div></br>                                           
                                            
                                            <div class="row">                                                                                       
                                                <div class="col-md-8"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူ၏အမည်/လက်မှတ်" required>
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">
                                            <div class="col-md-1"></div>
                                                <label class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါအမှတ်စဉ် ၁ မှ ၁၁ တို့တွင် ဖော်ပြထားချက်များအားစိစစ်ပြီးမှန်ကန်ကြောင်း တွေ့ရပါသည်။') }}</label>                                                
                                            </div>

                                            <div class="row">                                                                                       
                                                <div class="col-md-8"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="စာရင်းစစ်-၁ ၏အမည်/လက်မှတ်" required>
                                                    </div>
                                                </div>
                                            </div></br>

                                            <div class="row">                                                                                       
                                                <div class="col-md-8"></div>
                                                <label class="col-md-3 col-form-label">{{ __('ဉီးစီးအရာရှိ') }}</label>
                                            </div></br>

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
