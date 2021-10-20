@extends('layouts.app', [
'class' => '',
'parentElement' => '',
'elementActive' => 'cpa_one_app_list'
])

@section('content')
    <style>
        .label {
            text-align: right;
        }
    </style>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card px-5">
                    <div class="card-header">
                        <div class="card-title">
                            @if($student->student_info->da_pass_date !== null)
                                <h5 class="text-center font-weight-bold">
                                    မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                                    လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)သင်တန်းတက်ရောက်ခွင့်လျှောက်လွှာ
                                </h5>
                            @elseif($student->student_info->acca_cima !== null)
                                <h5 class="text-center font-weight-bold">
                                    မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                                    လက်မှတ်ရပြည်သူစာရင်းကိုင်(ပထမပိုင်း)သင်တန်းတက်ရောက်ခွင့်လျှောက်လွှာ<br>
                                    (တိုက်ရိုက်တက်ရောက်ခွင့်ရသူများ)<br>
                                </h5>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h6>ရက်စွဲ - {{ $student->date ?? 'N/A' }}</h6>
                            <h6>{{ $student->batch->name_mm }}</h6>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span
                                            class="pull-left">၁။</span>အီးမေးလ်<span style="color:red">*</span></label>
                                    <div class="col-md-7" style="padding-left:35px;">
                                        <input type="email" placeholder="အီးမေးလ်လိပ်စာထည့်ပါ" name="email"
                                               class="form-control" id="email"
                                               value="{{ $student->student_info->email }}">
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span
                                            class="pull-left">၂။</span>လျို့ဝှက်နံပါတ်<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-7" style="padding-left:35px;">
                                        <input type="password" placeholder="လျို့ဝှက်နံပါတ်ထည့်ပါ" name="password"
                                               class="form-control" id="password" disabled>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label class="col-md-5 col-form-label label"><span
                                            class="pull-left">၃။</span>လျို့ဝှက်နံပါတ်အတည်ပြုခြင်း<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-7" style="padding-left:35px;">
                                        <input type="password" placeholder="လျို့ဝှက်နံပါတ်အတည်ပြုခြင်း"
                                               name="confirm_password" class="form-control" id="confirm_password"
                                               disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                {{-- User Photo --}}
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle shadow">

                                        <a href="{{ asset( $student->student_info->image ?? 'assets/images/blank-profile-picture-2.png') }}" target="_blank">
                                            <img
                                                src="{{ asset( $student->student_info->image ?? 'assets/images/blank-profile-picture-2.png') }}"
                                                alt="Upload Photo">
                                        </a>
                                    </div>
                                    {{--<div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div class="d-flex justify-content-center">
                                        <span class="btn btn-round btn-secondary btn-file">
                                            <span class="fileinput-new">ဓာတ်ပုံ</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                                   required></span>
                                        <br>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>--}}
                                </div>
                                {{-- User Photo --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၄။</span>အမည်(မြန်မာ/အင်္ဂလိပ်)<span
                                    style="color:red">*</span></label>
                            <div class="col-md-4">
                                <input type="text" placeholder="အမည်(မြန်မာ)" name="name_mm" class="form-control"
                                       id="name_mm" value="{{ $student->student_info->name_mm }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="အမည်(အင်္ဂလိပ်)" name="name_eng" class="form-control"
                                       id="name_eng" value="{{ $student->student_info->name_eng }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၅။</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်<span
                                    style="color:red">*</span></label>
                            <div class="col-md-8">
                                <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                    <div class="col-md-2 col-5 pr-1">
                                        <select class="form-control form-select" name="nrc_state_region"
                                                id="nrc_state_region">
                                            <option value="" disabled
                                                    selected>{{ $student->student_info->nrc_state_region }}</option>
                                            {{-- @foreach ($nrc_regions as $region)
                                            <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-7 px-1">
                                        <select class="form-control form-select" name="nrc_township" id="nrc_township">
                                            <option value="" disabled
                                                    selected>{{ $student->student_info->nrc_township }}</option>
                                            {{-- @foreach ($nrc_townships as $township)
                                            <option value="{{ $township['township_mm'] }}">
                                                {{ $township['township_mm'] }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-5 px-1">
                                        <select class="form-control form-select" name="nrc_citizen" id="nrc_citizen">
                                            <option value="" disabled
                                                    selected>{{ $student->student_info->nrc_citizen }}</option>
                                            {{-- @foreach ($nrc_citizens as $citizen)
                                            <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="col-md-5 col-7 pl-1">
                                        <input type="text" name="nrc_number" placeholder="၁၂၃၄၅၆" id="nrc_number"
                                               class="form-control" value="{{ $student->student_info->nrc_number }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 text-center">
                                <div class="fileinput fileinput-new text-center mt-4" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail shadow">
                                        <a href="{{ asset($student->student_info->nrc_front ?? 'assets/images/image_placeholder.png') }}" target="_blank">
                                            <img
                                                src="{{ asset($student->student_info->nrc_front ?? 'assets/images/image_placeholder.png') }}"
                                                alt="Upload Photo">
                                        </a>
                                    </div>
                                    {{--<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                        <span class="btn btn-secondary btn-round btn-file">
                                            <span class="fileinput-new">နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အရှေ့)</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="hidden" value="">
                                            <input type="file" id="nrc_front" name="nrc_front"
                                                   value="{{ old('nrc_front') }}" accept="image/*" required>
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    <span class="form-text text-danger">Allowed Jpeg and Png Image.</span>--}}
                                </div>
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="fileinput fileinput-new text-center mt-4" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail shadow">
                                        <a href="{{ asset($student->student_info->nrc_front ?? 'assets/images/image_placeholder.png') }}" target="_blank">
                                            <img
                                                src="{{ asset($student->student_info->nrc_front ?? 'assets/images/image_placeholder.png') }}"
                                                alt="Upload Photo">
                                        </a>
                                    </div>
                                    {{--<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                    <div>
                                        <span class="btn btn-secondary btn-round btn-file">
                                            <span class="fileinput-new">နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အနောက်)</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="hidden" value=""><input type="file" id="nrc_back"
                                                                                 name="nrc_back"
                                                                                 value="{{ old('nrc_back') }}"
                                                                                 accept="image/*" required>
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    <span class="form-text text-danger">Allowed Jpeg and Png Image.</span>--}}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၆။</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)<span
                                    style="color:red">*</span></label>
                            <div class="col-md-4">
                                <input type="text" placeholder="အဘအမည်(မြန်မာ)" name="father_name_mm"
                                       class="form-control" value="{{ $student->student_info->father_name_mm }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="အဘအမည်(အင်္ဂလိပ်)" name="father_name_eng"
                                       class="form-control" value="{{ $student->student_info->father_name_eng }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">၇။</span>လူမျိုး<span
                                    style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" placeholder="လူမျိုး" name="race" class="form-control"
                                       value="{{ $student->student_info->race }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၈။</span>ကိုးကွယ်သည့်ဘာသာ<span style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ကိုးကွယ်သည့်ဘာသာ" name="religion" class="form-control"
                                       value="{{ $student->student_info->religion }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၉။</span>မွေးသက္ကရာဇ်<span style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="date_of_birth" class="form-control"
                                       value="{{ $student->student_info->date_of_birth }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၀။</span>ဖုန်းနံပါတ်<span style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ဖုန်းနံပါတ်" name="phone" class="form-control"
                                       value="{{ $student->student_info->phone }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၁။</span>ဆက်သွယ်ရမည့်လိပ်စာ<span
                                    style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ဆက်သွယ်ရမည့်လိပ်စာ" name="current_address"
                                       class="form-control" value="{{ $student->student_info->current_address }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၂။</span>အမြဲတမ်းနေရပ်လိပ်စာ<span
                                    style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" placeholder="အမြဲတမ်းနေရပ်လိပ်စာ" name="address" class="form-control"
                                       value="{{ $student->student_info->address }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၃။</span>လက်ရှိအလုပ်အကိုင်</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="လက်ရှိအလုပ်အကိုင်" name="current_job"
                                       class="form-control" value="{{ $student->student_info->student_job->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၄။</span>ရာထူး</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ရာထူး" name="position" class="form-control"
                                       value="{{ $student->student_info->student_job->position }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၅။</span>ဌာန</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ဌာန" name="department" class="form-control"
                                       value="{{ $student->student_info->student_job->department }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၆။</span>အဖွဲ့အစည်း</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="အဖွဲ့အစည်း" name="organization" class="form-control"
                                       value="{{ $student->student_info->student_job->organization }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၇။</span>ကုမ္ပဏီအမည်</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ကုမ္ပဏီအမည်" name="company_name" class="form-control"
                                       value="{{ $student->student_info->student_job->company_name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၈။</span>လစာနှင့်လစာနှုန်း</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="လစာနှင့်လစာနှုန်း" name="salary" class="form-control"
                                       value="{{ $student->student_info->student_job->salary }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၉။</span>ရုံးလိပ်စာ</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="ရုံးလိပ်စာ" name="office_address" class="form-control"
                                       value="{{ $student->student_info->student_job->office_address }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၂၀။</span>နိုင်ငံ့ဝန်ထမ်းဟုတ်/မဟုတ်<span
                                    style="color:red">*</span></label>
                            <div class="col-md-4 pt-2">
                                <div class="form-check-radio form-check-inline px-0">
                                    <label class="form-check-label" for="yes">
                                        <input class="form-check-input" type="radio"
                                               id="yes" name="gov_staff" value='1'
                                            {{ $student->student_info->gov_staff == '1' ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        ဟုတ်
                                    </label>
                                </div>

                                <div class="form-check-radio form-check-inline px-0">
                                    <label class="form-check-label" for="no">
                                        <input class="form-check-input" type="radio"
                                               id="no" name="gov_staff" value='0'
                                            {{ $student->student_info->gov_staff == '0' ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        မဟုတ်
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="rec_letter" style="display:none">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</label>
                                <div class="col-md-8 pt-2" id="degree_edu">
                                    <?php

                                    if ($student->student_info->recommend_letter != null) {
                                        echo '<a href="$student->student_info->recommend_letter" class="pt-2" target="_blank">View File</a>';
                                    } else {
                                        echo '<a href="#" class="pt-2">File Not Found</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label">
                                <span class="pull-left">၂၁။</span>တက္ကသိုလ်တစ်ခုခုမှအောင်မြင်ပြီးခဲ့သော -
                            </label>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(က)</label>
                                <label class="col-md-6 label">ဘွဲ့အမည်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" placeholder="ဘွဲ့အမည်" name="degree_name" class="form-control"
                                       value="{{ $student->student_info->student_education_histroy->degree_name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ခ)</label>
                                <label class="col-md-6 label">တက္ကသိုလ်အမည်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" placeholder="တက္ကသိုလ်အမည်" name="university_name"
                                       class="form-control"
                                       value="{{ $student->student_info->student_education_histroy->university_name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ဂ)</label>
                                <label class="col-md-6 label">ခုံအမှတ်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" placeholder="ခုံအမှတ်" name="roll_number" class="form-control"
                                       value="{{ $student->student_info->student_education_histroy->roll_number }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ဃ)</label>
                                <label class="col-md-6 label">နှစ်၊လ</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" placeholder="နှစ်၊လ(MMM-YYYY)" name="qualified_date"
                                       class="form-control"
                                       value="{{ $student->student_info->student_education_histroy->qualified_date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4">
                                <label class='col-md-6 label'>(င)</label>
                                <label class="col-md-6 label">Attached Certificate</label>
                            </div>
                            <div class="col-md-8" id="edu">
                                <div class="row mb-3" id="edu0">
                                    <div class="col-md-11" id="degree_edu">

                                        <?php
                                        if ($student->student_info->student_education_histroy->certificate != null) {

                                            $files = json_decode($student->student_info->student_education_histroy->certificate);

                                            foreach ($files as $file) {
                                                echo "<a href='$file' class='pt-2' target='_blank'>View File</a>";
                                            }
                                        } else {
                                            echo "<a href='#' class='pt-2'>File Not Found</a>";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--if Direct student--}}
                        <?php if ($student->student_info->da_pass_date === null) { ?>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၂၃။</span>ACCA/CIMA တက်ရောက်နေသူ -</label>
                            <div class="col-md-4 pt-2">
                                <div class="form-check-radio form-check-inline px-0">
                                    <label class="form-check-label" for="yes">
                                        <input class="form-check-input" type="radio"
                                               id="yes" name='acca_cima'
                                            {{ $student->student_info->acca_cima == '1' ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        ACCA
                                    </label>
                                </div>

                                <div class="form-check-radio form-check-inline px-0">
                                    <label class="form-check-label" for="no">
                                        <input class="form-check-input" type="radio"
                                               id="no" name="acca_cima"
                                            {{ $student->student_info->acca_cima == '2' ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        CIMA
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(က)</label>
                                <label class="col-md-6 label">အောင်မြင်ထားသည့်အဆင့်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $student->student_info->direct_degree }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ခ)</label>
                                <label class="col-md-6 label">လ/ခုနှစ်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $student->student_info->degree_date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ဂ)</label>
                                <label class="col-md-6 label">မှတ်ပုံတင်အမှတ်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $student->student_info->degree_rank }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ဂ)</label>
                                <label class="col-md-6 label">Attached Certificate</label>
                            </div>
                            <div class="col-md-8 pt-2">
                                <a href="{{ asset($student->student_info->degree_certificate_image) }}" class="pt-2" target="_blank">View File</a>
                            </div>
                        </div>

                        <?php } ?>
                        {{--if Direct student--}}

                        {{--if DA II pass student--}}
                        <?php if ($student->student_info->da_pass_date !== null) { ?>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၂၃။</span>ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)စာမေးပွဲအောင်မြင်ခဲ့သည့်<span
                                    style="color:red">*</span>-</label>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(က)</label>
                                <label class="col-md-6 label">ခုနှစ်/လ</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $student->student_info->da_pass_date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ခ)</label>
                                <label class="col-md-6 label">ကိုယ်ပိုင်အမှတ်</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $student->student_info->da_pass_roll_number }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-md-4 col-form-label">
                                <label class='col-md-6 label'>(ဂ)</label>
                                <label class="col-md-6 label">Attached Certificate</label>
                            </div>
                            <div class="col-md-8 pt-2">
                                <a href="{{ asset($student->student_info->da_pass_certificate) }}" class="pt-2" target="_blank">View File</a>
                            </div>
                        </div>
                        <?php } ?>
                        {{--if DA II pass student--}}

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၂၂။</span>သင်တန်းတက်ရောက်မည့်နေရာ<span
                                    style="color:red">*</span>-</label>
                            <div class="col-sm-8 col-md-8 checkbox-radios py-2">
                                <div class="form-check-radio px-0">
                                    <label class="form-check-label" for="main_mac">
                                        <input class="form-check-input" type="radio"
                                               id="main_mac" name="attend_place" value='2'
                                               onclick="selectType()">
                                        <span class="form-check-sign"></span>
                                        ပြည်ထောင်စုစာရင်းစစ်ချုပ်ရုံး
                                    </label>
                                </div>
                                <div class="col-md-12" id="blk_mac" style="display:none">
                                    <div class="mx-4 row  ">
                                        <div class="col-md-5 form-check-radio px-0  ">
                                            <label class="form-check-label" for="sub_mac">
                                                <input class="form-check-input" type="radio" id="sub_mac"
                                                       name="mac_type"
                                                       value='1'>
                                                <span class="form-check-sign"></span>
                                                ရန်ကုန်သင်တန်းကျောင်း
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mx-4 row  ">
                                        <div class="col-md-5  form-check-radio px-0  ">
                                            <label class="form-check-label" for="sub_mac2">
                                                <input class="form-check-input" type="radio" id="sub_mac2"
                                                       name="mac_type"
                                                       value='2'>
                                                <span class="form-check-sign"></span>
                                                နေပြည်တော်သင်တန်းကျောင်း
                                            </label>
                                        </div>

                                        <label class="error attend_place_error" style="display:none;" for="mac_type">
                                            Please select one
                                        </label>
                                    </div>

                                </div>

                                <div class="form-check-radio px-0">
                                    <!-- <input class="form-check-input" type="radio" name="type" value='1'  onclick="selectType()"> -->
                                    <label class="form-check-label" for="private">

                                        <input class="form-check-input" type="radio" id="private" name="attend_place"
                                               value='1' onclick="selectType()">
                                        <span class="form-check-sign"></span>
                                        ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း
                                    </label>
                                </div>
                                <div class="form-check-radio px-0">
                                    <!-- <input class="form-check-input " type="radio" name="type" value='0'  onclick="selectType()"> -->
                                    <label class="form-check-label" for="self">
                                        <!-- <span class="form-check-sign"></span> -->
                                        <input class="form-check-input" id="self" type="radio" name="attend_place"
                                               value='0' onclick="selectType()">
                                        <span class="form-check-sign"></span>
                                        ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ
                                    </label>
                                </div>
                                <div class="form-check-radio px-0">
                                    <label class="error attend_place_error" style="display:none;" for="attend_place">Please
                                        select one</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="da_one_declare" checked>
                                    <span class="form-check-sign"></span>
                                    <p class="fw-bolder">
                                        * အထက်ဖော်ပြပါအချက်အလက်များအားလုံးမှန်ကန်ပါသည်။၊<br>
                                        *
                                        မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကိုလိုက်နာမည်ဖြစ်ကြောင်းဝန်ခံလျှက်လျှောက်ထားအပ်ပါသည်။
                                    </p>
                                </label>

                            </div>
                        </div>

                        @if($student->approve_reject_status == 0)
                        <div class="row mt-5 justify-content-center" id="approve_reject">
                            <button type="submit" name="save" id="reject" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="width : 20%">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                Reject Student
                            </button>
                            <button type="submit" name="save" id="approve" class="btn btn-primary" onclick="approveUser({{ $student->student_info_id }})" style="width : 20%">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                Approve Student
                            </button>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="remark-form" method="post" action="javascript:rejectUser({{ $student->student_info_id }})" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                    <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="remark-form">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('input, select').attr('disabled', true);

            $('input[type=radio][name=attend_place]').map((k, v) => {
                return $(v).val() == {{ $student->type }} ? $(v).attr('checked', 'true') : '';
            });

            if ({{ $student->type }} === 2) {
                $('#blk_mac').show();
                $('input[type=radio][name=mac_type]').map((key, val) => {
                    return $(val).val() == {{ $student->mac_type ?? 'N/A' }} ? $(val).attr('checked', 'true') : '';
                });
            } else {
                $('#blk_mac').hide();
            }

            if ({{ $student->student_info->gov_staff }} === 1) {
                $('#rec_letter').show();
            } else {
                $('#rec_letter').hide();
            }
        });
    </script>
@endpush
