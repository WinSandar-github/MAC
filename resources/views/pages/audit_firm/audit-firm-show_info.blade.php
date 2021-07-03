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
            <form >
           
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                                <label class="col-md-1 form-label">{{ __('1') }}</label>
                                                <label class="col-md-2 form-label">{{ __('Accountancy Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="hidden" value="1" name="audit_firm_type_id">
                                                        <input type="hidden" value="1" name="local_foreign_id">
                                                        <input type="text" name="accountancy_firm_reg_no" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Name') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_name"  class="form-control " readonly autocomplete="off">
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
                                                        <input type="text" name="township" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="post_code" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="state" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="text" name="phone_no" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="website" class="form-control" readonly autocomplete="off">
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
                                                        <table id="tbl_branch" class="table text-nowrap" >
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight">Name</th>
                                                                    <th class="less-font-weight">Township</th>
                                                                    <th class="less-font-weight">Post Code</th>
                                                                    <th class="less-font-weight">City</th>
                                                                    <th class="less-font-weight">State</th>
                                                                    <th class="less-font-weight">Telephone Number</th>
                                                                    <th class="less-font-weight">Email</th>
                                                                    <th class="less-font-weight">Website</th>
                                                                    <th >
                                                                        
                                                                        
                                                                    </th>
                                                                </tr>
                                                            <thead>
                                                            <tbody id="tbl_branch_body" class="hoverTable"></tbody>
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
                                                        <input type="radio" name="org_stru_id" id="sole_radio" autofocus value="1" >
                                                        <label class="form-check-label">Sole Proprietorship</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id" id="partnership_radio" autofocus value="2" >
                                                        <label class="form-check-label">Partnership</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id" id="company_radio"  autofocus value="3" >
                                                        <label class="form-check-label">Company Incorporated</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="">
                                                        <input type="radio" name="org_stru_id" id="other" autofocus value="4" >
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
                                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls1">
                                                                        <div class="entry1">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="ppa_certis"></span>  
                                                                                    
                                                                                </div>
                                                                                
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="letterheads"></span>                                                                   
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_clearances"></span>                                                                          
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(d)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls4">
                                                                        <div class="entry4">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="representatives"></span>                                                                          
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
                                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate all partners</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls9">
                                                                        <div class="entry9">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    
                                                                                    <span class="ppa_certis"></span>
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="certi_or_regs"></span>
                                                                                    
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="deeds_memos"></span>
                                                                                    
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="letterheads"></span>
                                                                                    
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_clearances"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(f)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls14">
                                                                        <div class="entry14">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="representatives"></span>
                                                                                    
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
                                                                            <label class="form-label">(a)Copy of Public Practice Accountant Certificate all shareholders</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls19">
                                                                        <div class="entry19">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="ppa_certis"></span>
                                                                                    
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="certificate_incors"></span>
                                                                                    
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
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="memorandums"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(d)Copy of Form 6, Form 26 and Form E</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls22">
                                                                        <div class="entry22">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="form6_26e"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(e)Copy of Form A1 and/or Additional Form</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls23">
                                                                        <div class="entry23">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="form_a1"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(f)Copy of commercial tax registration certificate</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls24">
                                                                        <div class="entry24">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="tax_reg_certificate"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(g)Copy of stationery/letterhead to be used in signing of auditor's report</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls25">
                                                                        <div class="entry25">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto ">
                                                                                    <span class="letterheads"></span>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(h)Copy of Tax clearance from Internal Revenue Department</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls26">
                                                                        <div class="entry26">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                    
                                                                                    <span class="tax_clearances"></span>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">(i)Representative Letter and Copy of representative's NRC Card if Not Self-Registration</label>
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                    <div class="controls27">
                                                                        <div class="entry27">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-11 col-auto">
                                                                                   
                                                                                    <span class="representatives"></span>
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
                                                <label class="col-md-1 col-form-label">{{ __('6') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_partner" class="table text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr</th>
                                                                        <th class="less-font-weight" >Name</th>
                                                                        <th class="less-font-weight" >Public Private Reg.No</th>
                                                                        <th class="less-font-weight">Have authority to sing Auditors' report?</th>
                                                                        <th class="less-font-weight" >
                                                                            
                                                                            
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
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('7') }}</label>
                                                <label class="col-md-4 col-form-label">{{ __('Director(s)/Officer(s)') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="tbl_director" class="table text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="less-font-weight">Sr</th>
                                                                        <th class="less-font-weight">Name</th>
                                                                        <th class="less-font-weight">Position</th>
                                                                        <th class="less-font-weight" >CPA Reg.No/Qualification</th>
                                                                        <th class="less-font-weight" >Public Private Reg.No</th>
                                                                        <th class="less-font-weight" style="text-align: right;">
                                                                           
                                                                            
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
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('8') }}</label>
                                                <label class="col-md-10 col-form-label">{{ __('Name Of Sole Proprietor/Managing Partner') }}</label>
                                                
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" name="name_sole_proprietor" class="form-control" autocomplete="off" readonly>
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
                                                            <table class="table text-nowrap">
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
                                                                        <td><input type="number" name="ats_total[]" id="principal_total" class="form-control" readonly></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="principal_audit" class="form-control" readonly></td>
                                                                        <td>
                                                                            <input type="number" name="ats_non_audit_staff[]" id="principal_non_audit" class="form-control" readonly>
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of directors who are not principals/ partners
                                                                        </td>
                                                                        <td><input type="number" name="ats_total[]" id="non_principal_total" class="form-control" readonly></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="non_principal_audit" class="form-control" readonly></td>
                                                                        <td>
                                                                            <input type="number" name="ats_non_audit_staff[]" id="non_principal_non_audit" class="form-control" readonly>
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of managerial level staff
                                                                        </td>
                                                                        <td><input type="number" name="ats_total[]" id="managerial_level_total" class="form-control" readonly></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="managerial_level_audit" class="form-control" readonly></td>
                                                                        <td>
                                                                            <input type="number" name="ats_non_audit_staff[]" id="managerial_level_non_audit" class="form-control" readonly>
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        No of non-mangerial level
                                                                        </td>
                                                                        <td><input type="number"  name="ats_total[]" id="non-mangerial_level_total" class="form-control" readonly></td>
                                                                        <td><input type="number" name="ats_audit_staff[]" id="non-mangerial_level_audit" class="form-control" readonly></td>
                                                                        <td>
                                                                            <input type="number" name="ats_non_audit_staff[]" id="non-mangerial_level_non_audit" class="form-control" readonly>
                                                                            
                                                                        </td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        Total Staff
                                                                        </td>
                                                                        <td><input type="text"   id="total_staff_total" class="form-control" disabled></td>
                                                                        <td><input type="text"  id="total_staff_audit" class="form-control" disabled></td>
                                                                        <td>
                                                                            <input type="text"  id="total_staff_non_audit" class="form-control" disabled>
                                                                            
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
                                                                <table class="table text-nowrap">
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
                                                                            <td><input type="number" name="as_total[]" id="director_total" class="form-control" disabled></td>
                                                                            <td><input type="number" name="as_full_time[]" id="director_full_time" class="form-control" disabled></td>
                                                                            <td>
                                                                                <input type="number" name="as_part_time[]" id="director_part_time" class="form-control" disabled> 
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit managers
                                                                            </td>
                                                                            <td><input type="number" name="as_total[]" id="audit_manager_total" class="form-control" disabled></td>
                                                                            <td><input type="number" name="as_full_time[]" id="audit_manager_full_time" class="form-control" disabled></td>
                                                                            <td>
                                                                                <input type="number" name="as_part_time[]" id="audit_manager_part_time" class="form-control" disabled>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                No of audit seniors
                                                                            </td>
                                                                            <td><input type="number" name="as_total[]" id="audit_senior_total" class="form-control" disabled></td>
                                                                            <td><input type="number" name="as_full_time[]" id="audit_senior_full_time" class="form-control" disabled></td>
                                                                            <td>
                                                                                <input type="number" name="as_part_time[]" id="audit_senior_part_time" class="form-control" disabled>
                                                                                
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
                                                                            <td><input type="number"  name="as_total[]" id="audit_assistant_cpa_total" class="form-control"  disabled></td>
                                                                            <td><input type="number" name="as_full_time[]" id="audit_assistant_cpa_full_time" class="form-control"  disabled></td>
                                                                            <td>
                                                                                <input type="number" name="as_part_time[]" id="audit_assistant_cpa_part_time" class="form-control"  disabled>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td><input type="number" name="as_total[]" id="audit_assistant_others_total" class="form-control"  disabled></td>
                                                                            <td><input type="number" name="as_full_time[]" id="audit_assistant_others_full_time" class="form-control"  disabled></td>
                                                                            <td>
                                                                                <input type="number"name="as_part_time[]" id="audit_assistant_others_part_time" class="form-control"  disabled>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Total Audit Staff
                                                                            </td>
                                                                            <td><input type="text"  id="audit_staff_total" class="form-control" disabled></td>
                                                                            <td><input type="text"  id="audit_staff_full_time" class="form-control" disabled></td>
                                                                            <td>
                                                                                <input type="text" id="audit_staff_part_time" class="form-control" disabled>
                                                                                
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
                                                            <input type="radio" name="t_s_p_id" id="type_audit" value="1">
                                                            <label class="form-check-label">Audit</label>
                                                    
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="t_s_p_id" id="type_nonaudit" value="2" >
                                                        <label class="form-check-label">Non Audit</label>
                                                        
                                                    </div>
                                                
                                                
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('12') }}</label>
                                                    <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            I <input type="text" name="declaration" class="" autocomplete="off" disabled>
                                                            (sole proprietor/ managing partner) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
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
    autoLoadAudit();
</script>
@endpush
