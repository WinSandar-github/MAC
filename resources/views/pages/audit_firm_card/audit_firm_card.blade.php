@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp

@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'audit_firm_card'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('student_record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body m-5">
                            <div class="row">
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-4 col-form-label text-center" style="font-size: 16px; font-weight: bold;">မြန်မာနိုင်ငံစာရင်းကောင်စီ</label>
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-4 col-form-label text-center" style="font-size: 16px; font-weight: bold;">Myanmar Accountancy Council</label>
                                <label class="col-md-4 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                </div>
                                <div class="col-md-4"></div>                                
                            </div><br> 

                            <div class="row">
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-6 col-form-label text-center" style="font-size: 16px; font-weight: bold;">စာရင်းစစ်လုပ်ငန်းအမည်မှတ်ပုံတင်လက်မှတ်</label>
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                            </div>
                            
                            <div class="row">
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-6 col-form-label text-center" style="font-size: 16px; font-weight: bold;">Certificate Of Audit Firm Name Registration</label>
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">   
                                <div class="col-md-12">
                                    <label class=" col-form-label " style="font-size: 15px; font-weight: bold;">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီသည် အောက်ဖော်ပြပါလုပ်ငန်းအဖွဲ့အား မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၅၁ နှင့်အညီ စာရင်းစစ်လုပ်ငန်းအမည်မှတ်ပုံတင်လက်မှတ်ထုတ်ပေးလိုက်သည်။') }}</label>
                                </div>                           
                            </div>

                            <div class="row">   
                                <div class="col-md-12">
                                    <label class=" col-form-label " style="font-size: 15px; font-weight: bold;">{{ __('Myanmar Accountancy Council hereby issues this Certificate of Audit Firm Name to the following firm in accordance with section 51 of its Law.') }}</label>
                                </div>                               
                            </div>

                            <div class="row"> 
                                <div class="col-md-12">
                                    <table class="table student_profile_1 table-bordered input-table">
                                        <tbody>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('မှတ်ပုံတင်အမှတ်(Registration Number)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="register_number" placeholder="မှတ်ပုံတင်အမှတ်(Registration Number)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('ထုတ်ပေးသည့်ရက်စွဲ(Date of Issue)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="issue_date" placeholder="ထုတ်ပေးသည့်ရက်စွဲ(Date of Issue)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('လုပ်ငန်းအမည်(Name of Firm)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="firm_name" placeholder="လုပ်ငန်းအမည်(Name of Firm)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('လုပ်ငန်းအမျိုးအစား(Organizaton Structure)') }}</label></td>                                                
                                                <td class="border-color">
                                                    <div class="row ml-5">  
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="sole_pro" name="org_structure"/>
                                                            <label class="form-check-label mr-5" for="sole_pro">{{ __('Sole Proprietorship') }}</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="partnership" name="org_structure"/>
                                                            <label class="form-check-label" for="partnership">{{ __('Partership') }}</label>
                                                        </div>                                                                                                            
                                                    </div>
                                                    <div class="row ml-5">                                                        
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="yesStaff"/>
                                                            <label class="form-check-label mr-5" for="yesStaff">{{ __('Company incorporated') }}</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="noStaff"/>
                                                            <label class="form-check-label" for="noStaff">{{ __('Other') }}</label>
                                                        </div>                                                                                                           
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('တာဝန်ခံPAPP အမည်(Name of Responsible PAPP)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="papp_name" placeholder="တာဝန်ခံPAPP အမည်(Name of Responsible PAPP)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('တာဝန်ခံPAPP မှတ်ပုံတင်အမှတ်(Responsible PAPPs Reg.No)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="papp_reg_no" placeholder="တာဝန်ခံPAPP မှတ်ပုံတင်အမှတ်(Responsible PAPP's Reg.No)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('လုပ်ငန်းတည်နေရာ(Address)') }}</label></td>                                                
                                                <td class="border-color"><textarea class="form-control " name="" rows="3" placeholder="လုပ်ငန်းတည်နေရာ(Address)" required></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('သက်တမ်းကုန်ဆုံးရက်(Date of Expiry)') }}</label></td>                                                
                                                <td class="border-color"><input type="text" class="form-control" name="expire_date" placeholder="သက်တမ်းကုန်ဆုံးရက်(Date of Expiry)"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">   
                                <div class="col-md-12">
                                    <label class=" col-form-label " >{{ __('This certificate is issued to the Firm to facilitate engagement appointment and auditors report must be signed off by the engagement partner holding practicing certificate.') }}</label>
                                </div>                           
                            </div>                          

                            <div class="row">                                        
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="မှတ်ပုံတင်အရာရှိအမည်(Registrar)" required>
                                    </div>
                                </div>
                            </div></br>  

                            <div class="row ">
                                <div class="col-md-12 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                </div>
                            </div>                                                 
                            
                        </div>

                        <div class="card-footer">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // get NRC Townships data from myanmarnrc.php config file
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
        $("input[name='date_of_birth']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='issue_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='expire_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
    });

    </script>
@endpush
