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
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-initial-accountancy') }}
            </div>
        </div>
            <form action="{{ route('acc_firm_info.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('1') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="hidden" value="1" name="audit_firm_type_id">
                                                        <input type="hidden" value="1" name="local_foreign_id">
                                                        <input type="text" name="accountancy_firm_reg_no" class="form-control" placeholder="Accountancy Firm Registration No" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Name') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Accountancy Firm Name" autocomplete="off">
                                                    </div>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('3') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Address Of Practice(Head Office)') }}</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="township" class="form-control" placeholder="Township" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="post_code" class="form-control" placeholder="Post Code" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="form-control" placeholder="City" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="state" class="form-control" placeholder="State/Region" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="phone_no" class="form-control" placeholder="Telephone" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control" placeholder="Email Address" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="website" class="form-control" placeholder="Website Address" autocomplete="off">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('4') }}</label>
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
                                                                    <td><input type="text" name="bo_branch_name[]" class="form-control" autocomplete="off"></td>
                                                                    <td><input type="text" name="bo_township[]" class="form-control" autocomplete="off"></td>
                                                                    <td><input type="text" name="bo_post_code[]" class="form-control" autocomplete="off"></td>
                                                                    <td><input type="text" name="bo_city[]" class="form-control" autocomplete="off"></td>
                                                                    <td><input type="text" name="bo_state_region[]" class="form-control" autocomplete="off"></td>
                                                                    <td>
                                                                        <input type="text" name="bo_phone[]" class="form-control" autocomplete="off">
                                                                    </td>
                                                                    <td>
                                                                        <input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addInputTele("branch")' value="+">
                                                                    </td>
                                                                    <td><input type="text" name="bo_email[]" class="form-control" autocomplete="off"></td>
                                                                    <td><input type="text" name="bo_website[]" class="form-control" autocomplete="off"></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('5') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Organization Structure') }}</label>
                                                
                                                
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'></div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id" autofocus value="1" onclick="getOrganization()">
                                                        <label class="form-check-label">Sole Proprietorship</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id" autofocus value="2" onclick="getOrganization()">
                                                        <label class="form-check-label">Partnership</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id"  autofocus value="3" onclick="getOrganization()">
                                                        <label class="form-check-label">Company Incorporated</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id"  autofocus value="4" onclick="getOrganization()">
                                                        <label class="form-check-label">Others</label>
                                                    </div>
                                                </div>
                                            </div><br/>
                                            <div id="sole-proprietorship">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label"><b>For Sole Proprietorship</b></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(a)Copy of valid Public Practice Accountant Certificate</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(b)Copy of stationery/ letterhead to be used in signing of auditor's report</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(c)Copy of Tax clearance from Internal Revenue Department</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(d)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div id="partnership">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label"><b>For Partnership</b></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(a)Copy of valid Public Practice Accountant Certificate of all partners</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(b)Copy of Certificate or Registration, if any</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(c)Copy of signed Partnership Deeds/ Memorandum of Agreement</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(d)Copy of stationery/ letterhead to be used in signing of auditor's report</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(e)Copy of Tax clearance from Internal Revenue Department</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(f)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div id="company">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label"><b>For Company </b></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(a)Copy of valid Public Practice Accountant Certificate of all shareholders</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(b)Copy of Certificate of Incorporation</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(c)Copy of signed Memorandum of Associations and Articles of Associations or constitution</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(d)Copy of Form 6, Form 26 and Form E</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(e)Form A1 and/or Additional Form</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(f)Copy of commercial tax registration certificate</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(g)Copy of stationery/ letterhead to be used in signing of auditor's report</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(h)Copy of Tax clearance from Internal Revenue Department</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <label class="col-md-7 col-form-label">(i)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                                        
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                <label class="custom-file-label" >Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('6') }}</label>
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
                                                                        <td><input type="text" value="" name="foa_name[]" class="form-control" autocomplete="off"></td>
                                                                        <td><input type="text" value="" name="foa_pub_pri_reg_no[]" class="form-control" autocomplete="off"></td>
                                                                        <td>
                                                                            <input type="radio" value="1" name="foa_authority_to_sign">
                                                                            <label class="form-check-label">Yes</label>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" value="2" name="foa_authority_to_sign">
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
                                                <label class="col-md-1 col-form-label">{{ __('7') }}</label>
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
                                                                        <td><input type="text" value="" name="do_name[]" class="form-control" autocomplete="off"></td>
                                                                        <td><input type="text" value="" name="do_position[]" class="form-control" autocomplete="off"></td>
                                                                        <td><input type="text" value="" name="do_cpa_reg_no[]" class="form-control" autocomplete="off"></td>
                                                                        <td><input type="text" value="" name="do_pub_pri_reg_no[]" class="form-control" autocomplete="off"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('8') }}</label>
                                                <label class="col-md-10 col-form-label">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" name="name_sole_proprietor" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('9') }}</label>
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
                                                                        <td><input type="number" name="ats_total[]" id="principal_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="principal_audit" class="form-control" onmouseup="getTotalAudit()" onkeyup="getTotalAudit()"></td>
                                                                        <td>
                                                                            <input type="number" name="ats_non_audit_staff[]" id="principal_non_audit" class="form-control" onmouseup="getTotalNonAudit()" onkeyup="getTotalNonAudit()">
                                                                            
                                                                        </td>
                                                                        <input type="hidden" value="1" name="ats_audit_total_staff_type_id[]">
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of directors who are not principals/ partners
                                                                        </td>
                                                                        <td><input type="number"  name="ats_total[]" id="non_principal_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="non_principal_audit" class="form-control" onmouseup="getTotalAudit()" onkeyup="getTotalAudit()"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="ats_non_audit_staff[]" id="non_principal_non_audit" class="form-control" onmouseup="getTotalNonAudit()" onkeyup="getTotalNonAudit()">
                                                                            
                                                                        </td>
                                                                        <input type="hidden" value="2" name="ats_audit_total_staff_type_id[]">
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of managerial level staff
                                                                        </td>
                                                                        <td><input type="number" value="" name="ats_total[]" id="managerial_level_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                                        <td><input type="number" value="" name="ats_audit_staff[]" id="managerial_level_audit" class="form-control" onmouseup="getTotalAudit()" onkeyup="getTotalAudit()"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="ats_non_audit_staff[]" id="managerial_level_non_audit" class="form-control" onmouseup="getTotalNonAudit()" onkeyup="getTotalNonAudit()">
                                                                            
                                                                        </td>
                                                                        <input type="hidden" value="3" name="ats_audit_total_staff_type_id[]">
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of non-mangerial level
                                                                        </td>
                                                                        <td><input type="number" value="" name="ats_total[]" id="non-mangerial_level_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                                        <td><input type="number" value="" name="ats_audit_staff[]" id="non-mangerial_level_audit" class="form-control" onmouseup="getTotalAudit()" onkeyup="getTotalAudit()"></td>
                                                                        <td>
                                                                            <input type="number" value="" name="ats_non_audit_staff[]" id="non-mangerial_level_non_audit" class="form-control" onmouseup="getTotalNonAudit()" onkeyup="getTotalNonAudit()">
                                                                            
                                                                        </td>
                                                                        <input type="hidden" value="4" name="ats_audit_total_staff_type_id[]">
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        Total Staff
                                                                        </td>
                                                                        <td><input type="text" value="0"  id="total_staff_total" class="form-control" disabled></td>
                                                                        <td><input type="text" value="0" id="total_staff_audit" class="form-control" disabled></td>
                                                                        <td>
                                                                            <input type="text" value="0" id="total_staff_non_audit" class="form-control" disabled>
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('10') }}</label>
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
                                                                            <td><input type="number" value="" name="as_total[]" id="director_total" class="form-control" onmouseup="getTotalAuditStaff()" onkeyup="getTotalAuditStaff()"></td>
                                                                            <td><input type="number" value="" name="as_full_time[]" id="director_full_time" class="form-control" onmouseup="getTotalFullTime()" onkeyup="getTotalFullTime()"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="as_part_time[]" id="director_part_time" class="form-control" onmouseup="getTotalPartTime()" onkeyup="getTotalPartTime()"> 
                                                                                <input type="hidden" value="1" name="as_audit_staff_type_id[]">
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit managers
                                                                            </td>
                                                                            <td><input type="number" value="" name="as_total[]" id="audit_manager_total" class="form-control" onmouseup="getTotalAuditStaff()" onkeyup="getTotalAuditStaff()"></td>
                                                                            <td><input type="number" value="" name="as_full_time[]" id="audit_manager_full_time" class="form-control" onmouseup="getTotalFullTime()" onkeyup="getTotalFullTime()"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="as_part_time[]" id="audit_manager_part_time" class="form-control" onmouseup="getTotalPartTime()" onkeyup="getTotalPartTime()">
                                                                                <input type="hidden" value="2" name="as_audit_staff_type_id[]">
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit seniors
                                                                            </td>
                                                                            <td><input type="number" value="" name="as_total[]" id="audit_senior_total" class="form-control" onmouseup="getTotalAuditStaff()" onkeyup="getTotalAuditStaff()"></td>
                                                                            <td><input type="number" value="" name="as_full_time[]" id="audit_senior_full_time" class="form-control" onmouseup="getTotalFullTime()" onkeyup="getTotalFullTime()"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="as_part_time[]" id="audit_senior_part_time" class="form-control" onmouseup="getTotalPartTime()" onkeyup="getTotalPartTime()">
                                                                                <input type="hidden" value="3" name="as_audit_staff_type_id[]">
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
                                                                            <td><input type="number" value="" name="as_total[]" id="audit_assistant_cpa_total" class="form-control" onmouseup="getTotalAuditStaff()" onkeyup="getTotalAuditStaff()"></td>
                                                                            <td><input type="number" value="" name="as_full_time[]" id="audit_assistant_cpa_full_time" class="form-control" onmouseup="getTotalFullTime()" onkeyup="getTotalFullTime()"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="as_part_time[]" id="audit_assistant_cpa_part_time" class="form-control" onmouseup="getTotalPartTime()" onkeyup="getTotalPartTime()">
                                                                                <input type="hidden" value="4" name="as_audit_staff_type_id[]">
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td><input type="number" value="" name="as_total[]" id="audit_assistant_others_total" class="form-control" onmouseup="getTotalAuditStaff()" onkeyup="getTotalAuditStaff()"></td>
                                                                            <td><input type="number" value="" name="as_full_time[]" id="audit_assistant_others_full_time" class="form-control" onmouseup="getTotalFullTime()" onkeyup="getTotalFullTime()"></td>
                                                                            <td>
                                                                                <input type="number" value="" name="as_part_time[]" id="audit_assistant_others_part_time" class="form-control" onmouseup="getTotalPartTime()" onkeyup="getTotalPartTime()">
                                                                                <input type="hidden" value="5" name="as_audit_staff_type_id[]">
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Total Audit Staff
                                                                            </td>
                                                                            <td><input type="text" value="0" id="audit_staff_total" class="form-control" disabled></td>
                                                                            <td><input type="text" value="0" id="audit_staff_full_time" class="form-control" disabled></td>
                                                                            <td>
                                                                                <input type="text" value="0"id="audit_staff_part_time" class="form-control" disabled>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('11') }}</label>
                                                    <label class="col-md-3 col-form-label">{{ __('Types Of Service Provided') }}</label>
                                                    <div class="col-md-2">
                                                            <input type="radio" name="t_s_p_id" value="1">
                                                            <label class="form-check-label">Audit</label>
                                                    
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="t_s_p_id" value="2" >
                                                        <label class="form-check-label">Non Audit</label>
                                                        
                                                    </div>
                                                
                                                
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('12') }}</label>
                                                    <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            I <input type="text" name="declaration" class=" @error('date_of_birth') is-invalid @enderror" autocomplete="off">
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
                                                    <div class="col-md-11 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
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

@endpush
