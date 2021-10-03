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
    'elementActive' => 'Gov Article_list'
])
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset("assets/css/plugins/bootstrap/bootstrap.min.css") }}">
<style>
    .label{
        text-align: right;
    }
    li{
        display: inline;
    }
    ul{
        padding-left: 0px !important;
        font-weight:bold;
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
                                    <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၂။') }}</span>မွေးသက္ကရာဇ်</label>
                                    <div class="col-md-9">
                                    <input type="text" name="date_of_birth" id="date_of_birth" placeholder="dd-mm-yyyy" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                <br/><span class='text-info'>Profile Picture</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၃။') }}</span>လူမျိုး/ဘာသာ</label>
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၅။') }}</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၆။') }}</span>အလုပ်သမားမှတ်ပုံတင်အမှတ်</label>
                            <div class="col-md-9">
                                <input type="text" name="labor_registration_no" id="labor_registration_no" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span>အလုပ်သမားမှတ်ပုံတင်ကတ်ပြား</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="ml-2 mt-2" style="font-weight:bold" align="left">Attachment</p>
                                    </div>
                                    <div class="col-md-3 mt-1 labor_registration_attach">

                                    </div>
                                </div>
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
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၈။') }}</span>အဘ၏အလုပ်အကိုင်နှင့်နေရပ်လိပ်စာ</label>
                            <div class="col-md-9">
                                <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="father_job" id="father_job" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="father_address" id="father_address" class="form-control" readonly>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၉။') }}</span>အိမ်ထောင် ရှိ/မရှိ</label>
                            <div class="col-md-2">
                                <input type="radio" id="yes" value="1" name="married" > Yes
                            </div>
                            <div class="col-md-2">
                                <input type="radio" id="no" value="0" name="married" > No
                            </div>
                        </div>

                        <div id="married_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span>ဇနီး/ခင်ပွန်း၏အမည်နှင့်အလုပ်အကိုင်</label>
                                <div class="col-md-9">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="married_name" id="married_name" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="married_job" id="married_job" class="form-control" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၀။') }}</span>ဇာတိမြို့နယ်</label>
                            <div class="col-md-9">
                                <input type="text" name="home_address" id="home_address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၁။') }}</span>ကြီးပြင်းရာမြို့နယ်</label>
                            <div class="col-md-9">
                                <input type="text" name="current_address" id="current_address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၂။') }}</span>နေရပ်လိပ်စာ(အပြည့်အစုံ)</label>
                            <div class="col-md-9">
                                <textarea name="address" id="address" class="form-control" rows="3" style="resize:none;" readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-left: 100px">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('(က)') }}</span>ခေတ္တ</label>
                            <div class="col-md-9">
                                <input type="text" name="tempory_address" id="tempory_address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-left: 100px">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('(ခ)') }}</span>အမြဲတမ်း</label>
                            <div class="col-md-9">
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-left: 100px">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('(ဂ)') }}</span>ဖုန်းနံပါတ်/e-mail</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="m_email" id="m_email" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-5 col-form-label label"><span class="pull-left">{{ __('၁၃။') }}</span>အောက်ပါများ(မူရင်းအတိုင်း)ပူးတွဲတင်ပြပါသည်။</label>
                        </div>

                        <div class="row mb-3" style="margin-left: 100px">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('(က)') }}</span>အကျင့်စာရိတ္တကောင်းမွန်ကြောင်း ရပ်ကွက်အုပ်ချုပ်ရေးမှူးရုံးမှထောက်ခံစာ</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="ml-2 mt-2" style="font-weight:bold" align="left">Attachment</p>
                                    </div>
                                    <div class="col-md-3 mt-1 recommend_attach">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-left: 100px">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('(ခ)') }}</span>ပြစ်မှုကင်းရှင်းကြောင်း ရဲစခန်းထောက်ခံစာ</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="ml-2 mt-2" style="font-weight:bold" align="left">Attachment</p>
                                    </div>
                                    <div class="col-md-3 mt-1 police_attach">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="done_form_row" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label label"><span class="pull-left">{{ __('၁၄။') }}</span>Done Form Attachment</label>
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
                                <button type="" name="article_reject" class="btn btn-danger"  onclick="rejectGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                <!-- <button type="" name="article_approve" class="btn btn-primary" onclick="approveGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button> -->
                            </div>
                        </div>

                        <div id="done_form_approve_reject_btn" style="display:none;">
                            <div class="row mt-5 justify-content-center">
                                <button type="" name="article_done_reject" class="btn btn-danger"  onclick="rejectDoneGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                <button type="" name="article_done_approve" class="btn btn-primary" onclick="approveDoneGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
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
    loadGovArticle();
</script>
<script>

  $(document).ready(function (e) {

  });

</script>
@endpush
