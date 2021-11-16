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
                                            <th class="bold-font-weight">PAPPအမှတ်</th>
                                            <th class="bold-font-weight">အမည်</th>
                                            <th class="bold-font-weight">လုပ်ငန်းအမှတ်</th>
                                            <th class="bold-font-weight">လုပ်ငန်းအမည်</th>
                                            <th class="bold-font-weight">ရုံးလိပ်စာ</th>
                                            <th class="bold-font-weight">အီးမေလ်</th>
                                            <th class="bold-font-weight">ဖုန်း</th>
                                            <th class="bold-font-weight">ခွင့်ပြုစာအမှတ်</th>
                                            <th class="bold-font-weight">ခွင့်ပြုရက်စွဲ</th>
                                            <th class="bold-font-weight">ခွင့်ပြုရုံးအမိန့်</th>
                                            <th class="bold-font-weight">စတင်သည့်ရက်</th>
                                            <th class="bold-font-weight">ပြီးဆုံးသည့်ရက်</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_app_list_body" class="hoverTable">

                                        @if ($data['mentor'] != '')
                                            @foreach ($data['mentor'] as $k => $m)
                                                
                                                <tr>
                                                    <td>{{ ++$k }}</td>
                                                    <td>{{ $m->papp_reg_no }}</td>
                                                    <td>{{ $m->name_mm }}</td>
                                                    <td>{{ 'MENTOR-' . $m->id }}</td>
                                                    <!-- <td class='text-left'>
                                                       @foreach($m->serviceType() as $ser)
                                                        <span class="d-block m-1 badge bg-info text-white"> {{ $ser->name }} </span>
                                                       @endforeach
                                                    </td> -->
                                                    <td>{{ $m->audit_firm_name }}</td>
                                                    <td class='text-left'>{{ $m->address }}</td>
                                                    <td>{{ $m->m_email }}</td>
                                                    <td>{{ $m->phone_no }}</td>
                                                    <td>{{ 'N/A' }}</td>
                                                    <td>{{ $m->reg_date }}</td>
                                                    <td>{{ 'N/A' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($m->reg_date)->format('d-M-Y') }}</td>
                                                    <td>{{ '_' }}</td>
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