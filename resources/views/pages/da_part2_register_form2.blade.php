@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part2_register_form2'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('da_part2_register_form2') }}
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
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                                <div class="input-group mb-3">
                                                    
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2">
                                                            <label class="custom-file-label" >Choose file</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <label class="col-md-1 "></label>
                                            <label class="col-md-2 col-form-label">{{ __('ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအမည်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                            <div class="col-md-2"></div>
                                            <label class="col-md-2 text-right">{{ __('ပညာသင်နှစ်') }}</label>
                                            <div class="col-md-2">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control">
	                                          </div>
	                                        </div>
                                        </div>
                                        <div class="row">
                                            
                                        </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="name_two" class="form-control" placeholder="မြန်မာ/အင်္ဂလိပ်" >
	                                          </div>
	                                      </div>
	                                    </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="nrc"  class="form-control  @error('name') is-invalid @enderror"  autofocus>
	                                          </div>
	                                      </div>
	                                      @error('name')
	                                          <span class="invalid-feedback" role="alert">
	                                              <strong>{{ $message }}</strong>
	                                          </span>
	                                      @enderror
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အဘအမည်(မြန်မာ/အင်္ဂလိပ်)') }}</label>
	                                      <div class="col-md-8">
	                                          <div class="form-group">
	                                              <input type="text" name="father_name" class="form-control" placeholder="မြန်မာ/အင်္ဂလိပ်" >
	                                          </div>
	                                      </div>
                                          
	                                  </div>
                                      
	                                  <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('လူမျိူး/ဘာသာ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                    <input type="text" name="" class="form-control" placeholder="လူမျိူး/ဘာသာ" >
                                                </div>
                                            </div>
	                                  </div>
	                                  
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('မွေးသဣရာဇ်') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="birth2" class="form-control"  placeholder="dd-mm-yyyy">
                                                    </div>
                                                </div>
	                                    </div>
	                                  
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="" class="form-control"  >
                                                </div>
                                            </div>
	                                    </div>
	                                    
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ ') }}</label>
	                                      <div class="col-md-8">
                                            <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="ရာထူး/ဌာန/ရုံးစိုက်ရာဒေသ" >
                                                    </div>
                                                </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
	                                      <label class="col-md-2 col-form-label">{{ __('အမြဲတမ်းနေရပ်လိပ်စာ') }}</label>
	                                        <div class="col-md-8">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control"  >
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/ မဟုတ်ပါ') }}</label>
	                                      <div class="col-md-2">
                                                        <input type="radio" name="" value="yes"> Yes
                                            </div>
                                            <div class="col-md-2">
                                                        <input type="radio" name="" value="no"> No
                                            </div>
	                                    </div>
                                        
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
	                                      <label class="col-md-3 col-form-label">{{ __('ဆက်သွယ်ရန်လိပ်စာ/ဖုန်းနံပါတ်/အီးမေးလ်') }}</label>
	                                        <div class="col-md-7">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
	                                    </div>
	                                    <div class="row">
	                                      <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
	                                      <label class="col-md-5 col-form-label">{{ __('ဒီပလိုမာစာရင်းကိုင်(ပထမ)ပိုင်းစာမေးပွဲအောင်မြင်သည့်နှစ်/လ') }}</label>
	                                        <div class="col-md-5">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
	                                      <label class="col-md-1 col-form-label"></label>
	                                      <label class="col-md-5 col-form-label">{{ __('ကိုယ်ပိုင်အမှတ်နှင့်အဆင့်') }}</label>
	                                        <div class="col-md-5">
                                                <div class="form-group">
                                                            <input type="text" name="" class="form-control" >
                                                </div>
                                            </div>
	                                    </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                            <label class="col-md-4 col-form-label">{{ __('အထက်ဖော်ပြပါအချက်အလက်အားလုံးမှန်ကန်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-8 col-form-label">{{ __('မြန်မာနိုင်ငံစာရင်းကောင်စီကချမှတ်သည့်စည်းကမ်းများကို လိုက်နာမည်ဖြစ်ကြောင်း ဝန်ခံလျှက် လျှောက်ထားအပ်ပါသည်။') }}</label>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 col-form-label"></label>
                                            <label class="col-md-3 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" name="date3" class="form-control" placeholder="dd-mm-yyyy">
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
        $("input[name='register_date']").flatpickr({
                    enableTime: false,
                    dateFormat: "d-m-Y",
            });
    $(document).ready(function (e) {
        createDatepicker("birth1");
        createDatepicker("birth2");
        createDatepicker("birth3");
        createDatepicker("birth4");
        createDatepicker("date1");
        createDatepicker("date2");
        createDatepicker("date3");
        createDatepicker("date4");
        createDatepicker("date5");
        createDatepicker("date6");
    });

    </script>
@endpush
