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
                                            <th class="bold-font-weight">အလုပ်သင်စတင်သည့်နေ့</th>
                                            <th class="bold-font-weight">ပြီးဆုံးသည့်နေ့</th>
                                            <th class="bold-font-weight">Status</th>
                                            <th class="bold-font-weight">အလုပ်သင်ကြားပေးသူ</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_app_list_body" class="hoverTable">

                                        @if ($data['intern'] != '')
                                            @foreach ($data['intern'] as $k => $m)
                                                
                                                <tr>
                                                    <td>{{ ++$k }}</td>
                                                    <td>{{ $m->std_name }}</td>
                                                    <td>{{ $m->cpersonal_no ?? 'N/A' }}</td>
                                                    <td>{{ $m->intern_sdate ?? 'N/A' }}</td>
                                                    <td>{{ $m->intern_edate ?? 'N/A' }}</td>
                                                    <td>CI တက်ရောက်ဆဲ</td>
                                                    <td>{{ $m->mentor_name }}</td>
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