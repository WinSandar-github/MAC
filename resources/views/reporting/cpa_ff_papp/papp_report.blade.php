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
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    @foreach($data['fields'] as $col)
                                        <th>{{$col}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">
                                    <?php $index = 1; ?>
                                    @foreach($data['papp'] as $key => $papp)
                                        <tr>
                                            <td>{{ $index ++ }}</td>
                                            <td>{{ $papp[0]->cpaff_reg_no }}</td>
                                            <td>{{ $papp[0]->papp_reg_no }}</td>
                                            <td>{{ 
                                                $papp[0]->student_info == ""
                                                    ? 'error'
                                                    : $papp[0]->student_info->name_mm 
                                            }}</td>
                                            <td>{{ $papp[0]->cpd_hours }}</td>
                                            <?php $first = $papp[0]->cpd_hours; ?>
                                            <?php $last_one = getPappLastOneYearCpd($papp[0]->student_id,$year); ?>
                                            <td>
                                                {{ empty(($last_one) != true) ? $last_one->cpd_hours : '-' }} 
                                                
                                            </td>
                                            <?php empty(($last_one) != true) ? $second = $last_one->cpd_hours : $second = '0' ?>
                                            
                                            <?php $last_two = getPappLastTwoYearCpd($papp[0]->student_id,$year); ?>
                                            <td>
                                                {{ empty(($last_two) != true) ? $last_two->cpd_hours : '-' }}
                                            </td>
                                            <?php empty(($last_two) != true) ? $third = $last_two->cpd_hours : $third = '0' ?>

                                            <?php 
                                                $total = $first + $second + $third;
                                            ?>

                                            <td>{{ $total }}</td>
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

            var table_app = $('#tbl_application').DataTable({
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