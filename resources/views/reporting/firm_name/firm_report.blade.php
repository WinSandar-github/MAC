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
                                    <!-- - စဥ် / reg_no / လုပ်ငန်းအမည် / လုပ်ငန်းကိုယ်စားလက်မှတ်ရေးထိုးမည့် PAPP အမည်,နံပါတ် / လုပ်ငန်းလိပ်စာ,ဖုန်းနံပါတ်,အီးမေလ် /   -->
                                    <th class="bold-font-weight">စဥ်</th>
                                    <th class="bold-font-weight">Reg_No</th>
                                    <th class="bold-font-weight">လုပ်ငန်းအမည်</th>
                                    <th class="bold-font-weight">လုပ်ငန်းကိုယ်စားလက်မှတ်ရေးထိုးမည့် PAPP အမည်</th>
                                    <th class="bold-font-weight">လုပ်ငန်းကိုယ်စားလက်မှတ်ရေးထိုးမည့် PAPP နံပါတ်</th>
                                    <th class="bold-font-weight">လုပ်ငန်းလိပ်စာ</th>
                                    <th class="bold-font-weight">လုပ်ငန်းဖုန်းနံပါတ်</th>
                                    <th class="bold-font-weight">လုပ်ငန်းအီးမေးလ်</th>
                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">

                                @foreach($data['firm'] as $key => $firm)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $firm->accountancy_firm_reg_no }}</td>
                                        <td>{{ $firm->accountancy_firm_name }}</td>
                                        <td>{{ $firm->name_of_sole_proprietor }}</td>
                                        <td>{{ 'reg-no-of-papp' }}</td>
                                        <td>{{ $firm->head_office_address }}</td>
                                        <td>{{ $firm->telephones }}</td>
                                        <td>{{ $firm->h_email }}</td>
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