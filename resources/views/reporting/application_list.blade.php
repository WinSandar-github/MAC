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
                                {!! $data['title'] !!}
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
                                
                                    <button onclick="generateAppSrNo('{{$data['course']->code}}')"
                                            class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်
                                    </button>
                             @endif
                        </div>
                        <div class="col-md-12">
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    <th class="bold-font-weight">စဥ်</th>
                                    <th class="bold-font-weight">အမည်</th>
                                    <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                    <!-- <th class="bold-font-weight">ဘွဲ့အမည်</th> -->
                                    <th class="bold-font-weight">အဘအမည်</th>
                                    <th class="bold-font-weight">အသက်</th>
                                    <th class="bold-font-weight">ကျား/မ</th>
                                    <th class="bold-font-weight">ဝန်ထမ်း ဟုတ်/မဟုတ်</th>
                                

                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable"> 
                                @php $count = 0;
                                  @endphp

                                @foreach($data['student'] as $key => $std)
  
                                    @if($key == 2)
                                        @foreach($std as $key => $ygn)

                                            @if($key == 1)
                                                <tr class="mac-ygn">
                                                    <td colspan="6" style="text-align: start; font-weight: bold">
                                                        MAC (ရန်ကုန်) သင်တန်းကျောင်းတွင်တက်ရောက်မည့်သူများ
                                                    </td>
                                                </tr>

                                                @foreach($ygn as $s)
                                               
                                                @php $age = \Carbon\Carbon::parse($s->student_info->date_of_birth)->age; @endphp

                                                <tr class="mac-ygn">
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
                                                        {{ $s->student_info->father_name_mm }}
                                                    </td>
                                                    <td>
                                                        {{ $age}}
                                                    </td>
                                                    <td>
                                                        {{ $s->student_info->gender == 1 ? 'ကျား' : 'မ'}}
                                                    </td>
                                                    <td>
                                                        {{ $s->student_info->gov_staff == 1 ? 'Yes' : 'No'}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @elseif($key == 2)
                                                <tr class="mac-npt">
                                                    <td colspan="6" style="text-align: start; font-weight: bold">
                                                        MAC (နေပြည်တော်) သင်တန်းကျောင်းတွင်တက်ရောက်မည့်သူများ
                                                    </td>
                                                </tr>
                                                
                                                @foreach($ygn as $s)
                                                    @php $age = \Carbon\Carbon::parse($s->student_info->date_of_birth)->age; @endphp

                                                    <tr class="mac-npt">
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
                                                            {{ $s->student_info->father_name_mm }}
                                                        </td>
                                                        <td>
                                                            {{ $age}}
                                                        </td>
                                                        <td>
                                                            {{ $s->student_info->gender == 1 ? 'ကျား' : 'မ'}}
                                                        </td>
                                                        <td>
                                                            {{ $s->student_info->gov_staff == 1 ? 'Yes' : 'No'}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else

                                                <tr class="mac-ygn">
                                                    <td colspan="6" style="text-align: start; font-weight: bold">
                                                        MAC သင်တန်းကျောင်းတွင်တက်ရောက်မည့်သူများ
                                                    </td>
                                                </tr>

                                            @endif
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
                                        
                                        @php $age = \Carbon\Carbon::parse($s->student_info->date_of_birth)->age; @endphp

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
                                                    {{ $s->student_info->father_name_mm }}
                                                </td>
                                                <td>
                                               {{ $age}}
                                                </td>
                                                <td>
                                                    {{ $s->student_info->gender == 1 ? 'ကျား' : 'မ'}}
                                                </td>
                                                <td>
                                                    {{ $s->student_info->gov_staff == 1 ? 'Yes' : 'No'}}
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
                                        
                                        @php $age = \Carbon\Carbon::parse($s->student_info->date_of_birth)->age; @endphp

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
                                                    {{ $s->student_info->father_name_mm }}
                                                </td>
                                                <td>
                                               {{ $age}}
                                                </td>
                                                <td>
                                                    {{ $s->student_info->gender == 1 ? 'ကျား' : 'မ'}}
                                                </td>
                                                <td>
                                                    {{ $s->student_info->gov_staff == 1 ? 'Yes' : 'No'}}
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
                                            {{ $data['course']->course_type->course_code == "da"
                                                ? $student_register->student_info->personal_no
                                                : $student_register->student_info->cpersonal_no}}
                                        </td>
                                    </tr>
                                @endforeach--}}

                                </tbody>
                            </table>
                        </div>
                        <div id='export-btn'></div>
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

            var course_code = $('#course_code').val();

            $('input[type=radio][name=filter]').on('change', function () {
                var val = $(this).val();
               
                switch (val) {
                    case "all":
                        $('.mac-row, .mac_ygn, .mac_npt, .private-row, .self-row').show();
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