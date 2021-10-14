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
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <ul>
                                    <li>မြန်မာနိုင်ငံစာရင်းကောင်စီက ဖွင့်လှစ်သည့် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် ( <span id="course_name"></span> ) သင်တန်းအမှတ်စဥ် ( <span id="module_name"></span> ) ကို မြန်မာနိုင်ငံစာရင်းကောင်စီ <span id="type_name"></span>  <span id="result_name"></span> သူ</li>
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

                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၂။') }}</span>ကိုယ်ပိုင်အမှတ်</label>
                                <div class="col-md-9">
                                    <input type="text" id="personal_no" name="personal_no" class="form-control" readonly>
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

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>ပညာအရည်အချင်း</label>
                            <div class="col-md-9">
                            <input type="text" name="education" id="education" class="form-control" readonly>
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

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၈။') }}</span>လက်တွေ့အလုပ်သင်ကြားဖူးခြင်း ရှိ/မရှိ</label>
                            <div class="col-md-2">
                            <input type="radio" id="yes" value="1" name="experience" > Yes
                            </div>
                            <div class="col-md-2">
                                <input type="radio" id="no" value="0" name="experience" > No
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၉။') }}</span>ပုဂ္ဂလိကနှင့် အစိုးရဌာနအဖွဲအစည်းများ၊ အခြားဌာနအဖွဲ့အစည်းများ၊ ကုမ္ပဏီများ၊ Non Audit Service လုပ်ငန်းများတွင် အချိန်ပြည့်/ အချိန်ပိုင်းဝန်ထမ်း အဖြစ်ဆောင်ရွက်နေခြင်း ရှိ/မရှိ</label>
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၀။') }}</span>ဆက်သွယ်ရန်လိပ်စာ</label>
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၂။') }}</span>ဖုန်းနံပါတ်</label>
                            <div class="col-md-9">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၃။') }}</span>လက်တွေ့အလုပ်သင်ကြားလိုသည့် PAPP အမည်</label>
                            <div class="col-md-9">
                            <input type="text" name="papp_name" id="papp_name" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span></label>
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

                        <div id="previous_papp_name_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၄။') }}</span>ယခင်အလုပ်သင်ကြားခဲ့သည့် PAPP အမည်</label>
                                <div class="col-md-9">
                                    <input type="text" name="previous_papp_name" id="previous_papp_name" class="form-control" readonly>
                                </div>
                            </div>
                        </div>


                        <div id="previous_papp_date_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၅။') }}</span>ယခင်အလုပ်သင်ဆင်းခဲ့သည့် ကာလ</label>
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

                        <div id="previous_exam_pass_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left" id="exam_pass_date_label">{{ __('၁၆။') }}</span>စာမေးပွဲကျင်းပသည့် ခုနှစ်၊လ ၊ အောင်မြင်သည့်အမှတ်စဥ် </label>
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

                        <div id="done_form_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၇။') }}</span>Done Form Attachment</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="ml-3" style="font-weight:bold" align="left">Attachment</p>
                                        </div>
                                        <div class="col-md-3 done_form_attach">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="article_id" >
                        <div id="approve_reject_btn">
                            <div class="row mt-5 justify-content-center">
                                <button type="" name="article_reject" class="btn btn-danger"  onclick="rejectArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
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
</script>
<script>

  $(document).ready(function (e) {

  });

</script>
@endpush
