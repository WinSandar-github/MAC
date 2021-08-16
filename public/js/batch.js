function createBatch(){    
    var send_data=new FormData();
    send_data.append('name',$("input[name=name]").val());
    send_data.append('course_id',$('#selected_course_id').val());
    send_data.append('start_date',$("input[name=start_date]").val());
    send_data.append('end_date',$("input[name=end_date]").val());
    send_data.append('mac_reg_start_date',$("input[name=mac_reg_start_date]").val());
    send_data.append('mac_reg_end_date',$("input[name=mac_reg_end_date]").val());
    send_data.append('self_reg_start_date',$("input[name=self_reg_start_date]").val());
    send_data.append('self_reg_end_date',$("input[name=self_reg_end_date]").val());
    send_data.append('private_reg_start_date',$("input[name=private_reg_start_date]").val());
    send_data.append('private_reg_end_date',$("input[name=private_reg_end_date]").val());
    send_data.append('accept_application_start_date',$("input[name=app_acc_start_date]").val());
    send_data.append('accept_application_end_date',$("input[name=app_acc_start_date]").val());
    send_data.append('entrance_pass_start_date',$("input[name=entrance_pass_start_date]").val());
    send_data.append('entrance_pass_end_date',$("input[name=entrance_pass_end_date]").val());
    $.ajax({
            url: BACKEND_URL+"/batch",
            type: 'post',
            data:send_data,
            contentType: false,
            processData: false,
            success: function(result){                 
                successMessage("Insert Successfully");
                location.reload();
        }
    });
}

function getBatch(){
    destroyDatatable("#tbl_batch", "#tbl_batch_body"); 
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('course_name',$('#filter_course_id').val());
    send_data.append('start_date',$("input[name=filter_by_start_date]").val());
    send_data.append('end_date',$("input[name=filter_by_end_date]").val());
    $.ajax({
        url: BACKEND_URL+"/filter_batch",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            var course_data=data.data;
            course_data.forEach(function (element) {     
                if(element.entrance_pass_start_date==null){
                    start_date="-";
                }
                else{
                    start_date=element.entrance_pass_start_date;
                }
                if(element.entrance_pass_end_date==null){
                    end_date="-";
                }
                else{
                    end_date=element.entrance_pass_end_date;
                }
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + element.course.name + "</td>";
                tr += "<td>" + element.start_date + "</td>";
                tr += "<td>" + element.end_date + "</td>";
                tr += "<td>" + element.mac_reg_start_date + "</td>";
                tr += "<td>" + element.mac_reg_end_date + "</td>";
                tr += "<td>" + element.self_reg_start_date + "</td>";
                tr += "<td>" + element.self_reg_end_date + "</td>";
                tr += "<td>" + element.private_reg_start_date + "</td>";
                tr += "<td>" + element.private_reg_end_date + "</td>";
                tr += "<td>" + element.accept_application_start_date + "</td>";
                tr += "<td>" + element.accept_application_end_date + "</td>";
                tr += "<td>" + start_date + "</td>";
                tr += "<td>" + end_date + "</td>";
            
                tr += "<td ><div class='btn-group'>";
                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showBatchExam(" + element.id + ")'>" +
                "<li class='fa fa-graduation-cap fa-sm'></li></button> ";
                tr+="<button type='button' id='batch_edit"+element.id+"' class='btn btn-primary btn-xs' onClick='showBatchInfo(" + element.id + ")'>" +
                    "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button'  id='batch_delete"+element.id+"'  class='btn btn-danger btn-xs' onClick='deleteBatchInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
    
                tr += "</tr>";
                $("#tbl_batch_body").append(tr);         
                
                var b_start_date=new Date(element.start_date);
                var now=new Date(Date.now());
                if(now>=b_start_date){
                    document.getElementById('batch_edit'+element.id).style.display='none';
                    document.getElementById('batch_delete'+element.id).style.display='none';
                }
                
            });
            
            getIndexNumber('#tbl_batch tr');
            createDataTable("#tbl_batch");      
        },
        error:function (message){
            dataMessage(message, "#tbl_batch", "#tbl_batch_body");        
        }
    
    });
}

function showBatchInfo(id) {
    
    $("#batch_form").attr('action', 'javascript:updateBatch()');    
    $("input[name=batch_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/batch/"+id,
        success: function (data) {
            var batch_data=data.data;                     
            $('input[name=name]').val(batch_data.name);
            $('#selected_course_id').val(batch_data.course_id);
            $('input[name=start_date]').val(batch_data.start_date);
            $('input[name=end_date]').val(batch_data.end_date);
            $('input[name=mac_reg_start_date]').val(batch_data.mac_reg_start_date);
            $('input[name=mac_reg_end_date]').val(batch_data.mac_reg_end_date);
            $('input[name=self_reg_start_date]').val(batch_data.self_reg_start_date);
            $('input[name=self_reg_end_date]').val(batch_data.self_reg_end_date);
            $('input[name=private_reg_start_date]').val(batch_data.private_reg_start_date);
            $('input[name=private_reg_end_date]').val(batch_data.private_reg_end_date);
            $('input[name=app_acc_start_date]').val(batch_data.accept_application_start_date);            
            $('input[name=app_acc_end_date]').val(batch_data.accept_application_end_date);  
            if(batch_data.entrance_pass_start_date!=null){
                document.getElementById('entrance_pass').style.display='block';
                $('input[name=entrance_pass_start_date]').val(batch_data.entrance_pass_start_date);
            }      
            if(batch_data.entrance_pass_end_date!=null){
                document.getElementById('entrance_pass').style.display='block';
                $('input[name=entrance_pass_end_date]').val(batch_data.entrance_pass_end_date);
            }
            
            $('#create_batch_modal').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });    
}

