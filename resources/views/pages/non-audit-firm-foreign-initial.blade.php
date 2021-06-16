@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'non-audit-firm-foreign-initial'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non-audit-firm-foreign-initial') }}
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
                                                <label class="col-md-2 col-form-label">{{ __('Foreign Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="foreign_firm_register_no" class="form-control" placeholder="Foreign Firm Registration No" >
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
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
                                                            <table class="table branch_foreign_initial table-bordered input-table">
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
                                                                        <th ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowBranch("branch_foreign_initial")' value="+"></th>
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
                                                                            <input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addInputTele("branch_foreign_initial")' value="+">
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
                                                                <table id="myTable" class="table non_partner_foregin_intial table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="less-font-weight" rowspan="2">Sr</th>
                                                                            <th class="less-font-weight" rowspan="2">Name</th>
                                                                            <th class="less-font-weight" rowspan="2">Passport/ CSC No./ Incorporation Certificate</th>
                                                                            <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                                <input type="button" class="btn btn-primary btn-sm" onclick='addRowPartnerByNonAudit("non_partner_foregin_intial")' value="+">
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
                                                                <table id="myTable" class="table non_director_foreign_initial table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="less-font-weight">Sr</th>
                                                                            <th class="less-font-weight">Name</th>
                                                                            <th class="less-font-weight">Position</th>
                                                                            <th class="less-font-weight" >Passport/ CSC No.</th>
                                                                            <th class="less-font-weight" style="text-align: right;">
                                                                                <input type="button" class="btn btn-primary btn-sm" onclick='addRowDirectorByNonAudit("non_director_foreign_initial")' value="+">
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
                                                    <label class="col-md-10 col-form-label">{{ __('Particulars Of Directors/ Staff Members Who Is A Myanmar CPA') }}</label>
                                                    
                                                </div>
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <table id="myTable" class="table director_cpa_initial table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="less-font-weight" rowspan="2">Sr</th>
                                                                                <th class="less-font-weight" rowspan="2">Name</th>
                                                                                <th class="less-font-weight" rowspan="2">Position</th>
                                                                                <th class="less-font-weight" rowspan="2">CPA(Passed Reg.No)</th>
                                                                                <th class="less-font-weight" rowspan="2">CPA (Full-fiedged) Reg.No</th>
                                                                                <th class="less-font-weight" rowspan="2">Public Practice Reg.No</th>
                                                                                <th class="less-font-weight" style="text-align: right;">
                                                                                    <input type="button" class="btn btn-primary btn-sm" onclick='addRowDirectorCPA("director_cpa_initial")' value="+">
                                                                                </th>
                                                                            </tr>
                                                                            
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td><input type="text" value="" name="director_cpa_name[]" class="form-control"></td>
                                                                                <td><input type="text" value="" name="director_cpa_position[]" class="form-control"></td>
                                                                                <td><input type="text" value="" name="director_cpa_pass_no[]" class="form-control"></td>
                                                                                <td><input type="text" value="" name="director_cpa_full_no[]" class="form-control"></td>
                                                                                <td><input type="text" value="" name="director_cpa_public_no[]" class="form-control"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <label class="col-md-1 col-form-label">{{ __('11') }}</label>
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
                                                    <label class="col-md-1 col-form-label">{{ __('12') }}</label>
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

@endpush
