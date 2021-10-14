@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
            <input type="hidden" id="course_code" name="course_code" value={{$course->code}}  >
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">CPA One ဝင်ခွင့်စာမေးပွဲဖြေဆိုခွင့်ရသူများစာရင်း ထုတ်ပြန်ခြင်း</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                            <div class="col-md-3 pl-2">
                                <button   onclick="generateEntranceExamSrNo('{{$course->code}}')" class=" pull-right btn btn-sm btn-success">Publish သို့ထုတ်ပေးမည်</button>
                                
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex flex-row-reverse">

                                    <!-- <div class="">
                                        <button type="button" class="btn btn-primary btn-round m-0"
                                            id="search">Search</button>
                                    </div> -->
                                    <div class="mx-2">
                                        
                                        <select class="form-control form-select" name="select_batch" id="select_batch">
                                            <option value="" selected >Select Batch</option>
                                                
                                            @foreach($course->batches as $batch)
                                            <option value="{{$batch['id']}}">{{$batch['name']}}</option>
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
                                        <th class="bold-font-weight" >မှတ်ပုံတင်နံပါတ်</th>
                                        
                                        <th class="bold-font-weight" >အဘအမည်</th>

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
            
              showEntryExamList(course_code);
        })
        
showEntryExamList = (course_code) =>{
    
    var table_entry = $('#tbl_exam_list').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        searching: false,
        paging:false,
        
        ajax: {
            url  : FRONTEND_URL + "/show_entrance_exam_list",
            type : "POST" ,
            data :  function (d) {
                d.code        =  course_code,
                d.batch = $('#select_batch').val()
             
                
            }
        },
        columns: [
            {data: null, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
            {data: 'student_info.name_mm', name: 'student_info.name_mm'}, 
            {data: 'nrc', name: 'nrc'}, 
            {data: 'student_info.father_name_mm', name: 'student_info.father_name_mm'},
            
            
        ],
        sort: function( row, type, set, meta ) {
            return row[meta.col][1];
        },
        "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

    });

    $("#select_batch").change(function () {
           
        table_entry.draw();
    });

    
}
        </script>


@endpush