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
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <!-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div> -->
        <form method="post" action="javascript:void();"  enctype="multipart/form-data">
        @csrf
          <div class="row">
            <div class="col-md-12 text-right">
              <div class="card border-success mb-3" style="padding:3% 5% 3% 5%;">
                <div class="card-header ">

                </div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-9">
                      <div class="row mb-3">
                        <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁။') }}</span>အမည်(မြန်မာ/အင်္ဂလိပ်)</label>
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
                        <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၂။') }}</span>အဘအမည်(မြန်မာ/အင်္ဂလိပ်)</label>
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
                    </div>

                    <div class="col-md-3 text-center">
                      <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                      <br/><span class='text-info'>Profile Picture</span>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၃။') }}</span>လူမျိုး/ဘာသာ</label>
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
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၄။') }}</span>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
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
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span></label>
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
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၅။') }}</span>မွေးသက္ကရာဇ်</label>
                    <div class="col-md-9">
                      <input type="text" name="date_of_birth" id="date_of_birth" placeholder="dd-mm-yyyy" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၆။') }}</span>ပညာအရည်အချင်း</label>
                    <div class="col-md-9">
                      <input type="text" name="education" id="education" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၇။') }}</span>RA/CPA အောင်မြင်သောနှစ်/ ကိုယ်ပိုင်အမှတ်</label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="ra_cpa_success_year" id="ra_cpa_success_year" class="form-control"  readonly>
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="ra_cpa_personal_no" id="ra_cpa_personal_no" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၈။') }}</span>CPA	မှတ်ပုံတင်အမှတ်/ရက်စွဲ</label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="cpa_reg_no" id="cpa_reg_no" class="form-control"  readonly>
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="cpa_reg_date" id="cpa_reg_date" placeholder="dd-mm-yyyy" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၉။') }}</span>PAPP မှတ်ပုံတင်အမှတ်/ရက်စွဲ</label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="papp_reg_no" id="papp_reg_no" class="form-control"  readonly>
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="papp_reg_date" id="papp_reg_date" placeholder="dd-mm-yyyy" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span></label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-3">
                            <p class="ml-2" style="font-weight:bold" align="left">Attachment</p>
                        </div>
                        <div class="col-md-3 papp_attachment">

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၀။') }}</span>ဆက်သွယ်ရန်လိပ်စာ</label>
                    <div class="col-md-9">
                      <input type="text" name="address" id="address" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၁။') }}</span>Phone Number/Fax Number</label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="phone_no" id="phone_no" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="fax_no" id="fax_no" class="form-control"  readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၂။') }}</span>Contact Email</label>
                    <div class="col-md-9">
                      <input type="email" name="m_email" id="m_email" class="form-control"  readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၃။') }}</span>Audit Firm အမည်</label>
                    <div class="col-md-9">
                      <input type="text" name="audit_firm_name" id="audit_firm_name" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၄။') }}</span>စတင်တည်ထောင်သည့်နေ့</label>
                    <div class="col-md-9">
                      <input type="text" name="audit_started_date" id="audit_started_date" placeholder="" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၅။') }}</span>Audit Firm ၏ဖွဲ့စည်းပုံနှင့်ဝန်ထမ်းအင်အား</label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" name="audit_structure" id="audit_structure" class="form-control"  readonly>
                        </div>
                        <div class="col-md-6">
                          <input type="number" name="audit_staff_no" id="audit_staff_no" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၆။') }}</span>လက်ရှိလက်ခံဆောင်ရွက်စစ်ဆေးပေးရသည့်လုပ်ငန်းများ</label>
                    <div class="col-md-9">
                      <textarea name="current_check_service_id" id="current_check_service_id" class="form-control" rows="3" style="resize:none;" readonly></textarea>
                        <!-- <select class="form-control form-select" name="current_check_service_id" id="selected_service_id" style="width: 100%;" readonly>
                            <option value="" disabled selected>Select Current Service</option>
                        </select> -->
                    </div>
                  </div>

                  <div id="other_service" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span>အခြား</label>
                      <div class="col-md-9">
                        <input type="text" name="current_check_services_other" id="current_check_services_other" class="form-control" placeholder="other" readonly >
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span></label>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-3">
                            <p class="ml-2" style="font-weight:bold" align="left">Attachment</p>
                        </div>
                        <div class="col-md-3 attachment_file">

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၇။') }}</span>ယခင်အလုပ်သင်ကြားပေးမှုအတွေ့အကြုံ ရှိ/မရှိ</label>
                    <div class="col-md-2">
                      <input type="radio" id="yes" value="1" name="experience" > Yes
                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="no" value="0" name="experience" > No
                    </div>
                  </div>

                  <div id="start_teaching" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၈။') }}</span>စာရင်းကိုင်အလုပ်သင်များအား အလုပ်သင်ကြားပေးမှု စတင်ခဲ့သည့်ခုနှစ်</label>
                      <div class="col-md-9">
                        <input type="text" name="started_teaching_year" id="started_teaching_year" placeholder="dd-mm-yyyy" class="form-control" readonly>
                      </div>
                    </div>
                  </div>

                  <div id="accept_amount" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၁၉။') }}</span>အလုပ်သင်ဦးရေလက်ခံနိုင်သည့်အရေအတွက်</label>
                      <div class="col-md-9">
                        <input type="number" name="internship_accept_no" id="internship_accept_no" class="form-control" placeholder="" readonly>
                      </div>
                    </div>
                  </div>

                  <div id="current_accept" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၂၀။') }}</span>လက်ရှိလက်ခံသင်ကြားပေးသော အလုပ်သင်ဦးရေ</label>
                      <div class="col-md-9">
                        <input type="number" name="current_accept_no" id="current_accept_no" class="form-control" placeholder="" readonly>
                      </div>
                    </div>
                  </div>

                  <div id="trained_trainees" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၂၁။') }}</span>မွေးထုတ်ပေးခဲ့သည့် အလုပ်သင်ဦးရေ</label>
                      <div class="col-md-9">
                        <input type="number" name="trained_trainees_no" id="trained_trainees_no" class="form-control" readonly>
                      </div>
                    </div>
                  </div>

                  <div id="yearly" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၂၂။') }}</span>နှစ်စဥ်ဆက်တိုက်အလုပ်သင်ကြားနိုင်ခြင်း ရှိ/မရှိ</label>
                      <div class="col-md-2">
                        <input type="radio" id="yes" value="1" name="repeat_yearly" > Yes
                      </div>
                      <div class="col-md-2">
                        <input type="radio" id="no" value="0" name="repeat_yearly" > No
                      </div>
                    </div>
                  </div>

                  <div id="absent_training" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('၂၃။') }}</span>အလုပ်သင်ကြားမှုပြတ်တောက်ခဲ့ခြင်း ရှိ/မရှိ</label>
                      <div class="col-md-2">
                              <input type="radio" id="yes" value="1" name="training_absent" value="yes"> Yes
                      </div>
                      <div class="col-md-2">
                              <input type="radio" id="no" value="0" name="training_absent" value="no"> No
                      </div>
                    </div>
                  </div>

                  <div id="absent_reason" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span>ရှိပါက ပြတ်တောက်ခဲ့ရသည့် အကြောင်းအရင်း</label>
                      <div class="col-md-9">
                        <input type="text" name="training_absent_reason" id="training_absent_reason" class="form-control" placeholder="reason" readonly>
                      </div>
                    </div>
                  </div>

                  <div id="reject_reason_row" style="display:none;">
                    <div class="row mb-3">
                      <label class="col-md-3 col-form-label"><span class="pull-left">{{ __('') }}</span>Reject Reason</label>
                      <div class="col-md-9">
                        <input type="text" name="reject_reason" id="reject_reason" class="form-control" placeholder="reason" readonly>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="mentor_student_id" >
                  <div id="approve_reject_btn">
                    <div class="row mt-5 justify-content-center">
                        <!-- <button type="" name="mentor_student_reject" class="btn btn-danger"  onclick="rejectMentorStudent()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button> -->
                        <button type="button" class="btn btn-danger" style="width : 20%" data-toggle="modal" id="smallButton" data-target="#myModal"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> REJECT</button>
                        <button type="" name="mentor_student_approve" class="btn btn-primary" onclick="approveMentorStudent()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
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

    <!-- modal -->
    <form method="post" action="javascript:rejectMentorStudent();" enctype="multipart/form-data">
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Reject Reason</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
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
