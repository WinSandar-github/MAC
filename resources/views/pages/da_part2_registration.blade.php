@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_part2_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('da_part2_registration') }}
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
                                            <a class="nav-link active" href="{{ route('page.index', 'da_part2_register_form1') }}">သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ</a>
                                            <a class="nav-link active" href="{{ route('page.index', 'da_part2_register_form2') }}">မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ)</a>
                                            <a class="nav-link active" href="{{ route('page.index', 'da_part2_register_form3') }}">မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)</a>
                                            <a class="nav-link active" href="{{ route('page.index', 'da_part2_register_form4') }}">သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ</a>
                                            <a class="nav-link active" href="{{ route('page.index', 'da_part2_register_form5') }}">သင်တန်းပြီးဆုံး(အောင်/ကျရှုံး)ကြောင်း အထောက်အထားတောင်းခံမှူပုံစံ</a>
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
<<<<<<< HEAD
=======
<script>
       
    
    $(document).ready(function (e) {
        createDatepicker("date1");
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
>>>>>>> 55ec70bdc6cb669d3d20f596805210e9a7e8687a

@endpush
