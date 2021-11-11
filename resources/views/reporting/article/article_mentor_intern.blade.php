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
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                    <thead>
                                        <tr>
                                            <th class="bold-font-weight">စဥ်</th>
                                            <th class="bold-font-weight">အလုပ်သင်အမည်</th>
                                            <th class="bold-font-weight">ကိုယ်ပိုင်အမှတ်</th>
                                            <th class="bold-font-weight">မှတ်ပုံတင်အမှတ်</th>
                                            <th class="bold-font-weight">ဖုန်း</th>
                                            <th class="bold-font-weight">အီးမေးလ်</th>
                                            <th class="bold-font-weight">အဘအမည်</th>
                                            <th class="bold-font-weight">ပညာအရည်အချင်း</th>
                                            <th class="bold-font-weight">တက်ရောက်နေသည့်အတန်း<br>CPA I or CPA II</th>
                                            <th class="bold-font-weight">တက်ရောက်နေသည့်ကျောင်း<br>MAC / Private School / Self Study</th>
                                            <th class="bold-font-weight">အလုပ်သင်ကာလပြီးစီးမှုအခြေအနေ <br> 1year/ 2year/ 3year</th>
                                            <th class="bold-font-weight">အလုပ်သင်စတင်သည့်နေ့</th>
                                            <th class="bold-font-weight">ပြီးဆုံးသည့်နေ့</th>
                                            <!--<th class="bold-font-weight">Status</th>-->
                                            <th class="bold-font-weight">အလုပ်သင်ကြားပေးသူ အမည်</th>
                                            <th class="bold-font-weight">အလုပ်သင်ကြားပေးသူ၏<br>လုပ်ငန်းအမှတ်</th>
                                            <th class="bold-font-weight">အလုပ်သင်ကြားပေးသူ၏<br>လုပ်ငန်းအမျိုးအစား</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_app_list_body" class="hoverTable">
                                    
                                        @if ($data['intern'] != '')
                                            @foreach ($data['intern'] as $k => $m)             
                                                @php 
                                                    $sdate=date_create($m->contract_start_date);
                                                    $edate=date_create(date('d-M-Y'));
                                                    $diff=date_diff($sdate,$edate);
                                                    $form_type = $m->student_info->student_course->type ?? 'N/A';
                                                @endphp
                                                <tr>
                                                    <td>{{ ++$k }}</td>
                                                    <td>{{ $m->student_info->name_mm }}</td>
                                                    <td>{{ $m->student_info->cpersonal_no ?? 'N/A' }}</td>                        
                                                    <td>{{ $m->student_info->nrc_state_region ? $m->student_info->nrc_state_region .'/'. $m->student_info->nrc_township .
                                                        '('. $m->student_info->nrc_citizen.')'. $m->student_info->nrc_number : 'N/A'}}</td>
                                                    <td>{{ $m->student_info->phone }}</td>
                                                    <td>{{ $m->student_info->email }}</td>
                                                    <td>{{ $m->student_info->father_name_mm}}</td>
                                                    <td>{{ $m->student_info->student_education_histroy->degree_name }}</td>
                                                    <td>{{ $m->student_info->student_course->batch->course->name ?? 'N/A'}}</td>
                                                    <td>{{ $form_type == 0 ? 'Self Study' : ($form_type == 1 ? 'Private School' : 'MAC') }}</td>
                                                    <td>{{ $diff->format("%y year") }}</td>
                                                    <td>{{ $m->contract_start_date ?? 'N/A' }}</td>
                                                    <td>{{ $m->contract_end_date ?? 'N/A' }}</td>
                                                    <!--<td>CI တက်ရောက်ဆဲ</td>-->
                                                    <td>{{ $m->mentor->name_mm ?? 'N/A'}}</td>
                                                    <td>{{ $m->mentor->papp->papp_reg_no ?? 'N/A'}}</td>
                                                    <td>{{ $m->mentor->papp->firm_type ?? 'N/A' }}</td>
                                                </tr>

                                            @endforeach
                                        @else
                                                <tr>
                                                    <td colspan="6">No Data Found!</td>
                                                </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <div id='export-btn'></div>
                        </div>
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