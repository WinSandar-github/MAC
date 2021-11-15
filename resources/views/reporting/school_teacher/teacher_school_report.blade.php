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
                                            <td>{{ $school->s_code }}</td>
                                            @if($school->school_name =='')         
                                            <td>{{ $school->renew_school_name }}</td>
                                            @else
                                            <td>{{ $school->school_name }}</td>     
                                            @endif
                                            
                                            <td>{{ $school->name_eng }}</td>
                                            <td>{{ $school->nrc_state_region ."/". $school->nrc_township ."(". $school->nrc_citizen .")". $school->nrc_number }}</td>
                                            <!--<td>{{ $school->type }}</td>-->
                                            @if($school->eng_school_address =="")         
                                            <td>{{ $school->renew_school_address }}</td>
                                            @else
                                            <td>{{ $school->eng_school_address }}</td>      
                                            @endif
                                            
                                            
                                            @if($school->initial_status==1)         
                                            <td>{{ '01-01-'.(\Carbon\Carbon::parse($school->renew_date)->format('Y')-2).' to 31-12-'.\Carbon\Carbon::parse($school->renew_date)->format('Y')}}</td> 
                                            @endif
                                            @if($school->initial_status==0)         
                                            <td>{{ (\Carbon\Carbon::parse($school->reg_date)->format('d-m-Y')).' to 31-12-'.\Carbon\Carbon::parse($school->to_valid_date)->format('Y') }}</td> 
                                            @endif
                                            @if($school->initial_status==2)
                                            <td>{{  'N/A' }}</td>
                                            @endif
                                            @if($school->renew_date=='')
                                            <td>{{  'N/A' }}</td>
                                            @else
                                            <td>{{ \Carbon\Carbon::parse($school->reg_date)->format('d-m-Y') }}</td>
                                            @endif
                                            @if($school->cessation_date=='')
                                            <td>{{  'N/A' }}</td>
                                            @else
                                            <td>{{ \Carbon\Carbon::parse($school->cessation_date)->format('d-m-Y') }}</td>
                                            @endif
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
