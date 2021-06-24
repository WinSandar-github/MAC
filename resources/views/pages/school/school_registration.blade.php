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
                                
                            </div>
                            <div class="card-body">
                                <div class="col-md-9">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form1') }}">ကျောင်းဖွင့်လှစ်လုပ်ကိုင်ခွင့်လျှောက်လွှာ</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form2') }}">သင်တန်းကျောင်းအချက်အလက်များ</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form3') }}">အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ </a>
                                        <a class="nav-link active" href="{{ route('page.index', 'school-register-form4') }}">ကျောင်းမှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ</a>
                                    </nav>
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
