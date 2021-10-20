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

                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Passed Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_pass_date"></span>
                                    </div>
                                </div>--}}

                                <!-- <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Submit Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_date"></span>
                                    </div>
                                </div> -->

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
                                        <p class="ml-2" style="font-weight:bold">PAPP မှတ်ပုံတင်ကတ်ပြား</p>
                                    </div>
                                    <div class="col-md-6 text-left cpaff_registeration_card_file">
                                        <!-- <button type="button" id="mac_mem_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#mpa_mem_card_back_Modal"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div>
                                 
                                <!--MPA Member Card-->
                                {{--<div class="row m-2 mt-3 border-bottom">
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
                                </div>--}}


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

                                {{--<div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Tax Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="tax_year"></span>
                                    </div>
                                </div>--}}

                                

                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Registration No.</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_reg_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Registration Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_reg_year"></span>
                                    </div>
                                </div>
                                <!-- <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">PAPP Last Renew Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="papp_last_renew_year"></span>
                                    </div>
                                </div> -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">နောက်ဆုံးမှတ်ပုံတင်ကြေးပေးသွင်းသည့်ခုနှစ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="latest_reg_year"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ရပ်နား Form တင်ထားခြင်းရှိ/မရှိ</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="submitted_stop_form"></span>
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
                                <!--NRC Card(Front) -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Card(Front)</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_front_file"></div>
                                </div>

                                <!--NRC Card(Back) -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Card(Back)</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_back_file"></div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="father_name_eng"></span> / <span id="father_name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
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
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <!-- <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Current Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="current_address"></span>
                                    </div>
                                </div> -->
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
                                <!-- <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="registration_no"></span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <!-- Start CPA_FF Info -->
                                <h5 class="border-bottom pb-2 mt-3" style="font-weight:bold">CPA(Full-Fledged) Info</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div>
                                        <div class="row m-2 mt-2">
                                            <div class="col-md-10 text-left">
                                                <p class="ml-2" style="font-weight:bold">နောက်ဆုံးထုတ်ပေးခဲ့သည့် ကိုယ်ပိုင်စာရင်းကိုင်လုပ်ငန်းလုပ်ကိုင်ခွင့်/ အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်ခွင့် လုပ်ကိုင်ခွင့်ပြုသည့်</p>
                                            </div>
                                        </div>
                                        <div class="row m-2 mt-2">
                                            <div class="col-md-6 text-left">
                                                <p class="ml-2" style="font-weight:bold">ခုနှစ်</p>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <span id="old_card_year"></span>
                                            </div>
                                        </div>
                                        <div class="row m-2 mt-2">
                                            <div class="col-md-6 text-left">
                                                <p class="ml-2" style="font-weight:bold">မှတ်ပုံတင်အမှတ်</p>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <span id="old_card_no"></span>
                                            </div>
                                        </div>
                                        <div class="row m-2 mt-3">
                                            <div class="col-md-6 text-left">
                                                <p class="ml-2" style="font-weight:bold">မိတ္တူ</p>
                                            </div>
                                            <div class="col-md-6 old_card_file text-left">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registration No.</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_reg_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Registration Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_reg_year"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA(Full-Fledged) Last Renew Year</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="cpaff_last_renew_year"></span>
                                    </div>
                                </div>

                                <!--CPA Certificate -->
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">CPA Certificate</p>
                                    </div>
                                    <div class="col-md-6 text-left cpaff_cpa_certificate_file">
                                        {{--<button type="button" id="cpa_certi_btn"style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#capp_certi_Modal"><i class="fa fa-paperclip"></i></button>--}}
                                    </div>
                                </div>
                                <!--CPA Certificate Modal -->
                                <div id="capp_certi_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">CAPP Certificate</h5>
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
                                    <div class="col-md-6 text-left cpaff_mpa_mem_card_file">
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
                                    <div class="col-md-6 text-left cpaff_mpa_mem_card_back_file">
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
                                <input type="hidden" name="papp_id" >
                                <input type="hidden" name="cpaff_id" >
                                <div class="row mt-5 justify-content-center">
                                    <button type="submit" name="save" id='reject' class="btn btn-danger"  data-toggle="modal" data-target="#reject_modal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                    <button type="submit" name="save" id='approve' class="btn btn-primary" onclick="approvePAPPOfflineUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
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
            <textarea name="reject" id="reject_offline_papp" cols="60" rows="5"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="rejectPAPPOfflineUser()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Reject Modal End --}}
@endsection
@push('scripts')
<script>
    loadappOfflineUser();
</script>
@endpush
