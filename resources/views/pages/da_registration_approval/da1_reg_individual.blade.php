@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'da_one_app_list'
])

@section('content')
    <style>
        .label {
            text-align: right;
        }
    </style>

    <div class="content">
        <!-- DA One Register (MAC) -->
        <div class="row" id="mac_container" {{ $student->type == 2 ? '' : 'hidden' }}>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="text-center font-weight-bold">
                            မြန်မာနိုင်ငံစာရင်းကောင်စီ<span id="mac_type_name"></span>
                            <br/>
                            ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ
                        </h5>
                        <div class="d-flex justify-content-between">
                            <h6>ရက်စွဲ - {{ $student->date }}</h6>
                            <h6>အမှတ်စဥ် - <span class="batch_number">{{ $student->batch_no }}</span></h6>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="row mb-4 mt-4">
                                    <label for="" class="col-md-6 col-form-label label"><span
                                            class="pull-left">၁။</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                    <div class="col-md-3">
                                        <input type="text" name="name_mm" class="form-control" value="{{ $student->student_info->name_mm }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="name_eng" class="form-control" value="{{ $student->student_info->name_eng }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-md-6 col-form-label label"><span
                                            class="pull-left">၂။</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                    <div class="col-md-6">
                                        <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                            <div class="col-md-2 col-5 pr-1">
                                                <input type="text" name="nrc_state_region" style="padding:6px"
                                                       class="form-control" value="{{ $student->student_info->nrc_state_region }}">
                                            </div>
                                            <div class="col-md-3 col-7 px-1">
                                                <input type="text" name="nrc_township" style="padding:6px"
                                                       class="form-control" value="{{ $student->student_info->nrc_township }}">
                                            </div>
                                            <div class="col-md-2 col-5 px-1">
                                                <input type="text" name="nrc_citizen"
                                                       class="form-control" style="padding:6px" value="{{ $student->student_info->nrc_citizen }}">
                                            </div>

                                            <div class="col-md-5 col-7 pl-1">
                                                <input type="text" name="nrc_number" class="form-control" style="height: 38px" value="{{ $student->student_info->nrc_number }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <label for="" class="col-md-6 col-form-label label"><span
                                            class="pull-left">၃။</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                    <div class="col-md-3">
                                        <input type="text" name="father_name_mm"
                                               class="form-control" value="{{ $student->student_info->father_name_mm }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="father_name_eng"
                                               class="form-control" value="{{ $student->student_info->father_name_eng }}">
                                    </div>
                                </div>
                            </div>
                            {{--User Photo--}}
                            <div class="col-md-3 text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle shadow">

                                        <a href="{{ asset( $student->student_info->image ?? 'assets/images/blank-profile-picture-2.png') }}" target="_blank">
                                            <img
                                                src="{{ asset( $student->student_info->image ?? 'assets/images/blank-profile-picture-2.png') }}"
                                                alt="Upload Photo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{--User Photo--}}
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">၄။</span>ကျား / မ
                                (Gender)</label>
                            <div class="row col-md-8 py-2">
                                <div class="col-md-3 form-check-radio mx-2">
                                    <label class="form-check-label">
                                        <input disabled class="form-check-input" type="radio" id="male_mac"
                                               name="gender" value="Male" required>
                                        <span class="form-check-sign"></span>
                                        ကျား
                                    </label>
                                </div>
                                <div class="col-md-3 form-check-radio mx-2">
                                    <label class="form-check-label">
                                        <input disabled class="form-check-input" type="radio" id='female_mac'
                                               name="gender" value='Female' required>
                                        <span class="form-check-sign"></span>
                                        မ
                                    </label>
                                </div>

                                <label class="error gender_error" style="display:none;" for="gender">Please select one</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၅။</span>လူမျိုး</label>
                            <div class="col-md-8">
                                <input type="text" name="race" class="form-control" value="{{ $student->student_info->race }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၆။</span>ကိုးကွယ်သည့်ဘာသာ</label>
                            <div class="col-md-8">
                                <input type="text" name="religion" class="form-control" value="{{ $student->student_info->religion }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၇။</span>မွေးသက္ကရာဇ်</label>
                            <div class="col-md-8">
                                <input type="text" name="date_of_birth" class="form-control"
                                       value="{{ $student->student_info->date_of_birth }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၈။</span>ပညာအရည်အချင်း</label>
                            <div class="col-md-8">
                                <input type="text" name="education" class="form-control" value="{{ $student->student_info->student_education_histroy->degree_name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၉။</span>ရာထူး</label>
                            <div class="col-md-8">
                                <input type="text" name="position" class="form-control" value="{{ $student->student_info->student_job->position }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၀။</span>ဌာန</label>
                            <div class="col-md-8">
                                <input type="text" name="department" class="form-control" value="{{ $student->student_info->student_job->department }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၁။</span>ရုံးစိုက်ရာဒေသ</label>
                            <div class="col-md-8">
                                <input type="text" name="office_address" class="form-control"
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
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၃။</span>အမြဲတမ်းနေရပ်လိပ်စာ</label>
                            <div class="col-md-8">
                                <input type="text" name="current_address" class="form-control" value="{{ $student->student_info->address }}">
                                {{--Users should update their address. so remove readonly attribute--}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၄။</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                            <div class="col-md-8">
                                <input type="text" name="address" class="form-control" value="{{ $student->student_info->current_address }}">
                                {{--Users should update their address. so remove readonly attribute--}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၅။</span>ဖုန်းနံပါတ်</label>
                            <div class="col-md-8">
                                <input type="text" name="phone" class="form-control" value="{{ $student->student_info->phone }}">
                                {{--Users should update their phone number. so remove readonly attribute--}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၆။</span>တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control sr_no" name="student_regno" value="{{ $student->batch_no }}">

                            </div>
                        </div>

                        <div class="row mb-3" style="display:none;">
                            <label class="col-md-2 col-form-label label"><span
                                    class="pull-left">၁၇။</span>(က)
                            </label>
                            <label class="col-md-2 col-form-label label">တက်ရောက်မည့်သင်တန်း</label>

                            <div class="col-md-8">
                                <input type="text" name="part_no_mac" class="form-control course_name" value="{{ $student->part_no }}">
                            </div>
                        </div>

                        <div class="row mb-3" style="display:none;">
                            <label class="col-md-2 col-form-label label"><span
                                    class="pull-left"></span>(ခ)
                            </label>
                            <label class="col-md-2 col-form-label label">သင်တန်းအမှတ်စဥ်</label>

                            <div class="col-md-8">
                                <input type="text" name="batch_no_mac" class="form-control" value="{{ $student->batch_no }}">
                            </div>
                        </div>

                        <div class="row mb-3" style="display:none;">
                            <label class="col-md-2 col-form-label label"><span
                                    class="pull-left"></span>(ဂ)
                            </label>
                            <label class="col-md-2 col-form-label label">ကိုယ်ပိုင်အမှတ်</label>
                            <div class="col-md-8">
                                <input type="text" name="personal_no_mac" class="form-control personal_no" value="{{ $student->student_info->personal_code ?? '-' }}">
                                {{-- ကိုယ်ပိုင်နံပါတ် not sure to get in this state --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span
                                    class="pull-left">၁၆။</span>ယခုဖြေဆိုမည့် Module -</label>
                            <div class="row col-md-8 py-2">
                                <div class="col-md-4 form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input module_one" type="radio" id="0"
                                               name="is_full_module" value="1" required>
                                        <span class="form-check-sign"></span>
                                        Module 1
                                    </label>
                                </div>
                                <div class="col-md-4 form-check-radio ">
                                    <label class="form-check-label">
                                        <input class="form-check-input module_two" type="radio"
                                               name="is_full_module" value='2' required>
                                        <span class="form-check-sign"></span>
                                        Module 2
                                    </label>
                                </div>
                                <div class="col-md-4 form-check-radio ">
                                    <label class="form-check-label">
                                        <input class="form-check-input module_full" type="radio"
                                               name="is_full_module" value='3' required>
                                        <span class="form-check-sign"></span>
                                        All Modules
                                    </label>
                                </div>
                                <label class="error attend_place_error" style="display:none;" for="is_full_module">Please
                                    select one</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label label"><span class="pull-left">၁၇။</span>သင်တန်းတက်ရောက်မည့်နေရာ<span
                                    style="color:red">*</span>-</label>
                            <div class="row  col-md-8 checkbox-radios   py-2">
                                <div class="col-md-5 form-check-radio">
                                    <label class="form-check-label" for="sub_mac">
                                        <input class="form-check-input" type="radio" id="sub_mac" name="mac_type"
                                               value='1'>
                                        <span class="form-check-sign"></span>
                                        ရန်ကုန်သင်တန်းကျောင်း
                                    </label>
                                </div>

                                <div class="col-md-6  form-check-radio">
                                    <label class="form-check-label" for="sub_mac2">
                                        <input class="form-check-input" type="radio" id="sub_mac2" name="mac_type"
                                               value='2'>
                                        <span class="form-check-sign"></span>
                                        နေပြည်တော်သင်တန်းကျောင်း
                                    </label>
                                </div>
                                <label class="error attend_mac_error" style="display:none;" for="attend_place">Please select one</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="submit_confirm_ss" checked>
                                    <span class="form-check-sign"></span>
                                    <p class="fw-bolder">
                                        * အထက်ဖော်ပြပါအချက်အလက်များအားလုံးမှန်ကန်ပါသည်။၊<br>
                                        *
                                        မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့်နည်းဥပဒေများအတိုင်းကျင့်ကြံလိုက်နာမည်ဖြစ်ကြောင်းဝန်ခံလျှက်လျှောက်ထားအပ်ပါသည်။
                                    </p>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-5 justify-content-center" id="approve_reject">
                            <button type="submit" name="save" class="btn btn-danger"  onclick="rejectStudent({{ $student->student_info_id }})" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                            <button type="submit" name="save" class="btn btn-primary" onclick="approveStudent({{ $student->student_info_id }})" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- DA One Register (Private School) -->
        <div class="row" id="private_school_container" {{ $student->type == 1 ? '' : 'hidden' }}>
            <form method="post" action="javascript:void(0);" id="da_private_school_form"
                  enctype="multipart/form-data">
                @csrf
                <div class="card border-success mb-3" style="padding:3% 5% 3% 5%;">
                    <h5 class="card-title text-center fw-bolder mb-3">
                        မြန်မာနိုင်ငံစာရင်းကောင်စီ<br/>
                        ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ<br/>
                        (ကိုယ်ပိုင်သင်တန်းကျောင်းတွင်တက်ရောက်မည့်အသစ်တက်ခွင့်ရသူများ)
                    </h5>

                    <div class="d-flex justify-content-between mb-3">
                        <h6>ရက်စွဲ - {{ date('d-M-Y') }}</h6>
                        <h6>အမှတ်စဥ် - <span class="batch_number"></span></h6>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">

                            <div class="row mb-3">
                                <div class="col-md-9">

                                    <div class="row mb-3">
                                        <label class="col-md-6 col-form-label label">ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအမည်</label>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control form-select"
                                                        name="private_school_name" id="selected_school_id"
                                                        style="width: 100%;">
                                                    <option disabled selected>Select School</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="batch_id" class="batch_id">
                                    <div class="row mb-4">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၁။</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                        <div class="col-md-3">
                                            <input type="text" name="name_mm" class="form-control"
                                                   readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="name_eng" class="form-control"
                                                   readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၂။</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                        <div class="col-md-6">
                                            <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                                <div class="col-md-2 col-5 pr-1">
                                                    <input type="text" name="nrc_state_region" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3 col-7 px-1">
                                                    <input type="text" name="nrc_township" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>
                                                <div class="col-md-2 col-5 px-1">
                                                    <input type="text" name="nrc_citizen" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>

                                                <div class="col-md-5 col-7 pl-1">
                                                    <input type="text" name="nrc_number"
                                                           placeholder="၁၂၃၄၅၆"
                                                           id="nrc_number" pattern=".{6,6}"
                                                           class="form-control"
                                                           oninput="this.value= en2mm(this.value);"
                                                           maxlength="6" minlength="6" placeholder=""
                                                           style="height: 38px"
                                                           value="{{ old('nrc_number') }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၃။</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                        <div class="col-md-3">
                                            <input type="text" name="father_name_mm"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="father_name_eng"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{--User Photo--}}
                                <div class="col-md-3" align="center">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle shadow">
                                            <img class="col-md-3 profile-style" name="previewImg"
                                                 id="previewImgPrivate"
                                                 src="{{asset('/assets/images/blank-profile-picture-1.png')}}"
                                                 accept="image/png,image/jpeg" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div class="d-flex justify-content-center">
                                                            <span class="btn btn-round btn-secondary btn-file">
                                                            <span class="fileinput-new">ဓာတ်ပုံ</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" id="profile_photo_private"
                                                                   name="profile_photo_private" accept="image/*"></span>
                                            <br>
                                            <a href="javascript:" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                {{--User Photo--}}
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">၄။</span>ကျား / မ
                                    (Gender)</label>
                                <div class="row col-md-8 py-2">
                                    <div class="col-md-3 form-check-radio mx-2">
                                        <label class="form-check-label">
                                            <input disabled class="form-check-input" type="radio" id="male_private"
                                                   name="gender" value="Male" required>
                                            <span class="form-check-sign"></span>
                                            ကျား
                                        </label>
                                    </div>
                                    <div class="col-md-3 form-check-radio mx-2">
                                        <label class="form-check-label">
                                            <input disabled class="form-check-input" type="radio" id='female_private'
                                                   name="gender" value='Female' required>
                                            <span class="form-check-sign"></span>
                                            မ
                                        </label>
                                    </div>

                                    <label class="error attend_place_error" style="display:none;" for="gender">Please
                                        select one</label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၅။</span>လူမျိုး</label>
                                <div class="col-md-8">
                                    <input type="text" name="race" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၆။</span>ကိုးကွယ်သည့်ဘာသာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="religion" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၇။</span>မွေးသက္ကရာဇ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="date_of_birth" class="form-control"
                                           disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၈။</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-8">
                                    <input type="text" name="education" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၉။</span>ရာထူး</label>
                                <div class="col-md-8">
                                    <input type="text" name="position" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၀။</span>ဌာန</label>
                                <div class="col-md-8">
                                    <input type="text" name="department" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၁။</span>ရုံးစိုက်ရာဒေသ</label>
                                <div class="col-md-8">
                                    <input type="text" name="office_address" class="form-control"
                                           readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၂။</span>နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်
                                </label>
                                <div class="col-md-2 pt-2">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4"><input type="radio"
                                                                         class="form-check-input mr-3"
                                                                         id="yes_private"
                                                                         name="gov_staff" value="1"
                                                                         style="margin-left: 3%;"
                                                                         onclick="$('#rec_letter_private').show()">
                                            </div>
                                            <div class="col-md-8"><label class="form-check-label "
                                                                         for="yes">ဟုတ်</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2 pt-2">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4"><input type="radio"
                                                                         class="form-check-input mr-3"
                                                                         id="no_private"
                                                                         name="gov_staff" value="0"
                                                                         style="margin-left: 3%;"
                                                                         onclick="$('#rec_letter_private').hide()">
                                            </div>
                                            <div class="col-md-8"><label class="form-check-label "
                                                                         for="no">မဟုတ်</label>
                                                <div class="invalid-feedback">နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်
                                                    ရွေးချယ်ပါ
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="rec_letter_private" style="display:none">
                                <div class="row mb-3 ">
                                    <label class="col-md-4 col-form-label label">
                                        <span class="pull-center" style="padding-right:8px">(က)</span>သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ
                                    </label>
                                    <div class="col-md-2 text-center" id="degree_edu">
                                        <span class="recommend_letter"></span>
                                    </div>
                                    <div class="col-md-6" id="degree_edu">
                                        <input type="file" class="form-control" id="recommend_letter_private"
                                               name="recommend_letter_private">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၃။</span>အမြဲတမ်းနေရပ်လိပ်စာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="current_address" class="form-control"
                                           readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၄။</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="address" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၅။</span>ဖုန်းနံပါတ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၆။</span>တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control sr_no" name="student_regno"
                                           readonly>
                                </div>
                            </div>

                            <div class="row mb-3" style="display:none">
                                <label class="col-md-1 col-form-label">၁၇။</label>
                                <label class="col-md-1 col-form-label">(က)</label>

                                <label class="col-md-2 col-form-label label">တက်ရောက်မည့်သင်တန်း</label>

                                <div class="col-md-8">
                                    <input type="text" name="part_no_private" id="part_no_private"
                                           class="form-control course_name" disabled
                                           placeholder="အပိုင်း" id="" required>

                                </div>
                            </div>

                            <div class="row mb-3" style="display:none">
                                <label class="col-md-1 col-form-label"></label>
                                <label class="col-md-1 col-form-label">(ခ)</label>
                                <label class="col-md-2 col-form-label label">သင်တန်းအမှတ်စဥ်</label>

                                <div class="col-md-8">
                                    <input type="text" name="batch_no_private"
                                           class="form-control batch_no" disabled>

                                </div>
                            </div>


                            <div class="row mb-3" style="display:none">
                                <label class="col-md-1 col-form-label"></label>
                                <label class="col-md-1 col-form-label">(ဂ)</label>
                                <label class="col-md-2 col-form-label label">ကိုယ်ပိုင်အမှတ်</label>

                                <div class="col-md-8">
                                    <input type="text" name="personal_no_private" class="form-control personal_no"
                                           placeholder="ကိုယ်ပိုင်အမှတ်" id="">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၇။</span>ယခုဖြေဆိုမည့် Module -</label>
                                <div class="row col-md-8 py-2">
                                    <div class="col-md-4 form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_one" type="radio" id="0"
                                                   name="is_full_module" value="1" required>
                                            <span class="form-check-sign"></span>
                                            Module 1
                                        </label>
                                    </div>
                                    <div class="col-md-4 form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_two" type="radio"
                                                   name="is_full_module" value='2' required>
                                            <span class="form-check-sign"></span>
                                            Module 2
                                        </label>
                                    </div>
                                    <div class="col-md-4 form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_full" type="radio"
                                                   name="is_full_module" value='3' required>
                                            <span class="form-check-sign"></span>
                                            All Modules
                                        </label>
                                    </div>
                                    <label class="error attend_place_error" style="display:none;" for="is_full_module">Please
                                        select one</label>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-md-1 mt-2">
                                    <input type="checkbox" class="form-check-input"
                                           name="submit_confirm" id="submit_confirm_mac">
                                </div>
                                <label class="col-md-11 col-form-label fw-bolder">အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-11 ">
                                    <div class="d-flex justify-content-between">
                                        <label class="col-md-9 col-form-label fw-bolder">မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။</label>
                                        <h6 class="col-md-3 col-form-label" style="padding-left:60px;">
                                            ရက်စွဲ - {{ __("dd-mm-yyyy") }}</h6>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="row mb-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"
                                               id="submit_confirm_ss"
                                               onchange="$('#submit_btn_pp').prop('disabled', !this.checked)">
                                        <span class="form-check-sign"></span>
                                        <p class="fw-bolder">
                                            * အထက်ဖော်ပြပါအချက်အလက်များအားလုံးမှန်ကန်ပါသည်။၊<br>
                                            * မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့်နည်းဥပဒေများအတိုင်း
                                            ကျင့်ကြံလိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။
                                        </p>
                                    </label>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success btn-hover-dark w-25" id="submit_btn_pp"
                                        disabled>
                                    Submit
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- DA One Register (Self Study) -->
        <div class="row" id="self_study_container" {{ $student->type == 0 ? '' : 'hidden' }}>
            <form id="self_study_form" method="post" action="javascript:void(0);"
                  enctype="multipart/form-data">
                @csrf
                <div class="card border-success mb-3" style="padding:3% 5% 3% 5%;">
                    <h5 class="card-title text-center fw-bolder">
                        မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                        ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ</br>
                        (ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ)
                    </h5>

                    <div class="d-flex justify-content-between mb-3">
                        <h6>ရက်စွဲ - {{ date('d-M-Y') }}</h6>
                        <h6>အမှတ်စဥ် - <span class="batch_number"></span></h6>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 single-form">
                                    <label class="coursename col-form-label"></label>
                                </div>
                                <div class="col-md-6 single-form"></div>
                                <div class="col-md-2 single-form">
                                    <label class="batchname col-form-label"></label>
                                </div>
                            </div>

                            {{--<table style="width:100%;margin-bottom: 2%;">
                                <tr>
                                    <td style="width:20%">
                                        <label for=""
                                               class="col-form-label">အမှတ်စဉ် - Batch One</label>
                                    </td>
                                </tr>
                            </table>--}}

                            {{--<div class="row">
                                <div class="col-md-1">
                                    <div class="single-form">
                                        <label class="col-form-label">၁။</label>

                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="single-form">
                                        <label class="col-form-label">မှတ်ပုံတင်ရသည့်အကြောင်းအရင်း</label>

                                    </div>
                                </div>
                            </div><br/>--}}
                            <input type="hidden" name="batch_id" class="batch_id">
                            <div class="row">
                                <div class="col-md-9">

                                    <div class="row mb-4 mt-4">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၁။</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                        <div class="col-md-3">
                                            <input type="text" name="name_mm" class="form-control"
                                                   readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="name_eng" class="form-control"
                                                   readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၂။</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                        <div class="col-md-6">
                                            <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                                <div class="col-md-2 col-5 pr-1">
                                                    <input type="text" name="nrc_state_region" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>

                                                <div class="col-md-3 col-7 px-1">
                                                    <input type="text" name="nrc_township" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>
                                                <div class="col-md-2 col-5 px-1">
                                                    <input type="text" name="nrc_citizen" style="padding:6px"
                                                           class="form-control" readonly>
                                                </div>

                                                <div class="col-md-5 col-7 pl-1">
                                                    <input type="text" name="nrc_number"
                                                           placeholder="၁၂၃၄၅၆"
                                                           id="nrc_number" pattern=".{6,6}"
                                                           class="form-control"
                                                           oninput="this.value= en2mm(this.value);"
                                                           maxlength="6" minlength="6" placeholder=""
                                                           style="height: 38px"
                                                           value="{{ old('nrc_number') }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <label for="" class="col-md-6 col-form-label label"><span
                                                class="pull-left">၃။</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                        <div class="col-md-3">
                                            <input type="text" name="father_name_mm"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="father_name_eng"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{--User Photo--}}
                                <div class="col-md-3" align="center">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle shadow">
                                            <img class="col-md-3 profile-style" name="previewImg"
                                                 id="previewImgSelf"
                                                 src="{{asset('/assets/images/blank-profile-picture-1.png')}}"
                                                 accept="image/png,image/jpeg" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div class="d-flex justify-content-center">
                                                            <span class="btn btn-round btn-secondary btn-file">
                                                            <span class="fileinput-new">ဓာတ်ပုံ</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" id="profile_photo_self"
                                                                   name="profile_photo_self" accept="image/*"></span>
                                            <br>
                                            <a href="javascript:" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                {{--User Photo--}}
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">၄။</span>ကျား / မ
                                    (Gender)</label>
                                <div class="row col-md-8 py-2">
                                    <div class="col-md-3 form-check-radio mx-2">
                                        <label class="form-check-label">
                                            <input disabled class="form-check-input" type="radio" id="male_self"
                                                   name="gender" value="Male" required>
                                            <span class="form-check-sign"></span>
                                            ကျား
                                        </label>
                                    </div>
                                    <div class="col-md-3 form-check-radio mx-2">
                                        <label class="form-check-label">
                                            <input disabled class="form-check-input" type="radio" id='female_self'
                                                   name="gender" value='Female' required>
                                            <span class="form-check-sign"></span>
                                            မ
                                        </label>
                                    </div>

                                    <label class="error attend_place_error" style="display:none;" for="gender">Please
                                        select one</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၅။</span>လူမျိုး</label>
                                <div class="col-md-8">
                                    <input type="text" name="race" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၆။</span>ကိုးကွယ်သည့်ဘာသာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="religion" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၇။</span>မွေးသက္ကရာဇ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="date_of_birth" class="form-control"
                                           readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၈။</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-8">
                                    <input type="text" name="education" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၉။</span>ရာထူး</label>
                                <div class="col-md-8">
                                    <input type="text" name="position" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၀။</span>ဌာန</label>
                                <div class="col-md-8">
                                    <input type="text" name="department" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၁။</span>ရုံးစိုက်ရာဒေသ</label>
                                <div class="col-md-8">
                                    <input type="text" name="office_address" class="form-control"
                                           readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၂။</span>နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်
                                </label>
                                <div class="col-md-2 pt-2">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4"><input type="radio"
                                                                         class="form-check-input mr-3"
                                                                         id="yes_self" name="gov_staff" value="1"
                                                                         style="margin-left: 3%;"
                                                                         onclick="$('#rec_letter_self').show()">
                                            </div>
                                            <div class="col-md-8"><label class="form-check-label "
                                                                         for="yes">ဟုတ်</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2 pt-2">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4"><input type="radio"
                                                                         class="form-check-input mr-3"
                                                                         id="no_self" name="gov_staff" value="0"
                                                                         style="margin-left: 3%;"
                                                                         onclick="$('#rec_letter_self').hide()">
                                            </div>
                                            <div class="col-md-8"><label class="form-check-label "
                                                                         for="no">မဟုတ်</label>
                                                <div class="invalid-feedback">နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်
                                                    ရွေးချယ်ပါ
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="rec_letter_self" style="display:none">
                                <div class="row mb-3 ">
                                    <label class="col-md-4 col-form-label label">
                                        <span class="pull-center" style="padding-right:8px">(က)</span>သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ
                                    </label>
                                    <div class="col-md-2 text-center" id="degree_edu">
                                        <span class="recommend_letter"></span>
                                    </div>
                                    <div class="col-md-6" id="degree_edu">
                                        <input type="file" class="form-control" id="recommend_letter_self"
                                               name="recommend_letter_self">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၃။</span>အမြဲတမ်းနေရပ်လိပ်စာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="current_address"
                                           class="form-control"> {{--Users should update their address. so remove readonly attribute--}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၄။</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                                <div class="col-md-8">
                                    <input type="text" name="address"
                                           class="form-control"> {{--Users should update their address. so remove readonly attribute--}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၅။</span>ဖုန်းနံပါတ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone"
                                           class="form-control"> {{--Users should update their phone number. so remove readonly attribute--}}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၆။</span>တိုက်ရိုက်တက်ရောက်ခွင့်ရသည့်အမှတ်စဥ်</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control sr_no" name="student_regno"
                                           readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၇။</span>မှတ်ပုံတင်ရသည့်အကြောင်းရင်း
                                    - </label>
                                <div class="row col-md-8 py-2">

                                    <div class="form-check-radio">
                                        <label class="form-check-label" required>
                                            <input class="form-check-input mt-1" type="radio"
                                                   name="reg_reason[]" required value="ယခုနှစ်တက်ရောက်ခြင်း">
                                            <span class="form-check-sign"></span>
                                            (က) ယခုနှစ်တက်ရောက်ခြင်း
                                        </label>
                                    </div>

                                    <div class="form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio"
                                                   name="reg_reason[]" required
                                                   value="သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း">
                                            <span class="form-check-sign"></span>
                                            (ခ) သင်တန်းတက်ရောက်ခဲ့ပြီးစာမေးပွဲဝင်ရောက်မဖြေဆိုခြင်း
                                        </label>
                                    </div>

                                    <div class="form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio"
                                                   name="reg_reason[]" required
                                                   value="သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း">
                                            <span class="form-check-sign"></span>
                                            (ဂ) သင်တန်းတက်ရောက်ချိန် ၆၀% မပြည့်ခြင်း
                                        </label>
                                    </div>

                                    <div class="form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio"
                                                   name="reg_reason[]" required value="စာမေးပွဲကျရှုံးခြင်း">
                                            <span class="form-check-sign"></span>
                                            (ဃ) စာမေးပွဲကျရှုံးခြင်း
                                        </label>
                                    </div>

                                    <div class="form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio"
                                                   name="reg_reason[]" required value="သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း">
                                            <span class="form-check-sign"></span>
                                            (င) သင်တန်းမှနုတ်ထွက်ခဲ့ခြင်း
                                        </label>
                                    </div>
                                    <label class="error attend_place_error" style="display:none;" for="reg_reason[]">Please
                                        select registration reason.</label>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span
                                        class="pull-left">၁၈။</span>ယခုဖြေဆိုမည့် Module -</label>
                                <div class="row col-md-8 py-2">
                                    <div class="col-md-4 form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_one" type="radio" id="0"
                                                   name="is_full_module" value="1" required>
                                            <span class="form-check-sign"></span>
                                            Module 1
                                        </label>
                                    </div>
                                    <div class="col-md-4 form-check-radio ">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_two" type="radio"
                                                   name="is_full_module" value='2' required>
                                            <span class="form-check-sign"></span>
                                            Module 2
                                        </label>
                                    </div>
                                    <div class="col-md-4 form-check-radio ">
                                        <label class="form-check-label">
                                            <input class="form-check-input module_full" type="radio"
                                                   name="is_full_module" value='3' required>
                                            <span class="form-check-sign"></span>
                                            All Modules
                                        </label>
                                    </div>
                                    <label class="error attend_place_error" style="display:none;" for="is_full_module">Please
                                        select one</label>
                                </div>
                            </div>

                            <!-- <div class="row">
                                        <label class="col-md-1 col-form-label">၂။</label>
                                        <label class="col-md-8 col-form-label">အပိုဒ် ၁ ပါ(ခ)/(ဂ)/(ဃ)/(င) အတွက်</label>
                                    </div> -->

                            <div class="row mb-3" style="display:none;">
                                <label class="col-md-2 col-form-label label">
                                    <span class="pull-left">၁၉။</span>(က)
                                </label>
                                <label class="col-md-2 col-form-label label">တက်ရောက်မည့်သင်တန်း</label>

                                <div class="col-md-8">
                                    <input type="text" name="part_no_self" class="form-control course_name"
                                           placeholder="အပိုင်း" disabled>

                                </div>

                            </div>

                            <div class="row mb-3" style="display:none;">
                                <label class="col-md-2 col-form-label label">
                                    <span class="pull-left"></span>(ခ)
                                </label>
                                <label class="col-md-2 col-form-label label">သင်တန်းအမှတ်စဥ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="batch_no_self" class="form-control batch_no" disabled
                                           placeholder="သင်တန်းအမှတ်စဥ်">
                                </div>
                            </div>

                            <div class="row mb-3" style="display:none;">
                                <label class="col-md-2 col-form-label label">
                                    <span class="pull-left"></span>(ဂ)
                                </label>
                                <label class="col-md-2 col-form-label label">ကိုယ်ပိုင်အမှတ်</label>
                                <div class="col-md-8">
                                    <input type="text" name="personal_no_self" class="form-control _no"
                                           placeholder="ကိုယ်ပိုင်အမှတ်">
                                </div>
                            </div>

                            <div class="row mb-3" style="display:none;">
                                <label class="col-md-4 col-form-label label">
                                    <span class="pull-left">၁၈။</span>
                                    နောက်ဆုံးဖြေဆိုခဲ့သည့်စာမေးပွဲကျင်းပသည့်ခုနှစ်/လ
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="date" id="date" class="form-control"
                                           placeholder="လ၊ခုနှစ်(MMM-YYYY)">
                                </div>
                            </div>

                            {{--<div class="row">
                                <div class="col-md-1 mt-2">
                                    <input type="checkbox" class="form-check-input"
                                           name="submit_confirm" id="submit_confirm_mac">
                                </div>
                                <label class="col-md-11 col-form-label fw-bolder">အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-11 ">
                                    <div class="d-flex justify-content-between">
                                        <label class="col-md-9 col-form-label fw-bolder">မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။</label>
                                        <h6 class="col-md-3 col-form-label" style="padding-left:60px;">
                                            ရက်စွဲ - {{ date("d-m-Y")  }}</h6>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="row mb-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="submit_confirm_ss"
                                               checked>
                                        <span class="form-check-sign"></span>
                                        <p class="fw-bolder">
                                            * အထက်ဖော်ပြပါအချက်အလက်များအားလုံးမှန်ကန်ပါသည်။၊<br>
                                            *
                                            မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့်နည်းဥပဒေများအတိုင်းကျင့်ကြံလိုက်နာမည်ဖြစ်ကြောင်းဝန်ခံလျှက်လျှောက်ထားအပ်ပါသည်။
                                        </p>
                                    </label>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success btn-hover-dark w-25" id="submit_btn_ss"
                                        disabled>Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                <form id="remark-form" method="post" action="javascript:rejectUser({{$student->student_info_id}})"
                      enctype="multipart/form-data">
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

            $('input[type=radio][name=mac_type]').map((k, v) => {
                return $(v).val() == {{ $student->type }} ? $(v).attr('checked', 'true') : '';
            });

            $('input[type=radio][name=gender]').map((k, v) => {
                return $(v).val() == 'Male' ? $(v).attr('checked', 'true') : '';
            });

            $('input[type=radio][name=is_full_module]').map((k, v) => {
                return $(v).val() == {{ $student->module ?? 0 }} ? $(v).attr('checked', 'true') : '';
            });

            if ({{ $student->student_info->gov_staff }} == 1
        )
            {
                $('#rec_letter').show();
            }
        else
            {
                $('#rec_letter').hide();
            }
        });
    </script>
@endpush
