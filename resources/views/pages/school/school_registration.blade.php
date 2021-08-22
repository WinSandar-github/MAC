@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'school_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('school_registration') }}
            </div>
        </div>
            <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title text-center">{{ __('School Registration Lists') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <div class="col-md-9">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form1') }}">ကျောင်းဖွင့်လှစ်လုပ်ကိုင်ခွင့်လျှောက်လွှာ</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form2') }}">သင်တန်းကျောင်းအချက်အလက်များ</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form3') }}">အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ </a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form4') }}">ကျောင်းမှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ</a>
                                    </nav>
                                </div> -->
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="card">
                                        <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">NRC</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="filter_by_nrc" class="form-control" placeholder="eg. ၁/ကမတ(နိုင်)၁၂၃၄၅၆">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="vertical-align: top;">
                                                <button type="button" class="btn btn-primary btn-round mt-0" onclick="getSchoolRegisterList()" id="search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="card-body">
                                            <hr size="5" width="95%" color="#F5F5F5"> 
                                                <table id="tbl_school"class="table table-hover  text-center">
                                                    <thead class=" text-nowrap">
                                                        <tr>
                                                            <th class="bold-font-weight" >No</th>
                                                            <th class="bold-font-weight" >Action</th>
                                                            <th class="bold-font-weight" >Name</th>
                                                            <th class="bold-font-weight" >Email</th>     
                                                            <th class="bold-font-weight" >Phone Number</th>
                                                            <th class="bold-font-weight" >NRC</th>
                                                            <th class="bold-font-weight" >Status</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl_school_body" class="hoverTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
<script src="{{asset('js/school.js')}}"></script>
<script>
    
    $(document).ready(function (e) {
        // createDatepicker("school_birthone");
        getSchoolRegisterList();
        
    });

</script>
@endpush
