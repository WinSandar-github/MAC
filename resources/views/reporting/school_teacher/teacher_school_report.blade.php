@extends('reporting.main')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $data['title'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        
                    <div class="col-md-12 table-responsive">
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="bold-font-weight">စဥ်</th>
                                    <th class="bold-font-weight">ကိုယ်ပိုင်ကျောင်းအမှတ်</th>
                                    <th class="bold-font-weight">ကျောင်းအမည်</th>
                                    <th class="bold-font-weight">တာဝန်ခံအမည်</th>
                                    <th class="bold-font-weight">တာဝန်ခံမှတ်ပုံတင်အမှတ်</th>
                                    <!--<th class="bold-font-weight">လုပ်ငန်းအမျိုးအစား</th>-->
                                    <th class="bold-font-weight">လိပ်စာ</th>
                                    <th class="bold-font-weight">မှတ်ပုံတင်သက်တမ်းကာလ</th>
                                    <th class="bold-font-weight">သက်တမ်းတိုးနေ့</th>
                                    <th class="bold-font-weight">ရပ်နားသည့်နေ့</th>
                                    <th class="bold-font-weight">သက်တမ်းပြတ်တောက်နေသောကာလ</th>
                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">
                                    @foreach($data['school'] as $key => $school)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ 'SCH-Demo-' . $school->id }}</td>
                                            <td>{{ $school->school_name }}</td>
                                            <td>{{ $school->name_mm }}</td>
                                            <td>{{ $school->nrc_state_region ."/". $school->nrc_township ."(". $school->nrc_citizen .")". $school->nrc_number }}</td>
                                            <!--<td>{{ $school->type }}</td>-->
                                            <td>{{ $school->school_address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($school->reg_date)->diffInYears($school->renew_date) . " Year" }}</td>
                                            <td>{{ $school->renew_date }}</td>
                                            <td>{{ $school->to_request_stop_date ?? 'N/A' }}</td>
                                            <td>{{ $school->last_registration_fee_year ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="export-btn"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link href="{{ asset('assets/js/plugins/tableexport/dist/css/tableexport.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/plugins/xlsx.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/FileSave.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/tableexport/dist/js/tableexport.min.js') }}"></script>
    <script>
        $('document').ready(function () {

            // table export
            var $table = $('.table');

            $table.tableExport({
                headers: true,
                footers: false,
                position: "bottom",
                bootstrap: true
            });

            $btn = $table.find('caption').children().detach();

            $btn.appendTo('#export-btn');
            // table export
        });
    </script>
@endpush
