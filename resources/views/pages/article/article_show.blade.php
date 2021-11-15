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
    'elementActive' => 'firm_article_list'
])
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset("assets/css/plugins/bootstrap/bootstrap.min.css") }}">
<style>
    .label{
        text-align: right;
    }
		.p-input {
        border:none;
        border-bottom: 1px solid #1890ff;
        padding: 5px 10px;
        outline: none;
        text-align: center;
    }
</style>
@section('content')
    <div class="content">
        <form method="post" action="javascript:void();"  enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-success mb-3" style="padding:3% 5% 3% 5%;">
                        <div class="row mb-5">
                            <h5 class="card-title text-center" style="font-weight:bold; font-size:20px;">
                                ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်<br>
                                ပြည်ထောင်စုစာရင်းစစ်ချုပ်ရုံး<br>
                                စာရင်းကိုင်အလုပ်သင်လျှောက်လွှာပုံစံ
                            </h5>
                            <div>
                                <h6 align="right">Form Type -  <span id="form_type"></h6>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-12">
                                <ul>
                                    <li>မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် ( <span id="course_name"></span> ) သင်တန်းအမှတ်စဥ် ( <span id="module_name"></span> ) ကို မြန်မာနိုင်ငံစာရင်းကောင်စီ <span id="type_name"></span>  <span id="result_name"></span> သူ</li>
                                </ul>
                            </div>
                        </div> -->

												<div class="row mb-3">
													<div id="previous_info_box" style="display:none;">
														<div class="col-md-11">လူကြီးမင်း <span class="call_gender"></span></div>
														<div class="col-md-11">
																<ul>
																		<li>
																				<input class="p-input" type="text" name="gender" id="gender">
																				သည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်
																				<input class="p-input" type="text" name="course_part" id="course_part">
																				သင်တန်းအမှတ်စဥ်<input class="p-input" type="text" name="exam_pass_batch" id="exam_pass_batch"> ကို
																				<input class="p-input" type="text" name="school_name" id="school_name" style="width:300px;">
																				<input class="p-input" type="text" name="attend_or_fail" id="attend_or_fail">
																				တစ်ဦးဖြစ်ပါသည်။
																		</li>
																</ul>
														</div>
													</div>

													<div id="previous_info_box2" style="display:none;">
														<div class="col-md-11">လူကြီးမင်း <span class="call_gender"></span></div>
														<div class="col-md-11">
																<ul>
																		<li>
																				<input class="p-input" type="text" name="gender2" id="gender2">
																				သည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် ဒုတိယပိုင်း စာမေးပွဲကို
																				<input class="p-input" type="text" name="exam_pass_date" id="exam_pass_date"> တွင်ကျင်းပခဲ့သော CPA II အမှတ်စဥ်
																				<input class="p-input" type="text" name="exam_pass_batch_2" id="exam_pass_batch_2">
																				တွင်အောင်မြင်သူတစ်ဦးဖြစ်ပါသည်။
																		</li>
																</ul>
														</div>
													</div>

													<div id="previous_exp_box" style="display:none;">
														<div class="col-md-11">
																<ul>
																		<li>ယခင်က လက်တွေ့အလုပ်သင်ကြားမှုကို အလုပ်သင်ကြားပေးသည့်(PAPP အမည်)
																			<input class="p-input" type="text" name="ex_papp_name" id="ex_papp_name"> ထံတွင်
																			<input class="p-input" type="text"  name="ex_papp_start_date" id="ex_papp_start_date" placeholder="dd-mm-yyyy"> နေ့မှ
																			<input class="p-input" type="text" name="ex_papp_end_date" id="ex_papp_end_date" placeholder="dd-mm-yyyy">နေ့အထိ
																			<span id="result_name">
																				<input class="p-input" type="text" name="exp_year" id="exp_year"> နှစ် ၊
																				<input class="p-input" type="text" name="exp_month" id="exp_month"> လ ၊
																				<input class="p-input" name="exp_days" type="text" id="exp_days"> ရက်
																			</span> အလုပ်သင်ကြားမှုခံယူခဲ့ပါသည်။
																		</li>
																</ul>
														</div>
													</div>
												</div>
                                                <div id="previous_info_box3" style="display:none;">
														<div class="col-md-11">လူကြီးမင်း <span class="call_gender3"></span></div>
														<div class="col-md-11">
																<ul>
																		<li>
																				<input class="p-input" type="text" name="gender3" id="gender3">
																				သည် မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် 
																				<input class="p-input" type="text" name="course_exam" id="course_exam"> 
																				
																				ကိုအောင်မြင်သူတစ်ဦးဖြစ်ပါသည်။
																		</li>
																</ul>
														</div>
													</div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁။') }}</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                                    <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="text" name="name_mm" class="form-control" id="name_mm" readonly>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="text" name="name_eng" class="form-control" id="name_eng" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div id="other_row">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၂။') }}</span>ကိုယ်ပိုင်အမှတ်</label>
                                        <div class="col-md-9">
                                            <input type="text" id="personal_no" name="personal_no" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div id="qt_row" style="display_none;">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၂။') }}</span>ခုံအမှတ်</label>
                                        <div class="col-md-9">
                                            <input type="text" id="row_no" name="row_no" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                            <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                            <br/><span class='text-info'>Profile Picture</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၃။') }}</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                            <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2">
                                <input type="text" name="nrc_state_region" class="form-control" id="nrc_state_region" readonly>
                                </div>
                                <div class="col-md-3">
                                <input type="text" name="nrc_township" class="form-control" id="nrc_township" readonly>
                                </div>
                                <div class="col-md-2">
                                <input type="text" name="nrc_citizen" class="form-control" id="nrc_citizen" readonly>
                                </div>
                                <div class="col-md-5">
                                <input type="text" name="nrc_number" class="form-control" id="nrc_number" readonly>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span></label>
                            <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2">
                                    <p class="ml-2" style="font-weight:bold" align="left">NRC Front</p>
                                </div>
                                <div class="col-md-4 nrc_front">

                                </div>

                                <div class="col-md-2">
                                <p class="ml-2" style="font-weight:bold" align="left">NRC Back</p>
                                </div>
                                <div class="col-md-4 nrc_back">

                                </div>
                            </div>
                            </div>
                        </div>

                        <div id="firm_education">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-9">
                                    <input type="text" name="education" id="education" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="offline_user" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-9">
                                    <table id="tbl_degree" class="table table-bordered text-center">
                                                <thead class="text-nowrap table-success">
                                                    <tr>
                                                        <th class="bold-font-weight">စဉ်</th>
                                                        <th class="bold-font-weight">တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ</th>
                                                        <th class="bold-font-weight">Attached Certificate</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_degree_body">
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="qt_education" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-9  pt-2">
                                    <span id="add_qt_education"></span>
                                </div>
                            </div>
                        </div>


                        <div id="certificate_row">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span></label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="ml-2" style="font-weight:bold" align="left">ပညာအရည်အချင်းမိတ္တူ</p>
                                        </div>
                                        <div class="col-md-3 certificate">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၅။') }}</span>လူမျိုး/ဘာသာ</label>
                            <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="race" id="race" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="religion" id="religion" class="form-control" readonly>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၆။') }}</span>မွေးသက္ကရာဇ်</label>
                            <div class="col-md-9">
                            <input type="text" name="date_of_birth" id="date_of_birth" placeholder="dd-mm-yyyy" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၇။') }}</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
                            <div class="col-md-9">
                                <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="father_name_mm" name="father_name_mm" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="father_name_eng" id="father_name_eng" class="form-control" readonly>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div id="exp_row">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၈။') }}</span>လက်တွေ့အလုပ်သင်ကြားဖူးခြင်း ရှိ/မရှိ</label>
                                <div class="col-md-2">
                                <input type="radio" id="yes" value="1" name="experience" > Yes
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" id="no" value="0" name="experience" > No
                                </div>
                            </div>
                        </div>

                        <div id="exp_attach_row">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span></label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="ml-2" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 exp_attachment">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left" id="gov_lab">{{ __('၉။') }}</span>ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲအစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့်/ အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ</label>
                            <div class="col-md-2">
                            <input type="radio" id="gov_staff_yes" value="1" name="gov_staff" > Yes
                            </div>
                            <div class="col-md-2">
                                <input type="radio" id="gov_staff_no" value="0" name="gov_staff" > No
                            </div>
                        </div>

                        <div id="gov_staff_row">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span></label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="text" name="position" id="position" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="text" name="gov_joining_date" id="gov_joining_date" class="form-control"  readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left" id="current_lab">{{ __('၁၀။') }}</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                            <div class="col-md-9">
                            <input type="text" name="current_address" id="current_address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left" id="address_label">{{ __('၁၁။') }}</span>အမြဲတမ်းနေရပ်လိပ်စာ<span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="address" id="address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left" id="phone_lab">{{ __('၁၂။') }}</span>ဖုန်းနံပါတ်</label>
                            <div class="col-md-9">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left" id="email_lab">{{ __('၁၃။') }}</span>အီးမေးလ်လိပ်စာ</label>
                            <div class="col-md-9">
                                <input type="text" name="m_email" id="m_email" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="praticle">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="papp_lab">{{ __('၁၄။') }}</span>လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPP အမှတ်</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="papp_name" id="papp_name" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="mentor_name" id="mentor_name" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 req-papp_attach">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span>လက်ခံသင်ကြားပေးကြောင်းအကြောင်းကြားစာ</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="ml-2 mt-2" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 mt-1 request_papp_attach">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c2_pass_renew" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="c2_papp_lab">{{ __('၁၃။') }}</span>ယခုအလုပ်သင်ကြားလိုသည့် PAPP</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="c2_papp_name" id="c2_papp_name" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="c2_mentor_name" id="c2_mentor_name" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="previous_papp_name_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="previous_papp_lab">{{ __('၁၅။') }}</span>ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPP အမှတ်</label>
                                <div class="col-md-9">
                                    <input type="text" name="previous_papp_name" id="previous_papp_name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>


                        <div id="previous_papp_date_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="previous_lab">{{ __('၁၆။') }}</span>ယခင်အလုပ်သင်ဆင်းခဲ့သည့် ကာလ</label>
                                <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="previous_papp_start_date" id="previous_papp_start_date" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="previous_papp_end_date" id="previous_papp_end_date" class="form-control" readonly >
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="office_order_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span>ရုံးအမိန့်</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="ml-2" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 office_order_attach">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="previous_exam_pass_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="exam_pass_date_label">{{ __('၁၇။') }}</span>စာမေးပွဲကျင်းပသည့် ခုနှစ်၊လ ၊ အောင်မြင်သည့်အမှတ်စဥ် </label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="pass_date" id="pass_date" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="pass_no" id="pass_no" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="attach_file_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-6 col-form-label label"><span class="pull-left">{{ __('') }}</span>ချုပ်ဆိုပြီးစာချုပ်နှင့် တာဝန်စတင်ထမ်းဆောင်ကြောင်းအစီရင်ခံစာ</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p class="ml-3" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 mentor_attach_file">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="done_form_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-6 col-form-label label"><span class="pull-left">{{ __('') }}</span>Done Form Attachment</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p class="ml-3" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 done_form_attach">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="reject_done_attach" style="display:none;">
                            <div class="row">
                                <div class="col-md-12" align="right">
                                    <button type='button' class='btn btn-danger' onclick='rejectDoneAttach()'>Reject Done Attachmen</button>
                                </div>
                            </div>
                        </div>

                        <div id="check_end_date" style="display:none;">
                            <input type="hidden" id="offline_user">
                            <div class="row">
                                <div class="col-md-12" align="right">
                                    <button type='button' class='btn btn-warning' onclick='checkEndArticle()'>Check End Date</button>
                                    <button type='button' class='btn btn-info' onclick='createDoneFormLink()'>Create Done Form Link</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center border-bottom" style="font-weight:bold ;background-color:#E7F8EE;">Leave Request</h5>
                                <table class="table" id="leave_request_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Leave Request Reason</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Total Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="leave_request_body">
                                    </tbody>
                                </table>
                            </div>
                        </div>

												<div class="card">
														<div class="card-header">
																<h5 class="border-bottom pb-2"  style="font-weight:bold">Payment Information</h5>
														</div>
														<div class="card-body pt-0">
																<div class="row m-2 mt-3 border-bottom">
																		<div class="col-md-6 text-left">
																				<p class="ml-2" style="font-weight:bold">Fees</p>
																		</div>
																		<div class="col-md-6 text-left">
																				<button type="button" class="btn btn-info mt-0" data-toggle="modal" data-target="#payment_detail_modal">View Detail</button>
																		</div>
																</div>
																<div class="row m-2 mt-3 border-bottom">
																		<div class="col-md-6 text-left">
																				<p class="ml-2" style="font-weight:bold">Status</p>
																		</div>
																		<div class="col-md-6 text-left">
																				<span id="payment_status" style="font-size:20px;"></span>
																		</div>
																</div>
														</div>
												</div>

                        <input type="hidden" name="article_id" >
                        <div id="approve_reject_btn">
                            <div class="row mt-5 justify-content-center">
                                <button type="" name="article_reject" class="btn btn-danger"  data-toggle="modal" data-target="#remarkModal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                <button type="" name="article_approve" class="btn btn-primary" onclick="approveArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>

                        <div id="done_form_approve_reject_btn" style="display:none;">
                            <div class="row mt-5 justify-content-center">
                                <!-- <button type="" name="article_done_reject" class="btn btn-danger"  onclick="rejectDoneArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button> -->
                                <button type="" name="article_done_approve" class="btn btn-primary" onclick="approveDoneArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <form method="post" class="needs-validation" id="endForm" action="javascript:saveEndArticle();" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="modal fade" id="endModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">
                        စာရင်းကိုင်အလုပ်သင်ပြီးဆုံးမည့်နေ့အားရွေးချယ်ပါ။</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="article_id">
                        <input type="hidden" id="article_form_type">
                        <input type="hidden" id="student_info_id">
                        <input type="text" name="contract_end_date" id="contract_end_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" id="da2exam_btn" class="btn btn-success btn-hover-dark w-30" data-bs-toggle="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


		{{-- Remark Modal --}}
		<div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="remark_firm_form"  method="post" action="javascript:rejectArticle()" enctype="multipart/form-data">
							@csrf
								<div class="modal-body">
										<div class="row">
												<div class="col-md-12">
														<div class="form-group">
																<!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
																<textarea class="form-control" name="remark_firm" id="remark_firm" rows="3"></textarea>
														</div>
												</div>
										</div>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" form="remark_firm_form">Reject</button>
								</div>
						</form>
						</div>
					</div>
				</div>
				{{-- Remark Modal --}}

				{{-- Payment detail Modal --}}
				<div class="modal fade" id="payment_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Article Registration Fees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
										<ul class="list-group mb-3 sticky-top fee_list">

										</ul>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
				</div>
				{{-- Payment detail Modal End --}}

    <!-- modal -->
    <form method="post" action="javascript:rejectArticleDoneAttach();" enctype="multipart/form-data">
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="reject_done_attach_modal">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header pt-2 pb-2">
                        <h5 class="modal-title">Reject Reason</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" id="article_id">
                        <textarea class="form-control " id="reason" rows="100" cols='100' required></textarea>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

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
<script src="{{ asset('js/article.js') }}"></script>
<script>
    loadArticle();
		//var article_id = localStorage.getItem("article_id");

</script>
<script>

  $(document).ready(function (e) {
    $("input[name='contract_end_date']").flatpickr({
        enableTime: false,
        dateFormat: "d-M-Y",
        allowInput: true
    });
  });

</script>
@endpush
