@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
            <input type="hidden" id="course_code" name="course_code" value={{$course->code}}  >
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">စာမေးပွဲဖြေဆိုခွင့်ရသူများစာရင်း</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                            <div class="col-md-12 pl-2">
                               
                               
                                <button   onclick="generateExamSrNo('{{$course->code}}')" class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်</button>
                               
                            </div>
                        

                        <div class="col-md-12">
                          
                           
                        
                            <table width="100%" id="tbl_exam_list" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >Serial number</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >မှတ်ပုံတင်နံပါတ်</th>
                                        
                                        <th class="bold-font-weight" >ကိုယ်ပိုင်နံပါတ်</th>

                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">
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
            
              showAppList(course_code);
        })
        
showAppList = (course_code) =>{
    
    var table_app = $('#tbl_exam_list').DataTable({
        scrollX: true,
        processing: true,
        serverSide: false,
        searching: false,
        paging:false,
        
        ajax: {
            url  : FRONTEND_URL + "/show_exam_list",
            type : "POST" ,
            data :  function (d) {
                d.code        =  course_code,
                d.exam_type_id = 3
                
            }
        },
        columns: [
            {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
            {data: 'student_info.name_mm', name: 'student_info.name_mm'}, 
            {data: 'nrc', name: 'nrc'}, 
            {data: 'student_info.personal_no', name: 'personal_no'},
            
            
        ],
        sort: function( row, type, set, meta ) {
            return row[meta.col][1];
        },
        "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

    });

    
}
        </script>


@endpush