@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp

@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'non_audit_firm_card'
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
                                <label class="col-md-6 col-form-label text-center" style="font-size: 16px; font-weight: bold;">အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်မှအပဖြစ်သော စာရင်းလုပ်ငန်းမှတ်ပုံတင်လက်မှတ် (နိုင်ငံသား)</label>
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                                <label class="col-md-6 col-form-label text-center" style="font-size: 16px; font-weight: bold;">Certificate Of Non_Audit Firm Registration (Citizen)</label>
                                <label class="col-md-3 col-form-label ">{{ __('') }}</label>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label" style="font-size: 15px; font-weight: bold;">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီသည် အောက်ဖော်ပြပါ လုပ်ငန်းအဖွဲ့/ပုဂ္ဂိုလ်အား မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၅၁ နှင့်အညီ အများပြည်သူ့သို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းမှအပဖြစ်သော စာရင်းစစ်လုပ်ငန်း (နိုင်ငံသား) မှတ်ပုံတင်လက်မှတ်ထုတ်ပေးလိုက်သည်။') }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label" style="font-size: 15px; font-weight: bold;">{{ __('Myanmar Accountancy Council hereby issues this Certificate of Non_Audit Firm (Citizen) to the following firm/person in accordance with section 51 of its Law.') }}</label>
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
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('တာဝန်ခံအမည်(Name of Representative)') }}</label></td>
                                                <td class="border-color"><input type="text" class="form-control" name="papp_name" placeholder="တာဝန်ခံPAPP အမည်(Name of Representative)"/></td>
                                            </tr>
                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('တာဝန်ခံ၏မှတ်ပုံတင်အမှတ်(Representatives Citizenship Scrutiny Card No)') }}</label></td>
                                                <td class="border-color">
                                                    <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                                        <div class="col-md-2 col-5 pr-1">
                                                            <select class="form-control" name="nrc_state_region" id="nrc_state_region" style="padding-top: 0px; margin-top: 0px !important; margin-bottom: 0px;">
                                                                @foreach($nrc_regions as $region)
                                                                    <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                                        {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 col-7 px-1">
                                                            <select class="form-control" name="nrc_township" id="nrc_township" style="margin-top: 0px; margin-bottom: 0px;">
                                                                @foreach($nrc_townships as $township)
                                                                    <option value="{{ $township['township_mm'] }}">
                                                                        {{ $township['township_mm'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-5 px-1">
                                                            <select class="form-control" name="nrc_citizen" id="nrc_citizen" style="margin-top: 0px; margin-bottom: 0px;">
                                                                @foreach($nrc_citizens as $citizen)
                                                                <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                                    {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-5 col-7 pl-1">
                                                            <input type="text" name="nrc_number" id="nrc_number" pattern=".{6,6}" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  maxlength="6" minlength="6" placeholder="" style="height: 38px">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border-color" width="30%"><label class="col-form-label">{{ __('ဝန်ဆောင်မှုလုပ်ငန်းအမျိုးအစား(Types of Services)') }}</label></td>
                                                <td class="border-color">
                                                    <div class="row ml-5">
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="sole_pro" name="service_type"/>
                                                            <label class="form-check-label mr-5" for="sole_pro">{{ __('Accounting') }}</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="partnership" name="service_type"/>
                                                            <label class="form-check-label" for="partnership">{{ __('Advisory') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row ml-5">
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="yesStaff" name="service_type"/>
                                                            <label class="form-check-label mr-5" for="yesStaff">{{ __('Taxation') }}</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="noStaff" name="service_type"/>
                                                            <label class="form-check-label" for="noStaff">{{ __('Liquidation') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row ml-5">
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="yesStaff" name="service_type"/>
                                                            <label class="form-check-label mr-5" for="yesStaff">{{ __('Acconting System') }}</label>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="noStaff" name="service_type"/>
                                                            <label class="form-check-label" for="noStaff">{{ __('Other') }}</label>
                                                        </div>
                                                    </div>
                                                </td>
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

                        <div class="card-footer ">

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
