@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'membership',
    'elementActive' => 'non-audit-firm-list'
])

@section('content')
    <div class="content">
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('non-audit-firm-list') }}
            </div>
        </div>--}}
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post">
                    <div class="card ">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="title" align="center">{{ __('Non-Audit Firm Registration List') }}</h5>
                                </div>
                            </div>
														<ul class="nav nav-tabs mt-3" role="tablist">
		                            <li class="nav-item">
		                                <a class="nav-link active" data-toggle="tab" href="#initial_state" role="tablist" aria-expanded="false" style="font-weight:bold">Initial List</a>
		                            </li>
		                            <li class="nav-item">
		                                <a class="nav-link" data-toggle="tab" href="#renew_state" role="tablist" aria-expanded="true" style="font-weight:bold">Renew List</a>
		                            </li>

		                        </ul>
                            {{--<ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
                                </li>
                            </ul>--}}
                        </div>
                        <div class="card-body">
													<div class="tab-space tab-content tab-no-active-fill-tab-content">
														<div class="tab-pane fade show active" id="initial_state" aria-expanded="true">
																<div class="card-header">
																	<ul class="nav nav-tabs mt-3" role="tablist">
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
																					<table id="tbl_non_audit_pending" class="table table-hover text-nowrap">
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
																							<tbody id="tbl_non_audit_pending_body" class="hoverTable text-left"></tbody>
																					</table>
																			</div>
																			<div class="tab-pane fade" id="link2" aria-expanded="true">
																					<table id="tbl_non_audit_approved" class="table table-hover text-nowrap" style="width:100%;">
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
																							<tbody id="tbl_non_audit_approved_body" class="hoverTable text-left"></tbody>
																					</table>
																			</div>
																			<div class="tab-pane fade" id="link3" aria-expanded="true">
																					<table id="tbl_non_audit_rejected" class="table table-hover text-nowrap" style="width:100%;">
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
																							<tbody id="tbl_non_audit_rejected_body" class="hoverTable text-left"></tbody>
																					</table>
																			</div>
																		</div>
																</div>
														</div>

														<div class="tab-pane fade show " id="renew_state" aria-expanded="true">
																<div class="card-header">
																		<ul class="nav nav-tabs mt-3" role="tablist">
																				<li class="nav-item">
																						<a class="nav-link active" data-toggle="tab" href="#pending_list" role="tablist" aria-expanded="false" style="font-weight:bold" id="pending">Pending List</a>
																				</li>
																				<li class="nav-item">
																						<a class="nav-link" data-toggle="tab" href="#approve_list" role="tablist" aria-expanded="true" style="font-weight:bold">Approved List</a>
																				</li>
																				<li class="nav-item">
																						<a class="nav-link" data-toggle="tab" href="#reject_list" role="tablist" aria-expanded="false" style="font-weight:bold">Rejected List</a>
																				</li>
																		</ul>
																</div>

																<div class="card-body">
																		<div class="tab-space tab-content tab-no-active-fill-tab-content">
																				<div class="tab-pane fade show active" id="pending_list" aria-expanded="true" style="overflow:scroll;">
																					<table id="tbl_non_audit_pending_renew" class="table table-hover text-nowrap" style="width:100%;">
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
																							<tbody id="tbl_non_audit_pending_renew_body" class="hoverTable text-left"></tbody>
																					</table>
																				</div>

																				<div class="tab-pane fade" id="approve_list" aria-expanded="true" style="overflow:scroll;">
																					<table id="tbl_non_audit_approved_renew" class="table table-hover text-nowrap" style="width:100%;">
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
																							<tbody id="tbl_non_audit_approved_renew_body" class="hoverTable text-left"></tbody>
																					</table>
																				</div>

																				<div class="tab-pane fade" id="reject_list" aria-expanded="true" style="overflow:scroll;">
																					<table id="tbl_non_audit_reject_renew" class="table table-hover text-nowrap" style="width:100%;">
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
																							<tbody id="tbl_non_audit_reject_renew_body" class="hoverTable text-left"></tbody>
																					</table>
																				</div>
																		</div>
																</div>
														</div>
													</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    //getAudit();

		$(document).ready(function(){
			$('#tbl_non_audit_pending').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_register_list/0/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			$('#tbl_non_audit_pending_renew').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_renew_register_list/0/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			$('#tbl_non_audit_approved').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_register_list/1/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			$('#tbl_non_audit_approved_renew').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_renew_register_list/1/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			$('#tbl_non_audit_rejected').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_register_list/2/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			$('#tbl_non_audit_reject_renew').DataTable({
					processing: true,
					scrollX:true,
					// serverSide: true,
					ajax: BACKEND_URL + "/audit_renew_register_list/2/2",
					columns: [
						{data: null, render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{data: 'action', name: 'action', orderable: false, searchable: false},
						{data: 'accountancy_firm_reg_no', name: 'Acc Firm Reg No'},
						{data: 'accountancy_firm_name', name: 'Acc Firm Name'},
						{data: 'township', name: 'Township'},
						{data: 'postcode', name: 'Post Code'},
						{data: 'city', name: 'City'},
						{data: 'state_region', name: 'State Region'},
						{data: 'telephones', name: 'Telephone'},
						{data: 'h_email', name: 'H Email'},
						{data: 'website', name: 'Website'},
						{data: 'status', name: 'Status'},
					],
					"dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
			});

			// $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      //           $.each($.fn.dataTable.tables(true), function(){
      //                   $(this).DataTable()
      //                           .columns.adjust()
      //                           .responsive.recalc();
      //           });
			// });

		});

</script>
@endpush
