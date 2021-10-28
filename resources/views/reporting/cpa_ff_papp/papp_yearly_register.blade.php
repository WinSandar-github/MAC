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
                                    <thead>
                                    <tr>
                                        <th class="bold-font-weight" >စဥ်</th>
                                        <th class="bold-font-weight" >CPA (Full-Fledged) Reg No.</th>
                                        <th class="bold-font-weight" >PAPP Reg No.</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th class="bold-font-weight" >လိပ်စာ</th>
                                        <!--<th class="bold-font-weight" >ဖုန်းနံပါတ်</th>
                                        <th class="bold-font-weight" >အီးမေးလ်</th>-->
                                    </tr>
                                </thead>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                @foreach($data['papp'] as $key => $papp)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $papp->reg_no }}</td>
                                            <td>{{ $papp->papp_reg_no }}</td>
                                            <td>{{ 
                                                $papp->student_info == ""
                                                    ? 'error'
                                                    : $papp->student_info->name_mm 
                                            }}</td>
                                            <td>{{ $papp->student_info->nrc_state_region ."/". $papp->student_info->nrc_township ."(". $papp->student_info->nrc_citizen .")". $papp->student_info->nrc_number }}</td>
                                            <td>{{ $papp->student_info->address }}<br>
                                                {{ $papp->student_info->phone }}<br>
                                                {{ $papp->student_info->email }}</td>
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