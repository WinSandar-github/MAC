@extends('reporting.main')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <input type="hidden" id="course_code" name="course_code" value={{$data['course']->code}} >
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $data['course']->name_mm }}<br>
                                {{ $data['batch']->name_mm }}<br>
                                မှတ်ပုံတင်ခွင့်ရသူများစာရင်း
                            </h3>
                        </div>
                    </div>
                </div>

                @php $currend_date =  date("Y-m-d") @endphp

                <div class="card-body">

                    <div class="row">
                        <div class="row col-md-6">
                            <div class="col-md-3">
                                <label class="">
                                    <input class="form-check-input module_one" type="radio" name="filter" value="all"
                                           checked>
                                    <span class="form-check-sign"></span>
                                    All
                                </label>
                            </div>
                            @if($data['filter'] != '')
                                @foreach($data['filter'] as $filter)
                                    <div class="col-md-3">
                                        <label class="">
                                            <input class="form-check-input module_one" type="radio" name="filter"
                                                   value="{{ $filter }}">
                                            <span class="form-check-sign"></span>
                                            {{ $filter }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="col-md-6 pl-2">
                            @if($currend_date > $data['batch']->mac_reg_end_date && $currend_date < $data['batch']->end_date  )
                                @if($data['course']->code === "da_1" || $data['course']->code === "cpa_1" )
                                    <button onclick="generatePersonalNo('{{$data['course']->code}}')" class="pull-right
                                    btn btn-sm btn-success">ကိုယ်ပိုင်နံပါတ် ထုတ်ပေးမည်
                                    </button>
                                @else

                                    <button onclick="generateSrNo('{{$data['course']->code}}')"
                                            class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်
                                    </button>
                                @endif
                            @endif
                        </div>

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
                                    <th class="bold-font-weight">မှတ်ချက်</th>

                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">

                                @php $count = 0 @endphp

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 1)
                                        <tr class="mod-one">
                                            <td colspan="7" style="text-align: start; font-weight: bold">
                                                Module One ဖြေဆိုရန်လျှောက်ထားသူများ
                                            </td>
                                        </tr>
                                        @foreach($std as $s)
                                            <tr class="mod-one">
                                                <td>{{++$count}}</td>
                                                <td>{{$s->name_mm}}</td>
                                                <td>{{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}</td>
                                                <td>
                                                    @if($data['course']->code === "da_1")
                                                        ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)
                                                    @elseif($data['course']->code === "da_2" )
                                                        ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @elseif($data['course']->code === "cpa_1" )
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း)
                                                    @else
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $s->student_info->father_name_mm }}
                                                </td>
                                                <td>
                                                    {{ $data['course']->course_type->course_code == "da"
                                                        ? $s->student_info->personal_no
                                                        : $s->student_info->cpersonal_no}}
                                                </td>
                                                <td>
                                                    N/A
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 2)
                                        <tr class="mod-two">
                                            <td colspan="7" style="text-align: start; font-weight: bold">
                                                Module Two ဖြေဆိုရန်လျှောက်ထားသူများ
                                            </td>
                                        </tr>
                                        @foreach($std as $s)
                                            <tr class="mod-two">
                                                <td>{{++$count}}</td>
                                                <td>{{$s->name_mm}}</td>
                                                <td>{{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}</td>
                                                <td>
                                                    @if($data['course']->code === "da_1")
                                                        ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)
                                                    @elseif($data['course']->code === "da_2" )
                                                        ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @elseif($data['course']->code === "cpa_1" )
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း)
                                                    @else
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $s->student_info->father_name_mm }}
                                                </td>
                                                <td>
                                                    {{ $data['course']->course_type->course_code == "da"
                                                        ? $s->student_info->personal_no
                                                        : $s->student_info->cpersonal_no}}
                                                </td>
                                                <td>
                                                    N/A
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 3)
                                        <tr class="mod-all">
                                            <td colspan="7" style="text-align: start; font-weight: bold">
                                                All Module ဖြေဆိုရန်လျှောက်ထားသူများ
                                            </td>
                                        </tr>
                                        @foreach($std as $s)
                                            <tr class="mod-all">
                                                <td>{{++$count}}</td>
                                                <td>{{$s->name_mm}}</td>
                                                <td>{{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}</td>
                                                <td>
                                                    @if($data['course']->code === "da_1")
                                                        ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)
                                                    @elseif($data['course']->code === "da_2" )
                                                        ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @elseif($data['course']->code === "cpa_1" )
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း)
                                                    @else
                                                        လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $s->student_info->father_name_mm }}
                                                </td>
                                                <td>
                                                    {{ $data['course']->course_type->course_code == "da"
                                                        ? $s->student_info->personal_no
                                                        : $s->student_info->cpersonal_no}}
                                                </td>
                                                <td>
                                                    N/A
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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

@push('scripts')
    <script>
        $('document').ready(function () {
            var course_code = $('#course_code').val();

            $('input[type=radio][name=filter]').on('change', function () {
                var val = $(this).val();
                switch (val) {
                    case "all":
                        $('.mod-one, .mod-two, .mod-all').show();
                        break;
                    case "module one":
                        $('.mod-one').show();
                        $('.mod-two, .mod-all').hide();
                        break;
                    case "module two":
                        $('.mod-two').show();
                        $('.mod-one, .mod-all').hide();
                        break;
                    case "all module":
                        $('.mod-all').show();
                        $('.mod-one, .mod-two').hide();
                        break;
                }
            })
        });

        // showAppList = (course_code) =>{
        //     var table_app = $('#tbl_application').DataTable({
        //         scrollX: true,
        //         processing: true,
        //         serverSide: true,
        //         searching: false,
        //         paging:true,
        //         ajax: {
        //             url  : FRONTEND_URL + "/show_registration_list",
        //             type : "POST" ,
        //             data :  function (d) {
        //                 d.code        =  course_code
        //             }
        //         },
        //         columns: [
        //             {data: null, render: function (data, type, row, meta) {
        //                 console.log(meta)
        //                     // return meta.row + meta.settings._iDisplayStart + 1;
        //                 }},
        //             {data: 'student_info.name_mm', name: 'name_mm'},
        //             {data: 'nrc', name: 'nrc'},
        //             {data: 'student_info.personal_no', name: 'personal_no'},
        //         ],
        //         sort: function( row, type, set, meta ) {
        //             return row[meta.col][1];
        //         },
        //         "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
        //     });
        // }
    </script>


@endpush