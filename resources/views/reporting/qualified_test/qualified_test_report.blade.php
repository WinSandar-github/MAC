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
                                     <th class="bold-font-weight">အဘအမည်</th>
                                 </tr>
                                </thead>
                                @php @endphp
                                <tbody id="tbl_app_list_body" class="hoverTable">
                                    @foreach($qualified_tests as $key => $qt)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$qt->student_info->name_mm}}</td>
                                            <td>
                                                {{$qt->student_info->nrc_state_region. "/" . $qt->student_info->nrc_township . "(" . $qt->student_info->nrc_citizen . ")" . $qt->student_info->nrc_number}}
                                            </td>
                                                <td>
                                                    {{ $qt->student_info->father_name_mm }}
                                                </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection

