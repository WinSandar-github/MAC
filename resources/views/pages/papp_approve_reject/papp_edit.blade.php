@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'papp_registration_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    {{--<div class="row">
        <div class="col-md-12">
        {{ Breadcrumbs::render('papp_edit') }}
        </div>
    </div>--}}
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="javascript:void()" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                            <center>
                                    <img id="profile_photo" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                </center>
                                <!-- Start CPA_FF Info -->
                                <h5 class="border-bottom pb-2 mt-3" style="font-weight:bold">PAPP Info</h5>

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
                                <!-- CPA -->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2"  style="font-weight:bold">CPA </p>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="cpa_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpaModal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                <!-- CPA Modal-->
                                <div id="cpaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">CPA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="cpa"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- RA -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">RA </p>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="ra_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#raModal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                <!--RA Modal -->
                                <div id="raModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title text-center">RA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="ra"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Foreign Degree -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Foreign Degree</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="foreign_degree">

                                            </span>
                                    </div>
                                </div>
                                <!--Foreign Modal -->
                                <div id="fdModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title text-center">Foreign Degree</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <embed id="foreign_degree"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <!-- CPA -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA </p>
                                    </div>
                                    {{--<div class="col-md-6 text-left">
                                        <button type="button" id="cpa_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpaModal"><i class="fa fa-paperclip"></i></button>
                                    </div>--}}
                                    <div class="col-md-6 text-left cpa_file"></div>
                                </div>
                                <!-- CPA Modal-->
                                <div id="cpaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">CPA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="cpa"  width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!-- RA -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">RA </p>
                                    </div>
                                   {{-- <div class="col-md-6 text-left">
                                        <button type="button" id="ra_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#raModal"><i class="fa fa-paperclip"></i></button>
                                    </div>--}}
                                    <div class="col-md-6 text-left ra_file"></div>
                                </div>
                                <!--RA Modal -->
                                <div id="raModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">RA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <embed id="ra" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!-- Foreign Degree -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Foreign Degree</p>
                                    </div>
                                    <div class="col-md-6 text-left foreign_degree_file">
                                        {{--<span class="foreign_degree">

                                        </span>--}}

                                    </div>
                                </div>
                                <!--Foreign Modal -->
                                <div id="fdModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">Foreign Degree</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <embed id="foreign_degree"  src="" width="100%"  height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Passed Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_pass_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Submit Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">No Use Firm Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="use_firm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-12">
                                        <p class="ml-2 text-center" style="font-weight:bold">Use Firm Name</p>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Firm Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="firm_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Firm Type</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="firm_type"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2"style="font-weight:bold">Firm Level</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="firm_step"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Staff Firm Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="staff_firm_name"></span>
                                    </div>
                                </div>

                                <!--CPA FF Recommendation Modal-->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registration Card</p>
                                    </div>
                                    <div class="col-md-6 text-left cpaff_registeration_card_file">
                                        <!-- <button type="button" id="mac_mem_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#mpa_mem_card_back_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--MPA Member Card back Modal -->
                                <div id="cpa_ff_recommendation_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">CPA(Full-Fledged) Registration Card</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="mpa_mem_card" class="img-fluid" /> -->
                                            <embed id="cpaff_recomm" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--CPD Record Modal-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">CPD Record</p>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="cpd_rec_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpd_record_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--CPD Record Modal-->
                                <div id="cpd_record_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">CPD Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="cpd_record"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPD Record</p>
                                    </div>
                                    <div class="col-md-6 text-left cpd_record_file">
                                        <!-- <button type="button" id="mac_mem_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#mpa_mem_card_back_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!--MPA Member Card back Modal -->
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
                                            <!-- <img id="mpa_mem_card" class="img-fluid" /> -->
                                            <embed id="cpd_record" width="100%" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!--CPD Hours-->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPD Hours</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpd_hours"></span>
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
                                            <h5 class="modal-title text-center">MICPA Member Card(Back)</h5>
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

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Tax Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="tax_year"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Registeration No</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="reg_no"></span>
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
                                    <div class="col-md-6">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="name_eng"></span> / <span id="name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">NRC</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="father_name_eng"></span> / <span id="father_name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Race</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="race"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Religion</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="religion"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="date_of_birth"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Current Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="current_address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Phone</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Government Staff</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="gov_staff"></span>
                                        {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                    </div>
                                    <div class="col-md-6 recommend_letter">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="registration_no"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Job</h5>
                            </div>
                            <div class="card-body pt-0">
                                <!-- Start Job -->

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Job Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Job Position</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="position"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Department</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="department"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Organization</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="organization"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Company Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="company_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Salary</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="salary"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="office_address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Education</h5>
                            </div>
                            <div class="card-body pt-0">
                                <!-- Start Education -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">University Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="university_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Degree Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="degree_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="qualified_date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="roll_number"></span>
                                    </div>
                                </div>
                                <!-- Attached Certificate -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                    </div>
                                    <div class="col-md-6 certificate">
                                        <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#attached_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                <!-- Attached Certificate Modal-->
                                <div id="attached_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">Attached Certificate</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="attached_file"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Education -->

                                <input type="hidden" name="papp_id" >

                                <div class="row mt-5 justify-content-center">
                                    <button type="submit" name="save" id='reject' class="btn btn-danger"  onclick="rejectPAPPUser()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                    <button type="submit" name="save" id='approve' class="btn btn-primary" onclick="approvePAPPUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    loadPAPPData();
</script>
@endpush
