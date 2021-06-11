@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'article'
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
                                    CII Pass 3 yr
                                    </a>
                                </li>
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                    CPA I,II
                                    </a>
                                </li>
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                                    CII Pass 1 yr
                                    </a>
                                </li> 
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
                                    QT Pass 3 yr
                                    </a>
                                </li> 
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link5" role="tablist" aria-expanded="false">
                                    CII Pass Renew
                                    </a>
                                </li> 
                                <li class="nav-item col-md-6">
                                    <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link6" role="tablist" aria-expanded="false">
                                    CI,CII Renew
                                    </a>
                                </li>                                     
                            </ul>

                            <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)သင်တန်းကိုအောင်မြင်ပြီးသူတစ်ီဥးဖြစ်ပါသည်။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့်အောက်ဖော်ပြပါ အချက်အလက်များကိုဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(မြန်မာ" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table 3II-pass-3-education table-bordered input-table">
                                                <thead>
                                                    <tr> 
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                       
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("3II-pass-3-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားခြင်း ရှိ/ မရှိ') }}</label>
                                        <div class="col-md-8" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course" id="yes-practice">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course" id="no-practice">
                                                    <label class="form-check-label" for="no-practice">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>                                              
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control " name="" rows="3" placeholder="ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်" required></textarea>                                                
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff" id="yes-ppStaff">
                                                    <label class="form-check-label" for="yes-ppStaff">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff" id="no-ppStaff">
                                                    <label class="form-check-label" for="no-ppStaff">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စာမေးပွဲကျင်းပသည့် ခုနှစ် ၊ လ') }}</label>
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
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အောင်မြင်သည့်အမှတ်စဥ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="အောင်မြင်သည့်အမှတ်စဥ်" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)သင်တန်းအမှတ်စဥ်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-9 col-form-label">{{ __('ကို မြန်မာနိုင်ငံစာရင်းကောင်စီသင်တန်းကျောင်း သို့မဟုတ် ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းတွင် သို့မဟုတ် ကိုယ်တိုင်လေ့လာသင်ယူသူအဖြစ် တတ်ရောက်နေသူ/ ကျရှုံးသူ တစ်ီဥးဖြစ်ပါသည်။') }}</label>                                      
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့်အောက်ဖော်ပြပါ အချက်အလက်များကိုဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table cpa-1-2-education table-bordered input-table">
                                                <thead>
                                                    <tr>        
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("cpa-1-2-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားဖူးခြင်း ရှိ/ မရှိ') }}</label>
                                        <div class="col-md-8" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course2" id="yes-practice">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course2" id="no-practice">
                                                    <label class="form-check-label" for="no-practice">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control " name="contact_address" rows="3" placeholder="ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်" required></textarea>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff2" id="yes-ppStaff">
                                                    <label class="form-check-label" for="yes-ppStaff">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff2" id="no-ppStaff">
                                                    <label class="form-check-label" for="no-ppStaff">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>                                  
                                                                       
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                        
                                </div>

                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ် (၁) နှစ် ထပ်မံဆင်းရန်ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း) စာမေးပွဲကို') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="ခုနှစ်" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-1 col-form-label">{{ __('ခုနှစ်') }}</label>   
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="လ" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-3 col-form-label">{{ __('လ တွင်ကျင်းပခဲ့သော CPA II') }}</label>  
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-3 col-form-label">{{ __('တွင် အောင်မြင်ပြီးသူတစ်ီဥးဖြစ်ပါသည်။') }}</label>                                  
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းလုပ်ကိုင်သူအဖြစ် မှတ်ပုံတင်ခဲ့ဖူးခြင်းမရှိပါ။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားခြင်း(၂)နှစ်ပြည့်မြောက်ပြီး၍ ထပ်မံလိုအပ်သောအလုပ်သင် (၁)နှစ်ကို လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့် အောက်ဖော်ပြပါအချက်အလက်များကို ဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table cII-pass-1-education table-bordered input-table">
                                                <thead>
                                                    <tr>   
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                     
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("cII-pass-1-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff3" id="yes-ppStaff">
                                                    <label class="form-check-label" for="yes-ppStaff">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff3" id="no-ppStaff">
                                                    <label class="form-check-label" for="no-ppStaff">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>                                                                     

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အလုပ်သင်ကာလ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="အလုပ်သင်ကာလ" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ယခုအလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ယခုအလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စာမေးပွဲကျင်းပသည့် ခုနှစ် ၊ လ') }}</label>
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
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အောင်မြင်သည့်အမှတ်စဥ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="အောင်မြင်သည့်အမှတ်စဥ်" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                        
                                </div>
                                  
                                <div class="tab-pane fade" id="link4" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ကျင်းပသည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် အရည်အချင်းစစ် စာမေးပွဲ အောင်မြင်ပြီးသူတစ်ီဥးဖြစ်ပါသည်။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့် အောက်ဖော်ပြပါအချက်အလက်များကို ဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ခုံအမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ခုံအမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table qt-pass-3-education table-bordered input-table">
                                                <thead>
                                                    <tr>      
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                  
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("qt-pass-3-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားဖူးခြင်း ရှိ/ မရှိ') }}</label>
                                        <div class="col-md-8" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course4" id="yes-practice">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course4" id="no-practice">
                                                    <label class="form-check-label" for="no-practice">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control " name="contact_address" rows="3" placeholder="ရှိပါက အထောက်အထားဖြင့် တင်ပြပေးပါရန်" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff4" id="yes-ppStaff">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff4" id="no-ppStaff">
                                                    <label class="form-check-label" for="no-ppStaff">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>                                                                   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စာမေးပွဲကျင်းပသည့် ခုနှစ် ၊ လ') }}</label>
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
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အအမှတ်စဥ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="အမှတ်စဥ်" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                        
                                </div>

                                <div class="tab-pane fade" id="link5" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း) စာမေးပွဲကို') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="ခုနှစ်" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-1 col-form-label">{{ __('ခုနှစ်') }}</label>   
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="လ" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-3 col-form-label">{{ __('လ တွင်ကျင်းပခဲ့သော CPA II') }}</label>  
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-3 col-form-label">{{ __('တွင် အောင်မြင်ပြီးသူတစ်ီဥးဖြစ်ပါသည်။') }}</label>                                  
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-4 col-form-label">{{ __('ယခင်က လက်တွေ့အလုပ်သင်ကြားမှုကို သင်ကြားပေးသည့်') }}</label> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်" required>
                                            </div>
                                        </div>    
                                        <label class="col-md-1 col-form-label">{{ __('ထံတွင်') }}</label>     
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="from_date" class="form-control" placeholder="-မှ-" required>
                                            </div>
                                        </div>                               
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-1 col-form-label">{{ __('နေ့ မှ') }}</label> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input type="text" name="to_date" class="form-control" placeholder="-ထိ-" required>
                                            </div>
                                        </div>    
                                        <label class="col-md-1 col-form-label">{{ __('နေ့အထိ') }}</label>     
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="နှစ်" required>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label">{{ __('နှစ်') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လ" required>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label">{{ __('လ') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ရက်" required>
                                            </div>
                                        </div> 
                                        <label class="col-md-1 col-form-label">{{ __('ရက်') }}</label>                            
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('အလုပ်သင်ကြားခံယူခဲ့ပါသည်။') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ယခုထပ်မံ၍ လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့် အောက်ဖော်ပြပါအချက်အလက်များကို ဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table cII-pass-renew-education table-bordered input-table">
                                                <thead>
                                                    <tr>       
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                 
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("cII-pass-renew-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff5" id="yes-ppStaff">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="ppStaff5" id="no-ppStaff">
                                                    <label class="form-check-label" for="no-ppStaff">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>                                                                     

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အလုပ်သင်ဆင်းခဲ့သည့်ကာလ') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="from_date" class="form-control" placeholder="-မှ-" required>
                                                
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label pl-5">{{ __('မှ') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="to_date" class="form-control" placeholder="-ထိ-" required>
                                                
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label pl-5">{{ __('ထိ') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ယခုအလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ယခုအလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                        
                                </div>

                                <div class="tab-pane fade" id="link6" aria-expanded="true">
                                    <div class="row p-5">
                                        <div class="col-md-8 pt-5" style="padding-left: 100px;">
                                            <div class="row">
                                                <label class="col-form-label ">{{ __('သို့') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('အတွင်းရေးမှူး') }}</label>
                                            </div>
                                            <div class="row" style="padding-left: 45px;">
                                                <label class="col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီ') }}</label>
                                            </div> 
                                        </div>                                                                                
                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>  
                                        <div class="col-md-4"></div>                                    
                                        <div class="col-md-4">
                                            <div class="row" style="padding-right: 89px;">
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
                                        <label class="col-md-2 col-form-label pl-5">{{ __('အကြောင်းအရာ။') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-form-label pl-5">{{ __('လူကြီးမင်းခင်များ/ရှင့်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၁။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('ကျွန်တော်/ ကျွန်မသည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)သင်တန်းအမှတ်စဥ်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="" required>
                                            </div>
                                        </div>  
                                        <label class="col-md-9 col-form-label">{{ __('ကို မြန်မာနိုင်ငံစာရင်းကောင်စီသင်တန်းကျောင်း သို့မဟုတ် ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းတွင် သို့မဟုတ် ကိုယ်တိုင်လေ့လာသင်ယူသူအဖြစ် တတ်ရောက်နေသူ/ ကျရှုံးသူ တစ်ီဥးဖြစ်ပါသည်။') }}</label>                                      
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၂။') }}</label>
                                        <label class="col-md-4 col-form-label">{{ __('ယခင်က လက်တွေ့အလုပ်သင်ကြားမှုကို သင်ကြားပေးသည့်') }}</label> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်" required>
                                            </div>
                                        </div>    
                                        <label class="col-md-1 col-form-label">{{ __('ထံတွင်') }}</label>     
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="from_date" class="form-control" placeholder="-မှ-" required>
                                            </div>
                                        </div>                               
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-1 col-form-label">{{ __('နေ့ မှ') }}</label> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input type="text" name="to_date" class="form-control" placeholder="-ထိ-" required>
                                            </div>
                                        </div>    
                                        <label class="col-md-1 col-form-label">{{ __('နေ့အထိ') }}</label>     
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="နှစ်" required>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label">{{ __('နှစ်') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လ" required>
                                            </div>
                                        </div>
                                        <label class="col-md-1 col-form-label">{{ __('လ') }}</label>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="ရက်" required>
                                            </div>
                                        </div> 
                                        <label class="col-md-1 col-form-label">{{ __('ရက်') }}</label>                            
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('အလုပ်သင်ကြားခံယူခဲ့ပါသည်။') }}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('၃။') }}</label>
                                        <label class="col-md-10 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒရှိပါသဖြင့် အောက်ဖော်ပြပါအချက်အလက်များကို ဖြည့်သွင်းလျှောက်ထားအပ်ပါသည်') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_MM" class="form-control" placeholder="ကိုယ်ပိုင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table cI-II-renew-education table-bordered input-table">
                                                <thead>
                                                    <tr>     
                                                        <th class="less-font-weight text-center"  width="10%">စဉ်</th>                                                   
                                                        <th class="less-font-weight text-center"  width="80%">ပညာအရည်အချင်း</th>                                                        
                                                        <th class="less-font-weight text-center"  width="10%"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("cI-II-renew-education")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="လူမျိုး" required>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အဘအမည် (မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="အဘအမည် (အင်္ဂလိပ်)" required>
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
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-5 col-form-label">{{ __('ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲ့အစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့် / အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ') }}</label>
                                        <div class="col-md-5" style="margin-left: 21px;">
                                            <div class="row pl-5">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course6" id="yes-practice">
                                                    <label class="form-check-label" for="yes-practice">{{ __('ရှိ') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="practice_course6" id="no-practice">
                                                    <label class="form-check-label" for="no-practice">{{ __('မရှိ') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('-ရှိပါက ရာထူး') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="ရာထူး" required>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('စတင်ထမ်းဆောင်သည့်နေ့') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="start_date" class="form-control" placeholder="စတင်ထမ်းဆောင်သည့်နေ့" required>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="contact_address" rows="3" placeholder="ဆက်သွယ်ရန်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <textarea class="form-control " name="address" rows="3" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" required></textarea>
                                            </div>
                                        </div>
                                    </div>                        
                                                                                                            
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="ဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်လိပ်စာ') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်လိပ်စာ" required>
                                            </div>
                                        </div>
                                    </div>                                                                     

                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPPအမည်" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                                               
                                    <div class="row">
                                        <label class="col-md-1 col-form-label pl-5">{{ __('') }}</label>                                        
                                        <div class="col-md-7"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>
                                                                                    
                                    <div class="row">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
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

        $("input[name='date_of_birth']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='from_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='to_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });


        
    });
    </script>
    
@endpush
