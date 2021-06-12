@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'papp_register_initial_form3'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('papp_register_initial_form3') }}
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
                                            <label class="col-md-6 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="pappinitial_datethree" placeholder="dd-mm-yyyy" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ကျွန်တော်/ကျွန်မ ဦး/ဒေါ်') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" >
                                                </div>
                                            </div>
                                            <label class="col-md-3 col-form-label">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-2 col-form-label">{{ __('ကိုင်ဆောင်သူ PA No.') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" >
                                                </div>
                                            </div>
                                            <label class="col-md-1 col-form-label">CPA No.</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" >
                                                </div>
                                            </div>
                                            <label class="col-md-1 col-form-label">သည် ၂၀</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">
                                                ပြက္ခဒိန်နှစ်အတွက်အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်း လုပ်ကိုင်ခွင့်မှတ်ပုံတင်စတင်လျှောက်ထားချိန်/သက်တမ်းတိုးချိန်တွင် အခြားလုပ်ငန်းအဖွဲ့
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">
                                                အစည်းတစ်ရပ်ရပ်တွင် အချိန်ပြည့်တာဝန်ထမ်းဆောင်နေသူမဟုတ်ကြောင်းနှင့် လျှောက်ထားသည့်နှစ်အတွက် အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့်လုပ်ငန်း
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-10 col-form-label">
                                                ကို မိမိ အဓိကအသက်မွေးကြောင်းလုပ်ငန်းအဖြစ် မြန်မာနိုင်ငံအတွင်းတွင် လုပ်ကိုင်မည်ဖြစ်ကြောင်း အောက်တွင်ကိုယ်တိုင် ဝန်ခံလက်မှတ်ရေးထိုးပါသည်။
                                            </label>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                      </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('PPA/CPA No') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                        </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
	                                          </div>
	                                        </div>
                                        </div>
                                        <div class="row">
	                                      <label class="col-md-6 col-form-label"></label>
	                                      <label class="col-md-2 col-form-label">{{ __('ဖုန်းနံပါတ်') }}</label>
	                                      <div class="col-md-3">
	                                          <div class="form-group">
	                                              <input type="text" name="name" class="form-control" >
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
        createDatepicker("pappinitial_dateone");
        createDatepicker("pappinitial_datetwo");
        createDatepicker("pappinitial_datethree");
        
    });

    </script>
@endpush
