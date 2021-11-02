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
    'elementActive' => 'resign_article_list'
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
                                        <input type="text" name="personal_no" id="personal_no" class="form-control" readonly >
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

                        <div id="firm_education" style="display:none;">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၄။') }}</span>ပညာအရည်အချင်း</label>
                                <div class="col-md-9">
                                <input type="text" name="education" id="education" class="form-control" readonly>
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

                        <div id="certificate_row" style="display:none;">
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
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၅။') }}</span>လူမျိုး/ကိုးကွယ်သည့်ဘာသာ</label>
                            <div class="col-md-9">
                                <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="race" id="race" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="religion" id="religion" class="form-control" readonly >
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၆။') }}</span>မွေးသက္ကရာဇ်</label>
                            <div class="col-md-9">
                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၇။') }}</span>နုတ်ထွက်လိုသည့်နေ့<span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="resign_date" id="resign_date" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၈။') }}</span>နုတ်ထွက်ရသည့်အကြောင်းအရင်း<span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <textarea name="resign_reason" id="resign_reason" class="form-control" rows="3" style="resize:none;" readonly></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၉။') }}</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                            <div class="col-md-9">
                                <input type="text" name="address" id="address" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၀။') }}</span>အီးမေးလ်လိပ်စာ</label>
                            <div class="col-md-9">
                                <input type="text" name="m_email" id="m_email" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၁။') }}</span>ဖုန်းနံပါတ်</label>
                            <div class="col-md-9">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('၁၂။') }}</span>အလုပ်သင်ဆင်းသည့်ဌာနအဖွဲ့အစည်း(သို့မဟုတ်)Firm</label>
                            <div class="col-md-9">
                                <input type="text" name="recent_org" id="recent_org" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label label"><span class="pull-left">{{ __('') }}</span>Firm တွင် အလုပ်သင်ဆင်းနေသူဖြစ်ပါက သက်ဆိုင်ရာ PAPP ၏နုတ်ထွက်ခွင့်ပြုသည့် အကြောင်းကြားစာပူးတွဲတင်ပြရန်</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="ml-2 mt-2" style="font-weight:bold" align="left">Attachment</p>
                                    </div>
                                    <div class="col-md-3 mt-1 resign_approve_file">

                                    </div>
                                </div>
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
                        {{--<div id="approve_reject_btn">
                            <div class="row mt-5 justify-content-center">
                                <button type="" name="article_reject" class="btn btn-danger"  onclick="rejectResignArticle()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                <button type="" name="article_approve" class="btn btn-primary" onclick="approveResignArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>--}}

											<div id="approve_reject_btn">
												<div class="row mt-5 justify-content-center">
													<button type="" name="save" id="article_reject" data-toggle="modal" data-target="#remarkModal" class="btn btn-danger" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
													<button type="" name="save" id="article_approve" class="btn btn-primary" onclick="approveResignArticle()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
												</div>
							        </div>

    								</div>
                </div>
            </div>
        </form>
    </div>
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
							<form id="remark_resign_form"  method="post" action="javascript:rejectResignArticle()" enctype="multipart/form-data">
							@csrf
								<div class="modal-body">
										<div class="row">
												<div class="col-md-12">
														<div class="form-group">
																<!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
																<textarea class="form-control" name="remark_resign" id="remark_resign" rows="3"></textarea>
														</div>
												</div>
										</div>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" form="remark_resign_form">Reject</button>
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
									<h5 class="modal-title" id="exampleModalLabel"> PAPP Initial Registration Fees</h5>
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
    loadResignArticle();
		var article_id = localStorage.getItem("article_id");
		autoLoadPaymentResign(article_id);
</script>
<script>

  $(document).ready(function (e) {

  });

</script>
@endpush
