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
                                တက်ရောက်ခွင့်ရသူများစာရင်း
                            </h3>
                        </div>
                    </div>
                </div>
            <!-- @php $currend_date =  date("Y-m-d") @endphp -->
                @php $currend_date =  date("2021-12-10") @endphp

                <div class="card-body">
                    <div class="row">
                        <div class="row col-md-6 pl-2">
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
                            @if($currend_date > $data['course']->active_batch[0]->mac_reg_end_date)
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
                                    <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                    <th class="bold-font-weight">ဘွဲ့အမည်</th>
                                    <th class="bold-font-weight">အဘအမည်</th>
                                    <th class="bold-font-weight">ကိုယ်ပိုင်နံပါတ်</th>
                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">

                                @php $count = 0 @endphp

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 2)
                                        <tr class="mac-row">
                                            <td colspan="6" style="text-align: start; font-weight: bold">MAC
                                                တွင်တက်ရောက်မည့်သူများ
                                            </td>
                                        </tr>

                                        @foreach($std as $key => $s)
                                            <tr class="mac-row">
                                                <td>
                                                    {{ ++$count }}
                                                </td>
                                                <td>
                                                    {{$s->name_mm}}
                                                </td>
                                                <td>
                                                    {{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}
                                                </td>
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
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 0)
                                        <tr class="self-row">
                                            <td colspan="6" style="text-align: start;font-weight: bold">
                                                ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ
                                            </td>
                                        </tr>

                                        @foreach($std as $key => $s)
                                            <tr class="self-row">
                                                <td>
                                                    {{ ++$count }}
                                                </td>
                                                <td>
                                                    {{$s->name_mm}}
                                                </td>
                                                <td>
                                                    {{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}
                                                </td>
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
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach($data['student'] as $key => $std)
                                    @if($key == 1)
                                        <tr class="private-row">
                                            <td colspan="6" style="text-align: start;font-weight: bold">
                                                ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းတွင်တက်ရောက်ခွင့်ရသူများ
                                            </td>
                                        </tr>

                                        @foreach($std as $key => $s)
                                            <tr class="private-row">
                                                <td>
                                                    {{ ++$count }}
                                                </td>
                                                <td>
                                                    {{$s->name_mm}}
                                                </td>
                                                <td>
                                                    {{$s->student_info->nrc_state_region. "/" . $s->student_info->nrc_township . "(" . $s->student_info->nrc_citizen . ")" . $s->student_info->nrc_number}}
                                                </td>
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
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                                {{--@foreach($student_registers as $student_register)
                                    <tr>
                                        <td>
                                            {{++$count}}
                                        </td>
                                        <td>
                                            {{$student_register->name_mm}}
                                        </td>
                                        <td>
                                            {{$student_register->student_info->nrc_state_region. "/" . $student_register->student_info->nrc_township . "(" . $student_register->student_info->nrc_citizen . ")" . $student_register->student_info->nrc_number}}
                                        </td>
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
                                            {{ $data['course']->course_type->course_code == "da"
                                                ? $student_register->student_info->personal_no
                                                : $student_register->student_info->cpersonal_no}}
                                        </td>
                                    </tr>
                                @endforeach--}}

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
                        $('.mac-row, .private-row, .self-row').show();
                        break;
                    case "mac":
                        $('.mac-row').show();
                        $('.private-row, .self-row').hide();
                        break;
                    case "self study":
                        $('.self-row').show();
                        $('.mac-row, .private-row').hide();
                        break;
                    case "private school":
                        $('.private-row').show();
                        $('.mac-row, .self-row').hide();
                        break;
                }
            })
        });

        showAppList = (course_code) => {

            var table_app = $('#tbl_application').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                searching: false,
                paging: true,
                ajax: {
                    url: FRONTEND_URL + "/show_registration_list",
                    type: "POST",
                    data: function (d) {
                        d.code = course_code,
                            d.module = $('#selected_module').val(),
                            d.student_type = $('#student_type').val()
                    }
                },
                columns: [
                    {
                        data: null, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'student_info.name_mm', name: 'name_mm'},
                    {data: 'nrc', name: 'nrc'},
                    {data: 'course.name_mm', name: 'course name'},
                    {data: 'cpersonal_no', name: 'cpersonal_no'},
                ],
                sort: function (row, type, set, meta) {
                    return row[meta.col][1];
                },
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',
            });

            $("#search").click(function () {

                table_app.draw();
            });
        }
    </script>
@endpush
