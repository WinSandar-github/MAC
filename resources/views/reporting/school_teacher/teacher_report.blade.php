@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">
                                {{ $data['title'] }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" id="tbl_exam_result_list" class="table table-hover text-nowrap ">
                                <thead>
                                <!-- စဉ်၊ သင်တန်းဆရာအမှတ်၊ အမည်၊ နိုင်ငံသား စိစစ်ရေးကတ်ပြား၊ အဘအမည်၊ သင်တန်းဆရာ အမျိုးအစား၊ သင်ကြားသည့် သင်တန်းကျောင်း အမည်၊ သင်ကြားသည့် သင်တန်းအမျိုးအစား၊ ဘာသာရပ်များ၊ 
                                မှတ်ပုံတင် သက်တမ်းကာလ၊ သက်တမ်းတိုး/ရပ်နားသည့်နေ့၊ သက်တမ်းပြတ် ကာလ၊  -->
                                    <tr>
                                        <th class="bold-font-weight">စဥ်</th>
                                        <th class="bold-font-weight">သင်တန်းဆရာအမှတ်</th>
                                        <th class="bold-font-weight">အမည်</th>
                                        <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th class="bold-font-weight">အဘအမည်</th>
                                        <th class="bold-font-weight">သင်တန်းဆရာအမျိုးအစား</th>
                                        <th class="bold-font-weight">သင်ကြားနေသောသင်တန်းကျောင်းအမည်</th>
                                        <th class="bold-font-weight">သင်ကြားနေသောသင်တန်းအမျိုးအစား</th>
                                        <th class="bold-font-weight">ဘာသာရပ်များ</th>
                                        <th class="bold-font-weight">မှတ်ပုံတင်သက်တမ်းကာလ</th>
                                        <th class="bold-font-weight">သက်တမ်းတိုးသည့်နေ့</th>
                                        <th class="bold-font-weight">ရပ်နားသည့်နေ့</th>
                                        <th class="bold-font-weight">သက်တမ်းပြတ်ကာလ</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                    @foreach($data['teacher'] as $key => $chel)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $chel->t_code }}</td>
                                        <td>{{ $chel->name_mm }}</td>
                                        <td>{{ $chel->nrc_state_region ."/". $chel->nrc_township ."(". $chel->nrc_citizen .")". $chel->nrc_number }}</td>
                                        <td>{{ $chel->father_name_mm }}</td>
                                        <td>{{ $chel->school_type == 1 ? 'Private' : 'Individual' }}</td>
                                        <td>{{ $chel->school_id == null ? 'N/A' : $chel->school->name_mm }}</td>
                                        <td>{{ "DA/CPA" }}</td>
                                        <td>
                                            @if($chel->subject != '')
                                                @foreach($chel->subject as $subj)
                                                    <span class="d-block bage bg-info m-1">{{ $subj->subject_name }}</span>
                                                @endforeach
                                            @else
                                                {{ 'Error' }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($chel->form_valid_date)->diffInYears($chel->to_valid_date) . ' Year' }}</td>
                                        <td>{{ $chel->renew_date ?? 'No Renew Date' }}</td>
                                        <td>{{ "N/A" }}</td>
                                        <td>{{ "N/A" }}</td>
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
        $('document').ready(function(){
            var table_app = $('#tbl_exam_result_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: false,
                searching: false,
                paging:false,
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

            });
        });

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
</script>
@endpush