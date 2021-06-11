@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'school-register-form3'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('school-register-form3') }}
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
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)နှင့်ကျောင်းစီမံအုပ်ချုပ်သူများ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_founder table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">ဆက်သွယ်ရန်လိပ်စာ</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolFounder("school_founder")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" value="" name="school_founder_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_founder_passort[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_address[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_founder_phone[]" class="form-control">
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
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-10 col-form-label">{{ __('ကျောင်းစီမံအုပ်ချုပ်သူများ') }}</label>
	                                      
	                                    </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_manager table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">တာဝန်</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolManager("school_manager")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" value="" name="school_manager_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_manager_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_duty[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_manager_phone[]" class="form-control">
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
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('အဖွဲ့အစည်း၏အလုပ်အမှုဆောင်အဖွဲ့ဝင်များ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_executive table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">CPA(P)/CPA(FF)PPA No.</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">တာဝန်</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolExecutive("school_executive")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" value="" name="school_executive_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_executive_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_cpa[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_duty[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_executive_phone[]" class="form-control">
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
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-10 col-form-label">{{ __('သင်တန်းဆရာများ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ') }}</label>
	                                      
	                                    </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="myTable" class="table school_teacher table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="less-font-weight" rowspan="2">စဥ်</th>
                                                                    <th class="less-font-weight" rowspan="2">အမည်</th>
                                                                    <th class="less-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">သင်တန်းဆရာမှတ်ပုံတင်အမှတ်</th>
                                                                    <th class="less-font-weight" rowspan="2">ပညာအရည်အချင်း</th>
                                                                    <th class="less-font-weight" rowspan="2">သင်ကြားမည့်ဘာသာရပ်(များ)</th>
                                                                    <th class="less-font-weight" rowspan="2">ဖုန်းနံပါတ်/အီးမေးလ်</th>
                                                                    <th class="less-font-weight" rowspan="2" style="text-align: right;">
                                                                        <input type="button" class="btn btn-primary btn-sm" onclick='addRowSchoolTeacher("school_teacher")' value="+">
                                                                    </th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" value="" name="school_teacher_name[]" class="form-control"></td>
                                                                    <td><input type="text" value="" name="school_teacher_passport[]" class="form-control"></td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_tp[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_qual[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_subject[]" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                    <input type="text" value="" name="school_teacher_phone[]" class="form-control">
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
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-8 col-form-label"></label>
                                            <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" id="date" class="form-control" >
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
    
    $(document).ready(function (e) {
        createDatepicker("school_birthone");
        
        
    });

</script>
@endpush
