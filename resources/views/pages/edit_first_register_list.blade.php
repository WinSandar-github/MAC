@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
    $education_lists = count($register_list['educations']);
    $stepbystep_lists = count($register_list['stepbystep_positions']);
    $central_lists = count($register_list['central_staffes']);
    $pension_lists = count($register_list['pension_officers']);
    $foreign_lists = count($register_list['foreign_conditions']);
@endphp

@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'registered_user_list'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ route('registered_list.user_update', $register_list['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Update Profile') }}</h5>
                            {{-- {{ $central_lists }} --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <img id="preview-image-before-upload" src="{{ asset('img/user_profile/'.$register_list['image']) }}" alt="preview image" style="max-height: 150px;">
                                    <input type="file" id="image" name="image" style="margin-left: 56px; margin-top: 6px;">
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="အမည်" value="{{ $register_list['name'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်" value="{{ $register_list['father_name'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                        <div class="col-md-2 col-5 pr-1">
                                            <select class="form-control" name="nrc_state_region" id="nrc_state_region" style="padding-top: 0px; margin-top: 0px !important; margin-bottom: 0px;">
                                                <option value="{{ $register_list['nrc_state_region'] }}" selected>{{ $register_list['nrc_state_region'] }}</option>
                                                @foreach($nrc_regions as $region)
                                                        <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                            {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                        </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-7 px-1">
                                            <select class="form-control" name="nrc_township" id="nrc_township" style="margin-top: 0px; margin-bottom: 0px;">
                                                <option value="{{ $register_list['nrc_township'] }}" selected>{{ $register_list['nrc_township'] }}</option>
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
                                                <option value="{{ $register_list['nrc_citizen'] }}" selected>{{ $register_list['nrc_citizen'] }}</option>
                                                @foreach($nrc_citizens as $citizen)
                                                <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                    {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-5 col-7 pl-1">
                                            <input type="text" name="nrc_number" id="nrc_number" pattern=".{6,6}" class="form-control" value="{{ $register_list['nrc_number'] }}"  maxlength="6" minlength="6" placeholder="" style="height: 38px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control" value="{{ $register_list['date_of_birth'] }}" placeholder="မွေးသက္ကရာဇ်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အသက်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="age" class="form-control" placeholder="အသက်" value="{{ $register_list['age'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                <div class="col-md-8">
                                    <table class="table student_profile_1 table-bordered input-table">
                                        <tbody>
                                            @for($i = 0; $i < $education_lists; $i++)
                                                <tr>
                                                    <td class="border-color"><input type="text" class="form-control" name="education[]" value="{{ $register_list['educations'][$i]['graduation_name'] }}" placeholder="ပညာအရည်အချင်း"/></td>
                                                    <td class="border-color">
                                                        @if($i < 1)
                                                            <input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add_1" value="+">
                                                        @endif
                                                        <input type="button" class="student_delete_1 btn btn-sm btn-danger "  value="X">
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လူမျိုး') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="race" class="form-control" placeholder="လူမျိုး" value="{{ $register_list['race'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဘာသာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="religion" class="form-control" placeholder="ဘာသာ" value="{{ $register_list['religion'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိနေရပ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_address" class="form-control" placeholder="လက်ရှိနေရပ်" value="{{ $register_list['current_address'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဇနီး/ခင်ပွန်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="partner_name" class="form-control" placeholder="ဇနီး/ခင်ပွန်းအမည်" value="{{ $register_list['partner_name'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိရာထူး') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_position" class="form-control" placeholder="လက်ရှိရာထူး" value="{{ $register_list['current_position'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိလစာနှုန်း') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="current_salary" class="form-control" placeholder="လက်ရှိလစာနှုန်း" value="{{ $register_list['current_salary'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိဌာန') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_department" class="form-control" placeholder="လက်ရှိဌာန" value="{{ $register_list['current_department'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိအလုပ်နေရာ‌‌ဒေသ‌') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_job_location" class="form-control" placeholder="လက်ရှိအလုပ်နေရာ‌‌ဒေသ‌" value="{{ $register_list['current_job_location'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိအဆင့်တွင်စတင်တာဝန်ထမ်းဆောင်သည့်နေ့') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="current_position_start_date" class="form-control" placeholder="လက်ရှိအဆင့်တွင်စတင်တာဝန်ထမ်းဆောင်သည့်နေ့" value="{{ $register_list['current_position_start_date'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၆။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အလုပ်စတင်ဝင်ရောက်သည့်နေ့') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="job_start_date" class="form-control" placeholder="အလုပ်စတင်ဝင်ရောက်သည့်နေ့" value="{{ $register_list['job_start_date'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၇။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('Training ပေးသောသင်တန်းများ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="training_class" id="training_class" class="form-control">
                                            <option value="{{ $register_list['training_class']['id'] }}">{{ $register_list['training_class']['training_name'] }}</option>
                                            @foreach($training_classes as $training_class)
                                                <option value="{{ $training_class['id'] }}" height="30">{{ $training_class['training_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၈။') }}</label>
                                    <label class="col-md-3 col-form-label" style="text-align: left">{{ __('ရာထူးအဆင့်ဆင့်ထမ်းဆောင်ခဲ့မှု -') }}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card" style="background-color: rgb(186, 224, 241)">
                                            <div class="card-body">
                                                <table id="myTable" class="table profile table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight" rowspan="2">တာဝန်ထမ်းဆောင်ခဲ့သောရာထူးများ</th>
                                                            <th class="less-font-weight" rowspan="2">ထမ်းဆောင်ခဲ့သည့်ဌာန</th>
                                                            <th class="less-font-weight" rowspan="2">ထမ်းဆောင်ခဲ့သည့်နေရာဒေသ</th>
                                                            <th class="less-font-weight" colspan="2">ထမ်းဆောင်ခဲ့သည့်ကာလ</th>
                                                            <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                <input type="button" class="btn btn-primary btn-sm" id="add" value="+">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="less-font-weight">မှ</th>
                                                            <th class="less-font-weight">ထိ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i = 0; $i < $stepbystep_lists; $i++)
                                                            <tr>
                                                                <td><input type="text" name="stepbystep_position[{{ $i }}]" class="form-control" value="{{ $register_list['stepbystep_positions'][$i]['position'] }}"></td>

                                                                <td><input type="text" name="stepbystep_department[{{ $i }}]" class="form-control" value="{{ $register_list['stepbystep_positions'][$i]['department'] }}"></td>

                                                                <td><input type="text" name="stepbystep_region[{{ $i }}]" class="form-control" value="{{ $register_list['stepbystep_positions'][$i]['region'] }}"></td>

                                                                <td><input type="date" name="stepbystep_start_date[{{ $i }}]" class="form-control" value="{{ $register_list['stepbystep_positions'][$i]['start_date'] }}"></td>

                                                                <td><input type="date" name="stepbystep_end_date[{{ $i }}]" class="form-control" value="{{ $register_list['stepbystep_positions'][$i]['end_date'] }}"></td>

                                                                <td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၉။') }}</label>
                                    <label class="col-md-10 col-form-label change-font-size" style="text-align: left">{{ __('ဗဟိုဝန်ထမ်းတက္ကသိုလ် အရာထမ်းအခြေခံသင်တန်း/အရာထမ်းလောင်းအခြေခံသင်တန်း တက်ရောက်ခဲ့သည့် - ') }}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card" style="background-color: rgb(186, 224, 241)">
                                            <div class="card-body">
                                                <table id="myTable_2" class="table profile_2 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight">သင်တန်းအမှတ်စဥ်</th>
                                                            <th class="less-font-weight">ခုနှစ်</th>
                                                            <th class="less-font-weight">တက္ကသိုလ်</th>
                                                            <th class="less-font-weight" style="text-align: right;">
                                                                <input type="button" class="btn btn-primary btn-sm" id="add_2" value="+">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i = 0; $i < $central_lists; $i++)
                                                            <tr>
                                                                <td><input type="text" name="central_class_number[{{ $i }}]" class="form-control" value="{{ $register_list['central_staffes'][$i]['central_class_number'] }}"></td>
                                                                <td><input type="date" name="central_year[{{ $i }}]" class="form-control" value="{{ $register_list['central_staffes'][$i]['central_year'] }}"></td>
                                                                <td><input type="text" name="central_university[{{ $i }}]" class="form-control" value="{{ $register_list['central_staffes'][$i]['central_university'] }}"></td>
                                                                <td><input type="button" class="delete_2 btn btn-sm btn-danger "  value="X"></td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၂၀။') }}</label>
                                    <label class="col-md-10 col-form-label change-font-size" style="text-align: left">{{ __('တပ်မတော်မှအငြိမ်းစားအရာရှိဖြစ်ပါက ခြေလျင်တပ်စုရင်းသင်တန်းနှင့် အလားတူအဆင့်ရှိသင်တန်း တက်ရောက်ခဲ့သည့် - ') }}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card" style="background-color: rgb(186, 224, 241)">
                                            <div class="card-body">
                                                <table id="myTable_3" class="table profile_3 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight">သင်တန်းအမှတ်စဥ်</th>
                                                            <th class="less-font-weight">ခုနှစ်</th>
                                                            <th class="less-font-weight">တက္ကသိုလ်</th>
                                                            <th class="less-font-weight" style="text-align: right;">
                                                                <input type="button" class="btn btn-primary btn-sm" id="add_3" value="+">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i = 0; $i < $pension_lists; $i++)
                                                            <tr>
                                                                <td><input type="text" name="pension_class_number[{{ $i }}]" class="form-control" value="{{ $register_list['pension_officers'][$i]['pension_class_number'] }}"></td>
                                                                <td><input type="date" name="pension_year[{{ $i }}]" class="form-control" value="{{ $register_list['pension_officers'][$i]['pension_year'] }}"></td>
                                                                <td><input type="text" name="pension_university[{{ $i }}]" class="form-control" value="{{ $register_list['pension_officers'][$i]['pension_university'] }}"></td>
                                                                <td><input type="button" class="delete_3 btn btn-sm btn-danger "  value="X"></td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၂၁။') }}</label>
                                    <label class="col-md-10 col-form-label change-font-size" style="text-align: left">{{ __('နိုင်ငံခြားသို့ရောက်ရှိနေသောအခြေအနေ - ') }}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card" style="background-color: rgb(186, 224, 241)">
                                            <div class="card-body">
                                                <table id="myTable_1" class="table profile_1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight" colspan="2">ကာလ</th>
                                                            <th class="less-font-weight" rowspan="2">သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                                                            <th class="less-font-weight" rowspan="2">တက်ရောက်ခဲ့သည့်သင်တန်း/ဆွေးနွေးပွဲ/အစည်းအဝေး</th>
                                                            <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                <input type="button" class="btn btn-primary btn-sm" id="add_1" value="+">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="less-font-weight" width="150px">မှ</th>
                                                            <th class="less-font-weight" width="150px">ထိ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i = 0; $i < $foreign_lists; $i++)
                                                            <tr>
                                                                <td><input type="date" name="foreign_start_date[{{ $i }}]" class="form-control" value="{{ $register_list['foreign_conditions'][$i]['foreign_start_date'] }}"></td>
                                                                <td><input type="date" name="foreign_end_date[{{ $i }}]" class="form-control" value="{{ $register_list['foreign_conditions'][$i]['foreign_end_date'] }}"></td>
                                                                <td><input type="text" name="foreign_travel_country[{{ $i }}]" class="form-control" value="{{ $register_list['foreign_conditions'][$i]['foreign_travel_country'] }}"></td>
                                                                <td><textarea name="foreign_attendance_class[{{ $i }}]" id="foreign_attendance_class" cols="30" rows="5">{{ $register_list['foreign_conditions'][$i]['foreign_attendance_class'] }}</textarea></td>
                                                                <td><input type="button" class="delete_1 btn btn-sm btn-danger "  value="X"></td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('ပြင်မည်') }}</button>
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
       $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
       });
    });
    </script>
    <script>
        $(document).ready(function () {
        var counter = 0;

        $("#add").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" name="stepbystep_position[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="stepbystep_department[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="stepbystep_region[]" class="form-control" /></td>';
            cols += '<td><input type="date" name="stepbystep_start_date[]" class="form-control" /></td>';
            cols += '<td><input type="date" name="stepbystep_end_date[]" class="form-control" /></td>';

            cols += '<td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>';
            newRow.append(cols);
            $("table.profile").append(newRow);
            counter++;
        });

        $("table.profile").on("click", ".delete", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });

        });
    </script>
    <script>
        $(document).ready(function () {
        var counter = 0;

        $("#add_1").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input name="foreign_start_date[]" type="date" class="form-control"/></td>';
            cols += '<td><input name="foreign_end_date[]" type="date" class="form-control"/></td>';
            cols += '<td><input name="foreign_travel_country[]" type="text" class="form-control" /></td>';
            cols += '<td><textarea name="foreign_attendance_class[]" id="foreign_attendance_class" cols="30"  rows="5"></textarea></td>';

            cols += '<td><input type="button" class="delete_1 btn btn-sm btn-danger "  value="X"></td>';
            newRow.append(cols);
            $("table.profile_1").append(newRow);
            counter++;
        });

        $("table.profile_1").on("click", ".delete_1", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });
    });
    </script>
    <script>
        $(document).ready(function () {
        var counter = 0;
        $("#add_2").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input name="central_class_number[]" type="text" class="form-control"/></td>';
            cols += '<td><input name="central_year[]" type="date" class="form-control"/></td>';
            cols += '<td><input name="central_university[]" type="text" class="form-control" /></td>';

            cols += '<td><input type="button" class="delete_2 btn btn-sm btn-danger "  value="X"></td>';
            newRow.append(cols);
            $("table.profile_2").append(newRow);
            counter++;
        });

        $("table.profile_2").on("click", ".delete_2", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });
    });
    </script>
    <script>
        $(document).ready(function () {
            var counter = 0;
            $("#add_3").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input name="pension_class_number[]" type="text" class="form-control"/></td>';
                cols += '<td><input name="pension_year[]" type="date" class="form-control"/></td>';
                cols += '<td><input name="pension_university[]" type="text" class="form-control" /></td>';

                cols += '<td><input type="button" class="delete_3 btn btn-sm btn-danger "  value="X"></td>';

                newRow.append(cols);
                $("table.profile_3").append(newRow);
                counter++;
            });
            $("table.profile_3").on("click", ".delete_3", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            var counter = 0;
            $("#student_add_1").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td class="border-color"><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>';
                cols += '<td class="border-color"><input type="button" class="student_delete_1 btn btn-sm btn-danger"  value="X"></td>';

                newRow.append(cols);
                $("table.student_profile_1").append(newRow);
                counter++;
            });
            $("table.student_profile_1").on("click", ".student_delete_1", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        });
    </script>
@endpush
