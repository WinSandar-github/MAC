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
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight">စဥ်</th>
                                        <th class="bold-font-weight">အမည်</th>
                                        <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကဒ်အမှတ်</th>
                                        <th class="bold-font-weight">ဘွဲ့အမည်</th>
                                        <th class="bold-font-weight">အဘအမည်</th>
                                        <th class="bold-font-weight">ကိုယ်ပိုင်နံပါတ်</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">

                                    @if ($data['mentor'] != '')
                                        @foreach ($data['mentor'] as $k => $m)
                                            
                                            <tr>
                                                <td>{{ ++$k }}</td>
                                                <td>{{ $m->name_mm }}</td>
                                                <td>{{ $m->nrcNumber() }}</td>
                                                <td>{{ $m->education }}</td>
                                                <td>{{ $m->father_name_mm }}</td>
                                                <td>{{ $m->papp_reg_no }}</td>
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
                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection
