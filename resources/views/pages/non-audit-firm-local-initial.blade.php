@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'non-audit-firm-local-initial'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non-audit-firm-local-initial') }}
            </div>
        </div>
            <form action="" method="post">
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
                                                        <input type="text" name="foreign_firm_register_no" class="form-control" placeholder="Firm Registration No" >
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
                                                <label class="col-md-2 col-form-label">{{ __('Firm Name') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="foreign_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Firm Name" autofocus>
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
                                                                        <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowBranch("branch_non_audit")' value="+"></th>
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
                                                                            <input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addInputTele("branch_non_audit")' value="+">
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
                                                                            <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                                <input type="button" class="btn btn-primary btn-sm" onclick='addRowPartnerByNonAudit("non_partner")' value="+">
                                                                            </th>
                                                                        </tr>
                                                                        
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><input type="text" value="" name="non_partner_name[]" class="form-control"></td>
                                                                            <td><input type="text" value="" name="non_partner_passport[]" class="form-control"></td>
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
                                                                            <th class="less-font-weight" >Passport/ CSC No.</th>
                                                                            <th class="less-font-weight" style="text-align: right;">
                                                                                <input type="button" class="btn btn-primary btn-sm" onclick='addRowDirectorByNonAudit("non_director")' value="+">
                                                                            </th>
                                                                        </tr>
                                                                        
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><input type="text" value="" name="non_director_name[]" class="form-control"></td>
                                                                            <td><input type="text" value="" name="non_director_position[]" class="form-control"></td>
                                                                            <td><input type="text" value="" name="non_director_csc_no[]" class="form-control"></td>
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
                                                            <input type="radio" name="org_structure" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="1">
                                                            <label class="form-check-label">Sole Proprietorship</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="">
                                                            <input type="radio" name="org_structure" class="@error('date_of_birth') is-invalid @enderror" autofocus value="2" >
                                                            <label class="form-check-label">Partnership</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <input type="radio" name="org_structure" class="@error('date_of_birth') is-invalid @enderror" autofocus value="3">
                                                            <label class="form-check-label">Company Incorporated</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="">
                                                            <input type="radio" name="org_structure" class="@error('date_of_birth') is-invalid @enderror" autofocus value="4">
                                                            <label class="form-check-label">Others</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card" id="sole_proprietorship">
                                                            <div class="card-body">
                                                                <table id="myTable" class="table non_director table-bordered">
                                                                    <thead></thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('1.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of letterhead seal to be used')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('2.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('1 Passport size photo')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('3.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Profile of the owner')}}</th>
                                                                            <th class="less-font-weight" width="405%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('4.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificate')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('5.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Letter outlining past work experience')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr> 
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('6.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of owner’s NRC Card/ Passport')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('7.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Tax clearance from Internal Revenue Department')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" >
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('8.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('ကိုယ်တိုင်လျှောက်ထားခြင်းမဟုတ်ပါကကိုယ်စားလှယ်လွှဲစာ နှင့် နိုင်ငံသားစိစစ်ရေး ကတ်ပြား (မိတ္တူ)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>                                                                                                                                            
                                                                    </tbody>
                                                                </table>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"  >
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card" id="partnership">
                                                            <div class="card-body">
                                                                <table id="myTable" class="table non_director table-bordered">
                                                                    <thead></thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('1.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Certificate or Registration, if any')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('2.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of signed Partnership Deeds/ Memorandum of Agreement')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('3.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of letterhead to be used')}}</th>
                                                                            <th class="less-font-weight" width="405%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('4.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Passport size photos of the all partners')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('5.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Profiles of the all partners')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr> 
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('6.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificates of the all partners')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('7.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Letter outlining past work experiences of the all partners')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('8.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of owner’s NRC Card/ Passport')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('9.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Tax clearance from Internal Revenue Department')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('10.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('ကိုယ်တိုင်လျှောက်ထားခြင်းမဟုတ်ပါကကိုယ်စားလှယ်လွှဲစာ နှင့် နိုင်ငံသားစိစစ်ရေး ကတ်ပြား (မိတ္တူ)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>                                                                                                                                            
                                                                    </tbody>
                                                                </table>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"  >
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card" id="company_incorporated">
                                                            <div class="card-body">
                                                                <table id="myTable" class="table non_director table-bordered">
                                                                    <thead></thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('1.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Certificate of Incorporation (company incorporated in Myanmar)/ Certificate of Registration (branch office registered in Myanmar)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('2.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Permit under Section 27A of Myanmar Companies Act (Foreign Company များအတွက်သာ)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('3.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of recent audited financial statements')}}</th>
                                                                            <th class="less-font-weight" width="405%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('4.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of commercial tax registration certificate')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('5.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of letterhead to be used')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr> 
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('6.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificates of the professional staff')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('7.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Letter outlining past work experiences of the professional staff')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('8.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of shareholder’s and directors’ NRC Card/ Passport ')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('9.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Tax clearance from Internal Revenue Department')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('10.') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('ကိုယ်တိုင်လျှောက်ထားခြင်းမဟုတ်ပါကကိုယ်စားလှယ်လွှဲစာ နှင့် နိုင်ငံသားစိစစ်ရေး ကတ်ပြား (မိတ္တူ)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>                                                                                                                                            
                                                                    </tbody>
                                                                </table>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <div class="card" id="other" >
                                                            <div class="card-body" >
                                                                <table id="myTable" class="table non_director table-bordered">
                                                                    <thead></thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(က)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of letterhead seal to be used')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ခ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('1 Passport size photo')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဂ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Profile of the owner')}}</th>
                                                                            <th class="less-font-weight" width="405%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဃ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificate')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဃ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificate')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဃ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Education Certificate')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(င)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Letter outlining past work experience')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr> 
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(စ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of owner’s NRC Card/ Passport')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဆ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('Copy of Tax clearance from Internal Revenue Department')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="less-font-weight" width="5%">{{ __('(ဇ)') }}</th>
                                                                            <th class="less-font-weight" width="55%">{{ __('ကိုယ်တိုင်လျှောက်ထားခြင်းမဟုတ်ပါကကိုယ်စားလှယ်လွှဲစာ နှင့် နိုင်ငံသားစိစစ်ရေး ကတ်ပြား (မိတ္တူ)')}}</th>
                                                                            <th class="less-font-weight" width="40%">
                                                                                <div class="input-group mb-3">                                                        
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                                                        <label class="custom-file-label" >Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </th>                                                                            
                                                                        </tr>                                                                                                                                            
                                                                    </tbody>
                                                                </table>                                                                
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
                                                            <input type="text" name="managing_director_name"  class="form-control  @error('name') is-invalid @enderror"  autofocus>
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
                                                                            <td>
                                                                                No of directors who are alse shareholders
                                                                            </td>
                                                                            <td><input type="number" value="" name="shareholder_no" id="principal_total" class="form-control"></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            No of directors who are not shareholders
                                                                            </td>
                                                                            <td><input type="number" value="" name="non_shareholder_no" id="non_principal_total" class="form-control"></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            No of managerial level staff
                                                                            </td>
                                                                            <td><input type="number" value="" name="managerial_level_number" id="managerial_level_number" class="form-control"></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            No of non-mangerial level
                                                                            </td>
                                                                            <td><input type="number" value="" name="non-mangerial_level_number" id="non-mangerial_level_number" class="form-control"></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            Total Staff
                                                                            </td>
                                                                            <td><input type="number" value="" name="total_staff_number" id="total_staff_number" class="form-control"></td>
                                                                            
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
                                                                                    <input type="radio" name="t_s_p_id" id="accounting_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="3">
                                                                                    <label class="form-check-label">Accounting</label>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" name="t_s_p_id" id="advisory_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="4">
                                                                                    <label class="form-check-label">Advisory</label>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" name="t_s_p_id" id="taxation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="5">
                                                                                    <label class="form-check-label">Taxation</label>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" name="t_s_p_id" id="liquidation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="6">
                                                                                    <label class="form-check-label">Liquidation</label>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" name="t_s_p_id" id="accounting_system_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="7">
                                                                                    <label class="form-check-label">Accounting System</label>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="radio" name="t_s_p_id" id="other_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="8">
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
                                                            I <input type="text" name="declaration_name" id="declaration_name" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="">
                                                            (managing director) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    </div>
                                                
                                                    <div class="row">
                                                        <div class="col-md-8"></div>
                                                        <div class="col-md-1">
                                                            <label class="form-check-label text-right">Date:</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                        
                                                            <div class="form-group">
                                                                
                                                                <input type="date" name="foreign_date" id="foreign_date" class="form-control @error('date_of_birth') is-invalid @enderror" autofocus value="">
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
<script>
    $(document).ready(function(){
        $('input[name="org_structure"]').click(function(){
            var org_str_value = $(this).val();
            if(org_str_value == 1){
                document.getElementById("sole_proprietorship").style.display = "block";
                document.getElementById("partnership").style.display = "none";
                document.getElementById("company_incorporated").style.display = "none";
                document.getElementById("other").style.display = "none";
            }
            else if(org_str_value == 2){
                document.getElementById("sole_proprietorship").style.display = "none";
                document.getElementById("partnership").style.display = "block";
                document.getElementById("company_incorporated").style.display = "none";
                document.getElementById("other").style.display = "none";
            }
            else if(org_str_value == 3){
                document.getElementById("sole_proprietorship").style.display = "none";
                document.getElementById("partnership").style.display = "none";
                document.getElementById("company_incorporated").style.display = "block";
                document.getElementById("other").style.display = "none";
            }
            else if(org_str_value == 4){
                document.getElementById("sole_proprietorship").style.display = "none";
                document.getElementById("partnership").style.display = "none";
                document.getElementById("company_incorporated").style.display = "none";
                document.getElementById("other").style.display = "none";
            }
            
                
            
            
        });
    });
    </script>

@endpush
