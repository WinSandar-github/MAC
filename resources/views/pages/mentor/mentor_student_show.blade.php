@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div>
            <form method="post" action="javascript:void();"  enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">

                            </div>
                            <div class="card-body">

                            <div >

	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-4">
	                                          <div class="form-group">
                                                   <input type="text" name="name_mm" class="form-control" id="name_mm" readonly>
	                                          </div>
	                                      </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <input type="text" name="name_eng" class="form-control" id="name_eng" readonly>
                                              </div>
                                          </div>
	                                    </div>
	                                    <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                            <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                            <div class="col-md-8">
                                                <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                                    <div class="col-md-2 col-5 pr-1">
                                                        <div class="form-group">
                                                            <input type="text" name="nrc_state_region" class="form-control" id="nrc_state_region" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-7 px-1">
                                                      <div class="form-group">
                                                          <input type="text" name="nrc_township" class="form-control" id="nrc_township" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2 col-5 px-1">
                                                      <div class="form-group">
                                                          <input type="text" name="nrc_citizen" class="form-control" id="nrc_citizen" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-5 col-7 pl-1">
                                                      <div class="form-group">
                                                          <input type="text" name="nrc_number" class="form-control" id="nrc_number" readonly>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                            <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="father_name_mm" name="father_name_mm" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="father_name_eng" id="father_name_eng" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>

	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <input type="text" name="race" id="race" class="form-control" readonly>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <input type="text" name="religion" id="religion" class="form-control" readonly>
                                              </div>
                                          </div>
	                                  </div>

                                    <div class="row">
                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="text" name="date_of_birth" id="date_of_birth" placeholder="dd-mm-yyyy" class="form-control" readonly>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
                                      <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="education" id="education" class="form-control" readonly>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('RA/CPA အောင်မြင်သောနှစ်/ ကိုယ်ပိုင်အမှတ်') }}</label>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="ra_cpa_success_year" id="ra_cpa_success_year" class="form-control"  readonly>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="ra_cpa_personal_no" id="ra_cpa_personal_no" class="form-control" readonly>
                                        </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('CPA PAPP	မှတ်ပုံတင်အမှတ်/ရက်စွဲ') }}</label>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="cpa_reg_no" id="cpa_reg_no" class="form-control"  readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="cpa_reg_date" id="cpa_reg_date" placeholder="dd-mm-yyyy" class="form-control" readonly>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('PAPP မှတ်ပုံတင်အမှတ်/ရက်စွဲ') }}</label>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="ppa_reg_no" id="ppa_reg_no" class="form-control"  readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="ppa_reg_date" id="ppa_reg_date" placeholder="dd-mm-yyyy" class="form-control" readonly>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('Postal Address') }}</label>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control" readonly>
                                      </div>
                                    </div>
                                   </div>

                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('Telephone No/Fax No') }}</label>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" name="fax_no" id="fax_no" class="form-control"  readonly>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="email" name="m_email" id="m_email" class="form-control"  readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('Audit Firm အမည်') }}</label>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <input type="text" name="audit_firm_name" id="audit_firm_name" class="form-control" readonly>
                                      </div>
                                    </div>
                                  </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('စတင်တည်ထောင်သည့်နေ့') }}</label>
	                                        <div class="col-md-8">
                                            <div class="form-group">
                                              <input type="text" name="audit_started_date" id="audit_started_date" placeholder="" class="form-control" readonly>
                                            </div>
                                          </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
	                                      <label class="col-md-4 col-form-label">{{ __('Audit Firm ၏ဖွဲ့စည်းပုံနှင့်ဝန်ထမ်းအင်အား') }}</label>
	                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" name="audit_structure" id="audit_structure" class="form-control"  readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" name="audit_staff_no" id="audit_staff_no" class="form-control" readonly>
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၆။') }}</label>
                                            <label class="col-md-3 col-form-label">{{ __('လက်ရှိလက်ခံဆောင်ရွက်စစ်ဆေးပေးရသည့်လုပ်ငန်းများ') }}</label>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control form-select" name="current_check_service_id" id="selected_service_id" style="width: 100%;" readonly>
                                                        <option value="" disabled selected>Select Current Service</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 check-service-other" style="display:none;">
                                              <div class="form-group">
                                                  <input type="text" name="current_check_services_other" id="current_check_services_other" class="form-control" placeholder="other" readonly >
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
    	                                      <label class="col-md-1 col-form-label">{{ __('၁၇။') }}</label>
    	                                      <label class="col-md-6 col-form-label">{{ __('ယခင်အလုပ်သင်ကြားပေးမှုအတွေ့အကြုံ ရှိ/မရှိ') }}</label>
                                            <div class="col-md-2">
                                              <input type="radio" id="yes" value="1" name="experience" > Yes
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" id="no" value="0" name="experience" > No
                                            </div>
	                                       </div>

																				<div id="start_teaching" style="display:none;">
	                                        <div class="row">
	  	                                      <label class="col-md-1 col-form-label">{{ __('၁၈။') }}</label>
	  	                                      <label class="col-md-6 col-form-label">{{ __('စာရင်းကိုင်အလုပ်သင်များအား အလုပ်သင်ကြားပေးမှု စတင်ခဲ့သည့်ခုနှစ်') }}</label>
		                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                    <input type="text" name="started_teaching_year" id="started_teaching_year" placeholder="dd-mm-yyyy" class="form-control" readonly>
	                                            </div>
	                                          </div>
		                                      </div>
																				</div>

                                      	<div id="accept_amount" style="display:none;">
																					<div class="row">
	  	                                      <label class="col-md-1 col-form-label">{{ __('၁၉။') }}</label>
	  	                                      <label class="col-md-6 col-form-label">{{ __('အလုပ်သင်ဦးရေလက်ခံနိုင်သည့်အရေအတွက်') }}</label>
		                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                              <input type="number" name="internship_accept_no" id="internship_accept_no" class="form-control" placeholder="" readonly>
	                                            </div>
	                                          </div>
		                                       </div>
																				</div>

                                        <div id="current_accept" style="display:none;">
																					<div class="row">
			                                      <label class="col-md-1 col-form-label">{{ __('၂၀။') }}</label>
			                                      <label class="col-md-6 col-form-label">{{ __('လက်ရှိလက်ခံသင်ကြားပေးသော အလုပ်သင်ဦးရေ') }}</label>
		                                        <div class="col-md-4">
		                                          <div class="form-group">
		                                             <input type="number" name="current_accept_no" id="current_accept_no" class="form-control" placeholder="" readonly>
		                                          </div>
	                                          </div>
		                                    	</div>
																				</div>

                                        <div id="trained_trainees" style="display:none;">
																					<div class="row">
			                                      <label class="col-md-1 col-form-label">{{ __('၂၁။') }}</label>
			                                      <label class="col-md-6 col-form-label">{{ __('မွေးထုတ်ပေးခဲ့သည့် အလုပ်သင်ဦးရေ') }}</label>
		                                        <div class="col-md-4">
		                                          <div class="form-group">
		                                             <input type="number" name="trained_trainees_no" id="trained_trainees_no" class="form-control" readonly>
		                                          </div>
	                                          </div>
		                                    	</div>
																				</div>

                                        <div id="yearly" style="display:none;">
																					<div class="row">
	  	                                      <label class="col-md-1 col-form-label">{{ __('၂၂။') }}</label>
	  	                                      <label class="col-md-6 col-form-label">{{ __('နှစ်စဥ်ဆက်တိုက်အလုပ်သင်ကြားနိုင်ခြင်း ရှိ/မရှိ') }}</label>
	                                          <div class="col-md-2">
	                                            <input type="radio" id="yes" value="1" name="repeat_yearly" > Yes
	                                          </div>
	                                          <div class="col-md-2">
	                                            <input type="radio" id="no" value="0" name="repeat_yearly" > No
	                                          </div>
		                                    	</div>
																				</div>

                                      	<div id="absent_training" style="display:none;">
																					<div class="row">
			                                      <label class="col-md-1 col-form-label">{{ __('၂၃။') }}</label>
			                                      <label class="col-md-6 col-form-label">{{ __('အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ') }}</label>
		                                        <div class="col-md-2">
		                                                <input type="radio" id="yes" value="1" name="training_absent" value="yes"> Yes
		                                        </div>
		                                        <div class="col-md-2">
		                                                <input type="radio" id="no" value="0" name="training_absent" value="no"> No
		                                        </div>
		                                      </div>
																				</div>

                                        <div id="absent_reason" style="display:none;">
																					<div class="row">
	                                          <label class="col-md-1 col-form-label"></label>
	  	                                      <label class="col-md-6 col-form-label">{{ __('ရှိပါက ပြတ်တောက်ခဲ့ရသည့် အကြောင်းအရင်း') }}</label>
	                                          <div class="col-md-4">
	                                              <div class="form-group">
	                                                  <input type="text" name="training_absent_reason" id="training_absent_reason" class="form-control" placeholder="reason" readonly>
	                                              </div>
	                                          </div>
	                                        </div>
																				</div>

                                        <input type="hidden" name="mentor_student_id" >
                                        <div class="row mt-5 justify-content-center">
                                            <button type="" name="mentor_student_reject" class="btn btn-danger"  onclick="rejectMentorStudent()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                            <button type="" name="mentor_student_approve" class="btn btn-primary" onclick="approveMentorStudent()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                            
                                        </div>

                            </div>


                            <div class="card-footer ">

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
<script>
    loadService();
    loadMentorStudent();
</script>
<script>

  $(document).ready(function (e) {
    // $("#selected_service_id").change(function(){
    //   checkOtherService($(this));
    // });
  });

  // function checkOtherService(option){
  //   var selected_id = $(option).val();
  //   if(selected_id == 9){
  //     $(".check-service-other").css('display','block');
  //   }
  //   else{
  //     $(".check-service-other").css('display','none');
  //   }
  // }

</script>
@endpush
