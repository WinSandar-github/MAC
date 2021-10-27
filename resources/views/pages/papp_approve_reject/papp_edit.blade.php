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
                        <div class="card" style="height: 1891px">
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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2"  style="font-weight:bold">CPA </p>
                                    </div>
                                    <div class="col-md-6 text-left">
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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">RA </p>
                                    </div>
                                    <div class="col-md-6 text-left">
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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Foreign Degree</p>
                                    </div>
                                    <div class="col-md-6 text-left">
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
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA </p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="cpa_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpaModal"><i class="fa fa-paperclip"></i></button>
                                    </div>
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
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="ra_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#raModal"><i class="fa fa-paperclip"></i></button>
                                    </div>
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
                                            <embed id="foreign_degree"  src="" width="100%"  height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>--}}

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registeration Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_pass_date"></span>
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Registeration Date</p>
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

                                <!--CPA FF Recommendation -->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registration Card</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="cpaff_rec_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#cpa_ff_recommendation_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                <!--CPA FF Recommendation Modal-->
                                <div id="cpa_ff_recommendation_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">CPA(Full-Fledged) Registration Card</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="cpaff_recomm"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

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
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Recommendation (183)Days</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button"  id="rec_183_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#recommendation_183_Modal"><i class="fa fa-paperclip"></i></button>
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
                                            <h5 class="modal-title text-center">183 Days Recommendation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="recomm_183"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <!--No Fulltime Recommendation-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">No Fulltime Recommendation</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="ft_rec_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#not_fulltime_recommendation_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--No Fulltime Recommendation Modal-->
                                <div id="not_fulltime_recommendation_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">No Fulltime Recommendation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="not_fulltime_recomm"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <!--Work In Myanmar Confession-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Work In Myanmar Confession</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="mm_conf_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#work_in_myanmar_confession_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--Work In Myanmar Confession Modal-->
                                <div id="work_in_myanmar_confession_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">Work In Myanmar Confession</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="work_in_myanmar"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <!--Rule Confession-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Rule Confession</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="rule_conf_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#rule_confession_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--Rule Confession Modal-->
                                <div id="rule_confession_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">Rule Confession</h5>
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


                                <!--Tax Free Recommendation-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Tax Free Recommendation</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="tax_free_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#tax_free_recommendation_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--Tax Free Recommendation Modal-->
                                <div id="tax_free_recommendation_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">Tax Free Recommendation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="tax_free"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

                                <!--Letter-->
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ကိုယ်တိုင်ဝန်ခံချက်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <button type="button" id="letter_btn" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#letter_Modal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                 <!--Letter Modal-->
                                <div id="letter_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> -->
                                            <h5 class="modal-title text-center">ကိုယ်တိုင်ဝန်ခံချက်</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <img id="cpa" class="img-fluid" /> -->
                                            <embed id="letter"  width="100%" height="500px">
                                        </div>
                                    </div>
                                  </div>
                                </div>--}}

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
                                        <p class="ml-2" style="font-weight:bold">အခွန်ကင်းရှင်းကြောင်းထောက်ခံချက်</p>
                                    </div>
                                    <div class="col-md-6 text-left tax_free_recommendation">
                                    </div>
                                </div>

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registeration No.</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_reg_no"></span>
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
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="father_name_eng"></span> / <span id="father_name_mm"></span>
                                    </div>
                                </div>
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Race</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="race"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Religion</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="religion"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="date_of_birth"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Current Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="current_address"></span>
                                    </div>
                                </div>--}}
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
                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Government Staff</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gov_staff"></span>
                                        <p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                    </div>
                                    <div class="col-md-6  text-left recommend_letter">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="registration_no"></span>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                        {{--<div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Job</h5>
                            </div>
                            <div class="card-body pt-0">
                                <!-- Start Job -->

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Position</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="position"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Department</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="department"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Organization</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="organization"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Company Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="company_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Salary</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="salary"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="office_address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
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
                                        <span id="payment_status"></span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">PAPP Education</h5>
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
                            </div>
                            {{--<div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Education</h5>
                            </div>
                            <div class="card-body pt-0">
                                <!-- Start Education -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">University Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="university_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Degree Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="degree_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="qualified_date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="roll_number"></span>
                                    </div>
                                </div>
                                <!-- Attached Certificate -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                    </div>
                                    <div class="col-md-6 text-left certificate">
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
                            </div>--}}
                        </div>
                          
                    </div>
                </div>
                <div class="card shadow-lg" style="font-weight: bold">
                    <div class="card-header border-bottom">
                      <h5>ကိုယ်တိုင်ဝန်ခံချက်(Certificate of Professional Accountant in Public Pratice)</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="4">
                                    <div class="text-center">
                                        <h6 class="fw-bold" style="font-size: 18px">မြန်မာနိုင်ငံစာရင်းကောင်စီ​၏ ၉-၈-၂၀၁၈ ရက်စွဲပါ အမိန့်ကြော်ငြာစာအမှတ် ၂၇/၂၀၁၈ ​၏ နောက်ဆက်တွဲတွင် ဖော်ပြထားသည့်<br/> စည်းကမ်းချက်များ</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>စဥ်</td>
                                <td style="width: 1300px!important">အကြောင်းအရာ</td>
                                <td style="width: 100px!important"> ရှိ </td>
                                <td style="width: 100px!important"> မရှိ </td>
                            </tr>
                            <tr>
                                <td>၁</td>
                                <td class="text-left">မိမိ၏စာရင်းလုပ်ငန်းအတွက် အများသိရှိစေရန်ကြော်ငြာရာတွင် မိမိကိုယ်တိုင်တာဝန်ခံဆောင်ရွက် ပေးနိုင်သည်ထက် သို့မဟုတ် မိမိတွင်ရှိသောအရည်အချင်း သို့မဟုတ် အတွေ့အကြုံထက်ပိုမိုထုတ် ဖော်ခြင်း၊</td>
                                <td class="self0"> </td>
                                <td class="nself0">  </td>
                            </tr>
                            <tr>
                                <td>၂</td>
                                <td class="text-left">အခြားစာရင်းလုပ်ငန်းလုပ်ကိုင်သူအား ထိခိုက်နစ်နာစေသည့် အချက်အလက်ဖြင့် မိမိလုပ်ငန်းကို ကြော်ငြာခြင်း၊</td>
                                <td class="self1">  </td>
                                <td class="nself1"> </td>
                            </tr>
                            <tr>
                                <td>၃</td>
                                <td class="text-left">Global network/Association name အသုံးပြု၍ စာရင်းစစ်လုပ်ငန်းများအတွက်ကြော်ငြာခြင်း၊</td>
                                <td class="self2">  </td>
                                <td class="nself2"> </td>
                            </tr>
                            <tr>
                                <td>၄</td>
                                <td class="text-left">မိမိဝန်ဆောင်မှုမပေးသည့်အခြား Client များ၏ အမည်စာရင်းများအား ထည့်သွင်းကြော်ငြာခြင်း၊</td>
                                <td class="self3">  </td>
                                <td class="nself3"> </td>
                            </tr>
                            <tr>
                                <td>၅</td>
                                <td class="text-left">လုပ်ငန်းအပ်နှံသူ၏ အမြတ်/ ဝင်ငွေပေါ်တွင် အခြေတည်၍ လုပ်ခငွေ/ အခကြေးငွေတောင်းယူခြင်း</td>
                                <td class="self4">  </td>
                                <td class="nself4"> </td>
                            </tr>
                            <tr>
                                <td>၆</td>
                                <td class="text-left">ကောင်စီကလိုအပ်၍ တောင်းဆိုသည့် စာရင်းများနှင့်စပ်လျဥ်းသည့် အချက်အလက်များကို တင်ပြပေးရန်ပျက်ကွက်ခြင်း။</td>
                                <td class="self5">  </td>
                                <td class="nself5"> </td>
                            </tr>
                            <tr>
                                <td>၇</td>
                                <td class="text-left">မိမိတစ်ဦးတည်းသာ သိရှိစေသော အကြောင်းအချက်များကို အလုပ်ရှင်၏ ခွင့်ပြုချက်မရဘဲ သို့မဟုတ် တည်ဆဲဥပဒေတစ်ရပ်အရ မဟုတ်ဘဲ အခြားသူထံထုတ်ဖော်အသိပေးခြင်း၊</td>
                                <td class="self6">  </td>
                                <td class="nself6"> </td>
                            </tr>
                            <tr>
                                <td>၈</td>
                                <td class="text-left">မိမိအားပေးအပ်သည့် စာရင်းပညာဆိုင်ရာ အလုပ်ဝတ္တရားများကို ဆောင်ရွက်ရာတွင် ထိုက်သင့်သော သတိပြုခြင်းမရှိဘဲ ဆောင်ရွက်ခြင်း၊</td>
                                <td class="self7">  </td>
                                <td class="nself7"> </td>
                            </tr>
                            <tr>
                                <td>၉</td>
                                <td class="text-left">မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၂ (ဍ) ပါ သတ်မှတ်ပြဌာန်းထားသည့် စာရင်းလုပ်ငန်း များ၊ Statutory Audit (including component auditor performance),Forensic Audit, Review Engagement , Assurance Engagement  ,Agreed upon Audit Procedures (including Independent Internal Audit) စာရင်းလုပ်ငန်းများနှင့် မြန်မာနိုင်ငံစာရင်းကောင်စီက အခါအားလျော်စွာ သတ်မှတ်သည့်လုပ်ငန်းများကို အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်း လုပ်ကိုင်သူမဟုတ်သူများနှင့် တွဲဖက်ဖွဲ့စည်းဆောင်ရွက်ခြင်း၊</td>
                                <td class="self8">  </td>
                                <td class="nself8"> </td>
                            </tr>
                            <tr>
                                <td>၁၀</td>
                                <td class="text-left">စာရင်းဖော်ပြချက်၊ ကြေညာချက်၊ လုပ်ငန်းအလားအလာညွှန်းတမ်း၊ ရှင်းတမ်း၊ အစီရင်ခံစာ ငွေစာရင်းစာအုပ်၊ လက်မှတ် သို့မဟုတ် ပုံစံတွင် ပြင်ပစာရင်းစစ်အဖြစ် ထောက်ခံလက်မှတ် ရေးထိုးခြင်းများ၊</td>
                                <td class="self9">  </td>
                                <td class="nself9"> </td>
                            </tr>
                            <tr>
                                <td>၁၁</td>
                                <td class="text-left">စဉ် (၉) နှင့် (၁၀) ပါ စာရင်းလုပ်ငန်းအမျိုးအစားများအား သက်တမ်းရှိသည့် အများပြည်သူသို့စာရင်း ဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်မရှိဘဲလုပ်ကိုင်ခြင်း၊</td>
                                <td class="self10">  </td>
                                <td class="nself10"> </td>
                            </tr>
                            <tr>
                                <td>၁၂</td>
                                <td class="text-left">စာရင်းစစ်လုပ်ငန်းအမည်ဖြင့် မှတ်ပုံတင်ထားသည့် စာရင်းစစ်လုပ်ငန်းအဖွဲ့ဝင်ဖြစ်သူသည် အခြားစာရင်းစစ်လုပ်ငန်းတစ်ခု၌ အဖွဲ့ဝင်အဖြစ်သော်လည်းကောင်း၊ မိမိကိုယ်ပိုင်စာရင်းစစ် လုပ်ငန်းအဖြစ်သော်လည်းကောင်း ဆောင်ရွက်ခြင်း၊</td>
                                <td class="self11">  </td>
                                <td class="nself11"> </td>
                            </tr>
                            <tr>
                                <td>၁၃</td>
                                <td class="text-left">စာရင်းစစ်အစီရင်ခံစာတွင်လက်မှတ်ရေးထိုးရာ၌ အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူတစ်ဦးသည် အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်  စာရင်းလုပ်ငန်းအဖွဲ့တစ်ခုထက်ပိုမို၍ လက်မှတ်ထိုးခြင်း၊</td>
                                <td class="self12">  </td>
                                <td class="nself12"> </td>
                            </tr>
                            <tr>
                                <td>၁၄</td>
                                <td class="text-left">အကျိုးစီးပွားပါဝင်ပတ်သက်မှု၊ အကျိုးစီးပွားချင်း ပဋိပက္ခဖြစ်မှု၊ ဆန့်ကျင်ဖက်ဖြစ်မှု၊ လွတ်လပ်မှုကို ထိခိုက်စေမှု ဖြစ်စေသော လုပ်ငန်းများကို လက်ခံဆောင်ရွက်ခြင်း၊</td>
                                <td class="self13">  </td>
                                <td class="nself13"> </td>
                            </tr>
                            <tr>
                                <td>၁၅</td>
                                <td class="text-left">ယခင်စာရင်းစစ်အဖြစ်ဆောင်ရွက်ခဲ့သူနှင့် ဆက်သွယ်ဆောင်ရွက်ခြင်းမပြုဘဲ ထိုစာရင်းစစ်ရာထူးကို လက်ခံခြင်း သို့မဟုတ် အခြားသူတစ်ဦးဆောင်ရွက်နေသည့် စာရင်းလုပ်ငန်းကို မိမိအတွက် တောင်းယူခြင်း၊</td>
                                <td class="self14">  </td>
                                <td class="nself14"> </td>
                            </tr>
                            <tr>
                                <td>၁၆</td>
                                <td class="text-left">စာရင်းစစ်များခန့်ထားခြင်းကိစ္စနှင့်စပ်လျဥ်း၍ မြန်မာနိုင်ငံကုမ္ပဏီများအက်ဥပဒေ သို့မဟုတ် သက်ဆိုင်ရာအခြားဥပ‌ဒေပါပြဌာန်းချက်များနှင့် ကိုက်ညီခြင်းမရှိသည့်ခန့်ထားမှုများကို လက်ခံဆောင်ရွက်ခြင်း၊</td>
                                <td class="self15">  </td>
                                <td class="nself15"> </td>
                            </tr>
                            <tr>
                                <td>၁၇</td>
                                <td class="text-left">ကုမ္ပဏီညွှန်းတမ်းတွင်သော်လည်းကောင်း၊ အခြားတစ်နည်းနည်းဖြင့်သော်လည်းကောင်း ပုံနှိပ်ထုတ်ဝေရန် အနာဂတ်အမြတ်ငွေကို ခန့်မှန်းတွက်ချက်အတည်ပြုပေးခြင်း သို့မဟုတ် တစ်နှစ်စီအတွက် အရှုံးအမြတ်များကို သီးခြားဖော်ပြခြင်းမပြုဘဲ တစ်နှစ်ထက်ပိုသောနှစ်များအတွက် ပျမ်းမျှ အမြတ်ငွေရှင်းတမ်းများကို ပုံနှိပ်ထုတ်ဝေရန်အတည်ပြုပေးခြင်း၊ သို့ရာတွင် လုပ်ငန်းလိုအပ်ချက်အရ ရေးဆွဲတင်ပြမည့် ကိစ္စရပ်များနှင့်သက်ဆိုင်ခြင်း မရှိစေရ၊</td>
                                <td class="self16">  </td>
                                <td class="nself16"> </td>
                            </tr>
                            <tr>
                                <td>၁၈</td>
                                <td class="text-left">လုပ်ငန်းရှင်ကယုံမှတ်အပ်နှံထားသည့် ငွေကြေးများကို ကိုင်တွယ်ခန့်ခွဲရပါက ယင်းငွေကြေးများကို စနစ်တကျ သုံးစွဲခန့်ခွဲကြောင်း သိသာပေါ်လွင်စေ‌‌ရေးအတွက် လိုအပ်သော စာရင်းမှတ်တမ်းများ သီးခြားဘဏ်စာရင်းများ ဖွင့်လှစ်ထိန်းသိမ်းရန်ပျက်ကွက်ခြင်း၊</td>
                                <td class="self17">  </td>
                                <td class="nself17"> </td>
                            </tr>
                            <tr>
                                <td>၁၉</td>
                                <td class="text-left">လုပ်ငန်း၏ အမြတ် သို့မဟုတ် အရှုံးကို မမှန်မကန်ဖော်ပြထားခြင်းကိုသိလျှက်နှင့် ထုတ်ဖော်တင်ပြရန် ပျက်ကွက်ခြင်း၊</td>
                                <td class="self18">  </td>
                                <td class="nself18"> </td>
                            </tr>
                            <tr>
                                <td>၂၀</td>
                                <td class="text-left">စာရင်းပညာရှင်ဆိုင်ရာ ကျင့်ဝတ်သိက္ခာနှင့် စာရင်းလုပ်ငန်းဆိုင်ရာကျင့်ဝတ်စည်းကမ်းများ၊ စံများကို လိုက်နာကျင့်သုံးမှုမရှိခြင်း၊</td>
                                <td class="self19">  </td>
                                <td class="nself19"> </td>
                            </tr>
                            <tr>
                                <td>၂၁</td>
                                <td class="text-left">စာရင်းလုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်ကို ကာလသတ်မှတ်၍ ရုပ်သိမ်းခြင်းခံရသူ သို့မဟုတ် ပယ်ဖျက်ခြင်းခံရသူသည် စည်းကမ်းထိန်းသိမ်းရေးကော်မတီက ဆုံးဖြတ်ချက်ချသည့်နေ့မှ ရက်ပေါင်း ၃၀ အတွင်းစာရင်းလုပ်ငန်းလုပ်ကိုင်ခွင့်လက်မှတ်ကိုကောင်စီထံပြန်လည်အပ်နှံရန်ပျက်ကွက်ခြင်း၊ (ရှိလျှင်)</td>
                                <td class="self20">  </td>
                                <td class="nself20"> </td>
                            </tr>
                            <tr>
                                <td>၂၂</td>
                                <td class="text-left">မည်သည့်စာရင်းဖော်ပြချက်၊ ကြေညာချက်၊ ရှင်းတမ်း၊ အစီရင်ခံစာ၊ ငွေစာရင်းစာအုပ်၊ လက်မှတ် သို့မဟုတ် ပုံစံတွင်မဆို မဟုတ်မမှန်သည့်အချက်ကို သိလျှက်နှင့်ထည့်သွင်းဖော်ပြခြင်း သို့မဟုတ် ထောက်ခံလက်မှတ်ရေးထိုးခြင်း၊</td>
                                <td class="self21">  </td>
                                <td class="nself21"> </td>
                            </tr>
                            <tr>
                                <td>၂၃</td>
                                <td class="text-left">မိမိကိုယ်တိုင်သော်လည်းကောင်း၊ မိမိလုပ်ငန်း၏ အစုဝင်ကသော်လည်းကောင်း၊ မိမိ၏ ဝန်ထမ်းကသော်လည်းကောင်း၊ ကြီးကြပ်ကွပ်ကဲ၍ ပြည့်စုံစွာ စစ်ဆေးထားခြင်းမရှိသော လက်ကျန် ရှင်းတမ်း၊ အရှုံး/အမြတ်စာရင်း သို့မဟုတ် မည်သည့်စာရင်းဇယားကိုမဆို အတည်ပြုပေးခြင်း သို့မဟုတ် မိမိကိုယ်စား လက်မှတ်ရေးထိုးစေခြင်း၊</td>
                                <td class="self22">  </td>
                                <td class="nself22"> </td>
                            </tr>
                            <tr>
                                <td>၂၄</td>
                                <td class="text-left">စာရင်းစစ်လုပ်ငန်းအမည်တွင် နိုင်ငံခြားအဖွဲ့အစည်း၏အမည်ကို တိုက်ရိုက်သော်လည်းကောင်း၊ ဆင်တူရိုးမှားသော်လည်းကောင်း၊  တစ်စိတ်တစ်ဒေသသော်လည်းကောင်းသုံးစွဲခြင်း၊</td>
                                <td class="self23">  </td>
                                <td class="nself23"> </td>
                            </tr>
                            <tr>
                                <td>၂၅</td>
                                <td class="text-left">မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့်အညီ မြန်မာနိုင်ငံစာရင်းကောင်စီက ထုတ်ပြန်ထားသော အမိန့်ကြော်ငြာစာများအရ နိုင်ငံခြားသားများလုပ်ကိုင်ခွင့်မရှိသော စာရင်းလုပ်ငန်းများကို မိမိအမည်ခံ၍ နိုင်ငံခြားသားများအတွက် ဆောင်ရွက်ပေးခြင်း၊</td>
                                <td class="self24">  </td>
                                <td class="nself24"> </td>
                            </tr>
                            <tr>
                                <td>၂၆</td>
                                <td class="text-left">လက်မှတ်ရပြည်သူ့စာရင်းကိုင် မဟုတ်သူအတွက် သို့မဟုတ် လက်မှတ်ရပြည်သူ့စာရင်းကိုင် မဟုတ်သူနှင့် ပူးပေါင်းလုပ်ကိုင်၍ စာရင်းစစ်အနေဖြင့် ဘဏ္ဍာရေးရှင်းတမ်းများအား လက်မှတ်ရေး ထိုးပေးခြင်း၊</td>
                                <td class="self25">  </td>
                                <td class="nself25"> </td>
                            </tr>
                            <tr>
                                <td>၂၇</td>
                                <td class="text-left">ငွေကြေးခဝါချမှု၊ အကြမ်းဖက်မှုအား ငွေကြေးထောက်ပံ့မှု၊ ပြစ်မှုတစ်ရပ်ရပ်နှင့်စပ်ဆိုင်နိုင်သည်ဟု သံသယဖြစ်ရမှု ဥပဒေတစ်ရပ်ရပ်ကို ချိုးဖောက်ရာရောက်သည်ဟု မှတ်ယူရမှု (Suspicious and unusual transaction/ events) စသည်တို့ကို တွေ့ရှိရပါက တရားမဝင်နည်းလမ်းဖြင့် ရရှိသည့် ငွေကြေးနှင့်ပစ္စည်းများ ဗဟိုထိန်းချုပ်ရေးအဖွဲ့ထံသို့ချက်ချင်း လျှို့ဝှက်သတင်းပေးပို့ရန် ပျက်ကွက်ခြင်း၊</td>
                                <td class="self26">  </td>
                                <td class="nself26">  </td>
                            </tr>
                            <tr>
                                <td>၂၈</td>
                                <td class="text-left">Public Listed Companies နှင့် Public Interest ပါဝင်သော Companies ( ဥပမာ - Banking, Insurance Company, Real Estate Developer) များတွင် စာရင်းစစ်အဖြစ် ဆောင်ရွက်ပေးသူများသည် ယင်းလုပ်ငန်းများနှင့်သက်ဆိုင်သော အခြားဝန်ဆောင်မှုများကို ဆောင်ရွက်ခြင်း၊</td>
                                <td class="self27">  </td>
                                <td class="nself27"> </td>
                            </tr>
                            <tr>
                                <td>၂၉</td>
                                <td class="text-left">မြန်မာနိုင်ငံစာရင်းစစ်စံ/ နိုင်ငံတကာစာရင်းစစ်စံပြဌာန်းချက်များနှင့် မညီညွတ်သောကိစ္စရပ်များ ဆောင်ရွက်ခြင်း၊</td>
                                <td class="self28">  </td>
                                <td class="nself28"> </td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table mt-5 table-bordered">
                            <tr>
                                <td colspan="4">
                                    <div class="text-center">
                                        <h6 class="fw-bold" style="font-size: 18px">ကိုယ်တိုင်ဝန်ခံချက်</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>စဥ်</td>
                                <td style="width: 1300px!important">အကြောင်းအရာ</td>
                                <td style="width: 100px!important"> လက်ခံသည် </td>
                                <td style="width: 100px!important"> လက်မခံပါ </td>
                            </tr>
                            <tr>
                                <td>၁</td>
                                <td class="text-left">အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်း လုပ်ကိုင်ခွင့်မှတ်ပုံတင်ခြင်းကို စတင်လျှောက်ထားမည့် ပြက္ခဒိန်နှစ်မတိုင်မီနှစ်တွင် မြန်မာနိုင်ငံ၌ ၁၈၃ ရက်ထက်မနည်းနေထိုင်သူဖြစ်ကြောင်း ဝန်ခံကတိပြုပါသည်။</td>
                                <td class="self29">  </td>
                                <td class="nself29"> </td>
                            </tr>
                            <tr>
                                <td>၂</td>
                                <td class="text-left">မှတ်ပုံတင်လျှောက်ထားသည့်ပြက္ခဒိန်နှစ်အတွက် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းလုပ် ကိုင်ခွင့်မှတ်ပုံတင် စတင်လျှောက်ထားချိန်/သက်တမ်းတိုးချိန်တွင် အခြားလုပ်ငန်းအဖွဲ့အစည်းတစ်ရပ်ရပ်တွင် အချိန်ပြည့်တာဝန် ထမ်းဆောင်နေသူမဟုတ်ကြောင်း ဝန်ခံကတိပြုပါသည်။</td>
                                <td class="self30">  </td>
                                <td class="nself30"> </td>
                            </tr>
                            <tr>
                                <td>၃</td>
                                <td class="text-left">မှတ်ပုံတင်လျှောက်ထားသည့်ပြက္ခဒိန်နှစ်အတွက် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်းကို မိမိ၏အဓိကအသက်မွေးဝမ်းကြောင်းလုပ်ငန်းအဖြစ် မြန်မာနိုင်ငံအတွင်းတွင်လုပ်ကိုင်မည်ဖြစ်ကြောင်း ဝန်ခံ ကတိပြုပါသည်။</td>
                                <td class="self31">  </td>
                                <td class="nself31"> </td>
                            </tr>
                            <tr>
                                <td>၄</td>
                                <td class="text-left">မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၆၆ နှင့် ၆၈ ပါ ပြဌာန်းချက်များနှင့် ငွေကြေးခဝါချမှု တိုက်ဖျက်ရေးဥပဒေနှင့် အကြမ်းဖက်မှုတိုက်ဖျက်ရေး ဥပဒေပါပြဌာန်းချက်များကို လေးစားလိုက်နာမည်ဖြစ်ပါကြောင်း၊ မြန်မာနိုင်ငံစာရင်းကောင်စီအမိန့်ကြော်ငြာစာ အမှတ် ၂၇/၂၀၁၈ နောက်ဆက်တွဲပါ တားမြစ်ချက်များကို ပြုမှုဆောင်ရွက်ခြင်းမပြုပါကြောင်း၊ မြန်မာနိုင်ငံစာရင်းကောင်စီ အမိန့်ကြော်ငြာစာအမှတ် ၁၀/၂၀၁၉ ဖြင့်ပြဌာန်းခဲ့သည့် စာရင်းပညာရှင်များ လိုက်နာကျင့်သုံးရမည့် နိုင်ငံတကာကျင့်ဝတ်များနှင့်အညီ လိုက်နာဆောင်ရွက်မည်ဖြစ်ပါကြောင်းနှင့် မတရားအသင်း/ အကြမ်းဖက်အဖွဲ့အစည်းအဖြစ် ကြေညာခံထားရတဲ့အဖွဲ့အစည်းများနှင့် နည်းလမ်းတစ်မျိုးမျိုးဖြင့် ပါဝင်ပတ်သက်နေသူ မဟုတ်ကြောင်း (သို့မဟုတ်) ထောက်ခံအားပေးသူမဟုတ်ကြောင်း ဝန်ခံကတိပြုပါသည်။</td>
                                <td class="self_confession">  </td>
                                <td class="nself_confession"> </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="papp_id" >
                        <div class="row justify-content-center">
                            <button type="submit" name="save" id='reject' class="btn btn-danger"  data-toggle="modal" data-target="#reject_modal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                            <button type="submit" name="save" id='approve' class="btn btn-primary" onclick="approvePAPPUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
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
            <textarea name="reject" id="reject_papp" cols="60" rows="5"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="rejectPAPPUser()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Reject Modal End --}}
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
@endsection
@push('scripts')
<script>
    loadPAPPData();
    let papp_id=localStorage.getItem("papp_id");
        $.ajax({
            url: BACKEND_URL + "/get_payment_info/" + 'papp_initial'+papp_id,
            type: 'get',
            success: function (result) {
                console.log("papp invoice",result);
                if(result.status==0){
                    $('#payment_status').append("Unpaid");
                }
                else if(result.status=='AP'){
                    $('#payment_status').append("Paid");
                }
                else{
                    $('#payment_status').append("-");
                }
                var productDesc = result.productDesc.split(",");
                var amount = result.amount.split(",");
                var total=0;
                for(var i in amount) { 
                    total += parseInt(amount[i]);
                }
                console.log(total);
                for(let i=0 ; i<amount.length ; i++){
                    $('.fee_list').append(`
                        <li
                            class="list-group-item d-flex justify-content-between lh-condensed">
                            <h6 class="my-0">${productDesc[i]}</h6>
                            <span class="text-muted">- ${amount[i]} MMK</span>
                        </li>
                    `);
                }
                $('.fee_list').append(`
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (MMK)</span>
                        <span id="total">
                            - <strong>${total}</strong> MMK
                        </span>
                    </li>
                `);
            }
        });
</script>
@endpush
