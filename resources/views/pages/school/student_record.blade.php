@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp

@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student_record'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ url('student_record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Create Profile') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="အမည်" required>
                                    </div>
{{--                                    @error('name')--}}
{{--                                        <div class="alert alert-danger mt-1">--}}
{{--                                            {{$message}}--}}
{{--                                        </div>--}}
{{--                                    @enderror--}}
{{--                                    @if ($errors->has('name'))--}}
{{--                                        <span class="invalid-feedback" style="display: block;" role="alert">--}}
{{--                                            <strong>{{ $errors->first('name') }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                <div class="col-md-8" >
                                    <div class="row" style="padding-top: 0px; margin-top: 0px;">
                                        <div class="col-md-2 col-5 pr-1">
                                            <select class="form-control" name="nrc_state_region" id="nrc_state_region" style="padding-top: 0px; margin-top: 0px !important; margin-bottom: 0px;">
                                                {{-- <option value="" disabled selected></option> --}}
                                              @foreach($nrc_regions as $region)
                                                      <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                          {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                      </option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-7 px-1">
                                            <select class="form-control" name="nrc_township" id="nrc_township" style="margin-top: 0px; margin-bottom: 0px;">
                                                {{-- <option value="" disabled selected></option> --}}
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
                                                {{-- <option value="" disabled selected></option> --}}
                                              @foreach($nrc_citizens as $citizen)
                                              <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                  {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                              </option>
                                              @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-5 col-7 pl-1">
                                            <input type="text" name="nrc_number" pattern=".{6,6}" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  maxlength="6" minlength="6" placeholder="" style="height: 38px">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <input type="text" name="nrc_no" class="form-control" placeholder="နိုင်ငံသားစီစစ်ရေးကတ်ပြား" required>
                                    </div> --}}
                                    {{-- @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အသက်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="age" class="form-control" placeholder="အသက်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ရာထူးအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_position" class="form-control" placeholder="ရာထူးအမည်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လစာနှုန်း') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="current_salary" class="form-control" placeholder="လစာနှုန်း" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
                                <div class="col-md-8">
                                    <table class="table student_profile table-bordered input-table">
                                        <tbody>
                                            <tr>
                                                <td class="border-color"><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>
                                                <td class="border-color"><input type="button" class="btn btn-primary btn-sm btn-plus" id="student_add" value="+"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမှုထမ်းသောရုံးစိုက်ရာတိုင်းဒေသကြီး/ပြည်နယ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
{{--                                        <input type="text" name="current_job_region" class="form-control" placeholder="အမှုထမ်းသောရုံးစိုက်ရာတိုင်းဒေသကြီး/ပြည်နယ်" required>--}}
                                        <select name="current_job_region" id="current_job_region" class="form-control" required>
                                            @foreach($regions as $region)
                                                <option value="{{$region['id']}}">{{$region['region_name_mm']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('Training ပေးသောသင်တန်းများ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="training_class" id="training_class" class="form-control">
                                            @foreach($training_classes as $training_class)
                                                <option value="{{ $training_class['id'] }}" height="30">{{ $training_class['training_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်ဖုန်းနံပါတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="contact_number" class="form-control" placeholder="ဆက်သွယ်ရန်ဖုန်းနံပါတ်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('e-mail လိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="e-mail လိပ်စာ" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
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
    <script>
        $(document).ready(function () {
            var counter = 0;

                $("#student_add").on("click", function () {
                      // alert('hello world');
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td class="border-color"><input type="text" class="form-control" name="education[] placeholder="ပညာအရည်အချင်း"/></td>';
                    cols += '<td class="border-color"><input type="button" class="student_delete btn btn-sm btn-danger "  value="X"></td>';
                    newRow.append(cols);
                    $("table.student_profile").append(newRow);
                    counter++;
                });



                $("table.student_profile").on("click", ".student_delete", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });
            });
    </script>
@endpush
