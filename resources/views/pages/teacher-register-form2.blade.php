@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher-register-form2'
])

@section('content')
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('teacher-register-form1') }}
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
                                        <div class="col-md-3 pl-5">
                                            <img id="preview-image-before-upload" src="{{ asset('img/logo/no_photo.png') }}" alt="preview image" style="max-height: 150px;">
                                            <div class="input-group mt-3">                                                    
                                            <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputfile2" accept="image/*">
                                                            <label class="custom-file-label" >Choose Image</label>
                                                        </div>
                                            </div>
                                        </div>
                                        
                                    </div><br> 

                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(မြန်မာ)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(မြန်မာ)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အမည်(အင်္ဂလိပ်)') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="အမည်(အင်္ဂလိပ်)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('သင်တန်းဆရာမှတ်ပုံတင်အမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="teacher_id_no" class="form-control" placeholder="သင်တန်းဆရာမှတ်ပုံတင်အမှတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="row" >
                                                <div class="col-md-2 col-5 ">
                                                    <select class="form-control" name="nrc_state_region" id="nrc_state_region" >
                                                        @foreach($nrc_regions as $region)
                                                            <option value="{{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en'] }}">
                                                                {{ $nrc_language == 'mm' ? $region['region_mm'] : $region['region_en']  }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-7 ">
                                                    <select class="form-control" name="nrc_township" id="nrc_township" >
                                                        @foreach($nrc_townships as $township)
                                                            <option value="{{ $township['township_mm'] }}">
                                                                {{ $township['township_mm'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-5 ">
                                                    <select class="form-control" name="nrc_citizen" id="nrc_citizen" >
                                                        @foreach($nrc_citizens as $citizen)
                                                        <option value="{{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}">
                                                            {{ $nrc_language == 'mm' ? $citizen['citizen_mm'] : $citizen['citizen_en'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-5 col-7 ">
                                                    <input type="text" name="nrc_number" id="nrc_number" pattern=".{6,6}" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  maxlength="6" minlength="6" placeholder="" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label ">{{ __('၄။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('တယ်လီဖုန်းနံပါတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="phone_number" class="form-control" placeholder="တယ်လီဖုန်းနံပါတ်" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('အီးမေးလ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="အီးမေးလ်(Email)" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-1 col-form-label ">{{ __('၆။') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                        <div class="col-md-8">
                                            <table class="table education2 table-bordered input-table">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight text-center">စဉ်</th>                                                      
                                                        <th class="less-font-weight text-center"  >ပညာအရည်အချင်း</th>                                                        
                                                        <th class="text-center" ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowEducation("education2")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label ">{{ __('၇။') }}</label>
                                        <label class="col-md-3 col-form-label">{{ __('နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်') }}</label>
                                        <div class="col-md-8">
                                            <div class="row ">
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="civil-servant2" id="yes-servant">
                                                    <label class="form-check-label" for="yes-servant">{{ __('ဟုတ်') }}</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input class="form-check-input" type="radio" name="civil-servant2" id="no-servant">
                                                    <label class="form-check-label" for="no-servant">{{ __('မဟုတ်') }}</label>
                                                </div>
                                            </div>                                                                                        
                                        </div>
                                    </div></br>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label ">{{ __('၈။') }}</label>
                                        <label class="col-md-3 col-form-label">{{ __('သင်ကြားမည့်သင်တန်းနှင့် ဘာသာရပ်များ') }}</label><br>
                                    </div>

                                    <div class="row" >
                                        <label class="col-md-1 col-form-label " >{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('(က)လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table subject2 table-bordered input-table">
                                                <thead>
                                                    <tr>   
                                                        <th class="less-font-weight text-center"  >စဉ်</th>                                                    
                                                        <th class="less-font-weight text-center"  >လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း</th>                                                        
                                                        <th class="less-font-weight text-center"  ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowSubject("subject2")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tboddy>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" >
                                        <label class="col-md-1 col-form-label pl-4" >{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label" >{{ __('(ခ)ဒီပလိုမာစာရင်းကိုင်သင်တန်း') }}</label>
                                        <div class="col-md-8">
                                            <table class="table dipSubject2 table-bordered input-table">
                                                <thead>
                                                    <tr>     
                                                        <th class="less-font-weight text-center">စဉ်</th>                                                   
                                                        <th class="less-font-weight text-center"  >ဒီပလိုမာစာရင်းကိုင်သင်တန်း</th>                                                        
                                                        <th class="less-font-weight text-center" ><input type="button" class="btn btn-primary btn-sm btn-plus" onclick='addRowDipSubject("dipSubject2")' value="+"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tboddy>
                                            </table>
                                        </div>
                                    </div>                                                          
                                                                   
                                    <div class="row">
                                        <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                        <label class="col-md-11 col-form-label">{{ __('အထက်ဖော်ပြပါ အချက်အလက်များမှန်ကန်ကြောင်းကတိပြုဝန်ခံပါသည်။') }}</label>                                        
                                    </div>

                                    <div class="row">
                                        <label class="col-md-1 col-form-label ">{{ __('') }}</label>
                                        <label class="col-md-2 col-form-label">{{ __('ရက်စွဲ') }}</label>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" name="register_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="လျှောက်ထားသူအမည်" required>
                                            </div>
                                        </div>
                                    </div></br>

                                    <div class="row">
                                        
                                        <label class="col-md-1 col-form-label ">{{ __('မှတ်ချက်။') }}</label>
                                        <label class="col-md-11 col-form-label">{{ __('သင်တန်းဆရာမှတ်ပုံတင်နှင့် ဓာတ်ပုံအပို (၂) ပုံ တင်ပြရမည်။') }}</label>                                
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
    });
    </script>
    
@endpush
