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
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="title" style="padding-left: 330px;">{{ __('Audit Firm Registration List') }}</h5>
                                    </div>
                            </div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                            </li>
                                        </ul>
                                    </div>
                                        <div class="card-body">
                                            <div class="tab-space tab-content tab-no-active-fill-tab-content">
                                                <div class="tab-pane fade show active" id="link1" aria-expanded="true">
                                                    <table id="tbl_audit_pending" class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight">Sr</th>
                                                                <th class="bold-font-weight">Action</th>
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
                                                                
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_audit_pending_body" class="hoverTable"></tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link2" aria-expanded="true">
                                                    <table id="tbl_audit_approved" class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight">Sr</th>
                                                                <th class="bold-font-weight">Action</th>
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
                                                                
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_audit_approved_body" class="hoverTable"></tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="link3" aria-expanded="true">
                                                    <table id="tbl_audit_rejected" class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="bold-font-weight">Sr</th>
                                                                <th class="bold-font-weight">Action</th>
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
                                                                
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="tbl_audit_rejected_body" class="hoverTable"></tbody>
                                                    </table>
                                                </div>
                                            </div>
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
