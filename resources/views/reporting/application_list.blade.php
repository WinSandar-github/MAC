@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
            <input type="hidden" id="course_code" name="course_code" value={{$course->code}}  >
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $course->name_mm }}<br>
                                {{ $batch->name_mm }}<br>
                                တက်ရောက်ခွင့်ရသူများစာရင်း
                            </h3>
                        </div>
                    </div>
                </div>
                 @php $currend_date =  date("Y-m-d");  @endphp
                {{$currend_date}}
                 <div class="card-body">
                    <div class="row">
                            <div class="col-md-12 pl-2">
                                @if($currend_date > $batch->accept_application_end_date && $currend_date < $batch->end_date )
                                
                                <button   onclick="generateAppSrNo('{{$course->code}}')" class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်</button>
                               @endif
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex flex-row-reverse">

                                    <div class=""  >
                                        <button type="button" class="btn btn-primary btn-round m-0"
                                            id="search">Search</button>
                                    </div>
                                    <div class="mx-2">
                                        
                                        <select class="form-control form-select" name="student_type" id="student_type">
                                            <option value="select_type" selected >Select Student Type</option>
                                                
                                            <option value=2>MAC</option>
                                            <option value=1>Private School</option>
                                            <option value=0>Selfstudy</option>
    
                                            
                                        </select>
                                    </div>
                                    <div class="">
                                        
                                        <select class="form-control form-select" name="selected_module" id="selected_module">
                                            <option value="" selected >Select Module</option>
                                            @foreach($modules as $module)
                                            <option value="{{$module['id']}}">{{$module['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        <div class="col-md-12">

                           

                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >စဥ်</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >မှတ်ပုံတင်အမှတ်</th>
                                        <th class="bold-font-weight">ဘွဲ့အမည်</th>
                                     

                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">
                                    @php $count = 0; @endphp
                                    @foreach($student_registers as $student_register)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$student_register->name_mm}}</td>
                                            <td>{{$student_register->student_info->nrc_state_region. "/" . $student_register->student_info->nrc_township . "(" . $student_register->student_info->nrc_citizen . ")" . $student_register->student_info->nrc_number}}</td>
                                            <td>
                                                @if($course->code === "da_1")
                                                    ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)
                                                @elseif($course->code === "da_2" )
                                                    ဒီပလိုမာစာရင်းကိုင်(ဒုတိယပိုင်း)
                                                @elseif($course->code === "cpa_1" )
                                                    လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း)
                                                @else
                                                    လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)
                                                @endif
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

@push('scripts')
<script>
        $('document').ready(function(){
            var course_code = $('#course_code').val();

            //   showAppList(course_code);
        })

showAppList = (course_code) => {

    var table_app = $('#tbl_application').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        searching: false,
        paging:true,
        ajax: {
            url  : FRONTEND_URL + "/show_registration_list",
            type : "POST" ,
            data :  function (d) {
                d.code        =  course_code,
                d.module = $('#selected_module').val(),
                d.student_type = $('#student_type').val()

            }
        },
        columns: [
            {data: null, render: function (data, type, row, meta) {
                
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
            {data: 'student_info.name_mm', name: 'name_mm'},
            {data: 'nrc', name: 'nrc'},
            {data: 'course.name_mm', name: 'course name'},
            
            {data: 'cpersonal_no', name: 'cpersonal_no'},


        ],
        sort: function( row, type, set, meta ) {
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
