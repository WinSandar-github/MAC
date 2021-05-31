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
            <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
									<ul class="nav nav-tabs nav-justified pl-0 active_tab col-md-12 no-gutters" role="tablist">
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link active pl-0 pr-2" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
		                                  FOREIGN FIRM INFORMATION
		                                  </a>
		                              </li>
		                              <li class="nav-item col-md-6">
		                                  <a class="nav-link pl-0 pr-2" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
		                                      Organization Structure
		                                  </a>
		                              </li>
		                              
		                              
		                            </ul>
                            	<div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
	                              <div class="tab-pane fade show active" id="link1" aria-expanded="true">
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Foreign Firm Registration No') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="foreign_firm_register_no" class="form-control" placeholder="Foreign Firm Registration No" oninput="this.value=this.value.replace(/[^က-အ၀-၉]/g,'')">
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Foreign Firm Name') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="foreign_firm_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Foreign Firm Name" autofocus>
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
	                                      <div class="col-md-8">
                                            <table class="table student_profile table-bordered input-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-color"><input type="text" class="form-control" name="branch_office[]" placeholder="Branch Office"/></td>
                                                        <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="branch_add" value="+"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
	                                      </div>
	                                  </div>
	                                  
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
	                                      <label class="col-md-4 col-form-label">{{ __('Sole Proprietor/Partners/Shareholders') }}</label>
	                                      
	                                  </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table profile table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">Sr</th>
                                                                    <th class="less-font-weight" rowspan="2">Name</th>
                                                                    <th class="less-font-weight" rowspan="2">Passport/ CSC No./ Incorporation Certificate</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" id="add" value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="partner_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="partner_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="partner_passport[]" class="form-control"></td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('6။') }}</label>
	                                      <label class="col-md-4 col-form-label">{{ __('Director(s)/Officer(s)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table profile table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight">Sr</th>
                                                                    <th class="less-font-weight">Name</th>
                                                                    <th class="less-font-weight">Position</th>
                                                                    <th class="less-font-weight" >Passport/ CSC No.</th>
                                                                    <th class="less-font-weight" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" id="add" value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="diector_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="diector_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="position[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="csc_no[]" class="form-control"></td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
	                                  
	                                  
	                                 
	                              </div>
                                  <div class="tab-pane fade" id="link2" aria-expanded="true">
                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('1။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Organization Structure') }}</label>
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
                                          
	                                  </div>
                                      <div class='row'>
                                        <div class='col-md-3'></div>
                                        <div class="col-md-2">
	                                          <div class="">
	                                              <input type="checkbox" name="others" class="@error('date_of_birth') is-invalid @enderror" autofocus value="Others">
                                                  <label class="form-check-label">Others</label>
	                                          </div>
	                                      </div>
                                      </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('2။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Name Of Managing Director') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="managing_director_name"  class="form-control  @error('name') is-invalid @enderror" placeholder="Name Of Managing Director" autofocus>
	                                          </div>
	                                      </div>
	                                  </div>
	                                  
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('3။') }}</label>
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
	                                      <label class="col-md-1 col-form-label">{{ __('4။') }}</label>
	                                      <label class="col-md-4 col-form-label">{{ __('Particulars Of Directors/ Staff Members Who Is A Myanmar CPA') }}</label>
	                                      
	                                  </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table profile table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">Sr</th>
                                                                    <th class="less-font-weight" rowspan="2">Position</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(Passed Reg.No)</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA (Full-fiedged) Reg.No</th>
                                                                    <th class="less-font-weight" rowspan="2">Public Practice Reg.No</th>
                                                                    <th class="less-font-weight" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" id="add" value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" value="" name="diector__cpa_sr[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="diector__cpa_position[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="diector__cpa_pass_no[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="diector__cpa_full_no[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="diector__cpa_public_no[]" class="form-control"></td>
                                                                    <td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
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
                                                                        <input type="checkbox" name="accounting_service" id="accounting_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="accounting_service">
                                                                        <label class="form-check-label">Accounting</label>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="advisory_service" id="advisory_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="advisory_service">
                                                                        <label class="form-check-label">Advisory</label>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="taxation_service" id="taxation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="taxation_service">
                                                                        <label class="form-check-label">Taxation</label>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="liquidation_service" id="liquidation_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="liquidation_service">
                                                                        <label class="form-check-label">Liquidation</label>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="accounting_system_service" id="accounting_system_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="accounting_system">
                                                                        <label class="form-check-label">Accounting System</label>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="other_service" id="other_service" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="other_service">
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
	                                      <label class="col-md-1 col-form-label">{{ __('5။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('Declaration') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              I <input type="text" name="declaration_name" id="declaration_name" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="">
                                                   (managing director) representing all the members of the firm, confirm that the particulars stated in this form, attached supporting documents are correct.
	                                          </div>
	                                      </div>
                                          
                                          
                                          
	                                    </div>
	                                 
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-check-label">Singnature:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-check-label">Date:</label>
                                                    <input type="text" name="foreign_date" id="foreign_date" class=" @error('date_of_birth') is-invalid @enderror" autofocus value="">
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
    
@endpush
