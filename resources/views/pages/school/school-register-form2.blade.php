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
    'elementActive' => 'school_registration'
])

@section('content')
    <div class="content">
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('school-register-form2') }}
            </div>
        </div>--}}
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
                                <label class="col-md-2 col-form-label">{{ __('ကျောင်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name_two" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်ကြားမည့်သင်တန်း') }}</label>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">DA I</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">DA II</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">CPA I</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">CPA II</label>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ကျောင်းတည်နေရာလိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="father_name" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <label class="col-md-2 col-form-label">{{ __('ပိုင်ဆိုင်မှုပုံစံ') }}</label>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">ကိုယ်ပိုင်</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">အငှား</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">တွဲဖက်သုံး</label>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ကျောင်းခွဲတည်နေရာလိပ်စာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <label class="col-md-2 col-form-label">{{ __('ပိုင်ဆိုင်မှုပုံစံ') }}</label>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">ကိုယ်ပိုင်</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">အငှား</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="">
                                    <label class="form-check-label">တွဲဖက်သုံး</label>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                <label
                                    class="col-md-10 col-form-label">{{ __('ကျောင်းအဆောက်အဦး(အဆောက်အဦးအမျိုးအစား/အတိုင်းအတာ/အထပ်အရေအတွက်)') }}</label>

                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                <label
                                    class="col-md-10 col-form-label">{{ __('စာသင်ခန်း(အခန်းအရေအတွက်/အတိုင်းအတာ/ဝင်ဆန့်သင်တန်းသား/လေအေးပေးစက်)') }}</label>

                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                <label
                                    class="col-md-8 col-form-label">{{ __('သန့်စင်ခန်း(အမျိုးအစား/အရေအတွက်)}') }}</label>

                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                <label
                                    class="col-md-8 col-form-label">{{ __('စီမံရုံးခန်း(အခန်းအရေအတွက်/အတိုင်းအတာ)') }}</label>

                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-md-1 col-form-label"></label>
                                <label
                                    class="col-md-10 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>

                            </div>
                            <div class="row">
                                <label class="col-md-8 col-form-label"></label>
                                <label class="col-md-1 col-form-label">{{ __('အမည်') }}</label>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" id="date" class="form-control">
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
