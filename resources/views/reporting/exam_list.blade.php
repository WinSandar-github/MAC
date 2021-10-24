@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
            <input type="hidden" id="course_code" name="course_code" value={{$course->code}}  >
            <input type="hidden" id="batch_id" name="batch_id" value={{$batch->id}}  >

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                        <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $course->name_mm }}<br>
                                {{ $batch->name_mm }}<br>စာမေးပွဲဖြေဆိုခွင့်ရသူများစာရင်း</h3>
                        </div>
                    </div>
                </div>
              
                <div class="card-body">
                    <div class="row"> 
                            <div class="col-md-3">
                @php $currend_date =  date("Y-m-d"); @endphp
                               
                            @if($currend_date > $batch->exam_end_date && $currend_date < $batch->end_date  )
                               
                                <button   onclick="generateExamSrNo('{{$course->code}}')" class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်</button>
                               @endif
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex flex-row-reverse">

                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-round m-0"
                                            id="search">Search</button>
                                    </div>
                                    <div class="mx-2">
                                        
                                        <select class="form-control form-select" name="exam_department" id="exam_department">
                                            <option value="" selected >စာဖြေဌာန ရွေးချယ်ပါ</option>
                                                
                                            @foreach($exam_departments as $exam_department)
                                            <option value="{{$exam_department['id']}}">{{$exam_department['name']}}</option>
                                            @endforeach
    
                                            
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
                          
                           
                        
                            <table width="100%" id="tbl_exam_list" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >စဥ်</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>                      
                                        <th class="bold-font-weight" >ကိုယ်ပိုင်အမှတ်</th>
                                        <th class="bold-font-weight">ဘွဲ့အမည်</th>
                                        <th class="bold-font-weight">အဘအမည်</th>
                                        <th class="bold-font-weight">အသက်</th>
                                        <th class="bold-font-weight">ကျား/မ</th>
                                        <th class="bold-font-weight">ဝန်ထမ်း ဟုတ်/မဟုတ်</th>

                                    </tr>
                                </thead>
                                <tbody id="tbl_exam_list_body" class="hoverTable">
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
                headers: false,
                footers: false,
                position: "bottom",
                bootstrap: true
            });

            $btn = $table.find('caption').children().detach();

            $btn.appendTo('#export-btn');
            // table export

            var course_code = $('#course_code').val();
            
            showExamList(course_code);

        });
        
    showExamList = (course_code) =>{
        
        var table_exam = $('#tbl_exam_list').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            searching: false,
            paging:false,
            ajax: {
                url  : FRONTEND_URL + "/show_exam_list",
                type : "POST" ,
                data :  function (d) {
                    d.code        =  course_code,
                    d.module = $('#selected_module').val(),
                    d.exam_department = $('#exam_department').val(),
                    d.batch_id = $('#batch_id').val()

                    
                }
            },
            columns: [
                {data: null, render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                {data: 'student_info.name_mm', name: 'student_info.name_mm'}, 
                {data: 'nrc', name: 'nrc'}, 
                {data: 'cpersonal_no', name: 'cpersonal_no'},
                {data: 'course_name', name: 'course_name'},
                {data: 'student_info.father_name_mm', name: 'student_info.father_name_mm'},
                {data: 'age', name: 'age'},
                {data: 'gender', name: 'gender'},
                {data: 'gov_staff', name: 'gov_staff'},

                

                
                
                
            ],
            sort: function( row, type, set, meta ) {
                return row[meta.col][1];
            },
            "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

        });

        
        $("#search").click(function () {
             
            table_exam.draw();
        });
    }
        </script>


@endpush