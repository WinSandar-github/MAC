@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'offline_user'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">
        
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="javascript:void()" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="" id="profile_photo" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                </center>
                                <!-- Start CPA_FF Info -->
                                <h5 class="border-bottom pb-2 mt-3" style="font-weight:bold">CPA(Full-Fledged) Offline User Info</h5>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA အပတ်စဉ်/ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpa_batch_no"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged ) Registeration No.</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_reg_no"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ဆက်သွယ်ရန်လိပ်စာ</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_address"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">တယ်လီဖုန်းနံပါတ်၊ Fax ဖုန်းနံပါတ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_phone"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">E-mail Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="contact_mail"></span>
                                    </div>
                                </div>

                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Degree Level</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="degree"></span>
                                    </div>
                                </div>--}}

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged ) Registeration Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_pass_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged ) Renewal Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_renew_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Registeration No.</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_reg_no"></span>
                                    </div>
                                </div>

                                <!--CPA Certificate -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Certificate</p>
                                    </div>
                                    <div class="col-md-6 text-left cpa_certificate_file">
                                        {{--<button type="button" id="cpa_certi_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#capp_certi_Modal"><i class="fa fa-paperclip"></i></button>--}}
                                    </div>
                                </div>
                                <!--CPA Certificate Modal -->
                                <div id="capp_certi_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">CPA(Full-Fledged) Certificate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa_certificate" class="img-fluid" /> -->
                                            <embed id="cpa_certificate"  width="100%"  height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--MPA Member Card-->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">MICPA Member Card(Front)</p>
                                    </div>
                                    <div class="col-md-6 text-left mpa_mem_card_file">
                                        <!-- <button type="button" id="mac_mem_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#mpa_mem_card_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--MPA Member Card Modal -->
                                <div id="mpa_mem_card_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">MICPA Member Card(Front)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="mpa_mem_card" class="img-fluid" /> -->
                                            <embed id="mpa_mem_card" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--MPA Member Card back-->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">MICPA Member Card(Back)</p>
                                    </div>
                                    <div class="col-md-6 text-left mpa_mem_card_back_file">
                                        <!-- <button type="button" id="mac_mem_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#mpa_mem_card_back_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--MPA Member Card back Modal -->
                                <div id="mpa_mem_card_back_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">MPA Member Card(Back)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="mpa_mem_card" class="img-fluid" /> -->
                                            <embed id="mpa_mem_card_back" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--NRC Card(Front) -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Card(Front)</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_front_file">
                                        <!-- <button type="button" id="nrc_fornt_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#nrc_front_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--NRC Card(Front) Modal -->
                                <div id="nrc_front_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">NRC Card(Front)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="nrc_front" class="img-fluid" /> -->
                                            <embed id="nrc_front"  width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--NRC Card(Back) -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Card(Back)</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_back_file">
                                        <!-- <button type="button" id="nrc_back_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#nrc_back_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--NRC Card(Back) Modal -->
                                <div id="nrc_back_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">NRC Card(Back)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="nrc_back" class="img-fluid" /> -->
                                            <embed id="nrc_back" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--CPD Record Modal-->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPD Record</p>
                                    </div>
                                    <div class="col-md-6 text-left cpd_record_file">
                                        <!-- <button type="button" id="cpd_rec_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpd_record_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                    <!--CPD Record Modal-->
                                <div id="cpd_record_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">CPD Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <embed id="cpd_record"  width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPD Total Hours</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpd_total_hour"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Last Paid Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="last_paid_year"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Resigned Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="resign_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Status</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="status"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Basic Info</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name_eng"></span> / <span id="name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Gender</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gender"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="father_name_eng"></span> / <span  id="father_name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Phone</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Email</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                    </div>
                                    <div class="col-md-6 text-left recommend_letter">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">CPAFF Education</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA </p>
                                    </div>
                                    <div class="col-md-6 text-left cpa_file"></div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">RA </p>
                                    </div>
                                    <div class="col-md-6 text-left ra_file"></div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom" id="not_foreign_degree" style="display:none;">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Foreign Degree</p>
                                    </div>
                                    <div class="col-md-6 text-left foreign_degree_file">
                                    </div>
                                </div>       
                                <div class="row m-2 mt-3 border-bottom" id="has_foreign_degree" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="ml-2" style="font-weight:bold">Foreign Degree</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <table id="tbl_foreign_degree"  class="table table-border"  style="width:100%;overflow-x: auto;white-space: nowrap;">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Passed Year</th>
                                                            <th>Certificate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbl_foreign_degree_body hoverTable text-left">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                <input type="hidden" name="cpaff_id" >

                                <div class="row mt-5 justify-content-center" id="cpaff_approve_reject">
                                    {{--<button type="submit" name="save" class="btn btn-danger"  onclick="rejectCPAFFUser()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>--}}
                                    {{--<button type="submit" name="save" class="btn btn-danger"  onclick="rejectModal()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>--}}
                                    <button type="submit" name="save" class="btn btn-primary" onclick="approveOfflineCPAFFUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                </div>                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Reject Modal --}}
<div class="modal fade" id="reject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Reject ပြုလုပ်ရသည့်အကြောင်းအရင်း</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <textarea name="reject" id="reject" cols="60" rows="5"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="rejectCPAFFUser()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Reject Modal End --}}
@endsection
@push('scripts')
<script>
    loadCPAFFOfflineInitialData();
</script>
@endpush
