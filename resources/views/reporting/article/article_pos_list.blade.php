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
                                    <tr>
                                        <th class="bold-font-weight" rowspan="2">စဥ်</th>
                                        <th class="bold-font-weight" rowspan="2">အမည်</th>
                                        <th class="bold-font-weight" rowspan="2">သင်တန်းသားအမှတ်</th>
                                        <th class="bold-font-weight" rowspan="2">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th class="bold-font-weight" rowspan="2">အဘအမည်</th>
                                        <th class="bold-font-weight" colspan="2">အလုပ်သင်ကာလ</th>
                                        <th class="bold-font-weight" rowspan="2">သင်တန်းအမှတ်စဉ်(Batch)</th>
                                        <th class="bold-font-weight" rowspan="2">Status</th>
                                    </tr>
                                    <tr>
                                        <th class="bold-font-weight">စတင်သည့်နေ့</th>
                                        <th class="bold-font-weight">ပြီးဆုံးသည့်နေ့</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                    @foreach($data['apprentic'] as $key => $apprentic)
                                    
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $apprentic->student_info->name_mm ?? 'N/A' }}</td>
                                        <td>{{ $apprentic->student_info->cpersonal_no ?? 'N/A' }}</td>
                                        <td>{{ $apprentic->student_info->nrc_state_region ."/". $apprentic->student_info->nrc_township ."(". $apprentic->student_info->nrc_citizen .")". $apprentic->student_info->nrc_number }}</td>
                                        <td>{{ $apprentic->student_info->father_name_mm ?? 'N/A'}}</td>
                                        <td>{{ $apprentic->contract_start_date ?? 'N/A' }}</td>
                                        <td>{{ $apprentic->contract_end_date ?? 'N/A' }}</td>
                                        <td>{{  $apprentic->student_info->student_register[0]->batch->name_mm ?? 'N/A'}}
                                        </td>
                                        <td>{{ $apprentic->done_status == '1' ? '၂ နှစ်ပြည့်' : 'အလုပ်သင်ဆင်းနေဆဲ' }}</td>
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

            var table_app = $('#tbl_exam_result_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: false,
                searching: false,
                paging:false,
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });
        })
</script>
@endpush