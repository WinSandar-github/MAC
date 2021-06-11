@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_pa_form2'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa_ff_pa_form1') }}
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
                                        <label class="col-md-12 col-form-label text-center" style="font-size: 18px; font-weight: bold;">REPUBLIC OF THE UNION OF MYANMAR</label>                                        
                                    </div>

                                    <div class="row">                                        
                                        <label class="col-md-12 col-form-label text-center" style="font-size: 18px; font-weight: bold;">MYANMAR ACCOUNTANCY COUNCIL</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="col-md-4"></div>                                
                                    </div><br> 

                                    <div class="row">                                        
                                        <label class="col-md-12 col-form-label text-center" style="font-size: 18px; font-weight: bold;">Certificate of Professional Account in Public Practice</label>                                        
                                    </div>

                                    <div class="row mt-5">                                                                                
                                        <div class="col-md-4">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label">{{ __('Serial No:') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="serial_no" class="form-control" placeholder="Serial No" required>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>
                                        <div class="col-md-4" style="margin-left: 316px;">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">{{ __('Date') }}</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div></br>

                                    <div class="row mt-5">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <label class="col-md-2 col-form-label">{{ __(',son/ daughter of') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="Father's Name" required>
                                            </div>
                                        </div>
                                        <label class="col-md-3 col-form-label">{{ __('holder of CSC Card No.') }}</label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="father_name_eng" class="form-control" placeholder="CSC Card No" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">   
                                        <div class="col-md-12">
                                            <label class=" col-form-label " >{{ __(',has been registered as Certified Public Accountant (Full-Fledged) under section 27 of the Myanmar Accountancy Council Law.') }}</label>
                                        </div>                           
                                    </div>

                                    <div class="row">   
                                        <div class="col-md-12">
                                            <label class=" col-form-label " >{{ __('He/She is permitted to engage as a Professional Accountant in Public Practice under sessions 49 and 51 of the Myanmar Accountancy Council Law.') }}</label>
                                        </div>                           
                                    </div>

                                    <div class="row">   
                                        <div class="col-md-12">
                                            <label class=" col-form-label " >{{ __('His/Her Business name is shown as below:') }}</label>
                                        </div>                           
                                    </div>

                                    <div class="row">  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="Business Name" required>
                                            </div>
                                        </div>                           
                                    </div>

                                    <div class="row mt-5">                                        
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3" style="margin-left: -11px;">                                                    
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputfile2" multiple>
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">                                            
                                                                                        
                                        </div>
                                        <div class="col-md-4 pt-5">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="Registrar Name" required>
                                            </div>
                                        </div>
                                    </div></br> 

                                    <div class="row mt-5">                                        
                                        <label class="col-md-12 col-form-label text-center" style="font-size: 16px; font-weight: bold;">YEARS VALID FOR REGISTRATION, NOT FOR AUDIT AND ASSURANCE SERVICE</label>                                        
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <table class="table cpa-pa table-bordered input-table">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th class="less-font-weight" rowspan="2" width="5%">Sr No.</th>
                                                        <th class="less-font-weight" colspan="2" width="30%">Period</th>
                                                        
                                                        <th class="less-font-weight" rowspan="2" width="30%">Receipt No. and date for which registration fees paid</th>
                                                        <th class="less-font-weight" rowspan="2" width="35%">Signature of the Registrar and Office Seal</th>
                                                        <th rowspan="2"><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowCPAPA("cpa-pa")' value="+"></th>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-color" width="15%">From</td>
                                                        <td class="border-color" width="15%">To</td>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                        </div>
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
<script type="text/javascript">
    $(document).ready(function (e) {
       $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

       $("input[name='register_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });

        $("input[name='date1']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date2']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date3']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date4']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date5']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date6']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });

       
    });
    </script>
    
@endpush