function updateBatch(){
    var id= $("input[name=batch_id]").val();    
    var name=$("input[name=name]").val();
    var course_id=$("#selected_course_id").val();
    var start_date=$("input[name=start_date]").val();
    var end_date=$("input[name=end_date]").val();
    var mac_reg_start_date=$("input[name=mac_reg_start_date]").val();
    var mac_reg_end_date=$("input[name=mac_reg_end_date]").val();
    var self_reg_start_date=$("input[name=self_reg_start_date]").val();
    var self_reg_end_date=$("input[name=self_reg_end_date]").val();
    var private_reg_start_date=$("input[name=private_reg_start_date]").val();
    var private_reg_end_date=$("input[name=private_reg_end_date]").val();
    var accept_application_start_date=$("input[name=app_acc_start_date]").val();  
    var accept_application_end_date=$("input[name=app_acc_end_date]").val(); 
    var entrance_pass_start_date=$("input[name=entrance_pass_start_date]").val();
    var entrance_pass_end_date=$("input[name=entrance_pass_end_date]").val(); 
   
    $.ajax({
        url: BACKEND_URL+"/batch/"+id,
        type: 'patch',
        data:{
            name:name,
            course_id:course_id,
            start_date:start_date,
            end_date:end_date,
            mac_reg_start_date:mac_reg_start_date,
            mac_reg_end_date:mac_reg_end_date,
            self_reg_start_date:self_reg_start_date,
            self_reg_end_date:self_reg_end_date,
            private_reg_start_date:private_reg_start_date,
            private_reg_end_date:private_reg_end_date,
            accept_application_start_date:accept_application_start_date,
            accept_application_end_date:accept_application_end_date,
            entrance_pass_start_date:entrance_pass_start_date,
            entrance_pass_end_date:entrance_pass_end_date
        },        
        success: function(result){
            successMessage("Update Successfully");
            $('#create_batch_modal').modal('toggle');       
            location.reload();     
            getBatch();
            
        
        }
    });
}

function deleteBatchInfo(batchName,batchId){
    var result = confirm("WARNING: This will delete Batch Name " + decodeURIComponent(batchName) + " and all related data! Press OK to proceed.");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: BACKEND_URL+'/batch/'+batchId,
                success: function (result) {
                    successMessage("Delete Successfully");
                    getBatch();
                },
                error: function (message) {
                    errorMessage(message);
                }
            });
        }
}

$('#selected_course_id').on('change', function (e) {
    var course_id = this.value;
    $.ajax({
        url: BACKEND_URL+"/course/"+course_id,
        type: 'get',
        data:"",
        success: function(data){ 
            console.log(data.data[0]); 
            if(data.data[0].course_type_id==2){
                if(document.getElementById('entrance_pass'))
                {
                    document.getElementById('entrance_pass').style.display='block';
                }
            }
            else{
                if(document.getElementById('entrance_pass')){
                    document.getElementById('entrance_pass').style.display='none';
                }
            }
        },
        error:function (message){
            dataMessage(message);        
        }
    
    });
});


function showBatchExam(id){
    $('#batch_id').val(id);
     $.ajax({
        type: "get",
        url: BACKEND_URL+"/batch/"+id,
        success: function (data) {
            console.log(data);
            var batch_data=data.data; 
            $('input[name=exam_start_date]').val(batch_data.exam_start_date != null ? batch_data.exam_start_date : null );
            $('input[name=exam_end_date]').val(batch_data.exam_end_date != null ? batch_data.exam_end_date : null );
            $('input[name=exam_place]').val(batch_data.exam_place != null ? batch_data.exam_place : null );
            $('input[name=exam_time]').val(batch_data.exam_time != null ? batch_data.exam_time : null );
        }
        
    })

    $('#create_exam_modal').modal('toggle'); 
}

function createExam(){
    
    var batch_id = $('#batch_id').val();
    var exam_start_date=$("input[name=exam_start_date]").val();
    var exam_end_date=$("input[name=exam_end_date]").val(); 
    var exam_place=$("input[name=exam_place]").val();
    var exam_time=$("input[name=exam_time]").val(); 
    $.ajax({
        url: BACKEND_URL+"/save_exam/",
        type: 'post',
        data:{
            batch_id:batch_id,
            exam_start_date:exam_start_date,
            exam_end_date:exam_end_date,
            exam_place:exam_place,
            exam_time:exam_time,
        },        
        success: function(result){
             
            successMessage(result.message);
            $('#create_exam_modal').modal('toggle');       
            location.reload();     
            getBatch();
            
        
        }
    });
}

