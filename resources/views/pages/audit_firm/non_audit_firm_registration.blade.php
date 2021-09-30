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
    'elementActive' => 'non_audit_firm_registration'
])

@section('content')
<div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non_audit_firm_registration') }}
            </div>
        </div>
            <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                            <div class="card-header ">

                            </div>
                            <div class="card_body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
		                                  <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">Local</a>
                                    </li>
                                    <li class="nav-item">
		                                  <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">Foreign</a>
                                    </li>
                                    <li class="nav-item">
		                                  <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">Non_Audit Firm Infomation</a>
                                    </li>

                                </ul>
                                <div class="tab-space tab-content tab-no-active-fill-tab-content mt-4">
	                                <div class="tab-pane fade show active m-5" id="link1" aria-expanded="true">
                                        <div class="row">

                                            <div class="col-md-9">
                                                <nav class="nav flex-column">
                                                    <a class="nav-link active" href="{{ route('page.index', 'non-audit-firm-local-initial') }}">Local Firm Information(Initial)</a>
                                                    <a class="nav-link active" href="{{ route('page.index', 'non-audit-firm-local-renew') }}">Local Firm Information(Renew)</a>

                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade m-5" id="link2" aria-expanded="true">
                                        <div class="row">

                                            <div class="col-md-9">
                                                <nav class="nav flex-column">
                                                    <a class="nav-link active" href="{{ route('page.index', 'non-audit-firm-foreign-initial') }}">Foreign Firm Information(Initial)</a>
                                                    <a class="nav-link active" href="{{ route('page.index', 'non-audit-firm-foreign-renew') }}">Foreign Firm Information(Renew)</a>

                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade m-5" id="link3" aria-expanded="true">
                                        <div class="row">

                                            <div class="col-md-9">
                                                <nav class="nav flex-column">
                                                    <a class="nav-link active" href="{{ route('page.index', 'non-audit-firm-list') }}"> Non_Audit Firm List</a>


                                                </nav>
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

@endpush
