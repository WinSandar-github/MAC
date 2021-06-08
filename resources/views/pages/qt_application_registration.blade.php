@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp

@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'qt_application_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('student_record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-4 col-form-label text-center" style="font-size: 16px; font-weight: bold;">ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်</label>
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-4 col-form-label text-center" style="font-size: 15px; font-weight: bold;">မြန်မာနိုင်ငံစာရင်းကောင်စီ</label>
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-6 col-form-label text-center" style="font-size: 15px; font-weight: bold;">နိုင်ငံခြားတိုင်းပြည်များမှ စာရင်းပညာဆိုင်ရာလက်မှတ်ရရှိထားသည့် မြန်မာနိုင်ငံသားများအား လက်မှတ်ရပြည်သူ့စာရင်းကိုင် အောင်လက်မှတ်ချီးမြှင့်ရန်အတွက် အရည်အချင်းစစ်စာမေးပွဲ ဖြေဆိုရန်လျှောက်လွှာ</label>
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                            </div>
                            

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="အမည်" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
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
                                <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်" required>
                                    </div>
                                </div>
                            </div>   

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၆။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၇။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေထိုင်သည့်လိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေထိုင်သည့်လိပ်စာ" required></textarea>
                                    </div>
                                </div>
                            </div>              

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၈။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                    </div>
                                </div>
                            </div>          

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၉။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" placeholder="တယ်လီဖုန်းနံပါတ်" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၀။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('Fax နံပါတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="fax_number" class="form-control" placeholder="Fax နံပါတ်" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('Email လိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email လိပ်စာ" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိအလုပ်အကိုင်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" name="current_job" class="form-control" placeholder="လက်ရှိအလုပ်အကိုင်" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ရုံးလိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <textarea class="form-control " name="office_address" rows="3" placeholder="ရုံးလိပ်စာ" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ပြည်တွင်းမှရရှိသည့် ပညာအရည်အချင်း (လက်မှတ်မိတ္တူမှန် ပူးတွဲတင်ပြရန်)') }}</label>
                                <div class="col-md-8">
                                    <table class="table in_counrty_education table-bordered input-table">
                                        <thead>
                                            <tr>                                                        
                                                <th class="less-font-weight text-center" width="40%">ပြည်တွင်းမှရရှိသည့် ပညာအရည်အချင်း</th> 
                                                <th class="less-font-weight text-center" width="40%">ပူးတွဲတင်ပြရမည့် လက်မှတ်မိတ္တူမှန်</th>                                                       
                                                <th width="20%" class="text-center"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowInCountryEducation("in_counrty_education")' value="+"></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div></br>                        

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၅။') }}</label>
                                <label class="col-md-9 col-form-label">{{ __('နိုင်ငံကြားတိုင်းပြည်မှပေးအပ်သည့်ပညာအရည်အချင်း (ACCA/ CIMA ခွဲခြားဖော်ပြရန်နှင့် လက်မှတ်မိတ္တမှန် ပူးတွဲတင်ပြရန်)') }}</label><br>
                            </div>    

                            <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(က)') }}</label>
                                <label class="col-md-2 col-form-label" >{{ __('ပေးအပ်သည့်အဖွဲ့အစည်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="ပေးအပ်သည့်အဖွဲ့အစည်းအမည်" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('') }}</label>
                                <label class="col-md-2 col-form-label" >{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required>
                                    </div>
                                </div>
                            </div> 

                            <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('') }}</label>
                                <label class="col-md-2 col-form-label" >{{ __('အီးမေးလ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="အီးမေးလ်" required>
                                    </div>
                                </div>
                            </div> 

                            <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(ခ)') }}</label>
                                <label class="col-md-2 col-form-label" >{{ __('စာမေးပွဲကျင်းပသည့် နှစ်/လ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="နှစ်/လ" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(ဂ)') }}</label>
                                <label class="col-md-2 col-form-label" >{{ __('မှတ်ပုံတင်အမှတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="မှတ်ပုံတင်အမှတ်" required>
                                    </div>
                                </div>
                            </div></br>                                                        
                            
                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၆။') }}</label>
                                <label class="col-md-3 col-form-label">{{ __('လျှောက်ထားသူကျွန်တော်/ကျွန်မ') }}</label>
                                <div class="col-md-2" style="margin-left: -88px;">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="အမည်" required>
                                    </div>
                                </div>
                                <label class="col-md-3 col-form-label" style="margin-left: -20px;">{{ __('သည် မြန်မာနိုင်ငံစာရင်းကောင်စီက') }}</label>
                                <div class="col-md-2" style="margin-left: -72px;">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="ခုနှစ်" required>
                                    </div>
                                </div>
                                <label class="col-md-1 col-form-label">{{ __('ခုနှစ်') }}</label>
                            </div>

                            <div class="row">
                                <label class="col-md-2 col-form-label pl-5">{{ __('') }}</label>
                                <div class="col-md-2" style="margin-left: 86px;">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="လ" required>
                                    </div>
                                </div>
                                <label class="col-md-7 col-form-label" style="margin-left: -21px;">{{ __('လ တွင်ကျင်းပသည့်အရည်အချင်းစစ်စာမေးပွဲကို ဝင်ရောက်ဖြေဆိုရန်လျှောက်ထားခြင်းဖြစ်ပါသည်။') }}</label>                                
                            </div></br>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၇။') }}</label>
                                <label class="col-md-3 col-form-label">{{ __('ကျွန်တော်/ကျွန်မ') }}</label>
                                <div class="col-md-2" style="margin-left: -163px;">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="အမည်" required>
                                    </div>
                                </div>
                                <label class="col-md-7 col-form-label" style="margin-left: -20px;">{{ __('သည် ပြည်ထောင်စုမြန်မာနိုင်ငံသားဖြစ်ကြောင်းနှင့် အခြားနိုင်ငံသားအဖြစ် ခံယူထားခြင်းမရှိကြောင်းဝန်ခံကတိပြုပါသည်။') }}</label>                               
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('၁၈။') }}</label>
                                <label class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါ အချက်အလက်အားလုံးမှန်ကန်ပါသည်။ မမှန်မကန်ဖော်ပြပါက စာမေးပွဲဖြေဆိုခွင့်မရှိကြောင်းနှင့် ဖြေဆိုအောင်မြင်ပါကလည်း မြန်မာနိုင်ငံစာရင်းကောင်စီ၏ အဆုံးအဖြတ်ကိုခံယူပါမည်ဟု ဝန်ခံကတိပြုပါသည်။') }}</label>                                        
                            </div></br></br>

                            <div class="row">
                                <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                    </div>
                                </div>
                            </div></br>                                                       
                            
                        </div>

                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // get NRC Townships data from myanmarnrc.php config file
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
<script type="text/javascript">
    $(document).ready(function (e) {
        $("input[name='date_of_birth']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='register_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
    });

    </script>
@endpush
