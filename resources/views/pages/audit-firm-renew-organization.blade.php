@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'audit-firm-renew-organization'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-renew-organization') }}
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
                                                <label class="col-md-1 col-form-label">{{ __('2') }}</label>
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
                                                <label class="col-md-1 col-form-label">{{ __('3') }}</label>
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
                                                    <label class="col-md-1 col-form-label">{{ __('4') }}</label>
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
                                                    <label class="col-md-1 col-form-label">{{ __('5') }}</label>
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
