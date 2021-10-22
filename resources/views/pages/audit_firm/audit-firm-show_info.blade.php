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
    'elementActive' => 'audit_firm_registration'
])

@section('content')
    <div class="content">
        {{--<div class="row mb-3">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-initial-accountancy') }}
            </div>
        </div>--}}
        <form id="audit_firm_form" method="post" action="javascript:updateAuditFirm();" enctype="multipart/form-data">


        	<div class="row">
            <div class="col-md-12">
                <div class="card custom-border-top card-stats">
                        <div class="card-header ">

                        </div>
                        <div class="card-body">
                            <h5 class="border-bottom pb-2 mt-3 text-center" style="font-weight:bold">Audit Firm Information</h5>
                              <div class="row">
																<div class="col-md-4 text-center">
																	<img id="profile_photo" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
																	<br/><span class='text-info'>Profile Picture</span>
																</div>
																<div class="col-md-8">
																	<div class="row border-bottom pl-4">
                                      <label class="col-md-7 form-label" style="font-weight:bold">{{ __('Accountancy Firm Registration No') }}</label>
                                      <label class="col-md-1 form-label">{{ __(':') }}</label>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <input type="hidden" name="audit_firm_type_id">
                                              <input type="hidden" name="local_foreign_id">
                                              <input type="hidden" name="accountancy_firm_id">
                                              <span id="accountancy_firm_reg_no"></span>
                                              <!-- <input type="text" name="accountancy_firm_reg_no" class="form-control" autocomplete="off"> -->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row border-bottom pl-4">

                                      <label class="col-md-7 col-form-label" style="font-weight:bold">{{ __('Accountancy Firm Name') }}</label>
                                      <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <span id="accountancy_firm_name"></span>
                                              <!-- <input type="text" name="accountancy_firm_name"  class="form-control " autocomplete="off"> -->
                                          </div>
                                      </div>
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
																	<div class="row border-bottom pl-4">

																			<label class="col-md-7 col-form-label" style="font-weight:bold">{{ __('Submit Date') }}</label>
																			<label class="col-md-1 col-form-label">{{ __(':') }}</label>
																			<div class="col-md-3">
																					<div class="form-group">
																							<span id="register_date">

																							</span>
																							<!-- <input type="text" name="accountancy_firm_name"  class="form-control " autocomplete="off"> -->
																					</div>
																			</div>
																	</div>
																</div>
															</div>

                              <div class="row  pl-4 mt-2">
                                  <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Address Of Practice(Head Office)') }}</h5>
                              </div>
															<div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Address(English)') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="head_office_address"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>
															<div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Address(Myanmar)') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="head_office_address_mm"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>
                              {{--<div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Township') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="township"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>--}}
                              <div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Post Code') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="post_code"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>
                              {{--<div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('City') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="city"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>--}}
                              {{--<div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('State') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="state"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>--}}
                              <div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Phone Number') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="phone_no"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>
                              <div class="row  pl-4">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Email') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="email"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>
                              <div class="row  pl-4 border-bottom">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Website') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="website"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>

                              <div class="row  pl-4 mt-2 border-bottom">
                                  <!-- <div class="col-md-2"></div> -->
                                  <label class="col-md-5 col-form-label" style="font-weight:bold">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="name_sole_proprietor"></span>
                                          <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                      </div>
                                  </div>
                              </div>

                              <div class="row pl-4 mt-2 border-bottom">
                                  <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
                                  <label class="col-md-5 col-form-label font-weight-bold">{{ __('Declaration(Sole Proprietor/Mangaging Partner)') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <span id="declaration"></span>
                                          <!-- I <input type="text" name="declaration" class="" autocomplete="off" >
                                          (sole proprietor/ managing partner) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct. -->
                                      </div>
                                  </div>


                              </div>
                              {{--<div class="row pl-4 mt-2 border-bottom">
                                  <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
                                  <label class="col-md-4 col-form-label font-weight-bold">{{ __('Local OR Foregin) }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                          <span id="local_foreign_id"></span>
                                      </div>
                                  </div>
                              </div>--}}
                              <div class="row pl-4 mt-2 border-bottom">
                                  <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
                                  <label class="col-md-4 col-form-label font-weight-bold">{{ __('Approve / Reject Status') }}</label>
                                  <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                          <span id="status" style="font-size:20px;">
																					</span>
                                      </div>
                                  </div>
                              </div>

															<div id="reject_remark_box" style="display:none">
																<div class="row pl-4 mt-2 border-bottom">
																		<!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
																		<label class="col-md-4 col-form-label font-weight-bold">Reject Remark</label>
																		<label class="col-md-1 col-form-label">{{ __(':') }}</label>
																		<div class="col-md-7">
																				<div class="form-group">
																					<span class="text-danger fw-bolder reject-remark" style="font-size:15px;"></span>
																				</div>
																		</div>
																</div>
															</div>


                                <!-- <div class="row  pl-4">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="post_code" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="state" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="phone_no" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="website" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                </div> -->
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('4') }}</label> -->
                                    <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Branch Office') }}</label>

                                </div>
                                <div class="row  border-bottom">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="tbl_branch" class="table-responsive table table-bordered branch text-nowrap" >
                                                    <thead>
                                                        <tr>
                                                            <th class="font-weight-bold">Name</th>
																														<th class="font-weight-bold">Address</th>
                                                            <th class="font-weight-bold">Township</th>
                                                            <th class="font-weight-bold">Post Code</th>
                                                            <th class="font-weight-bold">City</th>
                                                            <th class="font-weight-bold">State</th>
                                                            <th class="font-weight-bold" colspan="2">Telephone<br> Number</th>
                                                            <th class="font-weight-bold">Email</th>
                                                            <th class="font-weight-bold">Website</th>
                                                            {{--<th >
                                                                <button class="btn btn-primary btn-sm" type="button" onclick='addRowBranch("branch")' disabled>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </th>--}}
                                                        </tr>
                                                    <thead>
                                                    <tbody id="tbl_branch_body" ></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('5') }}</label>
                                    <label class="col-md-4 col-form-label">{{ __('Organization Structure') }}</label> -->
                                    <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Organization Structure') }}</label>

                                </div>
                                <div class='row organization_data'>

                                </div><br/>

                                <div id="sole-proprietorship">
                                        <div class="row border-bottom">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-11">
                                                <div class="card" style="padding:30px;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <label class="col-md-12 col-form-label"><b>For Sole Proprietorship</b></label>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="form-group">
                                                                <label class="form-label">(a)Copy of Public Practice Accountant Certificate</label>

                                                            </div>
                                                        </div>

                                                        <div class="controls1">
                                                            <div class="entry1">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2 public_practice_acc_certi">

                                                                    </div>
                                                                    {{--<div class="col-md-1 col-auto">
                                                                        <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls1","entry1")'>
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="form-group">
                                                                <label class="form-label">(b)Copy of stationery/letterhead to be used in signing of auditor's report</label>
                                                            </div>
                                                        </div>

                                                        <div class="controls2">
                                                            <div class="entry2">
                                                                <div class="row mb-3">
																																	<div class="col-md-2 stationery_letterhead">

																																	</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="form-group">
                                                                <label class="form-label">(c)Copy of Tax clearance from Internal Revenue Department</label>
                                                            </div>
                                                        </div>

                                                        <div class="controls3">
                                                            <div class="entry3">
                                                                <div class="row mb-3">
																																	<div class="col-md-2 tax_clearances">

																																	</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{--<div class="row mb-3">
                                                            <div class="form-group">
                                                                <label class="form-label">(d)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                            </div>
                                                        </div>

                                                        <div class="controls4">
                                                            <div class="entry4">
																															<div class="row mb-3">
																																<div class="col-md-2 representatives">

																																</div>
																															</div>
                                                            </div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div id="partnership">
                                    <div class="row border-bottom">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-11">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-md-12 col-form-label"><b>For Partnership</b></label>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate all partners</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls9">
                                                        <div class="entry9">
                                                            <div class="row mb-3">
																															<div class="col-md-2 ppa_certis_partnership">

																															</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(b)Copy of Certificate or Registration, if any</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls10">
                                                        <div class="entry10">
                                                            <div class="row mb-3">
																															<div class="col-md-2 certi_or_regs_partnership">

																															</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(c)Copy of signed Partnership Deeds/ Memorandum of Agreement</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls11">
                                                        <div class="entry11">
                                                            <div class="row mb-3">
																															<div class="col-md-2 deeds_memos_partnership">

																															</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(d)Copy of stationery/letterhead to be used in signing of auditor's report</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls12">
                                                        <div class="entry12">
                                                            <div class="row mb-3">
																															<div class="col-md-2 letterheads_partnership">

																															</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(e)Copy of Tax clearance from Internal Revenue Department</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls13">
                                                        <div class="entry13">
                                                            <div class="row mb-3">
																															<div class="col-md-2 tax_clearances_partnership">

																															</div>
                                                            </div>
                                                        </div>
                                                    </div>


																									{{--<div class="row mb-3">
                                                      <div class="form-group">
                                                          <label class="form-label">(f)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>

                                                      </div>
                                                  </div>--}}

                                                  {{--<div class="controls14">
                                                      <div class="entry14">
                                                          <div class="row mb-3">
																														<div class="col-md-2 representatives_partnership">

																														</div>
                                                          </div>
                                                      </div>
                                                  </div>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="company">
                                    <div class="row border-bottom">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-11">
                                            <div class="card" style="padding:30px;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-md-12 col-form-label"><b>For Company Incorporated</b></label>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate all shareholders</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls19">
                                                        <div class="entry19">
                                                            <div class="row mb-3">
                                                                <div class="col-md-2 ppa_certis_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(b)Copy of Certificate of Incorporation</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls20">
                                                        <div class="entry20">
                                                            <div class="row mb-3">
                                                                <div class="col-md-2 certificate_incors_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(c)Copy of signed Memorandum of Associations and Articles of Associations or constitution</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls21">
                                                        <div class="entry21">
                                                            <div class="row mb-3">
                                                                <div class="col-md-2 memorandums_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(d)Copy of commercial tax registration certificate</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls22">
                                                        <div class="entry22">
                                                            <div class="row mb-3">
																															<div class="col-md-2 comercial_tax_reg">
																															</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(e)Copy of stationery/letterhead to be used in signing of auditor's report</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls23">
                                                        <div class="entry23">
                                                            <div class="row mb-3">
																																<div class="col-md-2 stationery_letterhead_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(f)Copy of Tax clearance from Internal Revenue Department</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls24">
                                                        <div class="entry24">
                                                            <div class="row mb-3">
																																<div class="col-md-2 tax_clearance_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--<div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(g)Copy of stationery/letterhead to be used in signing of auditor's report</label>

                                                        </div>
                                                    </div>

                                                    <div class="controls25">
                                                        <div class="entry25">
                                                            <div class="row mb-3">
																																<div class="col-md-2 letterheads_company">
																																</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(h)Copy of Tax clearance from Internal Revenue Department</label>

                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                      <div class="col-md-11 col-auto">

                                                          <span class="tax_clearances"></span>
                                                      </div>

                                                    </div>
                                                    <div class="controls26">
                                                        <div class="entry26">
                                                            <div class="row mb-3">
                                                                <div class="col-md-11 col-auto">
                                                                    <input disabled type="file" class="form-control" name="tax_clearances[]">

                                                                </div>
                                                                <div class="col-md-1 col-auto">
                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls26","entry26")'>
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">(i)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>

                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                    <div class="col-md-11 col-auto">

                                                    <span class="representatives"></span>
                                                    </div>

                                                    </div>
                                                    <div class="controls27">
                                                        <div class="entry27">
                                                            <div class="row mb-3">
                                                                <div class="col-md-11 col-auto">
                                                                    <input disabled type="file" class="form-control" name="representatives[]">

                                                                </div>
                                                                <div class="col-md-1 col-auto">
                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls27","entry27")'>
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>--}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('6') }}</label> -->
                                    <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>

                                </div>
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="tbl_partner" class="table table-bordered partner_list text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="font-weight-bold">Sr</th>
                                                            <th class="font-weight-bold" >Name</th>
                                                            <th class="font-weight-bold" >Public Practice Reg.No</th>
                                                            <th class="font-weight-bold" colspan="2">Have authority to sign Auditors' report?</th>
                                                            <th class="font-weight-bold" >
                                                                <button disabled class="btn btn-primary btn-sm" type="button" onclick='addRowPartner("partner_list")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>

                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="tbl_partner_body">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('7') }}</label> -->
                                    <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Director(s)/Officer(s)/Sole Proprietor') }}</label>

                                </div>
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="tbl_director" class="table table-bordered director text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="font-weight-bold">Sr</th>
                                                            <th class="font-weight-bold">Name</th>
                                                            <th class="font-weight-bold">Position</th>
                                                            <th class="font-weight-bold" >CPA Reg.No/Qualification</th>
                                                            <th class="font-weight-bold" >Public Practice Reg.No</th>
                                                            <th class="font-weight-bold">
                                                                <button disabled class="btn btn-primary btn-sm" type="button" onclick='addRowDirector("director")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>

                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="tbl_director_body">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row pl-4 mt-2">
                                    <label class="col-md-1 col-form-label">{{ __('8') }}</label>
                                    <label class="col-md-112 col-form-label" style="font-weight:bold">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>

                                </div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label"></label>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="name_sole_proprietor" class="form-control" autocomplete="off" >
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('9') }}</label> -->
                                    <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Total Staff') }}</label>

                                </div>
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="tbl_audit_total_staff" class="table table-bordered text-nowrap">
                                                    <thead>
                                                        <tr disabled>
                                                            <th class="font-weight-bold" ></th>
                                                            <th class="font-weight-bold">Audit Staff</th>
                                                            <th class="font-weight-bold">Non-Audit Staff</th>
																														<th class="font-weight-bold">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_audit_total_staff_body">

                                                    </tbody>
																										<tfoot id="tbl_audit_total_staff_footer">
																											<tr>
																													<td class="font-weight-bold" >Total Staff</td>
																													<td class="font-weight-bold" id="audit_total"></td>
																													<td class="font-weight-bold" id="non_audit_total"></td>
																													<td class="font-weight-bold" id="audit_nonaudit_total"></td>
																											</tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('10') }}</label> -->
                                    <label class="col-md-12 col-form-label font-weight-bold">{{ __('Audit Staff') }}</label>

                                </div>
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="tbl_audit_staff" class="table table-bordered text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="font-weight-bold" ></th>
                                                            <th class="font-weight-bold" >Full Time</th>
                                                            <th class="font-weight-bold" >Part Time</th>
																														<th class="font-weight-bold">Total</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="tbl_audit_staff_body">

                                                    </tbody>
																										<tfoot id="tbl_audit_staff_footer">
																											<tr>
																													<td class="font-weight-bold" >Total</td>
																													<td class="font-weight-bold" id="full_time_total"></td>
																													<td class="font-weight-bold" id="part_time_total"></td>
																													<td class="font-weight-bold" id="full_part_total"></td>
																											</tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-4 mt-2">
                                    <!-- <label class="col-md-1 col-form-label">{{ __('11') }}</label> -->
                                    <label class="col-md-12 col-form-label font-weight-bold">{{ __('Types Of Service Provided') }}</label>

                                </div>
                                <div class="row type_service_provided"></div><br/>

																<div id="last_registered_year_box" style="display:none;">
																	<div class="row mb-5">
	                                    <label for="" class="col-md-1 col-form-label"></label>
	                                    <label for="" class="col-md-3 col-form-label font-weight-bold">Last Registered Year</label>
																			<label for="" class="col-md-5 col-form-label"><span id="last_registered_year" class=""></span></label>
	                                </div>
																</div>

																<div id="has_suspend_year" style="display:none;">
																	<div class="row mb-5">
	                                    <label for="" class="col-md-1 col-form-label"></label>
	                                    <label for="" class="col-md-4 col-form-label font-weight-bold">Suspended Year</label>
	                                    <div class="row col-md-7 py-2">
	                                        <div class="col-md-3 form-check-radio mx-2">
	                                            <label class="form-check-label">
	                                                <input class="form-check-input" type="radio" id="yes"
	                                                        name="req_for_stop" value="1" disabled>
	                                                <span class="form-check-sign"></span>
	                                                Yes
	                                            </label>
	                                        </div>
	                                        <div class="col-md-3 form-check-radio mx-2">
	                                            <label class="form-check-label">
	                                                <input class="form-check-input" type="radio" id="no"
	                                                        name="req_for_stop" value="2" disabled>
	                                                <span class="form-check-sign"></span>
	                                                No
	                                            </label>
	                                        </div>

	                                        <label  class="error attend_place_error" style="display:none;" for="req_for_stop">Please select one</label>
	                                    </div>
	                                </div>
																</div>

																<div style="display:none;" id="suspended_year_box">
																	<div class="row mb-5">
	                                    <label for="" class="col-md-1 col-form-label"></label>
	                                    <label for="" class="col-md-4 col-form-label"></label>
	                                    <div class="col-md-2">
	                                        <label for="" class="col-form-label font-weight-bold">Year</label>
	                                    </div>
	                                    <div class="col-md-3">
																					<label for="" class="col-md-4 col-form-label">
																						<span id="suspended_year" class=""></span>
																					</label>
	                                    </div>
	                                </div>
																</div>

                                <!-- <div class="row">
                                    <div class="col-md-11 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary btn-round" form="audit_firm_form">{{ __('Save') }}</button>
                                    </div>
                                </div> -->
                                <input type="hidden" name="audit_firm_id" >
																<input type="hidden" name="student_info_id" >

                                <div id="initial_btns">
																	<div class="row mt-5 justify-content-center">
	                                    {{--<button type="submit" name="save" id="reject_audit_btn" class="btn btn-danger"  onclick="rejectAuditFirm()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>--}}

																			<button type="submit" name="save" id="reject_audit_btn" data-toggle="modal" data-target="#remarkModal" class="btn btn-danger" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
	                                    <button type="submit" name="save" id="approve_audit_btn" class="btn btn-primary" onclick="approveAuditFirm()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>

	                                </div>
																</div>

																<div id="renew_btns" style="display:none;">
																	<div class="row mt-5 justify-content-center">
	                                    {{--<button type="submit" name="save" id="reject_audit_btn_renew" class="btn btn-danger"  onclick="rejectAuditFirmRenew()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>--}}

																			<button type="submit" name="save" id="reject_audit_btn_renew" data-toggle="modal" data-target="#remarkModalRenew" class="btn btn-danger" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
	                                    <button type="submit" name="save" id="approve_audit_btn_renew" class="btn btn-primary" onclick="approveAuditFirmRenew()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>

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
    <div class="modal fade" id="fileModal">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">View File</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>

                  </div>
                  <div class="modal-body image-body">
                      <div class="image-div">
                        <img src="" id="file" class="image-logo" />
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                  </div>
              </div>
            </div>
        </div>

		<div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form id="remark-form"  method="post" action="javascript:rejectAuditFirm()" enctype="multipart/form-data">
				      @csrf
				        <div class="modal-body">
				            <div class="row">
				                <div class="col-md-12">

				                    <div class="form-group">
				                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
				                        <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
				                    </div>
				                </div>
				            </div>
				        </div>
				        <div class="modal-footer">
				            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				            <button type="submit" class="btn btn-primary" form="remark-form">Reject</button>
				        </div>
				    </form>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="remarkModalRenew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <form id="remark-form-renew"  method="post" action="javascript:rejectAuditFirmRenew()" enctype="multipart/form-data">
						      @csrf
						        <div class="modal-body">
						            <div class="row">
						                <div class="col-md-12">

						                    <div class="form-group">
						                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
						                        <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
						                    </div>
						                </div>
						            </div>
						        </div>
						        <div class="modal-footer">
						            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						            <button type="submit" class="btn btn-primary" form="remark-form-renew">Reject</button>
						        </div>
						    </form>
						    </div>
						  </div>
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
    loadOrganization();
    loadAuditTypeOfService();
    loadAuditTotalStaff();
    loadAuditStaff();
    autoLoadAudit();


</script>
@endpush
