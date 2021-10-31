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
    'elementActive' => 'gov_article_list'
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
                            <div>
                                <h6 align="right">Form Type -  <span id="form_type"></h6>
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

                        <!-- <div id="done_form_row" style="display:none;">
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
                        </div> -->

                        <div id="check_end_date" style="display:none;">
                            <div class="row">
                                <div class="col-md-12" align="right">
                                    <button type='button' class='btn btn-warning' onclick='checkEndGovArticle()'>Check End Date</button>
                                    <button type='button' class='btn btn-info' onclick='govCreateDoneFormLink()'>Create Done Form Link</button>
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

                        <input type="hidden" name="article_id" >
                        <div id="approve_reject_btn">
                            <div class="row mt-5 justify-content-center">
                                <button type="" name="article_reject" class="btn btn-danger" data-toggle="modal" data-target="#remarkModal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                <button type="" name="article_approve" class="btn btn-primary" onclick="approveGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>

                        <div id="done_form_approve_reject_btn" style="display:none;">
                            <div class="row mt-5 justify-content-center">
                                <!-- <button type="" name="article_done_reject" class="btn btn-danger"  onclick="rejectDoneGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button> -->
                                <button type="" name="article_done_approve" class="btn btn-primary" onclick="approveDoneGovArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <form method="post" class="needs-validation" id="endGovForm" action="javascript:saveGovEndArticle();" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="modal fade" id="endGovModal">
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
                        <input type="hidden" id="gov_article_id">
                        <input type="hidden" id="article_form_type">
                        <input type="hidden" id="student_info_id">
                        <input type="text" name="contract_gov_end_date" id="contract_gov_end_date" class="form-control" placeholder="ရက်၊လ၊နှစ်(DD-MMM-YYYY)">
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
							<form id="remark_gov_form"  method="post" action="javascript:rejectGovArticle()" enctype="multipart/form-data">
							@csrf
								<div class="modal-body">
										<div class="row">
												<div class="col-md-12">
														<div class="form-group">
																<!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
																<textarea class="form-control" name="remark_gov" id="remark_gov" rows="3"></textarea>
														</div>
												</div>
										</div>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" form="remark_gov_form">Reject</button>
								</div>
						</form>
						</div>
					</div>
				</div>
				{{-- Remark Modal --}}

    <!-- modal -->
    <form method="post" action="javascript:rejectGovArticleDoneAttach();" enctype="multipart/form-data">
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
                        <input type="hidden" id="gov_article_id">
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
    loadGovArticle();
</script>
<script>

  $(document).ready(function (e) {
    $("input[name='contract_gov_end_date']").flatpickr({
        enableTime: false,
        dateFormat: "d-M-Y",
        allowInput: true
    });
  });

</script>
@endpush
