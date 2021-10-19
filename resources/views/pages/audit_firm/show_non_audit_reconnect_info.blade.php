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
    'elementActive' => 'non_audit_firm_registration'
])

@section('content')
    <div class="content">
        <div class="row mb-3">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non-audit-firm-local-initial') }}
            </div>
        </div>
            <form id="non-audit-form" method="post" action="javascript:updateAuditFirm();" enctype="multipart/form-data">


            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">

                            </div>
                            @if($data)
															@foreach($data as $item)
															<input type="hidden" id="firm_id" value="{{$item->id}}" />
															<div class="card-body">
	                            	<h5 class="border-bottom pb-2 mt-3 text-center" style="font-weight:bold">Non_Audit Firm Reconnect Information</h5>
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
			                                                        <span id="accountancy_firm_reg_no">{{$item->accountancy_firm_reg_no}}</span>
			                                                        <!-- <input type="text" name="accountancy_firm_reg_no" class="form-control" autocomplete="off"> -->
			                                                    </div>
			                                                </div>
			                                            </div>
																									<div class="row border-bottom pl-4">

			                                                <label class="col-md-7 col-form-label" style="font-weight:bold">{{ __('Accountancy Firm Name') }}</label>
			                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
			                                                <div class="col-md-3">
			                                                    <div class="form-group">
			                                                        <span id="accountancy_firm_name">
																																{{$item->accountancy_firm_name}}
																															</span>
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

								                                      <label class="col-md-4 col-form-label" style="font-weight:bold">{{ __('Registration Date') }}</label>
								                                      <label class="col-md-1 col-form-label">{{ __(':') }}</label>
								                                      <div class="col-md-7">
								                                          <div class="form-group">
								                                              <span id="registration_date">
																																{{$item->register_date}}
																															</span>
								                                              <!-- <input type="text" name="accountancy_firm_name"  class="form-control " autocomplete="off"> -->
								                                          </div>
								                                      </div>

								                                  </div>
																								</div>
																							</div>

	                                            <div class="row  pl-4 mt-5">
	                                                <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Address Of Practice(Head Office)') }}</h5>
	                                            </div>
																							<div class="row  pl-4">
	                                                <div class="col-md-2"></div>
	                                                <label class="col-md-3 col-form-label" style="font-weight:bold">{{ __('Address(English)') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-6">
	                                                    <div class="form-group">
	                                                        <span id="head_office_address">
																														{{$item->head_office_address}}
																													</span>
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
	                                                        <span id="head_office_address">
																														{{$item->head_office_address_mm}}
																													</span>
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
	                                                        <span id="township">
																														{{$item->township}}
																													</span>
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
	                                                        <span id="post_code">
																														{{$item->postcode}}
																													</span>
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
	                                                        <span id="city">
																														{{$item->city}}
																													</span>
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
	                                                        <span id="state">
																														{{$item->state_region}}
																													</span>
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
	                                                        <span id="phone_no">
																														{{$item->telephones}}
																													</span>
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
	                                                        <span id="email">
																														{{$item->h_email}}
																													</span>
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
	                                                        <span id="website">
																														{{$item->website}}
																													</span>
	                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row pl-4 mt-2 border-bottom">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
	                                                <label class="col-md-4 col-form-label font-weight-bold">{{ __('Declaration(Managing Director)') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
	                                                        <span id="declaration">
																														{{$item->declaration}}
																													</span>
	                                                    </div>
	                                                </div>
	                                            </div>

																							<div class="row pl-4 mt-2 border-bottom">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
	                                                <label class="col-md-4 col-form-label font-weight-bold">{{ __('Declaration(Managing Director)') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
	                                                        <span id="declaration">
																														{{$item->declaration_mm}}
																													</span>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row pl-4 mt-2 border-bottom">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
	                                                <label class="col-md-4 col-form-label font-weight-bold">{{ __('Local OR Foregin') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
	                                                        <span id="local_foreign_id">
																														@if($item->local_foreign_type == 1)
																															Local Firm
																														@else
																														  Foreign Firm
																														@endif
																													</span>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row pl-4 mt-2 border-bottom">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
	                                                <label class="col-md-4 col-form-label font-weight-bold">{{ __('Approve / Reject Status') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
																												@if($item->status == 0)
																													<span class="text-warning fw-bolder" style="font-size:20px;">Pending</span>
																												@elseif($item->status == 1)
																													<span class="text-success fw-bolder" style="font-size:20px;">Approved</span>
																												@else
																													<span class="text-danger fw-bolder" style="font-size:20px;">Rejected</span>
																												@endif
	                                                    </div>
	                                                </div>
	                                            </div>

																							@if($item->status == 2)
																							<div class="row pl-4 mt-2 border-bottom">
																									<!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
																									<label class="col-md-4 col-form-label font-weight-bold">Reject Remark</label>
																									<label class="col-md-1 col-form-label">{{ __(':') }}</label>
																									<div class="col-md-7">
																											<div class="form-group">
																												<span class="text-danger fw-bolder" style="font-size:15px;">{{$item->remark}}</span>
																											</div>
																									</div>
																							</div>
																							@endif

	                                            <div class="row  pl-4 mt-2 border-bottom">
	                                                <!-- <div class="col-md-2"></div> -->
	                                                <label class="col-md-4 col-form-label" style="font-weight:bold">{{ __('Name Of Managing Director') }}</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
	                                                        <span id="name_sole_proprietor">
																														{{$item->name_of_sole_proprietor}}
																													</span>
	                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
	                                                    </div>
	                                                </div>
	                                            </div>

																							<div class="row  pl-4 mt-2 border-bottom">
	                                                <!-- <div class="col-md-2"></div> -->
	                                                <label class="col-md-4 col-form-label" style="font-weight:bold">Passport/CSC No.</label>
	                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
	                                                <div class="col-md-7">
	                                                    <div class="form-group">
	                                                        <span id="name_sole_proprietor">
																														{{$item->dir_passport_csc}}
																													</span>
	                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row pl-4 mt-2">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('4') }}</label> -->
	                                                <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Branch Office') }}</label>

	                                            </div>
	                                            <div class="row border-bottom">
																									<div class="col-md-1"></div>
	                                                <div class="col-md-11">
	                                                <div class="card">
	                                                    <div class="card-body">
	                                                        <table id="tbl_branch" class="table  table-responsive table-bordered branch_non_audit text-nowrap" >
	                                                            <thead>
	                                                                <tr>
																																			<th class="font-weight-bold">Sr</th>
	                                                                    <th class="font-weight-bold">Name</th>
																																			<th class="font-weight-bold">Address</th>
	                                                                    <th class="font-weight-bold">Township</th>
	                                                                    <th class="font-weight-bold">Post Code</th>
	                                                                    <th class="font-weight-bold">City</th>
	                                                                    <th class="font-weight-bold">State</th>
	                                                                    <th class="font-weight-bold">Telephone Number</th>
	                                                                    <th class="font-weight-bold">Email</th>
	                                                                    <th class="font-weight-bold">Website</th>
	                                                                    {{--<th >
	                                                                        <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowBranch("branch_non_audit")'>
	                                                                            <i class="fa fa-plus"></i>
	                                                                        </button>
	                                                                    </th>--}}
	                                                                </tr>
	                                                            <thead>
	                                                            <tbody id="tbl_branch_body">
																																@php $no = 1; @endphp
																																@if($branch_offices)
																																	@foreach($branch_offices as $branch_off)
																																		<tr>
																																			<td>
																																				{{$no++}}
																																			</td>
																																			<td>
																																				{{$branch_off->branch_name}}
																																			</td>
																																			<td>
																																				{{$branch_off->branch_address}}
																																			</td>
																																			<td>
																																				{{$branch_off->township}}
																																			</td>
																																			<td>
																																				{{$branch_off->postcode}}
																																			</td>
																																			<td>
																																				{{$branch_off->city}}
																																			</td>
																																			<td>
																																				{{$branch_off->state_region}}
																																			</td>
																																			<td>
																																				{{$branch_off->phones}}
																																			</td>
																																			<td>
																																				{{$branch_off->email}}
																																			</td>
																																			<td>
																																				{{$branch_off->website}}
																																			</td>
																																		</tr>
																																	@endforeach
																																@endif
																															</tbody>
	                                                        </table>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            </div>
	                                            <div class="row pl-4 mt-2">
	                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>

	                                            </div>
	                                            <div class="row border-bottom">
	                                                <div class="col-md-1"></div>
	                                                <div class="col-md-10">
	                                                    <div class="card">
	                                                        <div class="card-body">
	                                                            <table id="tbl_non_partner" class="table table-bordered non_partner text-nowrap">
	                                                                <thead>
	                                                                    <tr>
	                                                                        <th class="font-weight-bold" >Sr</th>
	                                                                        <th class="font-weight-bold" >Name</th>
	                                                                        <th class="font-weight-bold" >Passport/ CSC No./ Incorporation Certificate</th>
	                                                                        {{--<th >
	                                                                            <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowPartnerByNonAudit("non_partner")'>
	                                                                                <i class="fa fa-plus"></i>
	                                                                            </button>
	                                                                        </th>--}}
	                                                                    </tr>
	                                                                </thead>
	                                                                <tbody id="tbl_non_partner_body">
																																		@php $no = 1; @endphp
																																		@if($firm_ownership)
																																			@foreach($firm_ownership as $ownership)
																																				<tr>
																																					<td>
																																						{{$no++}}
																																					</td>
																																					<td>
																																						{{$ownership->name}}
																																					</td>
																																					<td>
																																						{{$ownership->pass_csc_inco}}
																																					</td>
																																				</tr>
																																			@endforeach
																																		@endif
	                                                                </tbody>
	                                                            </table>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row pl-4 mt-2">
	                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Director(s)/Officer(s)') }}</label>

	                                            </div>
	                                            <div class="row border-bottom">
	                                                <div class="col-md-1"></div>
	                                                <div class="col-md-10">
	                                                    <div class="card">
	                                                        <div class="card-body">
	                                                            <table id="tbl_director" class="table table-bordered non_director text-nowrap">
	                                                                <thead>
	                                                                    <tr>
	                                                                    <th class="font-weight-bold">Sr</th>
	                                                                    <th class="font-weight-bold">Name</th>
	                                                                    <th class="font-weight-bold">Position</th>
	                                                                    <th class="font-weight-bold" >Passport/CSC No.</th>
	                                                                        {{--<th class="font-weight-bold" >
	                                                                            <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowDirectorByNonAudit("non_director")'>
	                                                                                <i class="fa fa-plus"></i>
	                                                                            </button>
	                                                                        </th>--}}
	                                                                    </tr>

	                                                                </thead>
	                                                                <tbody id="tbl_director_body">
																																		@php $no = 1; @endphp
																																		@if($directors_officers)
																																			@foreach($directors_officers as $dir_off)
																																				<tr>
																																					<td>
																																						{{$no++}}
																																					</td>
																																					<td>
																																						{{$dir_off->name}}
																																					</td>
																																					<td>
																																						{{$dir_off->position}}
																																					</td>
																																					<td>
																																						{{$dir_off->passport}}
																																					</td>
																																				</tr>
																																			@endforeach
																																		@endif
	                                                                </tbody>
	                                                            </table>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row pl-4 mt-2">
	                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Organization Structure') }}</label>

	                                            </div>
	                                            <div class='row organization_data'>
																								<div class="col-md-1">
																								</div>

																								@if($organization_structure)
																									@foreach($organization_structure as $org)
																										<div class="{{$org->id == 1 || $org->id == 3 ? "col-md-3" : "col-md-2" }}">
																											@if($org->id == $item->organization_structure_id)
																												<label class='form-check-label' style="font-weight:bold;">{{$org->name}}</labeL>
																											@else
																												<label class='form-check-label'>{{$org->name}}</labeL>
																											@endif
																											<input disabled type='radio' name='org_stru_id' autofocus value="{{$org->id}}" id="{{$org->id}}"
																												<?php
																													if($org->id == $item->organization_structure_id){
																														echo "checked";
																													}
																													else {
																														echo "";
																													}
																												?>
																											>
																										</div>
																									@endforeach
																								@endif
	                                            </div><br/>

	                                            <div id="sole-proprietorship">
	                                                <div class="row border-bottom">
	                                                    <div class="col-md-1"></div>
	                                                    <div class="col-md-10">
	                                                        <div class="card" style="padding:30px;">
	                                                            <div class="card-body">
	                                                                <div class="row">
	                                                                    <label class="col-md-12 col-form-label"><b>For Sole Proprietorship</b></label>
	                                                                </div>
	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(a)Copy of letterhead seal to be used</label>

	                                                                    </div>
	                                                                </div>

	                                                                <div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 lettterhead_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(b)Passport size photo</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 passport_photo_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(c)Profile of the owner</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 profile_owner_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(d)Copy of Education Certificate</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 edu_certi_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(e)Letter outlining past work experience</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 work_exp_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(f)Copy of owner’s NRC Card/ Passport</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2">
																																							<label>NRC Front</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_front_sole">

																																						</div>
																																					</div>
																																					<div class="row mb-3">
																																						<div class="col-md-2">
																																							<label>NRC Back</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_back_sole">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(g)Copy of Tax clearance from Internal Revenue Department</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls1">
	                                                                    <div class="entry1">
	                                                                        <div class="row mb-3 tax_clearance_sole">

	                                                                        </div>
	                                                                    </div>
	                                                                </div>

	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div id="partnership">
	                                                <div class="row border-bottom">
	                                                    <div class="col-md-1"></div>
	                                                    <div class="col-md-10">
	                                                        <div class="card" style="padding:30px;">
	                                                            <div class="card-body">
	                                                                <div class="row">
	                                                                    <label class="col-md-12 col-form-label"><b>For Partnership</b></label>
	                                                                </div>
	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(a)Copy of Certificate or Registration, if any</label>

	                                                                    </div>
	                                                                </div>
																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 cer_reg_copy_partnersip">

																																						</div>
																																					</div>
																																			</div>
																																	</div>


	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(b)Copy of signed Partnership Deeds/ Memorandum of Agreement</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 deeds_memos_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(c)Copy of letterhead to be used</label>
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 letterheads_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(d)Passport size photos of the all partners</label>
	                                                                    </div>
	                                                                </div>
																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 pass_photos_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(e)Profiles of the all partners</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 profiles_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(f)Copy of Education Certificates of the all partners</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 edu_certi_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(g)Letter outlining past work experiences of the all partners</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 letter_exp_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(h)Copy of Partners’ NRC Card/ Passport</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2">
																																							<label>NRC Front</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_front_partnersip">

																																						</div>
																																					</div>
																																					<div class="row mb-3">
																																						<div class="col-md-2">
																																							<label>NRC Back</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_back_partnersip">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(i)Copy of Tax clearance from Internal Revenue Department</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 tax_clearances_partnership">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div id="company" style="padding:30px;">
	                                                <div class="row border-bottom">
	                                                    <div class="col-md-1"></div>
	                                                    <div class="col-md-10">
	                                                        <div class="card" style="padding:30px;">
	                                                            <div class="card-body">
	                                                                <div class="row">
	                                                                    <label class="col-md-12 col-form-label"><b>For Company Incorporated</b></label>
	                                                                </div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(a)Copy of Certificate of Incorporation (company incorporated in Myanmar)/ Certificate of Registration (branch office registered in Myanmar)</label>

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 certificate_incor_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                @if($item->local_foreign_type == 2)
																																	<div id="for_foreign_firm_type">
																																		<div class="row mb-3">
																																				<div class="form-group">
																																						<label class="form-label">(b)Copy of Permit under Section 27A of Myanmar Companies Act (For Only Foreign Company)</label>
																																				</div>
																																		</div>
																																		<div class="controls9">
																																				<div class="entry9">
																																						<div class="row mb-3">
																																							<div class="col-md-2 permit_foreign_company">

																																							</div>
																																						</div>
																																				</div>
																																		</div>
																																	</div>
																																	@endif



	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        @if($item->local_foreign_type == 2)
																																						<label class="form-label">(c)Copy of recent audited financial statements</label>
																																					@else
																																						<label class="form-label">(b)Copy of recent audited financial statements</label>
																																					@endif
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 financial_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																				@if($item->local_foreign_type == 2)
																																					<label class="form-label">(d)Copy of commercial tax registration certificate</label>
																																				@else
																																					<label class="form-label">(c)Copy of commercial tax registration certificate</label>
																																				@endif
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 tax_reg_certi_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																				@if($item->local_foreign_type == 2)
																																					<label class="form-label">(e)Copy of letterhead to be used</label>
																																				@else
																																					<label class="form-label">(d)Copy of letterhead to be used</label>
																																				@endif

	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 letterheads_company">
																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																				@if($item->local_foreign_type == 2)
																																					<label class="form-label">(f)Copy of Education Certificates of the professional staff</label>
																																				@else
																																					<label class="form-label">(e)Copy of Education Certificates of the professional staff</label>
																																				@endif
	                                                                    </div>
	                                                                </div>
																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 edu_certi_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																					@if($item->local_foreign_type == 2)
																																						<label class="form-label">(g)Letter outlining past work experiences of the professional staff</label>
																																					@else
																																						<label class="form-label">(f)Letter outlining past work experiences of the professional staff</label>
																																					@endif
	                                                                    </div>
	                                                                </div>
																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 work_exp_company">
																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																					@if($item->local_foreign_type == 2)
																																						<label class="form-label">(h)Copy of shareholder’s and directors’ NRC Card/ Passport</label>
																																					@else
																																						<label class="form-label">(g)Copy of shareholder’s and directors’ NRC Card/ Passport</label>
																																					@endif
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-3">
																																							<label>NRC Front</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_front_company">

																																						</div>
																																					</div>
																																					<div class="row mb-3">
																																						<div class="col-md-3">
																																							<label>NRC Back</label>
																																						</div>
																																						<div class="col-md-2 nrc_passport_back_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                <div class="row mb-3">
	                                                                    <div class="form-group">
																																					@if($item->local_foreign_type == 2)
																																						<label class="form-label">(i)Copy of Tax clearance from Internal Revenue Department</label>
																																					@else
																																						<label class="form-label">(h)Copy of Tax clearance from Internal Revenue Department</label>
																																					@endif
	                                                                    </div>
	                                                                </div>

																																	<div class="controls9">
																																			<div class="entry9">
																																					<div class="row mb-3">
																																						<div class="col-md-2 tax_clearance_company">

																																						</div>
																																					</div>
																																			</div>
																																	</div>

	                                                                {{--<div class="row mb-3">
	                                                                    <div class="form-group">
	                                                                        <label class="form-label">(j)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>

	                                                                    </div>
	                                                                </div>--}}
	                                                                {{--<div class="row mb-3">
	                                                                            <div class="col-md-11 col-auto">

	                                                                                <span class="representatives" ></span>
	                                                                            </div>

	                                                                </div>--}}

	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>


	                                            <div class="row pl-4 mt-2">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('9') }}</label> -->
	                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Total Staff') }}</label>

	                                            </div>
	                                            <div class="row border-bottom">
	                                                <div class="col-md-1"></div>
	                                                <div class="col-md-10">
	                                                    <div class="card">
	                                                        <div class="card-body">
	                                                            <table id="tbl_non_audit_number" class="table table-bordered">
	                                                                <thead>
	                                                                    <tr>
	                                                                        <th class="less-font-weight" ></th>
	                                                                        <th class="font-weight-bold" rowspan="2">Number</th>
	                                                                    </tr>
	                                                                </thead>
	                                                                <tbody id="tbl_non_audit_number_body">
																																		@php $total_amt=0; @endphp
																																		@if($total_staff)
																																			@foreach($total_staff as $staff)
																																				<?php
																																					$total_amt += $staff->total;
																																				 ?>
																																				<tr>
																																					<td>
																																						@foreach($total_staff_type as $staff_type)
																																							@if($staff_type->id == $staff->non_audit_total_staff_type_id)
																																							{{$staff_type->name}}
																																							@endif
																																						@endforeach
																																					</td>
																																					<td>
																																						{{$staff->total}}
																																					</td>
																																				</tr>
																																			@endforeach
																																		@endif
	                                                                </tbody>
																																	<tbody>
																																		<tr>
																																			<td>
																																				Total
																																			</td>
																																			<td>
																																				{{$total_amt}}
																																			</td>
																																		</tr>
																																	</tbody>
	                                                            </table>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>


	                                            <div class="row pl-4 mt-2">
	                                                <!-- <label class="col-md-1 col-form-label">{{ __('9') }}</label> -->
	                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Types Of Service Provided') }}</label>

	                                            </div>

	                                            <div class="row">
	                                                <div class="col-md-1"></div>
	                                                <div class="col-md-10">
	                                                    <div class="card">
	                                                        <div class="card-body">
	                                                            <table id="tbl_type_service" class="table table-bordered">
	                                                                <thead>
	                                                                    <tr>
	                                                                        <th class="font-weight-bold" rowspan="2">Accountancy Services(Non-Audit)</th>
	                                                                    </tr>

	                                                                </thead>
	                                                                <tbody id="tbl_type_service_body">
																																		@if($service_provided)
																																			@foreach($service_provided as $service)

																																				<tr>
																																					<td>
																																						<input disabled type="checkbox" name="t_s_p_id" value="{{$service->id}}" id="{{$service->id}}"
																																						<?php
																																							$t_s_p_arr = json_decode($item->type_of_service_provided_id);

																																							foreach($t_s_p_arr as $val){
																																								if($val == $service->id){
																																									echo "checked";
																																								}
																																							}
																																						 ?>
																																						/>

																																						<label class='form-check-label'>{{$service->name}}</label>
																																					</td>
																																				</tr>
																																			@endforeach
																																		@endif
	                                                                </tbody>
																																	@if($item->other != '')
																																	<tfoot>
																																		<tr>
																																			<td>{{$item->other}}</td>
																																		</tr>
																																	</tfoot>
																																	@endif
	                                                            </table>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="cpa_myanmar" style="<?php
																								if($item->local_foreign_type == 2){
																									echo "display:block;";
																								}
																							?>">
																									<div class="row pl-4 mt-2">
			                                                <!-- <label class="col-md-1 col-form-label">{{ __('9') }}</label> -->
			                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Particulars Of Directors/ Staff Members who is a Myanmar CPA') }}</label>

			                                            </div>
	                                                <div class="row">
	                                                        <div class="col-md-1"></div>
	                                                        <div class="col-md-10">
	                                                            <div class="card">
	                                                                <div class="card-body">
	                                                                    <table id="tbl_cpa_myanmar" class="table table-responsive director_cpa_initial table-bordered text-nowrap">
	                                                                        <thead>
	                                                                            <tr>
	                                                                                <th>Sr</th>
	                                                                                <th>Name</th>
	                                                                                <th>Position</th>
	                                                                                <th>CPA(Passed Reg.No)</th>
	                                                                                <th>CPA (Full-fiedged) Reg.No</th>
	                                                                                <th>Public Practice Reg.No</th>
	                                                                            </tr>
	                                                                        </thead>
	                                                                        <tbody id="tbl_cpa_myanmar_body">
																																						@php $no = 1; @endphp
																																						@if($myn_cpa_foreign)
																																							@foreach($myn_cpa_foreign as $foreign)
																																								<tr>
																																									<td>
																																										{{$no++}}
																																									</td>
																																									<td>
																																										{{$foreign->name}}
																																									</td>
																																									<td>
																																										{{$foreign->position}}
																																									</td>
																																									<td>
																																										{{$foreign->cpa_passed_reg_no}}
																																									</td>
																																									<td>
																																										{{$foreign->cpa_full_reg_no}}
																																									</td>
																																									<td>
																																										{{$foreign->public_practice_reg_no}}
																																									</td>
																																								</tr>
																																							@endforeach
																																						@endif
	                                                                        </tbody>
	                                                                    </table>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                            </div>

                                              <div class="row mb-5">
                                                  <label for="" class="col-md-1 col-form-label"></label>
                                                  <label for="" class="col-md-5 col-form-label font-weight-bold">Last Registration Fee Payment Date</label>

                                                  <div class="col-md-3">
                                                      <span id="last_reg_payment_date" class="form-control">
                                                        {{$item->last_reg_payment_date}}
                                                      </span>
                                                  </div>
                                              </div>

                                              <div class="row mb-5">
                                                  <label for="" class="col-md-1 col-form-label"></label>
                                                  <label for="" class="col-md-4 col-form-label font-weight-bold">Request to Disconnect</label>
                                                  <div class="row col-md-7 py-2">
                                                      <div class="col-md-3 form-check-radio mx-2">
                                                          <label class="form-check-label">
                                                              <input class="form-check-input" type="radio" id="yes"
                                                                      name="req_for_stop" value="1" disabled <?php
                                                                        if($item->req_for_stop == 1){
                                                                          echo "checked";
                                                                        }
                                                                      ?> >
                                                              <span class="form-check-sign"></span>
                                                              Yes
                                                          </label>
                                                      </div>
                                                      <div class="col-md-3 form-check-radio mx-2">
                                                          <label class="form-check-label">
                                                              <input class="form-check-input" type="radio" id="no"
                                                                      name="req_for_stop" value="2" disabled <?php
                                                                        if($item->req_for_stop == 2){
                                                                          echo "checked";
                                                                        }
                                                                      ?>
                                                                      >
                                                              <span class="form-check-sign"></span>
                                                              No
                                                          </label>
                                                      </div>

                                                      <label  class="error attend_place_error" style="display:none;" for="req_for_stop">Please select one</label>
                                                  </div>
                                              </div>

																							<div class="row mb-5">
                                                  <label for="" class="col-md-1 col-form-label"></label>
                                                  <label for="" class="col-md-5 col-form-label"></label>
                                                  <div class="col-md-2">
                                                      <label for="" class="col-form-label">Start Date</label>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <span id="last_reg_payment_start" class="form-control">
                                                        {{$item->last_reg_payment_start}}
                                                      </span>
                                                  </div>
                                              </div>

																							<div class="row mb-5">
                                                  <label for="" class="col-md-1 col-form-label"></label>
                                                  <label for="" class="col-md-5 col-form-label"></label>
                                                  <div class="col-md-2">
                                                      <label for="" class="col-form-label">End Date</label>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <span id="last_reg_payment_end" class="form-control">
                                                        {{$item->last_reg_payment_end}}
                                                      </span>
                                                  </div>
                                              </div>


	                                            <input type="hidden" name="audit_firm_id" >

                                              @if($item->status == 0)
                                              <div id="reconnect_btns">
                                                <div class="row mt-5 justify-content-center">
                                                    {{--<button type="submit" name="save" class="btn btn-danger"  onclick="" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>--}}
                                                    <button type="submit" name="save" id="reject_audit_btn_reconnect" data-toggle="modal" data-target="#remarkModalReconnect" class="btn btn-danger" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                                    <button type="submit" name="save" class="btn btn-primary" onclick="approveNonAuditFirmReconnect({{$item->student_info_id}},{{$item->id}})" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                                </div>
                                              </div>
                                              @endif


	                          		</div>
                                @endforeach
                             @endif

                              <div class="card-footer ">

                              </div>
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
						      <form id="remark-form"  method="post" action="javascript:rejectNonAuditFirm({{$item->id}})" enctype="multipart/form-data">
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
										      <form id="remark-form-renew"  method="post" action="javascript:rejectNonAuditFirmRenew({{$item->student_info_id}},{{$item->id}})" enctype="multipart/form-data">
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

    <div class="modal fade" id="remarkModalReconnect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form id="remark-form-reconnect"  method="post" action="javascript:rejectNonAuditFirmReconnect({{$item->student_info_id}},{{$item->id}})" enctype="multipart/form-data">
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
			            <button type="submit" class="btn btn-primary" form="remark-form-reconnect">Reject</button>
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
		$(document).ready(function(){
			var checked_org_structure = $("input[name=org_stru_id]:checked").val();
			if(checked_org_structure == 1){
				$("#sole-proprietorship").css("display","block");
			}
			else if(checked_org_structure == 2){
				$("#partnership").css("display","block");
			}
			else if(checked_org_structure == 3){
				$("#company").css("display","block");
			}

			// set checkbox label text to bold which are checked
			$("input[name=t_s_p_id]:checked").siblings("label").css("font-weight","bold");
		});
    //loadNonAuditStaff();
    //loadNonAuditOrganization();
		var firm_id = $("#firm_id").val();
		loadAttachFiles(firm_id);
    //loadNonAuditTypeOfService();
    //autoLoadAudit();
</script>
@endpush
