@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'non_audit_firm_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non-audit-firm-local-initial') }}
            </div>
        </div>

        <form id="ajaxform" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('1') }}</label>
                                            <label class="col-md-2 col-form-label">{{ __('Firm Registration No') }}</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" value="2" name="audit_firm_type_id">
                                                    <input type="hidden" value="1" name="local_foreign_id">
                                                    <input type="text" name="accountancy_firm_reg_no" class="form-control" placeholder="Firm Registration No" autocomplete="off">
                                                </div>
                                            </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('Firm Name') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="accountancy_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Firm Name" autofocus autocomplete="off">
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
                                        <input type="text" name="state" class="form-control" placeholder="State/Region" autocomplete="off" >
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
                                        <input type="text" name="email" class="form-control" placeholder="Email Address" autocomplete="off" >
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
                                            <table class="table branch_non_audit table-bordered input-table">
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
                                                        <th >
                                                            <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowBranch("branch_non_audit")'>
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                <thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="bo_branch_name[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" name="bo_township[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" name="bo_post_code[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" name="bo_city[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" name="bo_state_region[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" name="bo_phone[]" class="form-control" autocomplete="off"></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputTele("branch_non_audit")'>
                                                                <i class="fa fa-plus"></i>
                                                            </button>
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
                                <label class="col-md-4 col-form-label">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="myTable" class="table non_partner table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight" rowspan="2">Sr</th>
                                                        <th class="less-font-weight" rowspan="2">Name</th>
                                                        <th class="less-font-weight" rowspan="2">Passport/ CSC No./ Incorporation Certificate</th>
                                                        <th >
                                                            <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowPartnerByNonAudit("non_partner")'>
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>                                                                            
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" value="" name="fona_name[]" class="form-control" autocomplete="off"></td>
                                                        <td>
                                                            
                                                            <input type="text" value="" name="fona_pass_csc_inco[]" class="form-control" autocomplete="off">
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
                                <label class="col-md-1 col-form-label">{{ __('6') }}</label>
                                <label class="col-md-4 col-form-label">{{ __('Director(s)/Officer(s)') }}</label>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="myTable" class="table non_director table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight">Sr</th>
                                                        <th class="less-font-weight">Name</th>
                                                        <th class="less-font-weight">Position</th>
                                                        <th class="less-font-weight" >Passport</th>
                                                        <th class="less-font-weight" >CSC No.</th>
                                                        <th >
                                                            <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addRowDirectorByNonAudit("non_director")'>
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" value="" name="dona_name[]" class="form-control" autocomplete="off"></td>
                                                        <td><input type="text" value="" name="dona_position[]" class="form-control" autocomplete="off"></td>
                                                        <td>
                                                            <input type="text" value="" name="dona_passport[]" class="form-control" autocomplete="off">
                                                            
                                                        </td>
                                                        <td><input type="text" value="" name="dona_csc_no[]" class="form-control" autocomplete="off"></td>
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
                                    <div class="col-md-10">
                                        <div class="card">
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
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="letterheads" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls1","entry1")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(b)1 Passport size photo</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls2">
                                                    <div class="entry2">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="pass_photos">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls2","entry2")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(c)Profile of the owner</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls3">
                                                    <div class="entry3">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="owner_profiles">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls3","entry3")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(d)Copy of Education Certificate</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls4">
                                                    <div class="entry4">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="edu_certs">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls4","entry4")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(e)Letter outlining past work experience</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls5">
                                                    <div class="entry5">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="work_exps">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls5","entry5")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(f)Copy of owner’s NRC Card/ Passport</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls6">
                                                    <div class="entry6">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="nrc_passports">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls6","entry6")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(g)Copy of Tax clearance from Internal Revenue Department</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls7">
                                                    <div class="entry7">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" name="tax_clearances">                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls7","entry7")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(h)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>                                                                        
                                                    </div>  
                                                </div>
                                                <div class="controls8">
                                                    <div class="entry8">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >                                                                                    
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls8","entry8")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                   
                                            </div>
                                        </div>  
                                    </div>
                                </div>                                                       
                            </div>

                            <div id="partnership">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card">
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
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls9","entry9")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(b)Copy of signed Partnership Deeds/ Memorandum of Agreement</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls10">
                                                    <div class="entry10">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls10","entry10")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(c)Copy of letterhead to be used</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls11">
                                                    <div class="entry11">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls11","entry11")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(d)Passport size photos of the all partners</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls12">
                                                    <div class="entry12">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls12","entry12")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(e)Profiles of the all partners</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls13">
                                                    <div class="entry13">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls13","entry13")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(f)Copy of Education Certificates of the all partners</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls14">
                                                    <div class="entry14">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls14","entry14")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(g)Letter outlining past work experiences of the all partners</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls15">
                                                    <div class="entry15">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls15","entry15")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(h)Copy of Partners’ NRC Card/ Passport</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls16">
                                                    <div class="entry16">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls16","entry16")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(i)Copy of Tax clearance from Internal Revenue Department</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls17">
                                                    <div class="entry17">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls17","entry17")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(j)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls18">
                                                    <div class="entry18">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls18","entry18")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>  
                                    </div>
                                </div>                                                       
                            </div>
                            <div id="company">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-body">                                                                                                        
                                                <div class="row">                                                                    
                                                    <label class="col-md-12 col-form-label"><b>For Company Incorporated</b></label>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(a)Copy of Certificate of Incorporation (company incorporated in Myanmar)/ Certificate of Registration (branch office registered in Myanmar)</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls19">
                                                    <div class="entry19">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls19","entry19")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                    
                                            

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(b)Copy of Permit under Section 27A of Myanmar Companies Act (For Only Foreign Company)</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls20">
                                                    <div class="entry20">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls20","entry20")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(c)Copy of recent audited financial statements</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls21">
                                                    <div class="entry21">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls21","entry21")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
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
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls22","entry22")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(e)Copy of letterhead to be used</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls23">
                                                    <div class="entry23">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls23","entry23")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(f)Copy of Education Certificates of the professional staff</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls24">
                                                    <div class="entry24">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls24","entry24")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(g)Letter outlining past work experiences of the professional staff</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls25">
                                                    <div class="entry25">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls25","entry25")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(h)Copy of shareholder’s and directors’ NRC Card/ Passpor</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls26">
                                                    <div class="entry26">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls26","entry26")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(i)Copy of Tax clearance from Internal Revenue Department</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls27">
                                                    <div class="entry27">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls27","entry27")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">(j)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                    
                                                    </div>  
                                                </div>
                                                <div class="controls28">
                                                    <div class="entry28">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 col-auto">
                                                                <input type="file" class="form-control" >
                                                                
                                                            </div>
                                                            <div class="col-md-1 col-auto">
                                                                <button class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls28","entry28")'>
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                                                        
                                            </div>
                                        </div>  
                                    </div>
                                </div>                                                       
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('8') }}</label>
                                <label class="col-md-8 col-form-label">{{ __('Name Of Managing Director') }}</label>
                                
                            </div>
                            <div class="row">
                                    <label class="col-md-1 col-form-label"></label>
                                    <div class="col-md-10 col-form-label">
                                    <div class="form-group">
                                        <input type="text" name="name_sole_proprietor"  class="form-control  @error('name') is-invalid @enderror"  autofocus autocomplete="off">
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
                                                        <th class="less-font-weight" rowspan="2">Number</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>No of directors who are alse shareholders</td>
                                                        <td><input type="number" name="nats_total[]" id="principal_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                        <input type="hidden" value="1" name="nats_type_id[]">
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        No of directors who are not shareholders
                                                        </td>
                                                        <td><input type="number" name="nats_total[]" id="non_principal_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                        <input type="hidden" value="2" name="nats_type_id[]">
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        No of managerial level staff
                                                        </td>
                                                        <td><input type="number" name="nats_total[]" id="managerial_level_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                        <input type="hidden" value="3" name="nats_type_id[]">
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        No of non-mangerial level
                                                        </td>
                                                        <td><input type="number" name="nats_total[]" id="non-mangerial_level_total" class="form-control" onmouseup="getTotalStaff()" onkeyup="getTotalStaff()"></td>
                                                        <input type="hidden" value="4" name="nats_type_id[]">
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        Total Staff
                                                        </td>
                                                        <td><input type="text" value="0"  id="total_staff_total" class="form-control" disabled autocomplete="off"></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('10') }}</label>
                                <label class="col-md-4 col-form-label">{{ __('Types Of Service Provided') }}</label>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="myTable" class="table profile table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight" rowspan="2">Accountancy Services(Non-Audit)</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="accounting_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="3">
                                                            <label class="form-check-label">Accounting</label>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="advisory_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="4">
                                                            <label class="form-check-label">Advisory</label>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="taxation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="5">
                                                            <label class="form-check-label">Taxation</label>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="liquidation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="6">
                                                            <label class="form-check-label">Liquidation</label>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="accounting_system_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="7">
                                                            <label class="form-check-label">Accounting System</label>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="t_s_p_id" id="other_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="8">
                                                            <label class="form-check-label">Others</label>
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
                                <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        I <input type="text" name="declaration" id="declaration_name" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="" autocomplete="off">
                                        (managing director) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
                                    </div>
                            </div>                                                   
                                                                                
                            </div>                                                
                            
                            <div class="row">
                                <div class="col-md-11 d-md-flex justify-content-md-end">
                                    <button  class="btn btn-primary btn-round "  id="save-data">{{ __('Save') }}</button>
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


    
    </script>

@endpush
