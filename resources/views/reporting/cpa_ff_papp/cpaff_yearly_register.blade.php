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
                        <div class="col-md-12 table-responsive">
                            <table width="100%" id="tbl_exam_result_list" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >စဥ်</th>
                                        <th class="bold-font-weight" >CPA FF Reg No</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th class="bold-font-weight" >လိပ်စာ</th>
                                        <!--<th class="bold-font-weight" >ဖုန်းနံပါတ်</th>
                                        <th class="bold-font-weight" >အီးမေးလ်</th>-->
                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                    @foreach($data['cpaff'] as $key => $cpaff)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $cpaff->cpaff_reg_no }}</td>
                                            <td>{{ 
                                                $cpaff->student_info == ""
                                                    ? 'error'
                                                    : $cpaff->student_info->name_mm 
                                            }}</td>
                                            <td>{{ $cpaff->student_info->nrc_state_region ."/". $cpaff->student_info->nrc_township ."(". $cpaff->student_info->nrc_citizen .")". $cpaff->student_info->nrc_number }}</td>
                                            <td>{{ $cpaff->student_info->address }}<br>
                                                {{ $cpaff->student_info->phone }}<br>
                                                {{ $cpaff->student_info->email }}</td>
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