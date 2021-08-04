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
        <div class="row mb-3">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-initial-accountancy') }}
            </div>
        </div>
            <form id="audit_firm_form" method="post" action="javascript:updateAuditFirm();" enctype="multipart/form-data">
           
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                                <h5 class="border-bottom pb-2 mt-3 text-center" style="font-weight:bold">Audit Firm Information</h5>
                                            <div class="row border-bottom pl-4">                                                
                                                <label class="col-md-4 form-label" style="font-weight:bold">{{ __('Accountancy Firm Registration No') }}</label>
                                                <label class="col-md-1 form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
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
                                                
                                                <label class="col-md-4 col-form-label" style="font-weight:bold">{{ __('Accountancy Firm Name') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
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

                                            <div class="row  pl-4 mt-2">
                                                <h5 class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Address Of Practice(Head Office)') }}</h5>   
                                            </div>  
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('Township') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group"> 
                                                        <span id="township"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('Post Code') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="post_code"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('City') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="city"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('State') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="state"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('Phone Number') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="phone_no"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('Email') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="email"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  pl-4 border-bottom">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-2 col-form-label" style="font-weight:bold">{{ __('Website') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="website"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
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
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-11">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_branch" class="table table-bordered branch text-nowrap" >
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold">Name</th>
                                                                        <th class="font-weight-bold">Township</th>
                                                                        <th class="font-weight-bold">Post Code</th>
                                                                        <th class="font-weight-bold">City</th>
                                                                        <th class="font-weight-bold">State</th>
                                                                        <th class="font-weight-bold" colspan="2">Telephone Number</th>
                                                                        <th class="font-weight-bold">Email</th>
                                                                        <th class="font-weight-bold">Website</th>
                                                                        <th >
                                                                            <button class="btn btn-primary btn-sm" type="button" onclick='addRowBranch("branch")' disabled>
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                            
                                                                        </th>
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
                                                            <div class="card">
                                                                <div class="card-body">                                                                                                        
                                                                    <div class="row">                                                                    
                                                                        <label class="col-md-12 col-form-label"><b>For Sole Proprietorship</b></label>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-11 col-auto ">
                                                                            <span class="ppa_certis"></span>  
                                                                                    
                                                                        </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls1">
                                                                        <div class="entry1">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="ppa_certis[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls1","entry1")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(b)Copy of stationery/letterhead to be used in signing of auditor's report</label>                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-11 col-auto ">
                                                                            <span class="letterheads"></span>                                                                   
                                                                        </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls2">
                                                                        <div class="entry2">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="letterheads[]">                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls2","entry2")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(c)Copy of Tax clearance from Internal Revenue Department</label>                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_clearances"></span>                                                                          
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls3">
                                                                        <div class="entry3">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="tax_clearances[]">                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls3","entry3")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(d)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="representatives"></span>                                                                          
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls4">
                                                                        <div class="entry4">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="representatives[]">                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls4","entry4")'>
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
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    
                                                                                    <span class="ppa_certis"></span>
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls9">
                                                                        <div class="entry9">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="ppa_certis[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls9","entry9")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(b)Copy of Certificate or Registration, if any</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="certi_or_regs"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls10">
                                                                        <div class="entry10">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="certi_or_regs[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls10","entry10")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(c)Copy of signed Partnership Deeds/ Memorandum of Agreement</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="deeds_memos"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls11">
                                                                        <div class="entry11">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="deeds_memos[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls11","entry11")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(d)Copy of stationery/letterhead to be used in signing of auditor's report</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="letterheads"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls12">
                                                                        <div class="entry12">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="letterheads[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls12","entry12")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(e)Copy of Tax clearance from Internal Revenue Department</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_clearances"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls13">
                                                                        <div class="entry13">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="tax_clearances[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls13","entry13")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(f)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="representatives"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls14">
                                                                        <div class="entry14">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="representatives[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls14","entry14")'>
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
                                                    <div class="row border-bottom">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-11">
                                                            <div class="card">
                                                                <div class="card-body">                                                                                                        
                                                                    <div class="row">                                                                    
                                                                        <label class="col-md-12 col-form-label"><b>For Company Incorporated</b></label>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate all shareholders</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="ppa_certis"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls19">
                                                                        <div class="entry19">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="ppa_certis[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls19","entry19")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                    
                                                                

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(b)Copy of Certificate of Incorporation</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="certificate_incors"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls20">
                                                                        <div class="entry20">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="certificate_incors[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls20","entry20")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(c)Copy of signed Memorandum of Associations and Articles of Associations or constitution</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="memorandums"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls21">
                                                                        <div class="entry21">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="memorandums[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls21","entry21")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(d)Copy of Form 6, Form 26 and Form E</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="form6_26e"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls22">
                                                                        <div class="entry22">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="form6_26e[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls22","entry22")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(e)Copy of Form A1 and/or Additional Form</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="form_a1"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls23">
                                                                        <div class="entry23">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="form_a1[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls23","entry23")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(f)Copy of commercial tax registration certificate</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_reg_certificate"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls24">
                                                                        <div class="entry24">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="tax_reg_certificate[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls24","entry24")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(g)Copy of stationery/letterhead to be used in signing of auditor's report</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="letterheads"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                    </div>
                                                                    <div class="controls25">
                                                                        <div class="entry25">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    <input disabled type="file" class="form-control" name="letterheads[]">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-1 col-auto">
                                                                                    <button disabled class="btn btn-primary btn-add btn-sm custom-btn" type="button" onclick='addInputFile("controls25","entry25")'>
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
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
                                                                    </div> 
                                                                    
                                                                                                                                                                                         
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
                                                <div class="col-md-1"></div>
                                                <div class="col-md-11">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_partner" class="table table-bordered partner_list text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold">Sr</th>
                                                                        <th class="font-weight-bold" >Name</th>
                                                                        <th class="font-weight-bold" >Public Private Reg.No</th>
                                                                        <th class="font-weight-bold" colspan="2">Have authority to sing Auditors' report?</th>
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
                                                <label class="col-md-12 col-form-label" style="font-weight:bold">{{ __('Director(s)/Officer(s)') }}</label>
                                                
                                            </div>
                                            <div class="row border-bottom">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-11">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_director" class="table table-bordered director text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold">Sr</th>
                                                                        <th class="font-weight-bold">Name</th>
                                                                        <th class="font-weight-bold">Position</th>
                                                                        <th class="font-weight-bold" >CPA Reg.No/Qualification</th>
                                                                        <th class="font-weight-bold" >Public Private Reg.No</th>
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

                                            <div class="row  pl-4 mt-2 border-bottom">
                                                <!-- <div class="col-md-2"></div> -->
                                                <label class="col-md-4 col-form-label" style="font-weight:bold">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                                <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <span id="name_sole_proprietor"></span>
                                                        <!-- <input type="text" name="township" class="form-control" autocomplete="off"> -->
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
                                                <div class="col-md-1"></div>
                                                <div class="col-md-11">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_audit_total_staff" class="table table-bordered text-nowrap">
                                                                <thead>
                                                                    <tr disabled>
                                                                        <th class="font-weight-bold" ></th>
                                                                        <th class="font-weight-bold">Total</th>
                                                                        <th class="font-weight-bold">Audit Staff</th>
                                                                        <th class="font-weight-bold">Non-Audit Staff</th>
                                                                        
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody id="tbl_audit_total_staff_body">
                                                                    
                                                                </tbody>
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
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-11">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <table id="tbl_audit_staff" class="table table-bordered text-nowrap">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="font-weight-bold" ></th>
                                                                            <th class="font-weight-bold">Total</th>
                                                                            <th class="font-weight-bold" >Full Time</th>
                                                                            <th class="font-weight-bold" >Part Time</th>
                                                                            
                                                                        </tr>
                                                                        
                                                                    </thead>
                                                                    <tbody id="tbl_audit_staff_body">
                                                                       
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-4 mt-2">
                                                    <!-- <label class="col-md-1 col-form-label">{{ __('11') }}</label> -->
                                                    <label class="col-md-12 col-form-label font-weight-bold">{{ __('Types Of Service Provided') }}</label>
                                                    
                                                </div>
                                                <div class="row type_service_provided border-bottom"></div><br/>

                                                <div class="row pl-4 mt-2">
                                                    <!-- <label class="col-md-1 col-form-label">{{ __('12') }}</label> -->
                                                    <label class="col-md-4 col-form-label font-weight-bold">{{ __('Declaration') }}</label>
                                                    <label class="col-md-1 col-form-label">{{ __(':') }}</label>
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <span id="declaration"></span>
                                                            <!-- I <input type="text" name="declaration" class="" autocomplete="off" >
                                                            (sole proprietor/ managing partner) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct. -->
                                                        </div>
                                                    </div>
                                                
                                                
                                                
                                                </div>
                                            
                                                <!-- <div class="row">
                                                    <div class="col-md-11 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-primary btn-round" form="audit_firm_form">{{ __('Save') }}</button>
                                                    </div>
                                                </div> -->

                                                <div class="row mt-5 justify-content-center"> 
                                                    <button type="submit" name="save" class="btn btn-primary" onclick="approveAuditFirm()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>

                                                    <button type="submit" name="save" class="btn btn-danger"  onclick="rejectAuditFirm()" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
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
    loadTypeOfService();
    loadAuditTotalStaff();
    loadAuditStaff();
    autoLoadAudit();
</script>
@endpush
