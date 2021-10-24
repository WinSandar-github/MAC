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
                            <div class="col-md-12 pl-2">
                                <button   onclick="generateQTSrNo()" class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်</button>
                                
                            </div>
                    <div class="col-md-12">
                        
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    <th class="bold-font-weight">စဥ်</th>
                                    <th class="bold-font-weight">အမည်</th>
                                    <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                    <th class="bold-font-weight">အဘအမည်</th>
                                    <th class="bold-font-weight">ကိုယ်ပိုင်နံပါတ်</th>
                                </tr>
                                </thead>
                                @php @endphp
                                <tbody id="tbl_app_list_body" class="hoverTable">
                                    @foreach($data['student'] as $k=>$s)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ $s->student_info->name_mm }}</td>
                                            <td>{{ $s->student_info->nrc_state_region . '/' . $s->student_info->nrc_township . '(' . $s->student_info->nrc_citizen . ')' . $s->student_info->nrc_number }}</td>
                                            <td>{{ $s->student_info->father_name_mm }}</td>
                                            <td>{{ $s->sr_no ?? 'NOT SET' }}</td>
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
                headers: false,
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
