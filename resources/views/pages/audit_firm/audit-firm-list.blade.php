@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'audit-firm-list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('audit-firm-list') }}
            </div>
        </div>
            <form action="" method="post">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                            <div class="card-header ">
                                
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbl_audit" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight">Sr</th>
                                                        <th class="bold-font-weight">Accountancy Firm Registration No</th>
                                                        <th class="bold-font-weight">Accountancy Firm Name</th>
                                                        <th class="bold-font-weight">Township</th>
                                                        <th class="bold-font-weight">Post Code</th>
                                                        <th class="bold-font-weight">City</th>
                                                        <th class="bold-font-weight">State/Region</th>
                                                        <th class="bold-font-weight">Telephone</th>
                                                        <th class="bold-font-weight">Email</th>
                                                        <th class="bold-font-weight">Website</th>
                                                        <th class="bold-font-weight">Status</th>
                                                        <th class="bold-font-weight">Detail</th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody id="tbl_audit_body" class="hoverTable"></tbody>
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
<script>
getAudit();
</script>
@endpush
