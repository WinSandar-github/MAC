@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'audit_firm_registration'
])

@section('content')
    <div class="content">
            <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card_body">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2">
                                        <input type="radio" name="audit" id="initial" class="">
                                        <label class="form-check-label">Initial</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="audit" id="renew" class="">
                                        <label class="form-check-label">Renew</label>
                                    </div>
                                </div>
                                <div class="card-body" id="initial_form">
									<ul class="nav nav-tabs nav-justified pl-0 active_tab col-md-12 no-gutters" role="tablist">
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link active pl-0 pr-2" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
		                                  ACCOUNTANCY FIRM INFORMATION
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
		                                      Organization Structure
		                                  </a>
		                              </li>
		                              
		                              
		                            </ul>
                            	    <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
	                                    <div class="tab-pane fade show active m-5" id="link1" aria-expanded="true">
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_register_no" class="form-control" placeholder="Accountancy Firm Registration No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Name') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Accountancy Firm Name" autofocus>
                                                    </div>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('3။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Address Of Practice(Head Office)') }}</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="township" class="form-control" placeholder="Township" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="post_code" class="form-control" placeholder="Post Code" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="form-control" placeholder="City" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="state" class="form-control" placeholder="State/Region" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="phone_no" class="form-control" placeholder="Telephone" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control" placeholder="Email Address" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="website" class="form-control" placeholder="Website Address" >
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('4။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Branch Office') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table branch table-bordered input-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight">Name</th>
                                                                    <th class="less-font-weight">Township</th>
                                                                    <th class="less-font-weight">Post Code</th>
                                                                    <th class="less-font-weight">City</th>
                                                                    <th class="less-font-weight">State</th>
                                                                    <th class="less-font-weight" colspan="2">Telephone Number</th>
                                                                    <th class="less-font-weight">Email</th>
                                                                    <th class="less-font-weight">Website</th>
                                                                    <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowBranch("branch")' value="+"></th>
                                                                </tr>
                                                            <thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="branch_no[]" class="form-control" ></td>
                                                                    <td><input type="text" name="branch_township[]" class="form-control" ></td>
                                                                    <td><input type="text" name="branch_post_code[]" class="form-control" ></td>
                                                                    <td><input type="text" name="branch_city[]" class="form-control" ></td>
                                                                    <td><input type="text" name="branch_state[]" class="form-control" ></td>
                                                                    <td>
                                                                        <input type="text" name="branch_phone_no[]" class="form-control" >
                                                                    </td>
                                                                    <td>
                                                                        <input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addInputTele("branch")' value="+">
                                                                    </td>
                                                                    <td><input type="text" name="branch_email[]" class="form-control" ></td>
                                                                    <td><input type="text" name="branch_website[]" class="form-control" ></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Organization Structure') }}</label>
                                                
                                                
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'></div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="checkbox" name="sole_proprietorship" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="Sole Proprietorship">
                                                        <label class="form-check-label">Sole Proprietorship</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="checkbox" name="partnership" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Partnership" >
                                                        <label class="form-check-label">Partnership</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="checkbox" name="company_incorporated" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Company Incorporated">
                                                        <label class="form-check-label">Company Incorporated</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="checkbox" name="others" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Others">
                                                        <label class="form-check-label">Others</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('6။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table partner_list table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" rowspan="2">Sr</th>
                                                                        <th class="less-font-weight" rowspan="2">Name</th>
                                                                        <th class="less-font-weight" rowspan="2">Public Private Reg.No</th>
                                                                        <th class="less-font-weight" colspan="2">Have authority to sing Auditors' report?</th>
                                                                        <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                            <input type="button" class="btn btn-primary btn-sm" onclick='addRowPartner("partner_list")' value="+">
                                                                        </th>
                                                                    </tr>
                                                                
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" value="" name="partner_name[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="partner_private_regno[]" class="form-control"></td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">Yes</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">No</label>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('7။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Director(s)/Officer(s)') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table director table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr</th>
                                                                        <th class="less-font-weight">Name</th>
                                                                        <th class="less-font-weight">Position</th>
                                                                        <th class="less-font-weight" >CPA Reg.No/Qualification</th>
                                                                        <th class="less-font-weight" >Public Private Reg.No</th>
                                                                        <th class="less-font-weight" style="text-align: right;">
                                                                            <input type="button" class="btn btn-primary btn-sm" onclick='addRowDirector("director")' value="+">
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" value="" name="director_name[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_position[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_cpa_no[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_private_regno[]" class="form-control"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	                                  
	                                    </div>
                                        <div class="tab-pane fade m-5" id="link2" aria-expanded="true">
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
                                                <label class="col-md-10 col-form-label">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" name="name_sole_manager" id="name_sole_manager" class="form-control" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Total Staff') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table profile table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" ></th>
                                                                        <th class="less-font-weight" rowspan="2">Total</th>
                                                                        <th class="less-font-weight" rowspan="2">Audit Staff</th>
                                                                        <th class="less-font-weight" rowspan="2">Non-Audit Staff</th>
                                                                        
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            No of principals/ partners
                                                                        </td>
                                                                        <td><input type="number" value="" name="principal_total" id="principal_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="principal_audit" id="principal_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="principal_non_audit" id="principal_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of directors who are not principals/ partners
                                                                        </td>
                                                                        <td><input type="number" value="" name="non_principal_total" id="non_principal_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="non_principal_audit" id="non_principal_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="non_principal_non_audit" id="non_principal_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of managerial level staff
                                                                        </td>
                                                                        <td><input type="number" value="" name="managerial_level_total" id="managerial_level_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="managerial_level_audit" id="managerial_level_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="managerial_level_non_audit" id="managerial_level_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of non-mangerial level
                                                                        </td>
                                                                        <td><input type="number" value="" name="non-mangerial_level_total" id="non-mangerial_level_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="non-mangerial_level_audit" id="non-mangerial_level_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="non-mangerial_level_non_audit" id="non-mangerial_level_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        Total Staff
                                                                        </td>
                                                                        <td><input type="number" value="" name="total_staff_total" id="total_staff_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="total_staff_audit" id="total_staff_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="total_staff_non_audit" id="total_staff_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('3။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Audit Staff') }}</label>
                                                
                                            </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table id="myTable" class="table profile table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="less-font-weight" rowspan="2"></th>
                                                                            <th class="less-font-weight" rowspan="2">Total</th>
                                                                            <th class="less-font-weight" rowspan="2">Full Time</th>
                                                                            <th class="less-font-weight" rowspan="2">Part Time</th>
                                                                            
                                                                        </tr>
                                                                        
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                No of principals/ partners/ directors
                                                                            </td>
                                                                            <td><input type="number" value="" name="director_total" id="director_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="director_full_time" id="director_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="director_part_time" id="director_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit managers
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_manager_total" id="audit_manager_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_manager_full_time" id="audit_manager_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_manager_part_time" id="audit_manager_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit seniors
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_senior_total" id="audit_senior_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_senior_full_time" id="audit_senior_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_senior_part_time" id="audit_senior_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2">
                                                                                No of audit assistants
                                                                                <ul>
                                                                                    <li>CPA Apprenticeship</li>
                                                                                    <li>Others</li>
                                                                                    
                                                                                </ul>
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_assistant_cpa_total" id="audit_assistant_cpa_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_assistant_cpa_full_time" id="audit_assistant_cpa_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_assistant_cpa_part_time" id="audit_assistant_cpa_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td><input type="number" value="" name="audit_assistant_others_total" id="audit_assistant_others_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_assistant_others_full_time" id="audit_assistant_others_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_assistant_others_part_time" id="audit_assistant_others_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Total Audit Staff
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_staff_total" id="audit_staff_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_staff_full_time" id="audit_staff_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_staff_part_time" id="audit_staff_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('4။') }}</label>
                                                <label class="col-md-3 col-form-label">{{ __('Types Of Service Provided') }}</label>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="audit_service" id="audit_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="audit">
                                                        <label class="form-check-label">Audit</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="audit_service" id="non_audit_service" class="@error('date_of_birth') is-invalid @enderror" autofocus value="non_audit" >
                                                        <label class="form-check-label">Non Audit</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                </div>
                                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        I <input type="text" name="declaration_name" id="declaration_name" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="">
                                                        (sole proprietor/ managing partner) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-8"></div>
                                                    
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label class="form-check-label">Date:</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                                    </div>
                                                </div>
                                        
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="card-body" id="renew_form">
									<ul class="nav nav-tabs nav-justified pl-0 active_tab col-md-12 no-gutters" role="tablist">
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link active pl-0 pr-2" data-toggle="tab" href="#link3" role="tablist" aria-expanded="true">
		                                  ACCOUNTANCY FIRM INFORMATION
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
		                                      Organization Structure
		                                  </a>
		                              </li>
		                              
		                              
		                            </ul>
                            	    <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
	                                    <div class="tab-pane fade show active m-5" id="link3" aria-expanded="true">
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_register_no" class="form-control" placeholder="Accountancy Firm Registration No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Name') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Accountancy Firm Name" autofocus>
                                                    </div>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('3။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Address Of Practice(Head Office)') }}</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="township" class="form-control" placeholder="Township" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="post_code" class="form-control" placeholder="Post Code" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="form-control" placeholder="City" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="state" class="form-control" placeholder="State/Region" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="phone_no" class="form-control" placeholder="Telephone" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control" placeholder="Email Address" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="website" class="form-control" placeholder="Website Address" >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('4။') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Branch Office') }}</label>
                                                
                                            </div>    
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table class="table branch_renew table-bordered input-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Name</th>
                                                                        <th class="less-font-weight">Township</th>
                                                                        <th class="less-font-weight">Post Code</th>
                                                                        <th class="less-font-weight">City</th>
                                                                        <th class="less-font-weight">State/Region</th>
                                                                        <th class="less-font-weight" colspan="2">Telephone</th>
                                                                        <th class="less-font-weight">Email</th>
                                                                        <th class="less-font-weight">Website</th>
                                                                        <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowBranch("branch_renew")' value="+"></th>
                                                                    </tr>
                                                                <thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input type="text" name="branch_no[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_township[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_post_code[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_city[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_state[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_phone_no[]" class="form-control" ></td>
                                                                        <td>
                                                                            <input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addInputTele("branch_renew")' value="+">
                                                                        </td>
                                                                        <td><input type="text" name="branch_email[]" class="form-control" ></td>
                                                                        <td><input type="text" name="branch_website[]" class="form-control" ></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Organization Structure') }}</label>
                                                
                                                
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'></div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="checkbox" name="sole_proprietorship" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="Sole Proprietorship">
                                                        <label class="form-check-label">Sole Proprietorship</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="checkbox" name="partnership" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Partnership" >
                                                        <label class="form-check-label">Partnership</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="checkbox" name="company_incorporated" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Company Incorporated">
                                                        <label class="form-check-label">Company Incorporated</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="checkbox" name="others" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Others">
                                                        <label class="form-check-label">Others</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('6။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table partner_renew table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" rowspan="2">Sr</th>
                                                                        <th class="less-font-weight" rowspan="2">Name</th>
                                                                        <th class="less-font-weight" rowspan="2">Public Private Reg.No</th>
                                                                        <th class="less-font-weight" colspan="2">Have authority to sing Auditors' report?</th>
                                                                        <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                            <input type="button" class="btn btn-primary btn-sm" onclick='addRowPartner("partner_renew")' value="+">
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" value="" name="partner_name[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="partner_private_regno[]" class="form-control"></td>
                                                                        <td>
                                                                            <input type="radio" value="yes" name="report_yes" id="report_yes" class="">
                                                                            <label class="form-check-label">Yes</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="no" name="report_yes" id="report_no" class="">
                                                                            <label class="form-check-label">No</label>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('7။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('Director(s)/Officer(s)') }}</label>
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table director_renew table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr</th>
                                                                        <th class="less-font-weight">Name</th>
                                                                        <th class="less-font-weight">Position</th>
                                                                        <th class="less-font-weight" >CPA Reg.No/Qualification</th>
                                                                        <th class="less-font-weight" >Public Private Reg.No</th>
                                                                        <th class="less-font-weight" style="text-align: right;">
                                                                            <input type="button" class="btn btn-primary btn-sm"onclick='addRowDirector("director_renew")' value="+">
                                                                        </th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" value="" name="director_name[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_position[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_cpa_no[]" class="form-control"></td>
                                                                        <td><input type="text" value="" name="director_private_regno[]" class="form-control"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	                                  
	                                    </div>
                                        <div class="tab-pane fade m-5" id="link4" aria-expanded="true">
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
                                                <label class="col-md-10 col-form-label">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" name="name_sole_manager" id="name_sole_manager" class="form-control" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Total Staff') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="myTable" class="table profile table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight" ></th>
                                                                        <th class="less-font-weight" rowspan="2">Total</th>
                                                                        <th class="less-font-weight" rowspan="2">Audit Staff</th>
                                                                        <th class="less-font-weight" rowspan="2">Non-Audit Staff</th>
                                                                        
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            No of principals/ partners
                                                                        </td>
                                                                        <td><input type="number" value="" name="principal_total" id="principal_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="principal_audit" id="principal_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="principal_non_audit" id="principal_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of directors who are not principals/ partners
                                                                        </td>
                                                                        <td><input type="number" value="" name="non_principal_total" id="non_principal_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="non_principal_audit" id="non_principal_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="non_principal_non_audit" id="non_principal_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of managerial level staff
                                                                        </td>
                                                                        <td><input type="number" value="" name="managerial_level_total" id="managerial_level_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="managerial_level_audit" id="managerial_level_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="managerial_level_non_audit" id="managerial_level_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of non-mangerial level
                                                                        </td>
                                                                        <td><input type="number" value="" name="non-mangerial_level_total" id="non-mangerial_level_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="non-mangerial_level_audit" id="non-mangerial_level_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="non-mangerial_level_non_audit" id="non-mangerial_level_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        Total Staff
                                                                        </td>
                                                                        <td><input type="number" value="" name="total_staff_total" id="total_staff_total" class="form-control"></td>
                                                                        <td><input type="number" value="" name="total_staff_audit" id="total_staff_audit" class="form-control"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="total_staff_non_audit" id="total_staff_non_audit" class="form-control">
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('3။') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Audit Staff') }}</label>
                                                
                                            </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table id="myTable" class="table profile table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="less-font-weight" rowspan="2"></th>
                                                                            <th class="less-font-weight" rowspan="2">Total</th>
                                                                            <th class="less-font-weight" rowspan="2">Full Time</th>
                                                                            <th class="less-font-weight" rowspan="2">Part Time</th>
                                                                            
                                                                        </tr>
                                                                        
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                No of principals/ partners/ directors
                                                                            </td>
                                                                            <td><input type="number" value="" name="director_total" id="director_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="director_full_time" id="director_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="director_part_time" id="director_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit managers
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_manager_total" id="audit_manager_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_manager_full_time" id="audit_manager_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_manager_part_time" id="audit_manager_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit seniors
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_senior_total" id="audit_senior_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_senior_full_time" id="audit_senior_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_senior_part_time" id="audit_senior_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2">
                                                                                No of audit assistants
                                                                                <ul>
                                                                                    <li>CPA Apprenticeship</li>
                                                                                    <li>Others</li>
                                                                                    
                                                                                </ul>
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_assistant_cpa_total" id="audit_assistant_cpa_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_assistant_cpa_full_time" id="audit_assistant_cpa_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_assistant_cpa_part_time" id="audit_assistant_cpa_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td><input type="number" value="" name="audit_assistant_others_total" id="audit_assistant_others_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_assistant_others_full_time" id="audit_assistant_others_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_assistant_others_part_time" id="audit_assistant_others_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Total Audit Staff
                                                                            </td>
                                                                            <td><input type="number" value="" name="audit_staff_total" id="audit_staff_total" class="form-control"></td>
                                                                            <td><input type="number" value="" name="audit_staff_full_time" id="audit_staff_full_time" class="form-control"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="audit_staff_part_time" id="audit_staff_part_time" class="form-control">
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('4။') }}</label>
                                                    <label class="col-md-3 col-form-label">{{ __('Types Of Service Provided') }}</label>
                                                    <div class="col-md-2">
                                                        <div class="">
                                                            <input type="radio" name="audit_service" id="audit_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="audit">
                                                            <label class="form-check-label">Audit</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="">
                                                            <input type="radio" name="audit_service" id="non_audit_service" class="@error('date_of_birth') is-invalid @enderror" autofocus value="non_audit" >
                                                            <label class="form-check-label">Non Audit</label>
                                                        </div>
                                                    </div>
                                                
                                                
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
                                                    <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            I <input type="text" name="declaration_name" id="declaration_name" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="">
                                                            (sole proprietor/ managing partner) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-8"></div>
                                                    
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label class="form-check-label">Date:</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                                    </div>
                                                </div>
                                        
                                        </div>
                                
                                    </div>
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
        $(document).ready(function () {
            $('#initial').on("click", function () {
                $('#initial_form').css('display','block');
                $('#renew_form').css('display','none');
            })
            $('#renew').on("click", function () {
                $('#initial_form').css('display','none');
                $('#renew_form').css('display','block');
                
            })
        
        });

</script>
@endpush
