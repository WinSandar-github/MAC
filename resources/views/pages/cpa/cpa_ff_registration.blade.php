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
    'elementActive' => 'cpa_ff_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa_ff_registration') }}
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
                                            <a class="nav-link active" href="{{ route('page.index', 'cpa_ff_register_form1') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)အဖြစ်မှတ်ပုံတင်ခြင်း</a>
                                            <a class="nav-link active" href="{{ route('page.index', 'cpa_ff_register_form2') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)အဖြစ်မှတ်ပုံတင်ထားခြင်းကိုသက်တမ်းတိုးမြှင့်ခြင်း</a>

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

@endpush
