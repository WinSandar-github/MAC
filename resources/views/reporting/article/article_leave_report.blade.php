@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">ခွင့်ခံစားခွင့်ရသူများစာရင်း</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 table-responsive">
                            <table width="100%" id="tbl_exam_result_list" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" rowspan="2">စဥ်</th>
                                        <th class="bold-font-weight" rowspan="2">အမည်</th>
                                        <th class="bold-font-weight" rowspan="2">ကိုယ်ပိုင်အမှတ်</th>
                                        <th class="bold-font-weight" rowspan="2">ခွင့်အမျိုးအစား</th>
                                        <th class="bold-font-weight" colspan="2">ခွင့်ကာလ</th>
                                    </tr>
                                    <tr>
                                        <th class="bold-font-weight">မှ</th>
                                        <th class="bold-font-weight">ထိ</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                    @foreach($data['leave'] as $key => $leave)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $leave->name_mm }}</td>
                                        <td>{{ $leave->cpersonal_no }}</td>
                                        <td>{{ $leave->remark }}</td>
                                        <td>{{ $leave->start_date }}</td>
                                        <td>{{ $leave->end_date }}</td>
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