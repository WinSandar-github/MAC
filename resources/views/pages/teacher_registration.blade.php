@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher_registration'
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
                            <ul class="nav nav-tabs nav-justified pl-0 active_tab col-md-12 no-gutters" role="tablist">
                                <li class="nav-item col-md-6">
                                    <a class="nav-link active pl-0 pr-2" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                                    သင်တန်းဆရာ မှတ်ပုံတင်လျှောက်လွှာ
                                    </a>
                                </li>
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                    သင်တန်းဆရာ မှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ
                                    </a>
                                </li>                                      
                            </ul>

                            <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <input type="file" id="image" name="image" style="margin-left: 10px;margin-top: 10px;">
                                        </div>

                                        <div class="col-md-4" style="margin-left: 640px;margin-top: -160px;">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div><br> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(မြန်မာ)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(အင်္ဂလိပ်)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(အင်္ဂလိပ်)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="အဘအမည် (မြန်မာ)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (အင်္ဂလိပ်)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၄။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="တယ်လီဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၅။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်(Email)" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၆။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၇။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်') }}</label>
                                        <div class="col-md-8" style="margin-left: 21px;">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" value="" id="yesStaff"/>
                                                <label class="form-check-label mr-5" for="yesStaff">ဟုတ်</label>

                                                <input class="form-check-input" type="checkbox" value="" id="noStaff"/>
                                                <label class="form-check-label" for="noStaff">မဟုတ်</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၈။') }}</label>
                                        <label class="col-md-3 col-form-label">{{ __('သင်ကြားမည့်သင်တန်းနှင့် ဘာသာရပ်များ') }}</label><br>
                                    </div>    

                                    <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                        <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(က)') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                        <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(ခ)') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('ဒီပလိုမာစာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="" placeholder="ဒီပလိုမာစာရင်းကိုင်သင်တန်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                             
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၉။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('သင်ကြားမည့်ဘာသာရပ်အတွက် သင်ကြားမှုနှင့် အခြားအတွေ့အကြုံများ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control " name="" rows="3" placeholder="သင်ကြားမည့်ဘာသာရပ်အတွက် သင်ကြားမှုနှင့် အခြားအတွေ့အကြုံများ" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁၀။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါ အချက်အလက်များမှန်ကန်ကြောင်းကတိပြုဝန်ခံပါသည်။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>

                                    <div class="row">
                                        <label class="col-md-2 col-form-label pl-5">{{ __('မှတ်ချက်။     ။') }}</label>
                                        <label class="col-md-10 col-form-label" style="margin-left: -55px;">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်၊ ဘွဲ့လက်မှတ် မိတ္တူများနှင့် သင်ကြားမှုနှင့် အခြားလုပ်ငန်းအတွေ့အကြုံများအတွက် အထောက်အထားများ ဓာတ်ပုံအပို (၂) ပုံ တင်ပြရမည်။') }}</label>                                
                                    </div>
                                                
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <input type="file" id="image" name="image" style="margin-left: 10px;margin-top: 10px;">
                                        </div>
                                        <div class="col-md-4" style="margin-left: 640px;margin-top: -160px;">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div><br> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(မြန်မာ)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(အင်္ဂလိပ်)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(အင်္ဂလိပ်)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('သင်တန်းဆရာမှတ်ပုံတင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="teacher_id_no" class="form-control" placeholder="သင်တန်းဆရာမှတ်ပုံတင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၄။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="တယ်လီဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၅။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်(Email)" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၆။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၇။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" value="" id="yesStaff"/>
                                                <label class="form-check-label mr-5" for="yesStaff">ဟုတ်</label>

                                                <input class="form-check-input" type="checkbox" value="" id="noStaff"/>
                                                <label class="form-check-label" for="noStaff">မဟုတ်</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၈။') }}</label>
                                        <label class="col-md-3 col-form-label">{{ __('သင်ကြားမည့်သင်တန်းနှင့် ဘာသာရပ်များ') }}</label><br>
                                    </div>    

                                    <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                        <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(က)') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-right: -63px; padding-left: 47px;">
                                        <label class="col-md-1 col-form-label pl-4" style="margin-right: -48px;">{{ __('(ခ)') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('ဒီပလိုမာစာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table student_profile_1 table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="" placeholder="ဒီပလိုမာစာရင်းကိုင်သင်တန်း"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                          
                                                                   
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၉။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါ အချက်အလက်များမှန်ကန်ကြောင်းကတိပြုဝန်ခံပါသည်။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>

                                    <div class="row">
                                        
                                        <label class="col-md-2 col-form-label pl-5">{{ __('မှတ်ချက်။     ။') }}</label>
                                        <label class="col-md-10 col-form-label" style="margin-left: -55px;">{{ __('သင်တန်းဆရာမှတ်ပုံတင်နှင့် ဓာတ်ပုံအပို (၂) ပုံ တင်ပြရမည်။') }}</label>                                
                                    </div>
                                                
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                        
                                </div>
                                  
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-footer ">
                            
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
<script type="text/javascript">
    $(document).ready(function (e) {
       $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

        $("input[name='register_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
    });
    </script>
    
@endpush
