@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'article'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('article') }}
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
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form1') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)သင်တန်းကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form2') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)အတွက် လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form3') }}">လက်တွေ့အလုပ်သင်ကြားခြင်း(၂)နှစ်ပြည့်မြောက်ပြီး၍ လက်တွေ့အလုပ် (၁) နှစ် ထပ်မံဆင်းရန်ဆန္ဒပြုခြင်း </a>
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form4') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင် အရည်အချင်းစစ် စာမေးပွဲကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form5') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း) စာမေးပွဲကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'article-form6') }}">လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)သင်တန်းအတွက် လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း</a>
                                    </nav>
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

    
@endpush
