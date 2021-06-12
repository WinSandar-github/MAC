@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'audit-firm-initial-accountancy'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-initial-accountancy') }}
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
                                                <label class="col-md-2 col-form-label">{{ __('Accountancy Firm Registration No') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="accountancy_firm_register_no" class="form-control" placeholder="Accountancy Firm Registration No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
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
                                                <label class="col-md-1 col-form-label">{{ __('5') }}</label>
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
